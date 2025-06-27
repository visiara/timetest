<?php
include "" . __DIR__ . "/header.php";


if (!empty($_POST['payroll'])) {

  $payid4 = time();
  $date4 = time();
  $employeeid4 = $_POST['employeeid'];
  $mapid4 = $_POST['mapid'];
  $monthchange4 = $_POST['monthchange'];
  $yearchange4 = $_POST['yearchange'];
  $salarygrade4 = $_POST['salarygrade'];

  // allowance
  $allowid = $_POST['allowid'];
  $allowname = $_POST['allowname'];
  $allowvalue = $_POST['allowvalue'];
  // allowance other
  $allowid2 = $_POST['allowid2'];
  $allowname2 = $_POST['allowname2'];
  $allowvalue2 = $_POST['allowvalue2'];

  // deductions
  $dedid = $_POST['dedid'];
  $dedname = $_POST['dedname'];
  $dedvalue = $_POST['dedvalue'];
  // deductions other
  $dedid2 = $_POST['dedid2'];
  $dedname2 = $_POST['dedname2'];
  $dedvalue2 = $_POST['dedvalue2'];

  // kpi & attendance calculations
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

  $saveinsert1 = "INSERT INTO salary_payroll (`company`, `employeeid`, `mapid`, `payid`, `month`, `year`, `date`, `salaryscale`, `createdby`, `attp`, `kpip`, `salp`) VALUES ('$companyMain', '$employeeid4', '$mapid4', '$payid4', '$monthchange4', '$yearchange4', '$date4', '$salarygrade4', '$uid', '$attpercent', '$kpipercent', '$salbalpercent')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Salary Paroll", "success", '', '', $_SESSION['logged']);

    // process allowance
    if (!empty($allowid)) {
      //$N = count($allowid);
      //for($i=0; $i < $N; $i++){
      //$allselect12=mysqli_query($conn, "SELECT * FROM salary_allowance WHERE id='$allowid[$i]'");
      foreach ($_POST['allowid'] as $selected) {
        $allselect12 = mysqli_query($conn, "SELECT * FROM salary_allowance WHERE id='$selected'");
        while ($allselect2 = mysqli_fetch_array($allselect12)) {
          $allowname2y = $allselect2["name"];
          $allowvalue2y = $allselect2["dvalue"];

          $saveinsert2 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y', '$allowvalue2y', 'Allowances')";
          mysqli_query($conn, $saveinsert2);
        }
      }
    }

    // process allowances other
    if (!empty($allowid2)) {
      foreach ($_POST['allowid2'] as $selected1) {
        $allselect121 = mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE id='$selected1'");
        while ($allselect21 = mysqli_fetch_array($allselect121)) {
          $allowname2y1 = $allselect21["name"];
          $allowvalue2y1 = $allselect21["dvalue"];

          $saveinsert3 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y1', '$allowvalue2y1', 'Allowances Other')";
          mysqli_query($conn, $saveinsert3);
        }
      }
    }

    // process deduction PENSION
    if (!empty($_POST['pension'])) {
      $allowname2y2p = $_POST['pensionName'];
      $allowvalue2y2p = $_POST['pensionValue'];

      $saveinsert4p = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y2p', '$allowvalue2y2p', 'Deductions')";
      mysqli_query($conn, $saveinsert4p);
    }

    // process deduction PAYEE
    if (!empty($_POST['payee'])) {
      $allowname2y2py = $_POST['payeeName'];
      $allowvalue2y2py = $_POST['payeeValue'];

      $saveinsert4py = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y2py', '$allowvalue2y2py', 'Deductions')";
      mysqli_query($conn, $saveinsert4py);
    }

    // process deduction
    if (!empty($dedid)) {
      foreach ($_POST['dedid'] as $selected2) {
        $allselect122 = mysqli_query($conn, "SELECT * FROM salary_deduction WHERE id='$selected2'");
        while ($allselect22 = mysqli_fetch_array($allselect122)) {
          $allowname2y2 = $allselect22["name"];
          $allowvalue2y2 = $allselect22["dvalue"];

          $saveinsert4 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y2', '$allowvalue2y2', 'Deductions')";
          mysqli_query($conn, $saveinsert4);
        }
      }
    }

    // process deduction other
    if (!empty($dedid2)) {
      foreach ($_POST['dedid2'] as $selected3) {
        $allselect123 = mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE id='$selected3'");
        while ($allselect23 = mysqli_fetch_array($allselect123)) {
          $allowname2y3 = $allselect23["name"];
          $allowvalue2y3 = $allselect23["dvalue"];

          $saveinsert5 = "INSERT INTO salary_payroll_data (`company`, `payid`, `name`, `dvalue`, `paytype`) VALUES ('$companyMain', '$payid4', '$allowname2y3', '$allowvalue2y3', 'Deductions Other')";
          mysqli_query($conn, $saveinsert5);
        }
      }
    }

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Payroll successfully created.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  } else {
    $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Updating User Payroll.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
  }
}

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

  <title>HECKER PEOPLE</title>

  <!-- vendor css -->
  <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <link href="../lib/spinkit/css/spinkit.css" rel="stylesheet">

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
  </style>
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
      <i class="icon icon ion-briefcase"></i>
      <div>
        <h4>Payroll Management</h4>
        <p class="mg-b-0">User Payroll Management Panel - Active Users.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>
        <form id="uploadForm" action="salary_bulk.php" method="post">
          <div>
            <input name="scom" id="scom" type="hidden" />
            <input name="smonth" id="smonth" type="hidden" />
            <input name="syear" id="syear" type="hidden" />
            <input name=suser" id="suser" type="hidden" />
          </div>
        </form>
        <div>
          <button class="btn btn-teal" data-toggle="modal" data-target="#bulkpay"><i class="fa fa-tasks mg-r-10"></i> Bulk Create Payroll</button>
        </div>

        <div id="targetLayer" class="mg-t-30"></div>

        <?php echo $status; ?>
        <h4 class="mg-b-0">Active Users</h4>
        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="wd-15p">Unique ID</th>
                <th class="wd-15p">User ID</th>
                <th class="">Full name</th>
                <th class="wd-20p">Location</th>
                <th class="wd-20p">Department</th>
                <th class="">Work Schedule</th>
                <th class="">Employment Type</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $mapid9 = $huserb1d5["id"];
                $empuniqid = $huserb1d5["uniqid"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];
                $email = $huserb1d5["email"];
                $address = $huserb1d5["address"];
                $country = $huserb1d5["country"];
                $state = $huserb1d5["state"];
                $gender = $huserb1d5["gender"];
                $phone = $huserb1d5["phone"];
                $nextofkin = $huserb1d5["nextofkin"];
                $dofb = $huserb1d5["dofb"];
                $employmenttype = $huserb1d5["employmenttype"];
                $location1 = $huserb1d5["location"];
                $department1 = $huserb1d5["department"];
                $workshift1 = $huserb1d5["workshift"];
                $uname = $huserb1d5["uname"];
                $pword = $huserb1d5["pword"];
                $status = $huserb1d5["status"];
                $createdby = $huserb1d5["createdby"];
                $profilepic = $huserb1d5["profilepic"];

                $hu = mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1' AND company='$companyMain'");
                while ($hug = mysqli_fetch_array($hu)) {
                  $location = $hug["locationname"];
                }

                $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                while ($hug1 = mysqli_fetch_array($hu1)) {
                  $department = $hug1["departmentname"];
                }

                $hu2 = mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1' AND company='$companyMain'");
                while ($hug2 = mysqli_fetch_array($hu2)) {
                  $workshift = $hug2["shiftname"];
                }

                $hu3y = mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttype'");
                while ($hug3y = mysqli_fetch_array($hu3y)) {
                  $employmenttypey = $hug3y["name"];
                }

                $nmonth = date("m");
                $nyear = date("Y");

                $bookpay1 = mysqli_query($conn, "SELECT * FROM salary_payroll WHERE mapid = '$mapid9' AND company='$companyMain' AND month='$nmonth' AND year='$nyear'");
                $alld = mysqli_num_rows($bookpay1);

                if ($alld > 0) {
                  $statusd = "bg-success";
                  $btnactivate = "btn-danger";
                  $btnicon = "<i class='fa fa-check-circle tx-success'></i>";
                  $onoff = "InActive";
                } else {
                  $statusd = "bg-danger";
                  $btnactivate = "btn-success";
                  $btnicon = "";
                  $onoff = "Active";
                }

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $empuniqid . " " . $btnicon; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                  <td><?php echo $location; ?></td>
                  <td><?php echo $department; ?></td>
                  <td><?php echo $workshift; ?></td>
                  <td><?php echo $employmenttypey; ?></td>
                  <td>
                    <?php if ($alld > 0) { ?>
                      <a href="javascript:;" class="btn btn-info btn-icon" onclick="EditPay(<?php echo $eid; ?>);" data-toggle="modal" data-target="#payslip" title="Print Payslip">
                        <div><i class="fa fa-print"></i></div>
                      </a>
                    <?php } else { ?>
                      <a href="javascript:;" class="btn btn-success btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee" title="Create Payroll">
                        <div><i class="fa fa-edit"></i></div>
                      </a>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->


        <!-- MODAL ALERT MESSAGE -->
        <div id="modaldemo4" class="modal fade">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon ion-ios-checkmark-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-success tx-semibold mg-b-20">Congratulations!</h4>
                <p class="mg-b-20 mg-x-20">Succcess! All payrolls for the month processed successfully.</p>
                <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                  Continue</button>
              </div><!-- modal-body -->
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="modaldemo5" class="modal fade">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">

                <div class="sk-cube-grid ht-100 wd-200 mg-r-30 d-inline-block">
                  <div class="sk-cube sk-cube1"></div>
                  <div class="sk-cube sk-cube2"></div>
                  <div class="sk-cube sk-cube3"></div>
                  <div class="sk-cube sk-cube4"></div>
                  <div class="sk-cube sk-cube5"></div>
                  <div class="sk-cube sk-cube6"></div>
                  <div class="sk-cube sk-cube7"></div>
                  <div class="sk-cube sk-cube8"></div>
                  <div class="sk-cube sk-cube9"></div>
                </div>

                <h4 class="tx-danger  tx-semibold mg-b-20">DO NOT CLOSE BROWSWER!</h4>
                <p class="mg-b-20 mg-x-20">Please Note: the payrolls are beign created in the background, closing the browswer window or navigating away from this page will have unexpected results.</p>
              </div><!-- modal-body -->
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="modaldemo6" class="modal fade">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-danger  tx-semibold mg-b-20">Error: Cannot process your entry!</h4>
                <p class="mg-b-20 mg-x-20">There there was an error processing payrolls. Please try again or contact administrator.</p>
                <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                  Continue</button>
              </div><!-- modal-body -->
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Bulk Payroll -->
        <div id="bulkpay" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h2 class="tx-24 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="icon icon ion-briefcase"></i> Bulk Payroll</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-0">

                <div class="alert alert-info" role="alert">
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-information alert-icon tx-60 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Please Note!</strong> This creates payslip for every employee, no corrections can be made after. Make sure you have created payroll for any employee with special needs before you click this button.</span>
                  </div><!-- d-flex -->
                </div><!-- alert -->


                <div class="pd-20">
                  <h4 class="tx-Regular mg-b-30">Salary for:</h4>
                  <label for="monthchanget">Month</label>
                  <select id="monthchanget" name="monthchanget" class="form-control mg-b-20">
                    <option name="<?php echo date('F'); ?>" value="<?php echo date('m'); ?>"><?php echo date('F'); ?></option>
                    <option name="January" value="01">January</option>
                    <option name="February" value="02">February</option>
                    <option name="March" value="03">March</option>
                    <option name="April" value="04">April</option>
                    <option name="May" value="05">May</option>
                    <option name="June" value="06">June</option>
                    <option name="July" value="07">July</option>
                    <option name="August" value="08">August</option>
                    <option name="September" value="09">September</option>
                    <option name="October" value="10">October</option>
                    <option name="November" value="11">November</option>
                    <option name="December" value="12">December</option>
                  </select>

                  <label for="yearchanget">Year</label>
                  <select id="yearchanget" name="yearchanget" class="form-control mg-b-20">
                    <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                    <option name="<?php echo date('Y') - 1; ?>" value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                    <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
                    <option name="<?php echo date('Y') + 1; ?>" value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                    <option name="<?php echo date('Y') + 2; ?>" value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                  </select>

                  <p><input type="checkbox" id="usepen" name="usepen"> Use Pension & PAYEE.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success tx-size-xs" data-dismiss="modal" id="uploadFormSub2" onclick="catos();">Create Payroll</button>
                <input type="hidden" id="uploadFormSub" value="Create Payroll" />
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Edit employee -->
        <div id="editemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h2 class="tx-24 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="icon icon ion-briefcase"></i> Payroll</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-0">
                <form id="editemployee2" action="" method="POST" onsubmit="return confirm('Do you really want to Create this Payroll?');">
                  <div class="row no-gutters" id="pasteedit">

                  </div><!-- row -->
                  <input type="hidden" name="payroll" value="1">
                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success tx-size-xs" form="editemployee2">Create Payroll</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- employee payslip -->
        <div id="payslip" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h2 class="tx-24 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="icon icon ion-briefcase"></i> Payslip</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-0">
                <div class="row no-gutters" id="pasteedit2">

                </div><!-- row -->
                <div class="alert alert-info" role="alert">
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-information alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Please Note!</strong> Select (<b>Print Hearders & Footers</b>) and (<b>Print Backgrounds</b>) in printer options for proper printing.</span>
                  </div><!-- d-flex -->
                </div><!-- alert -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success tx-size-xs" onclick="printDiv();">Print Payslip</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->



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
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script>
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>

  <script>
    function Edit(str) {
      var str2 = "<?php echo $companyMain; ?>";
      if (str.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "salary4a.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
      }
    }

    function EditPay(str) {
      var str2 = "<?php echo $companyMain; ?>";
      if (str.length == 0) {
        document.getElementById("pasteedit2").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit2").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "payslip1.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
      }
    }

    function doallow(grade, type, empid) {
      var str2 = "<?php echo $companyMain; ?>";
      //var empid = "<?php echo $eidy; ?>";
      var uid = "<?php echo $uid; ?>";

      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");

      var nickname1 = document.getElementById("name");
      var nickname = nickname1.options[nickname1.selectedIndex].value;

      var amount = document.getElementById("amount").value;
      var month2 = document.getElementById("month").value;

      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      if (str2.length == 0) {
        //document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("allowances").innerHTML = this.responseText;
            document.getElementById("name").selectedIndex = "0";
            document.getElementById("amount").value = '';
            document.getElementById("month").value = '';
          }
        };
        xmlhttp.open("GET", "salary_allowances.php?grade=" + grade + "&month=" + month + "&year=" + year + "&com=" + str2 + "&empid=" + empid + "&type=" + type + "&nickname=" + nickname + "&amount=" + amount + "&month2=" + month2 + "&user=" + uid, true);
        xmlhttp.send();
      }
    }

    function doded(grade, type, empid) {
      var str2 = "<?php echo $companyMain; ?>";
      //var empid = "<?php echo $eidy; ?>";
      var uid = "<?php echo $uid; ?>";

      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");

      var nickname1 = document.getElementById("name2");
      var nickname = nickname1.options[nickname1.selectedIndex].value;

      var amount = document.getElementById("amount2").value;
      var month2 = document.getElementById("month2").value;

      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      if (str2.length == 0) {
        //document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("deductions").innerHTML = this.responseText;
            document.getElementById("name2").selectedIndex = "0";
            document.getElementById("amount2").value = '';
            document.getElementById("month2").value = '';
          }
        };
        xmlhttp.open("GET", "salary_deductions.php?grade=" + grade + "&month=" + month + "&year=" + year + "&com=" + str2 + "&empid=" + empid + "&type=" + type + "&nickname=" + nickname + "&amount=" + amount + "&month2=" + month2 + "&user=" + uid, true);
        xmlhttp.send();
      }
    }

    function changemonth(grade, empid) {
      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");
      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      document.getElementById("monthp").innerHTML = monthchange.options[monthchange.selectedIndex].text;
      //document.getElementById("monthp").innerHTML = monthchange.options[monthchange.selectedIndex].value; 

      doallow(grade, 2, empid);
      doded(grade, 2, empid);
    }

    function changeyear(grade, empid) {
      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");
      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      document.getElementById("yearp").innerHTML = ", " + yearchange.options[yearchange.selectedIndex].text;
      //document.getElementById("monthp").innerHTML = monthchange.options[monthchange.selectedIndex].value; 

      doallow(grade, 2, empid);
      doded(grade, 2, empid);
    }

    function allowdelete(a, grade, empid) {
      var str2 = "<?php echo $companyMain; ?>";
      var uid = "<?php echo $uid; ?>";

      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");

      var nickname = document.getElementById("name").value;
      var amount = document.getElementById("amount").value;
      var month2 = document.getElementById("month").value;

      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      if (str2.length == 0) {
        //document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("allowances").innerHTML = this.responseText;
            document.getElementById("name").value = '';
            document.getElementById("amount").value = '';
            document.getElementById("month").value = '';
          }
        };
        xmlhttp.open("GET", "salary_allowances.php?grade=" + grade + "&month=" + month + "&year=" + year + "&com=" + str2 + "&empid=" + empid + "&type=" + 3 + "&nickname=" + nickname + "&amount=" + amount + "&month2=" + month2 + "&user=" + uid + "&todelete=" + a, true);
        xmlhttp.send();
      }
    }

    function deddelete(a, grade, empid) {
      var str2 = "<?php echo $companyMain; ?>";
      var uid = "<?php echo $uid; ?>";

      var monthchange = document.getElementById("monthchange");
      var yearchange = document.getElementById("yearchange");

      var nickname = document.getElementById("name2").value;
      var amount = document.getElementById("amount2").value;
      var month2 = document.getElementById("month2").value;

      var month = monthchange.options[monthchange.selectedIndex].value;
      var year = yearchange.options[yearchange.selectedIndex].value;

      if (str2.length == 0) {
        //document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("deductions").innerHTML = this.responseText;
            document.getElementById("name2").value = '';
            document.getElementById("amount2").value = '';
            document.getElementById("month2").value = '';
          }
        };
        xmlhttp.open("GET", "salary_deductions.php?grade=" + grade + "&month=" + month + "&year=" + year + "&com=" + str2 + "&empid=" + empid + "&type=" + 3 + "&nickname=" + nickname + "&amount=" + amount + "&month2=" + month2 + "&user=" + uid + "&todelete=" + a, true);
        xmlhttp.send();
      }
    }
  </script>

  <script>
    function catos() {
      var scom = "<?php echo $companyMain; ?>";
      var suser = "<?php echo $uid; ?>";
      var usepen;

      var monthchange = document.getElementById("monthchanget");
      var yearchange = document.getElementById("yearchanget");
      var smonth = monthchange.options[monthchange.selectedIndex].value;
      var syear = yearchange.options[yearchange.selectedIndex].value;

      document.getElementById("scom").value = scom;
      document.getElementById("smonth").value = smonth;
      document.getElementById("syear").value = syear;
      document.getElementById("suser").value = suser;

      if ($('#usepen').prop("checked") == true) {
        usepen = 1;
      } else if ($(this).prop("checked") == false) {
        usepen = 0;
      }

      //alert(month + " # " + year + " # " + uid);
      //document.getElementById("uploadFormSub").click();

      if ($('#scom').val()) {
        get_post_ajax(scom, suser, smonth, syear, usepen);
        //return false; 
      } else {
        alert("There is a breaking Error!. Kindly contact administrator");
      }

    }
  </script>
  <script>
    $(document).ready(function() {
      $("#modaldemo4").on('hidden.bs.modal', function() {
        //alert('The modal is now hidden.');
        location.reload();
      });
    });
  </script>

  <script>
    function transfer_start(e) {
      //console.log("The transfer is complete.");
      //$('#loader-icon').show();
      //$("#progress-bar").width(0 + '%');
      //on();
      $('#modaldemo5').modal({
        backdrop: "static"
      });
    }

    function transfer_complete(e) {
      //console.log("The transfer is complete.");
      //$('#loader-icon').hide();
      //off();
      alert("Done");
      $('#modaldemo5').modal('hide');
      $('#modaldemo4').modal({
        backdrop: "static"
      });
    }

    function transfer_failed(e) {
      //console.log("An error occurred while transferring the file.");
      //off();
      $('#modaldemo5').modal("hide");
      $('#modaldemo6').modal("show");
    }

    function transfer_canceled(e) {
      //console.log("The transfer has been canceled by the user.");
      //off();
      $('#modaldemo5').modal("hide");
      $('#modaldemo6').modal("show");
    }

    function get_post_ajax(scom, suser, smonth, syear, usepen) {
      var xhttp;
      if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
      } //code for modern browsers} 
      else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } // code for IE6, IE5	  	
      //xhttp.onprogress = update_progress;
      //xhttp.addEventListener("progress", update_progress, false);
      xhttp.addEventListener("loadstart", transfer_start, false);
      //xhttp.addEventListener("load", transfer_complete, false);
      xhttp.addEventListener("loadend", transfer_complete, false);
      xhttp.addEventListener("error", transfer_failed, false);
      xhttp.addEventListener("abort", transfer_canceled, false);
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.getElementById("targetLayer").innerHTML = xhttp.responseText;
        }
      };
      xhttp.open("GET", "salary_bulk.php?scom=" + scom + "&suser=" + suser + "&smonth=" + smonth + "&syear=" + syear + "&usepen=" + usepen, true);
      xhttp.send();
      return xhttp;
    }

    function dare() {}
  </script>

  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Input Masks
      $('#dateMask').mask('9999-99-99');
      $('#phoneMask').mask('(999) 999-9999');

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

      $("#progress-bar").width('40%');

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
    function printDiv() {
      var divContents = document.getElementById("pasteedit2").innerHTML;
      var a = window.open('', '', 'height=800, width=1200');
      a.document.write('<!DOCTYPE html>');
      a.document.write('<html lang="en">');
      a.document.write('<head>');
      a.document.write('<link rel="stylesheet" href="../css/bracket.css">');
      a.document.write('</head>');
      a.document.write('<body>');
      a.document.write('<div class="row no-gutters">');
      a.document.write(divContents);
      a.document.write('</div>');
      a.document.write('<script src="../lib/jquery/jquery.min.js" />');
      a.document.write('<script src="../lib/bootstrap/js/bootstrap.bundle.min.js" />');
      a.document.write('<script src="../lib/moment/min/moment.min.js" />');
      a.document.write('<script src="../js/bracket.js" />');
      a.document.write('</body></html>');
      a.document.close();
      a.focus();
      a.print();
      a.close();

      //printDiv()
    }

    function printdiv(printpage) {
      var headstr = "<html><head><title></title></head><body>";
      var footstr = "</body>";
      var newstr = document.all.item(printpage).innerHTML;
      var oldstr = document.body.innerHTML;
      document.body.innerHTML = headstr + newstr + footstr;
      window.print();
      document.body.innerHTML = oldstr;
      return true;

      //printdiv('pasteedit2') 
    }

    function printPageArea(areaID) {
      var printContent = document.getElementById(areaID);
      var WinPrint = window.open('', '', 'width=900,height=700');
      WinPrint.document.write(printContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();

      //printPageArea('pasteedit2')
    }
  </script>

</body>

</html>