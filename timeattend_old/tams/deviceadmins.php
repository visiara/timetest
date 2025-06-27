<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE deviceadmins SET status = '$h' WHERE id = '$id'");
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Status Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE deviceadmins SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];
  $location4 = $_POST['location'];
  $device4 = $_POST['device'];
  $employee4 = $_POST['employee'];
  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];

  $huy1 = mysqli_query($conn, "SELECT * FROM devices WHERE id = '$device4' AND company='$companyMain'");
  while ($hugy1 = mysqli_fetch_array($huy1)) {
    $devicefullid = $hugy1["deviceid"];
  }

  //$saveinsert1 = "UPDATE deviceadmins SET adminid='$employee4', deviceid='$device4', location='$location4', uname='$uname4', pword='$pword4', createdby='$uid' WHERE id='$theid'";
  $saveinsert1 = "UPDATE deviceadmins SET adminid='$employee4', deviceid='$device4', uname='$uname4', pword='$pword4', createdby='$uid', devicefullid='$devicefullid' WHERE id='$theid'";

  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    log_audit_event($uid, "UPDATE", "Updated record: $theid", "Device Admin", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Device Administrator Detail Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Device Administrator Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $location4 = $_POST['location'];
  $device4 = $_POST['device'];
  $employee4 = $_POST['employee'];
  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];

  $huy1 = mysqli_query($conn, "SELECT * FROM devices WHERE id = '$device4' AND company='$companyMain'");
  while ($hugy1 = mysqli_fetch_array($huy1)) {
    $devicefullid = $hugy1["deviceid"];
  }

  $saveinsert1 = "INSERT INTO deviceadmins (`adminid`, `deviceid`, `location`, `uname`, `pword`, `createdby`, devicefullid, `company`) VALUES ('$employee4', '$device4', '$location4', '$uname4', '$pword4', '$uid', '$devicefullid', '$companyMain')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Device Admin", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Device Administrator Successfully Inserted.</span>
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
    <span><strong>Opps!</strong> Error Inserting Device Administrator Details.</span>
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
  <div class="container py-4">
    <!-- Nav Tabs -->
    <?php include_once('./adminPage.php'); ?>

    <div class="card-header mt-4 d-flex flex-wrap justify-content-between align-items-center">
      <!-- Left side: Title -->
      <div class="mb-3 mb-md-0">
        <p class="mb-0 text-muted fw-semibold">Showing all Devices logged</p>
      </div>

      <!-- Right side: Toolbar -->
      <div class="d-flex flex-wrap align-items-center gap-3">
        <!-- Filter Button -->
        <button class="btn btn-outline-secondary">
          <i class="bi bi-funnel"></i> Filters
        </button>

        <!-- Search Input -->

        <div class="d-flex align-items-center mx-5 position-relative my-1 me-5">
          <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
          <input id="customTableSearch" type="text" data-kt-permissions-table-filter="search" class="form-control rounded-input form-control-solid w-250px ps-13" placeholder="Search..." />
        </div>
        <!-- Add Button -->
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addemployee">
          + Add Device Admin
        </button>
      </div>
    </div>


    <div>

      <?php echo $status; ?>

      <div class="container">


        <?php
        $x = 0;
        $deviceAdmins = mysqli_query($conn, "SELECT * FROM deviceadmins WHERE company='$companyMain'");

        while ($da = mysqli_fetch_array($deviceAdmins)) {
          $eid = $da["id"];
          $adminid = $da["adminid"];
          $deviceid = $da["deviceid"];
          $location = $da["location"];
          $status = $da["status"];
          $uname = $da["uname"];
          $pword = $da["pword"];
          $createdby = $da["createdby"];

          // Get admin details
          $adminResult = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$adminid' AND dele = '0' AND company='$companyMain' AND plevel < '5'");
          $admin = mysqli_fetch_array($adminResult);
          if (!$admin) continue;

          $fname = $admin["fname"];
          $mname = $admin["mname"];
          $lname = $admin["lname"];
          $profilepic = $admin["profilepic"];
          $llogin = date("Y-m-d h:i:s", $admin["llogin"]);
          $plevel_id = $admin["plevel"];
          $user_role_id = $admin["user_role"];

          // Get approval level
          $plevel = '';
          $plevelQuery = mysqli_query($conn, "SELECT levelnick FROM approvallevels WHERE id = '$plevel_id'");
          if ($pl = mysqli_fetch_array($plevelQuery)) {
            $plevel = $pl["levelnick"];
          }

          // Get user role
          $user_role = '';
          $roleQuery = mysqli_query($conn, "SELECT name FROM user_roles WHERE id = '$user_role_id'");
          if ($r = mysqli_fetch_array($roleQuery)) {
            $user_role = $r["name"];
          }

          // Get device name
          $devicename = '';
          $deviceQuery = mysqli_query($conn, "SELECT devicename FROM devices WHERE id = '$deviceid' AND company='$companyMain'");
          if ($dv = mysqli_fetch_array($deviceQuery)) {
            $devicename = $dv["devicename"];
          }

          // Get location name
          $locationname = '';
          $locationQuery = mysqli_query($conn, "SELECT locationname FROM location WHERE id = '$location' AND company='$companyMain'");
          if ($loc = mysqli_fetch_array($locationQuery)) {
            $locationname = $loc["locationname"];
          }

          // Status display logic
          if ($status == "Active") {
            $statusd     = "badge-light-success";
            $iconState   = "bg-success";
            $btnactivate = "btn-danger";
            $btnicon     = "fa-lock";
            $onoff       = "De-activated";
            $buttonText = 'De activate';
          } else {
            $statusd     = "badge-light-danger";
            $iconState   = "bg-danger";
            $btnactivate = "btn-success";
            $btnicon     = "fa-lock-open";
            $onoff       = "Active";
            $buttonText = 'Activate';
          }

          $x++;
        ?>

          <div class="card mb-3 shadow-sm">
            <div class="card-body">
              <div class="row align-items-center g-3">

                <!-- Left: Avatar + Name + Status -->
                <div class="col-lg-4 d-flex align-items-center gap-3">
                  <span class="badge <?= $statusd ?> d-flex align-items-center">
                    <span class="bullet <?= $iconState ?> me-2 h-5px w-5px"></span>
                    <?= $status ?>
                  </span>
                  <img src="../images/profilepics/<?= $profilepic ?>" class="rounded-circle" style="width: 60px; height: 60px;" alt="avatar">
                  <div>
                    <h6 class="mb-0 text-dark fs-5">
                      <?= "$lname " . ucfirst(substr($mname, 0, 1)) . ". $fname" ?>
                    </h6>
                    <small class="text-muted"><?= $plevel ?></small>
                  </div>
                </div>

                <!-- Middle: Device ID + Location -->
                <div class="col-lg-4">
                  <div><strong>Device ID:</strong> <?= $devicename ?></div>
                  <div><strong>Location:</strong> <?= $locationname ?></div>
                </div>

                <!-- Right: Buttons (inline) -->
                <div class="col-lg-4 text-end">
                  <div class="d-flex justify-content-lg-end gap-2 flex-wrap">
                    <button class="btn rounded-btn border btn-sm" onclick="Edit(<?= $eid ?>);" data-bs-toggle="modal" data-bs-target="#editemployee">Edit</button>
                    <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" class="btn rounded-btn border btn-sm" id="<?= $onoff ?>" onclick="return confirmActivation(this.id);"><?= $buttonText ?></a>
                    <a href="?did=<?= $eid ?>" class="btn rounded-btn border btn-sm" onclick="return confirmDelete();">Delete</a>
                  </div>
                </div>

              </div>
            </div>
          </div>

        <?php } ?>


        <!-- add employee -->
        <div id="addemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Device Administrator</h6>
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
                          <div class="form-group mg-b-0-force">
                            <label>Location: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " name="location" id="location" data-placeholder="Choose Location" onchange="showd();" required>
                              <option value="">Choose Location</option>
                              <?php
                              $intload3 = mysqli_query($conn, "SELECT * FROM location WHERE dele='0' AND status='Active' AND company='$companyMain' ORDER BY id asc");
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

                        <div class="" id="txt">

                        </div>

                        <h3 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h3>

                        <div class="d-flex mg-b-0">
                          <div class="form-group mg-b-0-force">
                            <label>User Name: <span class="tx-danger">*</span></label>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Administrator Information</h6>
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
        xmlhttp.open("GET", "deviceadmins3.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
      }
    }

    function showd() {

      var x = document.getElementById("location").selectedIndex;
      var y = document.getElementById("location").options;
      var str = y[x].value;
      var str2 = "<?php echo $companyMain; ?>";

      if (str.length == 0) {
        document.getElementById("txt").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txt").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "deviceadmins2.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
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