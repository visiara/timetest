<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];
$type = "2";

$year = isset($_GET['year']) ? $_GET['year'] : date("Y");
$month = isset($_GET['month']) ? $_GET['month'] : date("m");
$month22 = isset($_GET['month']) ? date("F", strtotime($year . '-' . $month)) : date("F");
$dt = isset($_GET['month']) ? date("Y-m-d", strtotime($year . '-' . $month)) : date("Y-m-d");
$date1 = date("Y-m-01", strtotime($dt));
$date2 = date("Y-m-t", strtotime($dt));

/*
$year = date("Y");
$month = date("m");
$month22 = date("F");
$type = "2";
$dt = date("Y-m-d");
$date1 = date("Y-m-01", strtotime($dt));
$date2 = date("Y-m-t", strtotime($dt));
*/

$com1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p = mysqli_fetch_array($com1)) {
  $companyid = $com1p["id"];
  $comName = $com1p["companyname"];
  $comStatus = $com1p["status"];
  $comStart1 = $com1p["startdate"];
  $comEnd1 = $com1p["enddate"];
  $comReg1 = $com1p["regdate"];
  $comAddy = $com1p["comaddress"];
  $comPhone = $com1p["comephone"];
  $comMail = $com1p["comemail"];
  $companyref = $com1p["compref"];
  $breakoption = $com1p["breakoption"];

  $masterkpi = $com1p["masterkpi"];
  $mastersalary = $com1p["mastersalary"];
  $kpion = $com1p["kpion"];
  $kpidata = $com1p["kpidata"];
  $salaryon = $com1p["salaryon"];
  $salarydata = $com1p["salarydata"];
  $atcomp = $com1p["atcomp"];
}

$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $employeeidy = $bookpay["employeeid"];
  $fnamey = $bookpay["fname"];
  $mnamey = $bookpay["mname"];
  $lnamey = $bookpay["lname"];
  $salaryscale2 = $bookpay["salaryscale"];
  $grade = $bookpay["salaryscale"];
  $location1 = $bookpay["location"];
  $department1 = $bookpay["department"];
  $workshift = $bookpay["workshift"];
}

$hu = mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1' AND company='$companyMain'");
while ($hug = mysqli_fetch_array($hu)) {
  $location = $hug["locationname"];
}

$hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
while ($hug1 = mysqli_fetch_array($hu1)) {
  $department = $hug1["departmentname"];;
}

$huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
while ($hugya = mysqli_fetch_array($huya)) {
  $salaryscale3 = $hugya["nickname"];
}

$huyaw = mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift' AND company='$companyMain'");
while ($hugyaw = mysqli_fetch_array($huyaw)) {
  $workhours = $hugyaw["hours"];
}

$paydate = date("Y-m-d");
$payid = '';
$attp = 0;
$kpip = 0;
$salp = 0;

$huyaz = mysqli_query($conn, "SELECT * FROM salary_payroll WHERE mapid = '$q' AND company='$companyMain' AND month='$month' AND year='$year'");
while ($hugyaz = mysqli_fetch_array($huyaz)) {
  $payid = $hugyaz["payid"];
  $paydate = date("y-m-d h:i A", $hugyaz["date"]);

  $attp = $hugyaz["attp"];
  $kpip = $hugyaz["kpip"];
  $salp = $hugyaz["salp"];
}

$sum1 = mysqli_query($conn, "SELECT SUM(dvalue) AS dvalue2 FROM salary_payroll_data WHERE payid = '$payid' AND (paytype='Allowances' OR paytype='Allowances Other')");
while ($sum2 = mysqli_fetch_array($sum1)) {
  $Tallowances = $sum2["dvalue2"];
}
$Tallowances = empty($Tallowances) ? 0 : $Tallowances;

$sum1d = mysqli_query($conn, "SELECT SUM(dvalue) AS dvalue2d FROM salary_payroll_data WHERE payid = '$payid' AND (paytype='Deductions' OR paytype='Deductions Other')");
while ($sum2d = mysqli_fetch_array($sum1d)) {
  $Tdeductions = $sum2d["dvalue2d"];
}
$Tdeductions = empty($Tdeductions) ? 0 : $Tdeductions;

$Tnet = ($Tallowances - $Tdeductions);

