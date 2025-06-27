<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$grade = isset($_GET['grade']) ? $_GET['grade'] : $grade;
$month = isset($_GET['month']) ? $_GET['month'] : $month;
$year = isset($_GET['year']) ? $_GET['year'] : $year;
$companyMain = isset($_GET['com']) ? $_GET['com'] : $companyMain;
$empid = isset($_GET['empid']) ? $_GET['empid'] : $eidy;
$type = isset($_GET['type']) ? $_GET['type'] : $type;
$nickname = $_GET['nickname'];
$amount = $_GET['amount'];
$month2 = $_GET['month2'];
$user = $_GET['user'];
$todelete = $_GET['todelete'];

// do addotions of allowances
if ($type == 1) {
  $createdate = time();
  $newmonth = ($month2 - 1);

  if ($newmonth > 0) {
    $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    //$olddate = strtotime($year.'-'.$month.'-'.$d);
    $olddate = $year . '-' . $month . '-' . $d;

    $enddate = strtotime(date('Y-m-d', strtotime($olddate . ' + ' . $newmonth . ' months')));
  } else {
    $enddate = strtotime(date("Y-m-d"));
  }

  $insquery1 = mysqli_query($conn, "INSERT INTO salary_deduction_other (`company`, `createdate`, `createby`, `name`, `dvalue`, `month`, `year`, `ddate`, `employeeid`) VALUES ('$companyMain', '$createdate', '$user', '$nickname', '$amount', '$month', '$year', '$enddate', '$empid')");

  //log event
  $dinsert = mysqli_insert_id($conn);
  log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Salary Deduction Other", "success", '', '', $_SESSION['logged']);
}

// do deletions of allowances
if ($type == 3) {
  $insquery1 = mysqli_query($conn, "DELETE FROM salary_deduction_other WHERE id='$todelete'");
}

// paye and pension calculation
$huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$empid' AND company='$companyMain'");
while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
  $eid = $huserb1d5["id"];
  $salaryscale4 = $huserb1d5["salaryscale"];

  $doremi = 0;
  $doremifull = 0;
  $hu1 = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance WHERE company='$companyMain' AND status='Active' ORDER BY name asc");
  while ($hug1 = mysqli_fetch_array($hu1)) {
    //$showsalaryscale = $hug1["salaryscale"];
    $namey = $hug1["name"];

    $huyaz = mysqli_query($conn, "SELECT * FROM salary_allowance WHERE name = '$namey' AND salaryscale = '$salaryscale4' AND company = '$companyMain'");
    $totnum = mysqli_num_rows($huyaz);

    if ($totnum > 0) {
      while ($hugyaz = mysqli_fetch_array($huyaz)) {
        $allowlabelsbz = $hugyaz["dvalue"];
        $theprimary = $hugyaz["theprimary"];
      }
      if ($theprimary == "1") {
        $doremi = ($doremi + $allowlabelsbz);
      } else {
        $doremi = ($doremi + 0);
      }

      $allowlabelsb  = $allowlabelsbz;
    } else {
      $allowlabelsb  = "0";
      $doremi = ($doremi + 0);
    }

    $doremifull = ($doremifull + $allowlabelsb);
  }

  $doremia = 0;
  $hu1a = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance_other WHERE company='$companyMain' AND year='$year' AND month='$month' ORDER BY name asc");
  while ($hug1a = mysqli_fetch_array($hu1a)) {
    $nameya = $hug1a["name"];

    $huyazA = mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE name = '$nameya' AND company='$companyMain' AND employeeid='$empid' AND year='$year' AND month='$month'");
    $totnumA = mysqli_num_rows($huyazA);

    if ($totnumA > 0) {
      while ($hugyaza = mysqli_fetch_array($huyazA)) {
        $allowlabelsbza = $hugyaza["dvalue"];
        $doremia = ($doremia + $allowlabelsbza);
      }
      $allowlabelsba  = $allowlabelsbza;
    } else {
      $allowlabelsba  = "0";
      $doremia = ($doremia + 0);
    }
  }

  $doremifull = ($doremifull + $doremia);

  $doremifullby12 = ($doremifull * 12);
  $defbyeight = ($doremi * 0.08);
  $defbyten = ($doremi * 0.1);
  $sumlm = ($defbyeight + $defbyten);
  $lbytwelve = ($defbyeight * 12);
  $cra = ((($doremifullby12 - $lbytwelve) * 0.2) + 200000);
  $totalreleif = ($lbytwelve + $cra);
  $taxableincome = ($doremifullby12 - $totalreleif);

  if ($taxableincome >= 300000) {
    $aby1 = (300000 * 0.07);
  } else {
    $aby1 = ($taxableincome * 0.07);
  }

  if ($taxableincome >= 600000) {
    $aby2 = (300000 * 0.11);
  } else {
    if (($taxableincome - 300000) > 0) {
      $aby2 = (($taxableincome - 300000) * 0.11);
    } else {
      $aby2 = "0";
    }
  }

  if ($taxableincome >= 1100000) {
    $aby3 = (500000 * 0.15);
  } else {
    if (($taxableincome - 600000) > 0) {
      $aby3 = (($taxableincome - 600000) * 0.15);
    } else {
      $aby3 = "0";
    }
  }

  if ($taxableincome >= 1600000) {
    $aby4 = (500000 * 0.19);
  } else {
    if (($taxableincome - 1100000) > 0) {
      $aby4 = (($taxableincome - 1100000) * 0.19);
    } else {
      $aby4 = "0";
    }
  }

  if ($taxableincome >= 3200000) {
    $aby5 = (1600000 * 0.21);
  } else {
    if (($taxableincome - 1600000) > 0) {
      $aby5 = (($taxableincome - 1600000) * 0.21);
    } else {
      $aby5 = "0";
    }
  }

  if ($taxableincome >= 4800000) {
    //$aby6 = (1600000 * 0.24);
    $aby6 = (($taxableincome - 3200000) * 0.24);
  } else {
    if (($taxableincome - 3200000) > 0) {
      $aby6 = (($taxableincome - 3200000) * 0.24);
    } else {
      $aby6 = "0";
    }
  }

  $totalpayee = ($aby1 + $aby2 + $aby3 + $aby4 + $aby5 + $aby6);
  $monthlypayee = ($totalpayee / 12);
}
// end payee

