<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

$timeStatus2 = '';
$attendancereport = '';

$date = isset($_GET['date']) ? $_GET['date'] : '';
$ddate = empty($date) ? date("Y-m-d") : $date;
$bandate = empty($date) ? "Today - " . date("l, d F Y") : "Date - " . date("l, d F Y", strtotime("$ddate"));
$bandate2 = empty($date) ? date("l, d F Y") : date("l, d F Y", strtotime("$ddate"));
$type = isset($_GET['type']) ? $_GET['type'] : 'Absent';

if ($type == "Late") {
  $type2 = "Late In Staffs";
} elseif ($type == "Early") {
  $type2 = "Early Out Staffs";
} elseif ($type == "No_ClockOut") {
  $type2 = "No Clock Out Staffs";
} else {
  $type2 = "Absent Staffs";
}

$bandateTitle = empty($date) ? "$type2 - " . date("l, d F Y") : "$type2 - " . date("l, d F Y", strtotime("$ddate"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="HECKER PEOPLE Project.">
  <meta name="author" content="Visiara Ltd">

  <!-- Meta -->
  <meta name="description" content="HECKER PEOPLE Project - TAMS">
  <meta name="author" content="ThemePixels">

  <title>HECKER PEOPLE - <?php echo $bandateTitle; ?></title>

  <!-- vendor css -->
  <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="../lib/timepicker/jquery.timepicker.css" rel="stylesheet">
  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <!-- export buttons -->
  <link href="buttons.dataTables.min.css" rel="stylesheet">
  <!-- export buttons end -->

  <!-- Bracket CSS -->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="./assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/admin.css?rand=<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/styles.css?rand=<?php echo rand(); ?>">

  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .ui-datepicker {
      z-index: 99999 !important;
    }
  </style>

  <script langauge="javascript">
    function reload(form) {

      var ReportType2 = document.getElementById("ReportType");
      var ReportType = ReportType2.options[ReportType2.selectedIndex].value;

      var month_val = document.getElementById('dateMask').value; // collect month value    // collect year value
      self.location = 'attendance2.php?date=' + month_val + '&type=' + ReportType; // reload the page
    }
  </script>

</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <?php
  include '../auth/admin_header.php';

  include "" . __DIR__ . "/adminHeader.php";
  include "" . __DIR__ . "/sidebar.php";
  ?>
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <?php

  ?>
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <?php
  include "" . __DIR__ . "/rightSidebar.php";
  ?>
  <!-- ########## END: RIGHT PANEL ########## --->

  <!-- ########## START: MAIN PANEL ########## -->
  <!-- br-mainpanel -->
  <div>
    <div class="br-pagetitle">
      <i class="icon icon ion-ios-contact-outline"></i>
      <div>
        <h4>User Management</h4>
        <p class="mg-b-0">User Management Panel - User Attendance.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <h2 class="mg-b-0 tx-Regular"><?php echo $type2; ?></h2>
        <div class="d-flex align-items-center justify-content-between mg-t-30">
          <h4 class="mg-b-0"><?php echo $bandate; ?></h4>
        </div>
        <div class="table-wrapper mg-t-15">
          <table id="datatable1" class="table table-bordered display responsive ">

            <!-- Late Timers -->
            <?php if ($type == 'Late') { ?>
              <thead class="thead-colored thead-dark">
                <tr>
                  <th colspan=6>
                    <input onchange="reload(this.form)" class="form-control fc-datepicker" type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD" value="<?php echo $ddate; ?>">
                  </th>
                  <th colspan=3>
                    <select id="ReportType" name="ReportType" class="form-control">
                      <option value="Absent">Absent Staffs</option>
                      <option value="Late">Late In Staffs</option>
                      <option value="Early">Early Out Staffs</option>
                      <option value="No_ClockOut">No ClockOut Staffs</option>
                    </select>
                  </th>
                </tr>
                <tr>
                  <th class="">ID</th>
                  <th class="">Date</th>
                  <th class="">User ID</th>
                  <th class="">Full name</th>
                  <th class="">Department</th>
                  <th class="">Status</th>
                  <th class="">Expected Time-In</th>
                  <th class="">Time In</th>
                  <th class="">Difference</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
                while ($compo12 = mysqli_fetch_array($compo1)) {
                  $compo = $compo12["deducttime"];
                }

                $x = '0';

                if ($user_role == "3") {
                  $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain' AND department='$loggeddepartment'");
                } else {
                  $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
                }

                while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                  $eid = $huserb1d5["id"];
                  $employeeid = $huserb1d5["employeeid"];
                  $fname = $huserb1d5["fname"];
                  $mname = $huserb1d5["mname"];
                  $lname = $huserb1d5["lname"];
                  $department1 = $huserb1d5["department"];

                  $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    $department = $hug1["departmentname"];
                  }

                  $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active'");
                  $huy = mysqli_num_rows($hu);
                  while ($hug = mysqli_fetch_array($hu)) {
                    $did = $hug["id"];
                    $timeInseconds = $hug["timeInseconds"];
                    $timeOutseconds = $hug["timeOutseconds"];
                    $timeOutsecondsMain = $hug["timeOutseconds"];
                    $timeStatus2 = $hug["attendance"];
                    $etimeOut = $hug["expectedTimeOut"];
                    $aover = $hug["aover"];

                    $btimeInseconds = $hug["expectedTimin"];
                    $btimeOutseconds = $hug["expectedTimeOut"];

                    $expectTimeIn = date("g:i A", $btimeInseconds);
                    $theTimeIn = date("g:i A", ($timeInseconds / 1000));

                    $expectTimeIn2 = date("Y-m-d g:i A", $btimeInseconds);
                    $theTimeIn2 = date("Y-m-d g:i A", ($timeInseconds / 1000));

                    $timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

                    if ($timeStatus2 == "on") {
                      $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
                    } else {
                      $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
                    }

                    if (strtotime($theTimeIn) > strtotime($expectTimeIn)) {
                      $timeStatus2 = "<i class='fa fa-ban tx-danger tx-20'></i>";

                      $hourdiff1 = (strtotime($theTimeIn2) - $btimeInseconds) / 60;
                      $price = ($hourdiff1 / 60);

                      $hour1 = intval($price); // 1234
                      $decimal1 = $price - $hour1; // 0.44000000000005 uh oh! that's why it needs... (see next line)
                      $decimal = round($decimal1, 2); // 0.44 this will round off the excess numbers

                      if ($decimal == 1) {
                        $decimal = 10;
                      } // Michel's warning is correct...
                      if ($decimal == 2) {
                        $decimal = 20;
                      } // if the price is 1234.10... the decimal will be 1...
                      if ($decimal == 3) {
                        $decimal = 30;
                      } // so make sure to add these rules too
                      if ($decimal == 4) {
                        $decimal = 40;
                      }
                      if ($decimal == 5) {
                        $decimal = 50;
                      }
                      if ($decimal == 6) {
                        $decimal = 60;
                      }
                      if ($decimal == 7) {
                        $decimal = 70;
                      }
                      if ($decimal == 8) {
                        $decimal = 80;
                      }
                      if ($decimal == 9) {
                        $decimal = 90;
                      }

                      $hour = $hour1 > 0 ? intval($price) . " Hours" : '';
                      $mins = $decimal > 0 ? round($decimal * 60) . " Mins" : '';

                      if ($price > 60) {
                        $hourdiff = "$hour $mins";
                      } else {
                        $hourdiff = "$mins";
                      }

                      $x = $x + '1';
                ?>
                      <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $bandate2; ?></td>
                        <td><?php echo $employeeid; ?></td>
                        <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                        <td><?php echo $department; ?></td>
                        <td><?php echo $ego . " " . $timeStatus; ?></td>
                        <td><?php echo $expectTimeIn; ?></td>
                        <td><?php echo $theTimeIn . " " . $timeStatus2; ?></td>
                        <td><?php echo $hourdiff; ?></td>
                      </tr>
                <?php
                    }
                  }
                }
                ?>
              </tbody>
          </table>
          <!-- End Late Timers -->

          <!-- Early Timers -->
        <?php } elseif ($type == 'Early') { ?>
          <thead class="thead-colored thead-dark">
            <tr>
              <th colspan=6>
                <input onchange="reload(this.form)" class="form-control fc-datepicker" type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD" value="<?php echo $ddate; ?>">
              </th>
              <th colspan=3>
                <select id="ReportType" name="ReportType" class="form-control">
                  <option value="Absent">Absent Staffs</option>
                  <option value="Late">Late In Staffs</option>
                  <option value="Early">Early Out Staffs</option>
                  <option value="No_ClockOut">No ClockOut Staffs</option>
                </select>
              </th>
            </tr>
            <tr>
              <th class="">ID</th>
              <th class="">Date</th>
              <th class="">User ID</th>
              <th class="">Full name</th>
              <th class="">Department</th>
              <th class="">Status</th>
              <th class="">Expected Time-Out</th>
              <th class="">Time Out</th>
              <th class="">Difference</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
              while ($compo12 = mysqli_fetch_array($compo1)) {
                $compo = $compo12["deducttime"];
              }

              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];
                $department1 = $huserb1d5["department"];

                $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                while ($hug1 = mysqli_fetch_array($hu1)) {
                  $department = $hug1["departmentname"];
                }

                $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active'");
                $huy = mysqli_num_rows($hu);
                while ($hug = mysqli_fetch_array($hu)) {
                  $did = $hug["id"];
                  $timeInseconds = $hug["timeInseconds"];
                  $timeOutseconds = $hug["timeOutseconds"];
                  $timeOutsecondsMain = $hug["timeOutseconds"];
                  $timeStatus2 = $hug["attendance"];
                  $on = $hug["attendance"];
                  $etimeOut = $hug["expectedTimeOut"];
                  $aover = $hug["aover"];

                  $btimeInseconds = $hug["expectedTimin"];
                  $btimeOutseconds = $hug["expectedTimeOut"];

                  $expectTimeIn = date("g:i A", $btimeOutseconds);
                  $theTimeIn = date("g:i A", ($timeOutseconds / 1000));

                  $timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

                  if ($timeStatus2 == "on") {
                    $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
                  } else {
                    $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
                  }

                  $expectTimeOut = date("Y-m-d g:i A", $etimeOut);
                  $theTimeOut = date("Y-m-d g:i A", ($timeOutsecondsMain / 1000));

                  if ((strtotime($expectTimeOut) > strtotime($theTimeOut)) && $timeOutsecondsMain != '0') {
                    //$hourdiff = round(($expectTimeOut - $theTimeOut)/3600, 2);
                    $timeStatus2 = "<i class='fa fa-ban tx-danger tx-20'></i>";

                    $hourdiff1 = ($btimeOutseconds - ($timeOutseconds / 1000)) / 60;
                    $price = ($hourdiff1 / 60);

                    $hour1 = intval($price); // 1234
                    $decimal1 = $price - $hour1; // 0.44000000000005 uh oh! that's why it needs... (see next line)
                    $decimal = round($decimal1, 2); // 0.44 this will round off the excess numbers

                    if ($decimal == 1) {
                      $decimal = 10;
                    } // Michel's warning is correct...
                    if ($decimal == 2) {
                      $decimal = 20;
                    } // if the price is 1234.10... the decimal will be 1...
                    if ($decimal == 3) {
                      $decimal = 30;
                    } // so make sure to add these rules too
                    if ($decimal == 4) {
                      $decimal = 40;
                    }
                    if ($decimal == 5) {
                      $decimal = 50;
                    }
                    if ($decimal == 6) {
                      $decimal = 60;
                    }
                    if ($decimal == 7) {
                      $decimal = 70;
                    }
                    if ($decimal == 8) {
                      $decimal = 80;
                    }
                    if ($decimal == 9) {
                      $decimal = 90;
                    }

                    $hour = $hour1 > 0 ? intval($price) . " Hours" : '';
                    $mins = $decimal > 0 ? round($decimal * 60) . " Mins" : '';

                    if ($price > 60) {
                      $hourdiff = "$hour $mins";
                    } else {
                      $hourdiff = "$mins";
                    }

                    $x = $x + '1';
            ?>
                  <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $bandate2; ?></td>
                    <td><?php echo $employeeid; ?></td>
                    <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $ego . " " . $timeStatus; ?></td>
                    <td><?php echo $expectTimeIn; ?></td>
                    <td><?php echo $theTimeIn . " " . $timeStatus2; ?></td>
                    <td><?php echo $hourdiff; ?></td>
                  </tr>
            <?php
                  }
                }
              }
            ?>
          </tbody>
          </table>
          <!-- End Early Timers -->

          <!-- No clockout Timers -->
        <?php } elseif ($type == 'No_ClockOut') { ?>
          <thead class="thead-colored thead-dark">
            <tr>
              <th colspan=5>
                <input onchange="reload(this.form)" class="form-control fc-datepicker" type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD" value="<?php echo $ddate; ?>">
              </th>
              <th colspan=2>
                <select id="ReportType" name="ReportType" class="form-control">
                  <option value="Absent">Absent Staffs</option>
                  <option value="Late">Late In Staffs</option>
                  <option value="Early">Early Out Staffs</option>
                  <option value="No_ClockOut">No ClockOut Staffs</option>
                </select>
              </th>
            </tr>
            <tr>
              <th class="">ID</th>
              <th class="">Date</th>
              <th class="">User ID</th>
              <th class="">Full name</th>
              <th class="">Department</th>
              <th class="">Status</th>
              <th class="">Time In</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
              while ($compo12 = mysqli_fetch_array($compo1)) {
                $compo = $compo12["deducttime"];
              }

              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];
                $department1 = $huserb1d5["department"];

                $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                while ($hug1 = mysqli_fetch_array($hu1)) {
                  $department = $hug1["departmentname"];
                }

                $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active'");
                $huy = mysqli_num_rows($hu);
                while ($hug = mysqli_fetch_array($hu)) {
                  $did = $hug["id"];
                  $timeInseconds = $hug["timeInseconds"];
                  $timeOutseconds = $hug["timeOutseconds"];
                  $timeOutsecondsMain = $hug["timeOutseconds"];
                  $timeStatus2 = $hug["attendance"];
                  $etimeOut = $hug["expectedTimeOut"];
                  $aover = $hug["aover"];

                  $btimeInseconds = $hug["expectedTimin"];
                  $btimeOutseconds = $hug["expectedTimeOut"];

                  $expectTimeIn = date("g:i A", $btimeInseconds);
                  $theTimeIn = date("g:i A", ($timeInseconds / 1000));

                  $timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

                  if ($timeStatus2 == "on") {
                    $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
                  } else {
                    $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
                  }

                  if ($huy > 0) {
                    $timeInseconds2 = ($timeInseconds / 1000);
                    $timeOutseconds2 = $timeOutseconds == '0' ? time() : ($timeOutseconds / 1000);

                    $timeIn = $timeInseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeInseconds2);
                    $timeOut = $timeOutseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeOutseconds2);
                    $hourdiff = $timeOutseconds == '0' ? '0' : round(($timeOutseconds2 - $timeInseconds2) / 3600, 1);

                    if ($timeInseconds2 > $btimeInseconds) {
                      $timeStatus2 = "<i class='fa fa-ban tx-danger tx-20'></i>";
                    } elseif ($timeInseconds2 == 0) {
                      $timeStatus2 = "";
                    } else {
                      $timeStatus2 = "<i class='far fa-check-circle tx-info tx-20'></i>";
                    }
                  } else {
                    $timeInseconds2 = 0;
                    $timeOutseconds2 = 0;

                    $timeIn = 0;
                    $timeOut = 0;
                    $hourdiff = 0;

                    $timeStatus2 = "";
                  }

                  if ($timeOutsecondsMain == "0" && $timeInseconds != "0") {
                    $x = $x + '1';
            ?>
                  <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $bandate2; ?></td>
                    <td><?php echo $employeeid; ?></td>
                    <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $ego . " " . $timeStatus; ?></td>
                    <td><?php echo $theTimeIn . " " . $timeStatus2; ?></td>
                  </tr>
            <?php
                  }
                }
              }
            ?>
          </tbody>
          </table>
          <!-- End No clockout Timers -->

          <!-- Absent Timers -->
        <?php } else { ?>
          <thead class="thead-colored thead-dark">
            <tr>
              <th colspan=5>
                <input onchange="reload(this.form)" class="form-control fc-datepicker" type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD" value="<?php echo $ddate; ?>">
              </th>
              <th colspan=3>
                <select id="ReportType" name="ReportType" class="form-control">
                  <option value="Absent">Absent Staffs</option>
                  <option value="Late">Late In Staffs</option>
                  <option value="Early">Early Out Staffs</option>
                  <option value="No_ClockOut">No ClockOut Staffs</option>
                </select>
              </th>
            </tr>
            <tr>
              <th class="">ID</th>
              <th class="">Date</th>
              <th class="">User ID</th>
              <th class="">Full name</th>
              <th class="">Department</th>
              <th class="">Status</th>
              <th class="">Authorised</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
              while ($compo12 = mysqli_fetch_array($compo1)) {
                $compo = $compo12["deducttime"];
              }

              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];
                $department1 = $huserb1d5["department"];

                $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                while ($hug1 = mysqli_fetch_array($hu1)) {
                  $department = $hug1["departmentname"];
                }

                $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain'");
                $huy = mysqli_num_rows($hu);
                while ($hug = mysqli_fetch_array($hu)) {
                  $did = $hug["id"];
                  $timeInseconds = $hug["timeInseconds"];
                  $timeOutseconds = $hug["timeOutseconds"];
                  $timeOutsecondsMain = $hug["timeOutseconds"];
                  $attendancereport = $hug["attendancereport"];
                  $attendance = $hug["attendance"];
                  $timeStatus2 = $hug["attendance"];
                  $etimeOut = $hug["expectedTimeOut"];
                  $aover = $hug["aover"];

                  $btimeInseconds = $hug["expectedTimin"];
                  $btimeOutseconds = $hug["expectedTimeOut"];
                }

                $timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

                if ($timeStatus2 == "on") {
                  $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
                } else {
                  $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
                }

                if ($attendancereport == 'Active' && $attendance == 'off') {

                  // Authorised absent today
                  $abs12 = mysqli_query($conn, "SELECT * FROM attendance WHERE date='$ddate' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Exemption'");
                  $absautho = mysqli_num_rows($abs12);
                  $autho = $absautho > 0 ? "<i class='far fa-check-circle tx-info tx-20'></i>" : "<i class='fa fa-ban tx-danger tx-20'></i>";

                  $x = $x + '1';
            ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $bandate2; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                  <td><?php echo $department; ?></td>
                  <td><?php echo $ego . " " . $timeStatus; ?></td>
                  <td><?php echo $autho; ?></td>
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
          </table>
        <?php } ?>
        <!-- End Absent Timers -->



        </div><!-- table-wrapper -->


      </div><!-- br-section-wrapper -->
    </div><!--  -->

    <?php

    // BE IN ALL PAGES
    include '../auth/admin_footer.php';

    ?>

  </div>
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../lib/moment/min/moment.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>
  <script src="../lib/highlightjs/highlight.pack.min.js"></script>
  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

  <!-- export buttons -->
  <script src="../buttons/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.flash.min.js" type="text/javascript"></script>
  <script src="../buttons/jszip.min.js" type="text/javascript"></script>
  <script src="../buttons/pdfmake.min.js" type="text/javascript"></script>
  <script src="../buttons/vfs_fonts.js" type="text/javascript"></script>
  <script src="../buttons/buttons.html5.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.print.min.js" type="text/javascript"></script>
  <!-- export buttons end -->

  <script src="jquery.maskedinput.js"></script>
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: false,
        dom: 'lBfrtip',
        buttons: [
          'csv', 'excel', 'pdf'
        ],
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ ',
          //lengthMenu: '_MENU_ items/page',
        }
      });

      // Input Masks
      $('#dateMask').mask('9999-99-99');
      //$('#phoneMask').mask('(999) 999-9999');

      // Datepicker
      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'yy-mm-dd',
      });

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>
  <script>
    $(function() {
      'use strict'

      // FOR DEMO ONLY
      // menu collapsed by default during first page load or refresh with screen
      // having a size between 992px and 1299px. This is intended on this page only
      // for better viewing of widgets demo.
      $(window).resize(function() {
        minimizeMenu();
      });

      //minimizeMenu();

      function minimizeMenu() {
        if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
          // show only the icons and hide left menu label by default
          $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
          $('body').addClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideUp();
        } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
          $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
          $('body').removeClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideDown();
        }
      }
    });
  </script>

  <script>
    function post_value(d) {
      //opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
      // cheange the above line for different date format
      // self.close();
      var str2 = "<?php echo $companyMain; ?>";
      //var str=document.getElementById('employeeid').value;
      //var d = yy + "-" + mm + "-" + dt;
      if (str2.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit").innerHTML = this.responseText;
          }
        };
        //xmlhttp.open("GET", "viewattendance1.php?q=" + str + "&d=" + d + "&com=" + str2, true);
        xmlhttp.open("GET", "viewattendance1.php?q=" + d, true);
        xmlhttp.send();
      }
    }
  </script>

  <!-- Edit employee -->
  <div id="editemployee" class="modal fade effect-newspaper">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">View User Attendance Information</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-0">
          <div class="row no-gutters" id="pasteedit">

          </div><!-- row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

</body>

</html>