// total no of days present
$thu = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeidy' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='on'");
$totaldaysP = mysqli_num_rows($thu);

// total no of days absent
$thu1 = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeidy' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='off'");
$totaldaysA = mysqli_num_rows($thu1);

// total no of all days
$alltotals = ($totaldaysP + $totaldaysA);

//hr diffrence
$hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeidy' AND company='$companyMain' AND attendancereport = 'Active'");
$huy = mysqli_num_rows($hu);

$hourdiff = 0;
while ($hug = mysqli_fetch_array($hu)) {
  $timeInseconds = $hug["timeInseconds"];
  $timeOutseconds = $hug["timeOutseconds"];
  $timeStatus2 = $hug["attendance"];
  $etimeOut = $hug["expectedTimeOut"];
  $aover = $hug["aover"];

  if ($timeOutseconds == "0" && $timeInseconds != "0") {
    if ($aover == "1") {
      $timeOutseconds = ($etimeOut * 1000);
    } else {
      $daytimeOut = date('Y-m-d H:i:s', $etimeOut);
      $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " - $compo hours"));
      $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);

      if ($timeOutseconds <= $timeInseconds) {
        $daytimeOut = date('Y-m-d H:i:s', ($timeInseconds / 1000));
        $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " + 1 hours"));
        $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);
      }
    }
  }

  $hourdiff += (abs(($timeInseconds / 1000) - ($timeOutseconds / 1000)) / 3600);
}
$hourdiff = round($hourdiff, 2);

////  kpi & attendance calculations attendancereport='Active'

$attamount = ($attp == 0) ? 0 : (($attp / 100) * $Tnet);
$kpiamount = ($kpip == 0) ? 0 : (($kpip / 100) * $Tnet);
$salamount = ($salp == 0) ? 0 : (($salp / 100) * $Tnet);

//attemdance
$epectedatt = ($huy * $workhours);
$gotatt = ($hourdiff > $epectedatt) ? $epectedatt : $hourdiff;
//$attp2 = round($gotatt / $epectedatt, 1) * 100;
$attp2 = ($gotatt == 0 || $epectedatt == 0) ? 0 : ($gotatt / $epectedatt) * 100;
$attamounttopay = (($attp2 / 100) * $attamount) > 0 ? (($attp2 / 100) * $attamount) : 0;

// get kpi
$sum1dkp = mysqli_query($conn, "SELECT SUM(dpoll) AS dpollvalue FROM kpi_list WHERE (company='$companyMain' AND endmonth='$month' AND endyear='$year' AND status='Active' AND employeeid = '$eidy' AND kpitype='Individual') OR (company='$companyMain' AND endmonth='$month' AND endyear='$year' AND status='Active' AND employeeid='$department1' AND kpitype='Departmental')");
$sum1dkp2 = mysqli_query($conn, "SELECT id FROM kpi_list WHERE (company='$companyMain' AND endmonth='$month' AND endyear='$year' AND status='Active' AND employeeid = '$eidy' AND kpitype='Individual') OR (company='$companyMain' AND endmonth='$month' AND endyear='$year' AND status='Active' AND employeeid='$department1' AND kpitype='Departmental')");
$tottalkpi = mysqli_num_rows($sum1dkp2);
while ($sum2dkp = mysqli_fetch_array($sum1dkp)) {
  $sumkpi = $sum2dkp["dpollvalue"] > 0 ? $sum2dkp["dpollvalue"] : 0;
}

// old kpi implimentation
/*
$epectedkpi = $tottalkpi > 0 ? ($tottalkpi * 100) : 100;
$gotkpi = $tottalkpi > 0 ? ($sumkpi/$tottalkpi) : 100;
$kpip2 = round($gotkpi / $epectedkpi, 1) * 100;
$kpiamounttopay = (($kpip2 / 100) * $kpiamount) > 0 ? (($kpip2 / 100) * $kpiamount) : 0;
*/
//


if (($masterkpi == "1") && ($kpion == "1") && ($tottalkpi > 0) && ($kpip > 0)) {
  $kpiamounttopay = $sumkpi > 0 ? (($sumkpi / 100) * $kpiamount) : 0;
  $kpiamounttopay = $kpiamounttopay;
} else {
  $kpiamounttopay = $kpiamount;
}