?>
<div class="list-group list-group-striped mb-3">

  <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
    <input type="checkbox" name="pension" value="pension" checked>
    <input type="hidden" name="pensionName" value="User Monthly Pension" checked>
    <input type="hidden" name="pensionValue" value="<?php echo $defbyeight; ?>" checked>
    <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
      <p class="mg-b-0 tx-inverse tx-medium">User Monthly Pension</p>
    </div>
    <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
      <span class="tx-inverse tx-medium"><?php echo number_format($defbyeight, 2); ?></span>
    </div>
  </div><!-- list-group-item -->

  <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
    <input type="checkbox" name="payee" value="payee" checked>
    <input type="hidden" name="payeeName" value="Monthly PAYE" checked>
    <input type="hidden" name="payeeValue" value="<?php echo $monthlypayee; ?>" checked>
    <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
      <p class="mg-b-0 tx-inverse tx-medium">Monthly PAYE</p>
    </div>
    <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
      <span class="tx-inverse tx-medium"><?php echo number_format($monthlypayee, 2); ?></span>
    </div>
  </div><!-- list-group-item -->

  <?php
  $dedselect1 = mysqli_query($conn, "SELECT * FROM salary_deduction WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
  while ($dedselect = mysqli_fetch_array($dedselect1)) {
    $dedid = $dedselect["id"];
    $dedname = $dedselect["name"];
    $dedvalue = $dedselect["dvalue"];
  ?>
    <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
      <input type="checkbox" name="dedid[]" value="<?php echo $dedid; ?>" checked>
      <input type="hidden" name="dedname[]" value="<?php echo $dedname; ?>" checked>
      <input type="hidden" name="dedvalue[]" value="<?php echo $dedvalue; ?>" checked>
      <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
        <p class="mg-b-0 tx-inverse tx-medium"><?php echo $dedname; ?></p>
      </div>
      <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
        <span class="tx-inverse tx-medium"><?php echo number_format($dedvalue, 2); ?></span>
      </div>
    </div><!-- list-group-item -->
  <?php
  }
  ?>
  <!-- <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start bg-info">
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-white tx-medium">Total</p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-white tx-medium">Display</span>
        </div>
    </div> -->
</div>

<?php
$dtime2 = time();
$da = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$dtime = strtotime($year . '-' . $month . '-' . $da);

$dedselect12 = mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
$dedselect2count = mysqli_num_rows($dedselect12);
if ($dedselect2count > 0) { ?>
  <p class="mg-b-0 tx-inverse tx-medium">Deduction Other</p>
  <div class="list-group list-group-striped mt-1">
    <?php
    while ($dedselect2 = mysqli_fetch_array($dedselect12)) {
      $dedid2 = $dedselect2["id"];
      $dedname2 = $dedselect2["name"];
      $dedvalue2 = $dedselect2["dvalue"];
    ?>
      <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
        <input type="checkbox" name="dedid2[]" value="<?php echo $dedid2; ?>" checked>
        <input type="hidden" name="dedname2[]" value="<?php echo $dedname2; ?>" checked>
        <input type="hidden" name="dedvalue2[]" value="<?php echo $dedvalue2; ?>" checked>
        <a href="javascript:;" onclick="deddelete(<?php echo $dedid2; ?>,<?php echo $grade; ?>,<?php echo $empid; ?>)"><i class="fa fa-window-close tx-danger mg-l-10"></i></a>
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
          <p class="mg-b-0 tx-inverse tx-medium"><?php echo $dedname2; ?></p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
          <span class="tx-inverse tx-medium"><?php echo number_format($dedvalue2, 2); ?></span>
        </div>
      </div><!-- list-group-item -->
    <?php
    }
    ?>
    <!-- <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start bg-info">
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-white tx-medium">Total</p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-white tx-medium">Display</span>
        </div>
    </div> -->

  </div>
<?php
}
?>