<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$companyMain = $_GET['scom'];
$uid = $_GET['suser'];
$monthchange4 = $_GET['smonth'];
$yearchange4 = $_GET['syear'];
$month = $_GET['smonth'];
$year = $_GET['syear'];

$payid4b = time();
$date4 = time();

$dtime2 = time();
$da=cal_days_in_month(CAL_GREGORIAN,$monthchange4,$yearchange4);
$dtime = strtotime($yearchange4.'-'.$monthchange4.'-'.$da);


// kpi & attendance calculations

$com1=mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p= mysqli_fetch_array($com1))
{
$masterkpi = $com1p["masterkpi"];
$mastersalary = $com1p["mastersalary"];
$kpion = $com1p["kpion"];
$kpidata = $com1p["kpidata"];
$salaryon = $com1p["salaryon"];
$salarydata = $com1p["salarydata"];
$atcomp = $com1p["atcomp"];
}

// attendance
if($mastersalary == "1"){
  if($salaryon == "1"){
    $attpercent = $salarydata;
  } else {
    $attpercent = 0;
  }
} else {
  $attpercent = 0;
}

// kpi
if($masterkpi == "1"){
  if($kpion == "1"){
    $kpipercent = $kpidata;
  } else {
    $kpipercent = 0;
  }
} else {
  $kpipercent = 0;
}

// salary normal
$salbalpercent = $atcomp;
// end attendance calculations

$dz = 0;
// get the employee and cycle round
$bookpay1=mysqli_query($conn, "SELECT * FROM employee WHERE company = '$companyMain' AND status = 'Active'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$empid = $bookpay["id"];
$employeeidy = $bookpay["employeeid"];
$employeeid4 = $bookpay["employeeid"];
$fnamey = $bookpay["fname"];
$mnamey = $bookpay["mname"];
$lnamey = $bookpay["lname"];
$salaryscale2 = $bookpay["salaryscale"];
$grade = $bookpay["salaryscale"];
$salarygrade4 = $bookpay["salaryscale"];

$dz = $dz + 1;
$payid4 = $payid4b.'A'.$dz;

// confirm if in payroll for month
$paybook1=mysqli_query($conn, "SELECT * FROM salary_payroll WHERE company = '$companyMain' AND employeeid = '$employeeid4' AND mapid = '$empid' AND month = '$month' AND year = '$year' AND salaryscale = '$grade'");
$paybook = mysqli_num_rows($paybook1);

if($paybook > 0){ } else {

// get salary scale
$huya=mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
while ($hugya = mysqli_fetch_array($huya))
{
  $salaryscale3 = $hugya["nickname"];
}

// insert to  payroll
  $saveinsert1 = "INSERT INTO salary_payroll (`company`, `employeeid`, `mapid`, `payid`, `month`, `year`, `date`, `salaryscale`, `createdby`, `attp`, `kpip`, `salp`) VALUES ('$companyMain', '$employeeid4', '$empid', '$payid4', '$monthchange4', '$yearchange4', '$date4', '$salarygrade4', '$uid', '$attpercent', '$kpipercent', '$salbalpercent')";
  if(mysqli_query($conn, $saveinsert1)){

    // process allowances
    $allselect1=mysqli_query($conn, "SELECT * FROM salary_allowance WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
    while ($allselect = mysqli_fetch_array($allselect1)){
        $allowid = $allselect["id"];
        $allowname2y = $allselect["name"];
        $allowvalue2y = $allselect["dvalue"];

        $saveinsert2 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y', '$allowvalue2y', 'Allowances')";
        mysqli_query($conn, $saveinsert2);
    }

    // process allowances other
    $allselect12=mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
    $allselect2count = mysqli_num_rows($allselect12);
    if($allselect2count > 0){ 
        while ($allselect21 = mysqli_fetch_array($allselect12)){
            $allowname2y1 = $allselect21["name"];
            $allowvalue2y1 = $allselect21["dvalue"];
  
            $saveinsert3 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y1', '$allowvalue2y1', 'Allowances Other')";
            mysqli_query($conn, $saveinsert3);
        }
    }

    // process deductions
    $allselect1d=mysqli_query($conn, "SELECT * FROM salary_deduction WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
    while ($allselectd = mysqli_fetch_array($allselect1d)){
        $allowidd = $allselectd["id"];
        $allowname2yd = $allselectd["name"];
        $allowvalue2yd = $allselectd["dvalue"];

        $saveinsert2d = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2yd', '$allowvalue2yd', 'Deductions')";
        mysqli_query($conn, $saveinsert2d);
    }

    // process deductions other
    $allselect12s=mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
    $allselect2counts = mysqli_num_rows($allselect12s);
    if($allselect2counts > 0){ 
        while ($allselect21s = mysqli_fetch_array($allselect12s)){
            $allowname2y1s = $allselect21s["name"];
            $allowvalue2y1s = $allselect21s["dvalue"];
  
            $saveinsert3s = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y1s', '$allowvalue2y1s', 'Deductions Other')";
            mysqli_query($conn, $saveinsert3s);
        }
    }

  } // end insert to payroll

} // end check if payroll already done

}  // end get employee

//echo "oK";
?>