if (($mastersalary == "1") && ($salaryon == "1") && ($epectedatt > 0) && ($attp > 0)) {
  $attamounttopay = $attamounttopay;
} else {
  $attamounttopay = $attamount;
}

$takehomepay = ($attamounttopay + $kpiamounttopay + $salamount);
/////

?>

<div class="col-12 ">
  <div class="pd-20">
    <div class="d-xs-flex align-items-center justify-content-between">
      <div>
        <h4 class="tx-uppercase tx-inverse tx-bold"><?php echo "$comName"; ?></h4>
        <p class="mg-b-0 tx-Regular"><?php echo $comAddy; ?></p>
      </div>
      <div>
        <h4 class="tx-uppercase tx-inverse tx-bold"><?php echo "$month22, $year"; ?></h4>
      </div>
    </div>
  </div><!-- pd-20 -->
</div><!-- col-12 -->

<div class="col-12 ">
  <div class="pd-20">
    <div class="d-xs-flex align-items-center justify-content-between">
      <div>
        <p class="mg-b-0"><span class="tx-Regular">Create Date: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $paydate; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Location: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $location; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Department: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $department; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Grade: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $salaryscale3; ?></span></p>
      </div>
      <div>
        <h4 class="tx-uppercase tx-inverse tx-bold"><?php echo "$fnamey $mnamey $lnamey"; ?></h4>
        <p class="mg-b-0"><?php echo " ( $employeeidy )"; ?></p>
      </div>
      <div>
        <p class="mg-b-0"><span class="tx-Regular">Working Days: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $alltotals; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Active Days: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $totaldaysP; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Absent Days: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $totaldaysA; ?></span></p>
        <p class="mg-b-0"><span class="tx-Regular">Total Hours: </span><span class="tx-uppercase tx-inverse tx-bold"><?php echo $hourdiff; ?></span></p>
      </div>
    </div>
  </div><!-- pd-20 -->
</div><!-- col-12 -->

<div class="col-12 ">
  <div class="pd-20 bg-primary">
    <div class="d-xs-flex align-items-center justify-content-between">
      <div>
        <h4 class="tx-uppercase tx-white tx-bold"><?php echo $moneyp . number_format($Tnet, 2); ?></h4>
        <p class="mg-b-0 tx-white tx-Regular">NET Pay:</p>
      </div>
      <div>
        <h1 class="tx-uppercase tx-white tx-bold"><?php echo $moneyp . number_format($takehomepay, 2); ?></h1>
        <p class="mg-b-0 tx-white tx-Regular">Take Home Pay:</p>
      </div>
      <div>
        <h4 class="tx-uppercase tx-white tx-bold"><?php echo $moneyp . number_format($Tallowances, 2); ?></h4>
        <p class="mg-b-0 tx-white tx-Regular">GROSS Pay:</p>
      </div>
    </div>
  </div><!-- pd-20 -->
</div><!-- col-12 -->

<div class="col-6 ">
  <div class="pd-10">

    <div class="card bd-0 mb-4 mt-0">
      <div class="card-header bg-info bd-0 d-flex align-items-center justify-content-between pd-y-15">
        <h5 class="mg-b-0 tx-14 tx-uppercase tx-white tx-medium">Allowances</h5>
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom-0 pd-2 ht-350" id="allowances">

        <div class="list-group list-group-striped mb-3">

          <?php
          $allselect1 = mysqli_query($conn, "SELECT * FROM salary_payroll_data WHERE payid='$payid' AND paytype='Allowances' ORDER BY id asc");
          while ($allselect = mysqli_fetch_array($allselect1)) {
            $allowname = $allselect["name"];
            $allowvalue = $allselect["dvalue"];
          ?>
            <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
              <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
                <p class="mg-b-0 tx-inverse tx-Regular"><?php echo $allowname; ?></p>
              </div>
              <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
                <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($allowvalue, 2); ?></span>
              </div>
            </div><!-- list-group-item -->
          <?php
          }
          ?>

          <?php
          $allselect1 = mysqli_query($conn, "SELECT * FROM salary_payroll_data WHERE payid='$payid' AND paytype='Allowances Other' ORDER BY id asc");
          while ($allselect = mysqli_fetch_array($allselect1)) {
            $allowname = $allselect["name"];
            $allowvalue = $allselect["dvalue"];
          ?>
            <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
              <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
                <p class="mg-b-0 tx-inverse tx-Regular"><?php echo $allowname; ?></p>
              </div>
              <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
                <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($allowvalue, 2); ?></span>
              </div>
            </div><!-- list-group-item -->
          <?php
          }
          ?>

        </div>

      </div><!-- card-body -->
      <div class="card-footer bd bd-t-0 d-flex justify-content-between">
        <p class="mg-b-0 tx-inverse tx-Regular">Total Allowances:</p>
        <p class="mg-b-0 tx-inverse tx-medium"><?php echo $moneyp . number_format($Tallowances, 2); ?></p>
      </div>
    </div><!-- card -->

  </div><!-- pd-20 -->
