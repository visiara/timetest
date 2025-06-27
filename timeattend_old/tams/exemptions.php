<?php
include "" . __DIR__ . "/mailfunction.php";
include "" . __DIR__ . "/header.php";

$thedate = time();

if (!empty($_POST['rowSelectCheckBox'])) {

  if (isset($_POST["approve"])) {
    $reason = isset($_POST['reason']) ?? $_POST['reason'];

    if (isset($_POST["rowSelectCheckBox"])) {
      // Retrieving each selected option 
      foreach ($_POST['rowSelectCheckBox'] as $leaves) {
        $saveinsert1 = "UPDATE exemption SET approvedby='$uid', approvals='0', reason='$reason' WHERE id='$leaves'";
        mysqli_query($conn, $saveinsert1);

        $huserbd5l = mysqli_query($conn, "SELECT * FROM exemption WHERE id='$leaves'");
        while ($huserb1d5l = mysqli_fetch_array($huserbd5l)) {
          $employeeid1l = $huserb1d5l["employeeid"];
          $department1l = $huserb1d5l["department"];
          $leavetype1l = $huserb1d5l["leavetype"];
          $startdatel = $huserb1d5l["startdate"];
          $enddatel = $huserb1d5l["enddate"];
        }

        $hu2 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid1l' AND company='$companyMain'");
        while ($hug2 = mysqli_fetch_array($hu2)) {
          $fnamel = $hug2["fname"];
          $mnamel = $hug2["mname"];
          $lnamel = $hug2["lname"];
          $thedepartment = $hug2["department"];
          $theuser = $hug2["uname"];
          $noteprofilepic = $hug2["profilepic"];
          $email_to = $hug2["email"];
        }
        $fullname = "$fnamel $mnamel $lnamel";

        $hu3 = mysqli_query($conn, "SELECT * FROM exemptiontype WHERE id = '$leavetype1l' AND company='$companyMain'");
        while ($hug3 = mysqli_fetch_array($hu3)) {
          $leavetype = $hug3["name"];
        }

        $story = "your $leavetype request has been approved";

        $saveinsert12 = "INSERT INTO notifications (`user`, `noteprofilepic`, `dtype1`, `dtype2`, `dtype3`, `fullname`, `story`, `ddate`, `department`, `company`, `admin`) VALUES ('$theuser', '$noteprofilepic', '2', 'Exemption', '$leavetype', '$fullname', '$story', '$thedate', '$thedepartment', '$companyMain', '2')";
        mysqli_query($conn, $saveinsert12);

        //log event
        $dinsert = mysqli_insert_id($conn);
        log_audit_event($uid, "INSERT", "Inserted record: $leaves", "Exemption", "success", '', '', $_SESSION['logged']);

        $subject = "Exemption Request Approved";

        $output = '<p>Dear ' . $fnamel . ' ' . $mnamel . ' ' . $lnamel . ',</p>';
        $output .= '<p>Your pending Exemption request has been approved.</p>';
        $output .= '<p>Start Date: ' . $startdatel . '</p>';
        $output .= '<p>End Date: ' . $enddatel . '</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please log on to the panel to review.</p>';
        $output .= "<p><a href=$websiteMain/biodata/exemptions_history.php target=_blank>$websiteMain/biodata/exemptions_history.php</a></p>";
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 3 day for security reason.</p>';

        $output .= '<p>Thanks,</p>';
        $output .= '<p>' . $siteName . ' Team</p>';

        $body = $output;

        domail($email_to, $subject, $body);
      }
    }
  } elseif (isset($_POST["cancel"])) {

    if (isset($_POST["rowSelectCheckBox"])) {
      // Retrieving each selected option 
      foreach ($_POST['rowSelectCheckBox'] as $leaves) {
        $saveinsert1 = "UPDATE exemption SET canceledby='$uid', approvals='9', reason='$reason' WHERE id='$leaves'";
        mysqli_query($conn, $saveinsert1);

        $huserbd5l = mysqli_query($conn, "SELECT * FROM exemption WHERE id='$leaves'");
        while ($huserb1d5l = mysqli_fetch_array($huserbd5l)) {
          $employeeid1l = $huserb1d5l["employeeid"];
          $department1l = $huserb1d5l["department"];
          $leavetype1l = $huserb1d5l["leavetype"];
          $startdatel = $huserb1d5l["startdate"];
          $enddatel = $huserb1d5l["enddate"];
        }

        $hu2 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid1l' AND company='$companyMain'");
        while ($hug2 = mysqli_fetch_array($hu2)) {
          $fnamel = $hug2["fname"];
          $mnamel = $hug2["mname"];
          $lnamel = $hug2["lname"];
          $thedepartment = $hug2["department"];
          $theuser = $hug2["uname"];
          $noteprofilepic = $hug2["profilepic"];
          $email_to = $hug2["email"];
        }
        $fullname = "$fnamel $mnamel $lnamel";

        $hu3 = mysqli_query($conn, "SELECT * FROM exemptiontype WHERE id = '$leavetype1l' AND company='$companyMain'");
        while ($hug3 = mysqli_fetch_array($hu3)) {
          $leavetype = $hug3["name"];
        }

        $story = "your $leavetype request has been Canceld. DENIED!";

        $saveinsert12 = "INSERT INTO notifications (`user`, `noteprofilepic`, `dtype1`, `dtype2`, `dtype3`, `fullname`, `story`, `ddate`, `department`, `company`, `admin`) VALUES ('$theuser', '$noteprofilepic', '2', 'Exemption', '$leavetype', '$fullname', '$story', '$thedate', '$thedepartment', '$companyMain', '2')";
        mysqli_query($conn, $saveinsert12);

        $subject = "Exemption Request Rejected";

        $output = '<p>Dear ' . $fnamel . ' ' . $mnamel . ' ' . $lnamel . ',</p>';
        $output .= '<p>Your pending Exemption request has been Rejected.</p>';
        $output .= '<p>Start Date: ' . $startdatel . '</p>';
        $output .= '<p>End Date: ' . $enddatel . '</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please log on to the panel to review.</p>';
        $output .= "<p><a href=$websiteMain/biodata/exemptions_history.php target=_blank>$websiteMain/biodata/exemptions_history.php</a></p>";
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 3 day for security reason.</p>';

        $output .= '<p>Thanks,</p>';
        $output .= '<p>' . $siteName . ' Team</p>';

        $body = $output;

        domail($email_to, $subject, $body);
      }
    }
  }

  //log event
  log_audit_event($uid, "UPDATE", "Applied Exemptions", "Exemptions", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Exemption Applied Successfully.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
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

  <link rel="stylesheet" type="text/css" href="../multi.min.css" />

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
      <i class="icon icon ion-ios-bookmarks-outline"></i>
      <div>
        <h4>Exemption Management</h4>
        <p class="mg-b-0">User Exemption Request and Approval Panel - All Users.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>
        <form id="mainform" action="" method="POST">

          <?php echo $status; ?>
          <button type="submit" class="btn btn-primary" id="approve" name="approve" form="mainform" value="1" disabled><i class="fa fa-plus mg-r-10"></i> Approve Request</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#applymodal" id="cancel" name="cancel" disabled><i class="fa fa-plus mg-r-10"></i> Reject Request</button>
          <!--<button type="submit" class="btn btn-danger" id="cancel" name="cancel" form="mainform" value="2" disabled><i class="fa fa-plus mg-r-10"></i> Cancel Request</button>-->

          <div class="table-wrapper mg-t-15">
            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class=""><input type="checkbox" id="checkUncheckAll" onClick="CheckUncheckAll()" value="1"></th>
                  <th class="wd-15p">User ID</th>
                  <th class="">Full name</th>
                  <th class="">Department</th>
                  <th class="">Exemption Type</th>
                  <th class="wd-10p">Start Date</th>
                  <th class="wd-10p">End Date</th>
                  <th class="wd-10p">RegDate</th>
                  <th class="">Days</th>
                  <th class="">Created By</th>
                  <th class="">Approved By</th>
                  <th class="">Authorised By</th>
                  <th class="">Canceled By</th>
                  <th class="">Reason</th>
                  <!-- <th class=""></th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $x = '0';

                if ($user_role == "3") {
                  $huserbd5 = mysqli_query($conn, "SELECT * FROM exemption WHERE approvals <= '$loggedplevel' AND approvals != '0' AND company='$companyMain' AND department='$loggeddepartment'");
                } else {
                  $huserbd5 = mysqli_query($conn, "SELECT * FROM exemption WHERE approvals <= '$loggedplevel' AND approvals != '0' AND company='$companyMain'");
                }

                while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                  $eid = $huserb1d5["id"];
                  $employeeid1 = $huserb1d5["employeeid"];
                  $department1 = $huserb1d5["department"];
                  $date = $huserb1d5["date"];
                  $leavetype1 = $huserb1d5["leavetype"];
                  $startdate = $huserb1d5["startdate"];
                  $enddate = $huserb1d5["enddate"];
                  $nodays = $huserb1d5["nodays"];
                  $createdby = $huserb1d5["createdby"];
                  $approvedby = $huserb1d5["approvedby"];
                  $authorisedby = $huserb1d5["authorisedby"];
                  $canceledby = $huserb1d5["canceledby"];
                  $status = $huserb1d5["approvals"];
                  $reason2 = $huserb1d5["reason"];

                  $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    $department = $hug1["departmentname"];
                  }

                  $hu2 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid1' AND company='$companyMain'");
                  while ($hug2 = mysqli_fetch_array($hu2)) {
                    $fname = $hug2["fname"];
                    $mname = $hug2["mname"];
                    $lname = $hug2["lname"];
                  }

                  $hu3 = mysqli_query($conn, "SELECT * FROM exemptiontype WHERE id = '$leavetype1' AND company='$companyMain'");
                  while ($hug3 = mysqli_fetch_array($hu3)) {
                    $leavetype = $hug3["name"];
                  }

                  $x = $x + '1';
                ?>
                  <tr>
                    <td><?php echo $x; ?></td>
                    <td><input type="checkbox" name="rowSelectCheckBox[]" value="<?php echo $eid; ?>" onClick="CheckShow()"></td>
                    <td><?php echo $employeeid1; ?></td>
                    <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $leavetype; ?></td>
                    <td><?php echo $startdate; ?></td>
                    <td><?php echo $enddate; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $nodays; ?></td>
                    <td><?php echo $createdby; ?></td>
                    <td><?php echo $approvedby; ?></td>
                    <td><?php echo $authorisedby; ?></td>
                    <td><?php echo $canceledby; ?></td>
                    <td><?php echo $reason2; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
        </form>
      </div><!-- table-wrapper -->

      <!-- add leaves -->
      <div id="addemployee" class="modal fade effect-newspaper">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add User Information</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-0">
              <form id="addemployee2" action="" method="POST">
                <input type="hidden" name="addp" value="1">
                <div class="row no-gutters">
                  <div class="col-lg-6 ">
                    <div class="pd-20 bd-r bd-success">
                      <h3 class="tx-inverse mg-b-25">Personal Information</h3>

                      <div class="d-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label>Firstname: <span class="tx-danger">*</span></label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Middlename: <span class="tx-danger">*</span></label>
                          <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Lastname: <span class="tx-danger">*</span></label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                        </div><!-- form-group -->
                      </div>

                      <div class="d-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label>Phone: <span class="tx-danger">*</span></label>
                          <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Date of Birth: <span class="tx-danger">*</span></label>
                          <input type="text" name="dofb" class="form-control" id="dateMask" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Gender: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 wd-100" name="gender" data-placeholder="Choose" required>
                            <option value="">Choose</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div class="d-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label>Email: <span class="tx-danger">*</span></label>
                          <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Next of Kin: <span class="tx-danger">*</span></label>
                          <input type="text" name="nextofkin" class="form-control" data-placeholder="Next of Kin" required>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-20">
                        <div class="form-group mg-b-0-force">
                          <label>Address: <span class="tx-danger">*</span></label>
                          <input type="text" name="address" class="form-control" placeholder="Address" required>
                        </div><!-- form-group -->
                      </div>

                      <div class="d-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label>State: <span class="tx-danger">*</span></label>
                          <input type="text" name="state" class="form-control" placeholder="State" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-b-0 mg-l-10">
                          <label>Country: <span class="tx-danger">*</span></label>
                          <input type="text" name="country" class="form-control" placeholder="Country" required>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-0">
                        <div class="form-group mg-b-0-force">
                          <label>Profile Picture: <span class="tx-danger">*</span></label>
                          <div class="custom-file">
                            <input type="file" id="file" name="filename" class="custom-file-input">
                            <label class="custom-file-label"></label>
                          </div>
                        </div><!-- form-group -->
                      </div>


                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6 bg-white">
                    <div class="pd-20">
                      <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

                      <div class="d-flex mg-b-20">
                        <div class="form-group mg-b-0">
                          <label>User ID: <span class="tx-danger">*</span></label>
                          <input type="text" name="employeeid" class="form-control" placeholder="User ID" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-l-10 mg-b-0">
                          <label>Employment Type: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 " name="employmenttype" data-placeholder="Choose" required>
                            <option value="">Choose</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Contract">Contract</option>
                            <option value="Part-Time">Part-Time</option>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-20">
                        <div class="form-group mg-b-0-force">
                          <label>Department: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 " name="department" data-placeholder="Choose Department" required>
                            <option value="">Choose Department</option>
                            <?php
                            $intload1 = mysqli_query($conn, "SELECT * FROM departments WHERE company='$companyMain' ORDER BY id asc");
                            while ($intload1a = mysqli_fetch_array($intload1)) {
                              $inid1 = $intload1a["id"];
                              $iname1 = $intload1a["departmentname"];
                            ?>
                              <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-20">
                        <div class="form-group mg-b-0-force">
                          <label>Work Schedule: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 " name="workshift" data-placeholder="Choose Work Schedule" required>
                            <option value="">Choose Work Schedule</option>
                            <?php
                            $intload2 = mysqli_query($conn, "SELECT * FROM workshift WHERE company='$companyMain' ORDER BY id asc");
                            while ($intload2a = mysqli_fetch_array($intload2)) {
                              $inid2 = $intload2a["id"];
                              $iname2 = $intload2a["shiftname"];
                            ?>
                              <option value="<?php echo $inid2; ?>"><?php echo $iname2; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-40">
                        <div class="form-group mg-b-0-force">
                          <label>Location: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 " name="location" data-placeholder="Choose Location" required>
                            <option value="">Choose Location</option>
                            <?php
                            $intload3 = mysqli_query($conn, "SELECT * FROM location WHERE company='$companyMain' ORDER BY id asc");
                            while ($intload3a = mysqli_fetch_array($intload3)) {
                              $inid3 = $intload3a["id"];
                              $iname3 = $intload3a["locationname"];
                            ?>
                              <option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <h3 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h3>

                      <div class="d-flex mg-b-0">
                        <div class="form-group mg-b-0-force">
                          <label>User Name: <span class="tx-danger">*</span></label>
                          <input type="text" name="uname" class="form-control" placeholder="User Username" required>
                        </div><!-- form-group -->
                        <div class="form-group mg-l-10 mg-b-0-force">
                          <label>Password: <span class="tx-danger">*</span></label>
                          <input type="text" name="pword" class="form-control" placeholder="User Password" required>
                        </div><!-- form-group -->
                      </div>

                    </div><!-- pd-20 -->
                  </div><!-- col-6 -->
                </div><!-- row -->
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs" form="addemployee2">Save changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->

      <!-- Apply Leave Exempmtion -->
      <div id="applymodal" class="modal fade effect-newspaper">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reason for Rejection</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-0">
              <div class="row no-gutters p-4">
                <textarea form="mainform" name="reason" rows="4" class="form-control" placeholder="write here.."></textarea>
              </div><!-- row -->
            </div>
            <div class="modal-footer ">

              <!--<button type="submit" class="btn btn-primary" id="approve" name="approve" form="mainform" value="1" disabled><i class="fa fa-plus mg-r-10"></i> Approve Request</button>-->
              <!--<button type="submit" class="btn btn-danger" id="cancel" name="cancel" form="mainform" value="2" disabled><i class="fa fa-plus mg-r-10"></i> Cancel Request</button>-->
              <button type="submit" class="btn btn-danger" form="mainform" value="2"><i class="fa fa-plus mg-r-10"></i> Reject Request</button>
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

  <script src="../multi.min.js"></script>

  <script type="text/javascript">
    function CheckUncheckAll() {
      var selectAllCheckbox = document.getElementById("checkUncheckAll");
      if (selectAllCheckbox.checked == true) {
        var checkboxes = document.getElementsByName("rowSelectCheckBox[]");
        for (var i = 0, n = checkboxes.length; i < n; i++) {
          checkboxes[i].checked = true;
        }
        document.getElementById("approve").disabled = false;
        document.getElementById("cancel").disabled = false;
      } else {
        var checkboxes = document.getElementsByName("rowSelectCheckBox[]");
        for (var i = 0, n = checkboxes.length; i < n; i++) {
          checkboxes[i].checked = false;
        }
        document.getElementById("approve").disabled = true;
        document.getElementById("cancel").disabled = true;
      }
    }

    function CheckShow() {
      //var checkboxes =  document.getElementsByName("rowSelectCheckBox[]");
      var d = document.querySelectorAll('input[type="checkbox"]:checked').length;
      if (d > 0) {
        document.getElementById("approve").disabled = false;
        document.getElementById("cancel").disabled = false;
      } else {
        document.getElementById("approve").disabled = true;
        document.getElementById("cancel").disabled = true;
      }
    }
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

      minimizeMenu();

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
</body>

</html>