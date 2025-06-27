<?php

$dtodaydate = date("Y-m-d");
// absent today
$abs1 = mysqli_query($conn, "SELECT * FROM attendance WHERE date='$dtodaydate' AND attendancereport = 'Active' AND attendance = 'off' AND company='$companyMain'");
$abs = mysqli_num_rows($abs1);

// all attendance
$abs1234 = mysqli_query($conn, "SELECT * FROM attendance WHERE date='$dtodaydate' AND attendancereport = 'Active' AND company='$companyMain'");
$allattendance = mysqli_num_rows($abs1234);

// Authorised absent today
$abs12 = mysqli_query($conn, "SELECT * FROM attendance WHERE date='$dtodaydate' AND attendancereport = 'Exemption' AND company='$companyMain'");
$absautho = mysqli_num_rows($abs12);

//on Leave
$abs2 = mysqli_query($conn, "SELECT * FROM attendance WHERE date='$dtodaydate' AND attendancereport = 'Leave' AND company='$companyMain'");
$onleave = mysqli_num_rows($abs2);

// Un-Authorised absent today
$absUn = ($abs - $absautho);

// present today
$allpresnt = ($allattendance - $abs);

// % attendance
//$apercent = round(($allpresnt / $allattendance) * 100);
@$apercent = $apercent > 0 ? round(($allpresnt / $allattendance) * 100) : 0;

//exception request
$ExemptionQuery1 = mysqli_query($conn, "SELECT * FROM exemption WHERE company='$companyMain' AND approvals != '0' AND CURDATE() BETWEEN startdate and enddate");
$ExemptionQuery = mysqli_num_rows($ExemptionQuery1);

//Leave Request
$LeaveQuery1 = mysqli_query($conn, "SELECT * FROM leaves WHERE company='$companyMain' AND approvals != '0' AND CURDATE() BETWEEN startdate and enddate");
$LeaveQuery = mysqli_num_rows($LeaveQuery1);

// all employee
$allemploy1 = mysqli_query($conn, "SELECT * FROM employee WHERE company='$companyMain'");
$allemploy = mysqli_num_rows($allemploy1);

// enrolled
$enrolled1 = mysqli_query($conn, "SELECT DISTINCT applicant_id FROM employee_fingerprints WHERE company='$companyMain'");
$enrolled = mysqli_num_rows($enrolled1);
$enrolledP = round(($enrolled / $allemploy) * 100) > 0 ? round(($enrolled / $allemploy) * 100) : 0;

// not enrolled
$notenrolled = ($allemploy - $enrolled);
$notenrolledP = round(($notenrolled / $allemploy) * 100) > 0 ? round(($notenrolled / $allemploy) * 100) : 0;

// all ddevices
$adevice1 = mysqli_query($conn, "SELECT * FROM devices WHERE status = 'Active' AND company='$companyMain'");
$adevice = mysqli_num_rows($adevice1);

// active employee
$allemploy12 = mysqli_query($conn, "SELECT * FROM employee WHERE status = 'Active' AND company='$companyMain'");
$allemployActive = mysqli_num_rows($allemploy12);

// inactive employees
$allemployInActive = ($allemploy - $allemployActive);
