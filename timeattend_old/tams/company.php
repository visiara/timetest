<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE company SET status = '$h' WHERE id = '$id'");

  //log event
  log_audit_event($uid, "UPDATE", "Updated record: $id", "Company Record", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Company Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE company SET dele = '1', deleby = '$uid' WHERE id = '$h3'");

  //log event
  log_audit_event($uid, "DELETE", "Updated record: $h3", "Company Record", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Company Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];
  $companyname = strip_tags($_POST['companyname']);
  $pref = strip_tags($_POST['pref']);
  $companyaddress = strip_tags($_POST['companyaddress']);
  $companyphone = strip_tags($_POST['companyphone']);
  $companyemail = strip_tags($_POST['companyemail']);
  $startdate = strtotime(strip_tags($_POST['startdate']));
  $comtype = strip_tags($_POST['comtype']);
  $noemployee = strip_tags($_POST['noemployee']);
  $dtype = strip_tags($_POST['dtype']);
  $ctype = strip_tags($_POST['ctype']);
  $dvalue = strip_tags($_POST['dvalue']);
  //$enddate = strtotime(strip_tags($_POST['enddate']));
  $startdate4 = strip_tags($_POST['startdate']);
  $enddate = strtotime(date('Y-m-d', strtotime($startdate4 . ' + ' . $dvalue . ' ' . $dtype)));

  if (isset($_POST['salay'])) {
    $salay = $_POST['salay'];
  } else {
    $salay = "0";
  }
  if (isset($_POST['kpiy'])) {
    $kpiy = $_POST['kpiy'];
  } else {
    $kpiy = "0";
  }

  $saveinsert1 = "UPDATE company SET companyname='$companyname', compref='$pref', startdate='$startdate', enddate='$enddate', comaddress='$companyaddress', comephone='$companyphone', comemail='$companyemail', masterkpi='$kpiy', mastersalary='$salay', dtype='$dtype', dvalue='$dvalue', noemployee='$noemployee', ctype='$ctype', comtype='$comtype' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    log_audit_event($uid, "UPDATE", "Updated record: $theid", "Company Record", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Company Successfully Updated.</span>
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
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Updating Company.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $companyname = strip_tags($_POST['companyname']);
  $pref = strip_tags($_POST['pref']);
  $companyaddress = strip_tags($_POST['companyaddress']);
  $companyphone = strip_tags($_POST['companyphone']);
  $companyemail = strip_tags($_POST['companyemail']);
  $startdate = strtotime(strip_tags($_POST['startdate']));
  $comtype = strip_tags($_POST['comtype']);
  $noemployee = strip_tags($_POST['noemployee']);
  $dtype = strip_tags($_POST['dtype']);
  $ctype = strip_tags($_POST['ctype']);
  $dvalue = strip_tags($_POST['dvalue']);
  //$enddate = strtotime(strip_tags($_POST['enddate']));
  $startdate4 = strip_tags($_POST['startdate']);
  $enddate = strtotime(date('Y-m-d', strtotime($startdate4 . ' + ' . $dvalue . ' ' . $dtype)));

  $uname4 = strip_tags($_POST['uname']);
  $pword4 = strip_tags($_POST['pword']);
  $regd = time();

  if (isset($_POST['salay'])) {
    $salay = $_POST['salay'];
  } else {
    $salay = "0";
  }
  if (isset($_POST['kpiy'])) {
    $kpiy = $_POST['kpiy'];
  } else {
    $kpiy = "0";
  }

  $cominsert = mysqli_query($conn, "SELECT * FROM company WHERE compref = '$pref'");
  $topref = mysqli_num_rows($cominsert);

  if ($topref > 0) {
    $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>                                                                                                                                                                                                                                                                                                                                                                                                            
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Company. Company Prefix is already taken.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  } else {

    $notec13user = mysqli_query($conn, "SELECT id FROM admins WHERE uname='$uname4'");
    $ifuser = mysqli_num_rows($notec13user);

    if ($ifuser < 1) {

      $saveinsert1 = "INSERT INTO company (`companyname`, `compref`, `status`, `createdby`, `dele`, `deleby`, `startdate`, `enddate`, `regdate`, `comaddress`, `comephone`, `comemail`, `masterkpi`, `mastersalary`, `dtype`, `dvalue`, noemployee, ctype, comtype) VALUES ('$companyname', '$pref', 'Active', '$uid', '0', '0', '$startdate', '$enddate', '$regd', '$companyaddress', '$companyphone', '$companyemail', '$kpiy', '$salay', '$dtype', '$dvalue', '$noemployee', '$ctype', '$comtype')";
      if (mysqli_query($conn, $saveinsert1)) {

        $companyMainMain = mysqli_insert_id($conn);

        //log event
        log_audit_event($uid, "INSERT", "Inserted record: $companyMainMain", "Created Company", "success", '', '', $_SESSION['logged']);

        $oldimage = "avatar2.png";
        $saveinsert13 = "INSERT INTO admins (`fname`, `mname`, `lname`, `email`, `phone`, `gender`, `plevel`, `uname`, `pword`, `edms`, `payroll`, `datacapture`, `tams`, `mainadmin`, `profilepic`, `createdby`, `company`) VALUES ('$pref', '$companyname', '$companyemail', '$companyphone', '$phone4', 'Male', '3', '$uname4', '$pword4', '1', '1', '1', '1', '1', '$oldimage', '$uid', '$companyMainMain')";
        mysqli_query($conn, $saveinsert13);

        $saveinsert134 = "INSERT INTO smstemplates (`login`, `logout`, `companyid`) VALUES ('LogIn Message', 'LogOut Message', '$companyMainMain')";
        mysqli_query($conn, $saveinsert134);

        $saveinsert134 = "INSERT INTO approvallevels (`levelname`, `levelnick`, `level`, `company`) VALUES 
  ('First Approval', 'Operator', '1', '$companyMainMain'),
  ('Second Approval', 'Supervisor', '2', '$companyMainMain'),
  ('Third Approval', 'Manager', '3', '$companyMainMain'),
  ('Fourth Approval', 'Human Resources', '4', '$companyMainMain'),
  ";
        mysqli_query($conn, $saveinsert134);

        $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Company Successfully Inserted.</span>
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
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Company.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
      }
    } else {
      $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Company Details. Username already exist on file (Reserved)</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
    }
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
      <i class="icon icon ion-android-home"></i>
      <div>
        <h4>Companies</h4>
        <p class="mg-b-0">All Companies.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus mg-r-10"></i> Add Company</button>

        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Company Name</th>
                <th class="">Prefix</th>
                <th class="">Company Type</th>
                <th class="">Status</th>
                <th class="">Reg Date</th>
                <th class="">Start Date</th>
                <th class="">End Date</th>
                <th class="">Phone Number</th>
                <th class="">Email Address</th>
                <th class="">Company Address</th>
                <th class="">Created By</th>
                <th class=""></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM company WHERE dele = '0'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $locationname = $huserb1d5["companyname"];
                $status = $huserb1d5["status"];
                $createdby = $huserb1d5["createdby"];

                $comstartdate1 = $huserb1d5["startdate"];
                $comenddate1 = $huserb1d5["enddate"];
                $comregdate1 = $huserb1d5["regdate"];
                $comaddress = $huserb1d5["comaddress"];
                $comephone = $huserb1d5["comephone"];
                $comemail = $huserb1d5["comemail"];
                $comref = $huserb1d5["compref"];
                $comctype = $huserb1d5["ctype"];

                $comstartdate = date("Y-m-d", $comstartdate1);
                $comenddate = date("Y-m-d", $comenddate1);
                $comregdate = date("Y-m-d", $comregdate1);

                if ($status == "Active") {
                  $statusd = "bg-success";
                  $btnactivate = "btn-danger";
                  $btnicon = "fa-lock";
                  $onoff = "InActive";
                } else {
                  $statusd = "bg-danger";
                  $btnactivate = "btn-success";
                  $btnicon = "fa-lock-open";
                  $onoff = "Active";
                }

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $eid; ?></td>
                  <td><?php echo $locationname; ?></td>
                  <td><?php echo $comref; ?></td>
                  <td><?php echo $comctype; ?></td>
                  <td>
                    <div class="progress ht-30">
                      <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
                    </div>
                  </td>
                  <td><?php echo $comregdate; ?></td>
                  <td><?php echo $comstartdate; ?></td>
                  <td><?php echo $comenddate; ?></td>
                  <td><?php echo $comephone; ?></td>
                  <td><?php echo $comemail; ?></td>
                  <td><?php echo $comaddress; ?></td>
                  <td><?php echo $createdby; ?></td>
                  <td>
                    <a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" class="btn <?php echo $btnactivate; ?> btn-icon" id="<?php echo $onoff; ?>" onclick="return confirmActivation(this.id);">
                      <div><i class="fa <?php echo $btnicon; ?>"></i></div>
                    </a>
                    <a href="javascript:;" class="btn btn-primary btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">
                      <div><i class="fa fa-edit"></i></div>
                    </a>
                    <a href="?did=<?php echo $eid; ?>" class="btn btn-danger btn-icon" onclick="return confirmDelete();">
                      <div><i class="fa fa-trash"></i></div>
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->

        <!-- add employee -->
        <div id="addemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Company</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-0">
                <form id="addemployee2" action="" method="POST">
                  <input type="hidden" name="addp" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                        <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

                        <div class=" mg-b-20">
                          <div class="row mg-b-20">
                            <div class="form-group mg-b-0 col-md-8">
                              <label>Company Name: <span class="tx-danger">*</span></label>
                              <input type="text" name="companyname" class="form-control" placeholder="Company Name" required>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 col-md-4">
                              <label>Prefix: <span class="tx-danger">*</span></label>
                              <input type="text" name="pref" class="form-control" placeholder=".eg (VL)" required>
                            </div><!-- form-group -->
                          </div>

                          <div class="form-group mg-b-20-force">
                            <label>Company Type: <span class="tx-danger">*</span></label>
                            <select name="ctype" id="ctype" class="form-control" placeholder="Company Type" required>
                              <option value="">Choose Company Type</option>
                              <option value="Regular Company">Regular Company</option>
                              <option value="School">School</option>
                            </select>
                          </div><!-- form-group -->

                          <div class="form-group mg-b-20-force">
                            <label>Attendance Type: <span class="tx-danger">*</span></label>
                            <select name="comtype" id="comtype" class="form-control" placeholder="Attendance Type" required>
                              <option value="">Choose Attendance Type</option>
                              <option value="0">Single ClockIn</option>
                              <option value="1">Multi ClockIn</option>
                            </select>
                          </div><!-- form-group -->

                          <div class="form-group mg-b-20-force">
                            <label>Address: <span class="tx-danger">*</span></label>
                            <input type="text" name="companyaddress" class="form-control" placeholder="Address" required>
                          </div><!-- form-group -->
                          <div class="form-group mg-b-20-force">
                            <label>Phone Number: <span class="tx-danger">*</span></label>
                            <input type="text" name="companyphone" class="form-control" placeholder="Phone Number" required>
                          </div><!-- form-group -->
                          <div class="form-group mg-b-20-force">
                            <label>Email Address: <span class="tx-danger">*</span></label>
                            <input type="email" name="companyemail" class="form-control" placeholder="Email Address" required>
                          </div><!-- form-group -->

                          <div class="row mg-b-20">
                            <div class="form-group mg-b-0 col-md-6">
                              <label>Duration Type: <span class="tx-danger">*</span></label>
                              <select name="dtype" id="dtype" class="form-control" placeholder="Company Name" required>
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months">Months</option>
                                <option value="years">Years</option>
                              </select>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 col-md-6">
                              <label>Duration Value: <span class="tx-danger">*</span></label>
                              <input type="number" name="dvalue" class="form-control" min="1" value="1" required>
                            </div><!-- form-group -->
                          </div>

                          <div class="form-group mg-b-20-force">
                            <label>Start Date: <span class="tx-danger">*</span></label>
                            <input type="date" id="startdate" name="startdate" class="form-control" placeholder="Start Date" required>
                          </div><!-- form-group -->

                          <div class="form-group mg-b-0-force">
                            <label>No of User: <span class="tx-danger">*</span></label>
                            <input type="number" id="noemployee" name="noemployee" class="form-control" min="10" placeholder="10" required>
                          </div>

                          <!--
      <div class="form-group mg-b-0-force">
        <label>End Date: <span class="tx-danger">*</span></label>
        <input type="date" id="enddate" name="enddate" class="form-control" placeholder="End Date" readonly required>
      </div
    -->
                        </div>

                        <div class="mg-b-20">
                          <p class="mg-b-10">Enable Salary Management Modules?</p>
                          <div class="form-group mg-b-0">
                            <label class="ckbox">
                              <input type="checkbox" name="salay" value="1">
                              <span>Enable Attendance Module</span>
                            </label>
                          </div><!-- form-group -->
                          <div class="form-group mg-b-0">
                            <label class="ckbox">
                              <input type="checkbox" name="kpiy" value="1">
                              <span>Enable KPI Module</span>
                            </label>
                          </div><!-- form-group -->
                        </div>

                        <h3 class="tx-inverse mg-b-15 mg-t-30">Access Information!</h3>
                        <div class="d-flex mg-b-0">
                          <div class="form-group mg-b-0-force">
                            <label>Admin User Name: <span class="tx-danger">*</span></label>
                            <input type="text" name="uname" class="form-control" placeholder="Username" required>
                          </div><!-- form-group -->
                          <div class="form-group mg-l-10 mg-b-0-force">
                            <label>Password: <span class="tx-danger">*</span></label>
                            <input type="text" name="pword" class="form-control" placeholder="Password" required>
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

        <!-- Edit employee -->
        <div id="editemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Company Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-0">
                <form id="editemployee2" action="" method="POST">
                  <div class="row no-gutters" id="pasteedit">

                  </div><!-- row -->
                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs" form="editemployee2">Save changes</button>
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

    $('#datepickerNoOfMonths').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 2
    });
  </script>

  <script>
    function Edit(str) {
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
        xmlhttp.open("GET", "company2.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    /*
    $('#startdate').change(function(e){
    var today = document.getElementById("startdate").value;
    document.getElementById("enddate").setAttribute("min", today);
    });
    */
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
</body>

</html>