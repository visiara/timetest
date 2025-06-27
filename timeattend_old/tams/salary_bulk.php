<?php
include __DIR__ . "/../includes/config.php"; // go one level up


$companyMain = $_GET['scom'];
$uid = $_GET['suser'];
$monthchange4 = $_GET['smonth'];
$yearchange4 = $_GET['syear'];
$month = $_GET['smonth'];
$year = $_GET['syear'];
$usepen = $_GET['usepen'];

$payid4b = time();
$date4 = time();

$dtime2 = time();
$da = cal_days_in_month(CAL_GREGORIAN, $monthchange4, $yearchange4);
$dtime = strtotime($yearchange4 . '-' . $monthchange4 . '-' . $da);


// kpi & attendance calculations

$com1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p = mysqli_fetch_array($com1)) {
  $masterkpi = $com1p["masterkpi"];
  $mastersalary = $com1p["mastersalary"];
  $kpion = $com1p["kpion"];
  $kpidata = $com1p["kpidata"];
  $salaryon = $com1p["salaryon"];
  $salarydata = $com1p["salarydata"];
  $atcomp = $com1p["atcomp"];
}

// attendance
if ($mastersalary == "1") {
  if ($salaryon == "1") {
    $attpercent = $salarydata;
  } else {
    $attpercent = 0;
  }
} else {
  $attpercent = 0;
}

// kpi
if ($masterkpi == "1") {
  if ($kpion == "1") {
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
$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE company = '$companyMain' AND status = 'Active'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
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
  $payid4 = $payid4b . 'A' . $dz;

  // confirm if in payroll for month
  $paybook1 = mysqli_query($conn, "SELECT * FROM salary_payroll WHERE company = '$companyMain' AND employeeid = '$employeeid4' AND mapid = '$empid' AND month = '$month' AND year = '$year' AND salaryscale = '$grade'");
  $paybook = mysqli_num_rows($paybook1);

  if ($paybook > 0) {
  } else {

    // get salary scale
    $huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
    while ($hugya = mysqli_fetch_array($huya)) {
      $salaryscale3 = $hugya["nickname"];
    }

    // paye and pension calculation
    $eid = $empid;
    $salaryscale4 = $salaryscale2;

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
    // end payee

    // insert to  payroll
    $saveinsert1 = "INSERT INTO salary_payroll (`company`, `employeeid`, `mapid`, `payid`, `month`, `year`, `date`, `salaryscale`, `createdby`, `attp`, `kpip`, `salp`) VALUES ('$companyMain', '$employeeid4', '$empid', '$payid4', '$monthchange4', '$yearchange4', '$date4', '$salarygrade4', '$uid', '$attpercent', '$kpipercent', '$salbalpercent')";
    if (mysqli_query($conn, $saveinsert1)) {

      //log event
      $dinsert = mysqli_insert_id($conn);
      log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Salary Payroll", "success", '', '', $_SESSION['logged']);

      // process allowances
      $allselect1 = mysqli_query($conn, "SELECT * FROM salary_allowance WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
      while ($allselect = mysqli_fetch_array($allselect1)) {
        $allowid = $allselect["id"];
        $allowname2y = $allselect["name"];
        $allowvalue2y = $allselect["dvalue"];

        $saveinsert2 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y', '$allowvalue2y', 'Allowances')";
        mysqli_query($conn, $saveinsert2);
      }

      // process allowances other
      $allselect12 = mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
      $allselect2count = mysqli_num_rows($allselect12);
      if ($allselect2count > 0) {
        while ($allselect21 = mysqli_fetch_array($allselect12)) {
          $allowname2y1 = $allselect21["name"];
          $allowvalue2y1 = $allselect21["dvalue"];

          $saveinsert3 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y1', '$allowvalue2y1', 'Allowances Other')";
          mysqli_query($conn, $saveinsert3);
        }
      }

      // process pension and payee
      if ($usepen == 1) {

        // process deduction PENSION
        $allowname2y2p = "User Monthly Pension";
        $allowvalue2y2p = $defbyeight;
        $saveinsert4p = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y2p', '$allowvalue2y2p', 'Deductions')";
        mysqli_query($conn, $saveinsert4p);

        // process deduction PAYEE
        $allowname2y2py = "Monthly PAYE";
        $allowvalue2y2py = $monthlypayee;
        $saveinsert4py = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y2py', '$allowvalue2y2py', 'Deductions')";
        mysqli_query($conn, $saveinsert4py);
      }

      // process deductions
      $allselect1d = mysqli_query($conn, "SELECT * FROM salary_deduction WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
      while ($allselectd = mysqli_fetch_array($allselect1d)) {
        $allowidd = $allselectd["id"];
        $allowname2yd = $allselectd["name"];
        $allowvalue2yd = $allselectd["dvalue"];

        $saveinsert2d = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2yd', '$allowvalue2yd', 'Deductions')";
        mysqli_query($conn, $saveinsert2d);
      }

      // process deductions other
      $allselect12s = mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
      $allselect2counts = mysqli_num_rows($allselect12s);
      if ($allselect2counts > 0) {
        while ($allselect21s = mysqli_fetch_array($allselect12s)) {
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