</div><!-- col-12 -->

<div class="col-6 ">
  <div class="pd-10">

    <div class="card bd-0 mb-4 mt-0">
      <div class="card-header bg-warning bd-0 d-flex align-items-center justify-content-between pd-y-15">
        <h5 class="mg-b-0 tx-uppercase tx-14 tx-white tx-medium">Deductions</h5>
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom-0 pd-2 ht-350" id="deductions">

        <div class="list-group list-group-striped mb-3">

          <?php
          $allselect1 = mysqli_query($conn, "SELECT * FROM salary_payroll_data WHERE payid='$payid' AND paytype='Deductions' ORDER BY id asc");
          while ($allselect = mysqli_fetch_array($allselect1)) {
            $allowname = $allselect["name"];
            $allowvalue = $allselect["dvalue"];
          ?>
            <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
              <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
                <p class="mg-b-0 tx-inverse tx-Regular"><?php echo $allowname; ?></p>
              </div>
              <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
                <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($allowvalue, 2); ?></span>
              </div>
            </div><!-- list-group-item -->
          <?php
          }
          ?>

          <?php
          $allselect1 = mysqli_query($conn, "SELECT * FROM salary_payroll_data WHERE payid='$payid' AND paytype='Deductions Other' ORDER BY id asc");
          while ($allselect = mysqli_fetch_array($allselect1)) {
            $allowname = $allselect["name"];
            $allowvalue = $allselect["dvalue"];
          ?>
            <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
              <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
                <p class="mg-b-0 tx-inverse tx-Regular"><?php echo $allowname; ?></p>
              </div>
              <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
                <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($allowvalue, 2); ?></span>
              </div>
            </div><!-- list-group-item -->
          <?php
          }
          ?>
        </div>

      </div><!-- card-body -->
      <div class="card-footer bd bd-t-0 d-flex justify-content-between">
        <p class="mg-b-0 tx-inverse tx-Regular">Total Deductions:</p>
        <p class="mg-b-0 tx-inverse tx-medium"><?php echo $moneyp . number_format($Tdeductions, 2); ?></p>
      </div>
    </div><!-- card -->

  </div><!-- pd-20 -->
</div><!-- col-12 -->

<?php if (($mastersalary == "1") && ($salaryon == "1") && ($epectedatt > 0)) { ?>
  <div class="col-6 ">
    <div class="pd-10">
      <h6 class="tx-uppercase tx-inverse tx-bold">Attendance Report</h6>
      <div class="list-group list-group-striped mb-3">

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">% of Salary</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $attp; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Expected Hours</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $epectedatt; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Accrued Hours</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $gotatt; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Accrued Amount</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($attamounttopay, 2); ?></span>
          </div>
        </div><!-- list-group-item -->

      </div>
    </div><!-- pd-20 -->
  </div><!-- col-12 -->
<?php } ?>

<?php if (($masterkpi == "1") && ($kpion == "1") && ($tottalkpi > 0)) { ?>
  <div class="col-6 ">
    <div class="pd-10">
      <h6 class="tx-uppercase tx-inverse tx-bold">KPI Report</h6>
      <div class="list-group list-group-striped mb-3">

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">% of Salary</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $kpip; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Expected %</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo '100'; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Accrued %</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $sumkpi; ?></span>
          </div>
        </div><!-- list-group-item -->

        <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
          <div class="mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-Regular">Accrued Amount</p>
          </div>
          <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo $moneyp . number_format($kpiamounttopay, 2); ?></span>
          </div>
        </div><!-- list-group-item -->
      </div>
    </div><!-- pd-20 -->
  </div><!-- col-12 -->
<?php } ?>