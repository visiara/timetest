<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE admins SET status = '$h' WHERE id = '$id'");
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
  $notec1 = mysqli_query($conn, "UPDATE admins SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
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
  $fname4 = $_POST['fname'];
  $mname4 = $_POST['mname'];
  $lname4 = $_POST['lname'];
  $email4 = $_POST['email'];
  $plevel4 = $_POST['plevel'];
  $gender4 = $_POST['gender'];
  $phone4 = $_POST['phone'];
  $uroles4 = $_POST['uroles'];
  $department4 = $_POST['department'];

  if (isset($_POST['main'])) {
    $mainadmin4 = $_POST['main'];
  } else {
    $mainadmin4 = "0";
  }
  if (isset($_POST['edms'])) {
    $edms4 = $_POST['edms'];
  } else {
    $edms4 = "0";
  }
  if (isset($_POST['tams'])) {
    $tams4 = $_POST['tams'];
  } else {
    $tams4 = "0";
  }
  if (isset($_POST['dcapture'])) {
    $datacapture4 = $_POST['dcapture'];
  } else {
    $datacapture4 = "0";
  }
  if (isset($_POST['payroll'])) {
    $payroll4 = $_POST['payroll'];
  } else {
    $payroll4 = "0";
  }

  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];
  $status4 = $_POST['status'];

  $path = "../images/profilepics/";
  $oldimage = $_POST['oldpic'];

  if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

    //READING THE MAGES:::::::::::::::::::::

    $picname1 = $_FILES['filename']['name'];
    $size1 = $_FILES['filename']['size'];
    $type1 = $_FILES['filename']['type'];
    $error1 = $_FILES['filename']['type'];
    $get_extension1 = explode(".", $_FILES['filename']['name']);
    $extension1 = $get_extension1[1];
    $word1 = date("mdYgisa");
    $img_name1 = (date("mdyHis") + 1);
    $newimage = "$img_name1.$extension1";

    copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
    $profilepic4 = $newimage;
  } else {
    $profilepic4 = $oldimage;
  }

  $saveinsert1 = "UPDATE admins SET fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', plevel='$plevel4', gender='$gender4', edms='$edms4', payroll='$payroll4', phone='$phone4', datacapture='$datacapture4', tams='$tams4', mainadmin='$mainadmin4', department = '$department4', uname='$uname4', updaby='$uid', profilepic='$profilepic4', user_role='$uroles4' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {;
    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Administrator Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $fname4 = $_POST['fname'];
  $mname4 = $_POST['mname'];
  $lname4 = $_POST['lname'];
  $email4 = $_POST['email'];
  $plevel4 = $_POST['plevel'];
  $gender4 = $_POST['gender'];
  $phone4 = $_POST['phone'];
  $uroles4 = $_POST['uroles'];
  $department4 = $_POST['department'];

  if (isset($_POST['main'])) {
    $mainadmin4 = $_POST['main'];
  } else {
    $mainadmin4 = "0";
  }
  if (isset($_POST['edms'])) {
    $edms4 = $_POST['edms'];
  } else {
    $edms4 = "0";
  }
  if (isset($_POST['tams'])) {
    $tams4 = $_POST['tams'];
  } else {
    $tams4 = "0";
  }
  if (isset($_POST['dcapture'])) {
    $datacapture4 = $_POST['dcapture'];
  } else {
    $datacapture4 = "0";
  }
  if (isset($_POST['payroll'])) {
    $payroll4 = $_POST['payroll'];
  } else {
    $payroll4 = "0";
  }

  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];
  $status4 = $_POST['status'];

  $path = "../images/profilepics/";
  $oldimage = "avatar2.png";

  $notec13user = mysqli_query($conn, "SELECT id FROM admins WHERE uname='$uname4'");
  $ifuser = mysqli_num_rows($notec13user);

  if ($ifuser > 0) {

    $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Administrator Details. Username already exist on file (Reserved)</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  } else {

    if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

      //READING THE MAGES:::::::::::::::::::::

      $picname1 = $_FILES['filename']['name'];
      $size1 = $_FILES['filename']['size'];
      $type1 = $_FILES['filename']['type'];
      $error1 = $_FILES['filename']['type'];
      $get_extension1 = explode(".", $_FILES['filename']['name']);
      $extension1 = $get_extension1[1];
      $word1 = date("mdYgisa");
      $img_name1 = (date("mdyHis") + 1);
      $newimage = "$img_name1.$extension1";

      copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
      $profilepic4 = $newimage;
    } else {
      $profilepic4 = $oldimage;
    }

    $saveinsert1 = "INSERT INTO admins (`fname`, `mname`, `lname`, `email`, `phone`, `gender`, `plevel`, `uname`, `pword`, `edms`, `payroll`, `datacapture`, `tams`, `mainadmin`, department, `profilepic`, `createdby`, `company`, user_role) VALUES ('$fname4', '$mname4', '$lname4', '$email4', '$phone4', '$gender4', '$plevel4', '$uname4', '$pword4', '$edms4', '$payroll4', '$datacapture4', '$tams4', '$mainadmin4', '$department4', '$profilepic4', '$uid', '$companyMain', '$uroles4')";
    if (mysqli_query($conn, $saveinsert1)) {

      //log event
      $dinsert = mysqli_insert_id($conn);
      log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Administrators", "success", '', '', $_SESSION['logged']);

      $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Inserted.</span>
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
    <span><strong>Opps!</strong> Error Inserting Administrator Details.</span>
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

    <div class="card-header mt-6 d-flex flex-wrap justify-content-between align-items-center">
      <!-- Left Side: Title -->
      <div class="mb-3 mb-md-0">
        <p class="mb-0 text-muted fw-semibold">
          Showing all Administrators added to the platform
        </p>
      </div>

      <!-- Right Side: Toolbar -->
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

        <!-- Add Admin Button -->
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addemployee">
          + Add Admin User
        </button>
      </div>
    </div>


    <div class="">
      <div>

        <?php echo $status; ?>

        <div class="container">



          <?php
          $x = '0';
          $huserbd5 = mysqli_query($conn, "SELECT * FROM admins WHERE dele = '0' AND company='$companyMain' AND plevel < '5'");
          while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
            $eid = $huserb1d5["id"];
            $fname = $huserb1d5["fname"];
            $mname = $huserb1d5["mname"];
            $lname = $huserb1d5["lname"];
            $email = $huserb1d5["email"];
            $phone = $huserb1d5["phone"];
            $gender = $huserb1d5["gender"];
            $plevel1 = $huserb1d5["plevel"];
            $status = $huserb1d5["status"];
            $uname = $huserb1d5["uname"];
            $pword = $huserb1d5["pword"];
            $edms = $huserb1d5["edms"];
            $payroll = $huserb1d5["payroll"];
            $datacapture = $huserb1d5["datacapture"];
            $tams = $huserb1d5["tams"];
            $mainadmin = $huserb1d5["mainadmin"];
            $department1 = $huserb1d5["department"];
            $profilepic = $huserb1d5["profilepic"];
            $createdby = $huserb1d5["createdby"];
            $llogin5 = $huserb1d5["llogin"];
            $user_roley = $huserb1d5["user_role"];
            //$llogin6 = ($llogin5 / 1000);
            $llogin = date("Y-m-d h:i:s", $llogin5);

            if ($edms == "1") {
              $edms = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
            } else {
              $edms = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
            }

            if ($payroll == "1") {
              $payroll = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
            } else {
              $payroll = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
            }

            if ($datacapture == "1") {
              $datacapture = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
            } else {
              $datacapture = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
            }

            if ($tams == "1") {
              $tams = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
            } else {
              $tams = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
            }

            if ($mainadmin == "1") {
              $mainadmin = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
            } else {
              $mainadmin = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
            }

            $hu = mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$plevel1'");
            while ($hug = mysqli_fetch_array($hu)) {
              $plevel = $hug["levelnick"];
            }

            $hu2 = mysqli_query($conn, "SELECT * FROM user_roles WHERE id = '$user_roley'");
            while ($hugu = mysqli_fetch_array($hu2)) {
              $user_roley2 = $hugu["name"];
            }

            /*
$hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1'");
while ($hug1= mysqli_fetch_array($hu1))
{
  $department = $hug1["departmentname"];
}
*/

            if ($status == "Active") {

              $statusd     = "badge-light-success";
              $iconState = "bg-success";
              $btnicon     = "fa-lock";
              $actionText = 'De-activated';

              $btnactivate = "btn-danger";
              $btnicon = "fa-lock";
              $onoff = "InActive";
            } else {
              $statusd     = "badge-light-success";
              $iconState = "bg-success";
              $btnactivate = "btn-success";
              $btnicon = "fa-lock-open";
              $onoff = "Active";
            }

            $x = $x + '1';
          ?>
            <div class="card mb-3 shadow-sm">
              <div class="card-body">
                <div class="row align-items-center g-3">

                  <!-- Left: Avatar + Name + Role + Email + Status -->
                  <div class="col-lg-5 d-flex align-items-center gap-3">
                    <span class="badge <?= $statusd ?>">
                      <span class="bullet <?= $iconState ?> me-2 h-5px w-5px"></span> <?= $status ?>
                    </span>
                    <img src="../images/profilepics/<?= $profilepic ?>" class="rounded-circle" style="width: 60px; height: 60px;" alt="avatar">
                    <div>
                      <h6 class="mb-0 text-dark fs-5">
                        <?= "$lname " . ucwords(substr($mname, 0, 1)) . ". $fname" ?>
                      </h6>
                      <small><?= $plevel ?></small><br>
                      <small class="text-muted"><?= $email ?></small>
                    </div>
                  </div>

                  <!-- Middle: Admin Role -->
                  <div class="col-lg-3">
                    <strong class="text-muted"> Role:</strong>
                    <p class="mb-0 fs-6"><?= $user_roley2 ?></p>
                  </div>

                  <!-- Right: Last login + buttons -->
                  <div class="col-lg-4 text-end">
                    <small class="d-block">
                      <i class="bi bi-clock-fill text-primary"></i> Last Login: <?= $llogin ?>
                    </small>
                    <small class="text-muted">Created by <?= $createdby ?></small><br>
                    <div class="mt-2 d-flex gap-2 justify-content-end flex-wrap">
                      <button class="btn rounded-btn border btn-sm"
                        onclick="Edit(<?= $eid ?>);" data-bs-toggle="modal" data-bs-target="#editemployee">
                        Edit
                      </button>
                      <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>"
                        class="btn rounded-btn border btn-sm"
                        id="<?= $onoff ?>" onclick="return confirmActivation(this.id);">
                        <?= $buttonText ?? 'Deactivate' ?>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>



          <?php
          }
          ?>

          <div id="addemployee" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <form id="addemployee2" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="addp" value="1">

                  <div class="modal-header">
                    <h5 class="modal-title">Add Administrator Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <div class="row g-4">

                      <!-- Left Column -->
                      <div class="col-lg-6">
                        <h6 class="mb-3">Personal Information</h6>

                        <div class="row g-2 mb-3">
                          <div class="col">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="fname" class="form-control" required>
                          </div>
                          <div class="col">
                            <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                            <input type="text" name="mname" class="form-control" required>
                          </div>
                          <div class="col">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="lname" class="form-control" required>
                          </div>
                        </div>

                        <div class="row g-2 mb-3">
                          <div class="col">
                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" required>
                          </div>
                          <div class="col">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select class="form-select" name="gender" required>
                              <option value="">Choose</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Email <span class="text-danger">*</span></label>
                          <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Profile Picture <span class="text-danger">*</span></label>
                          <input type="file" name="filename" class="form-control" required>
                        </div>
                      </div>

                      <!-- Right Column -->
                      <div class="col-lg-6">
                        <h6 class="mb-3">Organization Information</h6>

                        <div class="mb-3">
                          <label class="form-label">Department <span class="text-danger">*</span></label>
                          <select class="form-select" name="department" required>
                            <option value="">Choose Department</option>
                            <?php
                            $intload1 = mysqli_query($conn, "SELECT * FROM departments WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
                            while ($intload1a = mysqli_fetch_array($intload1)) {
                              echo "<option value='{$intload1a['id']}'>{$intload1a['departmentname']}</option>";
                            }
                            ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Admin Level <span class="text-danger">*</span></label>
                          <select class="form-select" name="plevel" required>
                            <option value="">Choose Admin Level</option>
                            <?php
                            $intload3 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
                            while ($intload3a = mysqli_fetch_array($intload3)) {
                              echo "<option value='{$intload3a['id']}'>{$intload3a['levelnick']}</option>";
                            }
                            ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">User Role <span class="text-danger">*</span></label>
                          <select class="form-select" name="uroles" required>
                            <option value="">Choose User Role</option>
                            <?php
                            $intload3u = mysqli_query($conn, "SELECT * FROM user_roles ORDER BY id asc");
                            while ($intload3au = mysqli_fetch_array($intload3u)) {
                              echo "<option value='{$intload3au['id']}'>{$intload3au['name']}</option>";
                            }
                            ?>
                          </select>
                        </div>

                        <h6 class="mb-3 mt-4">Access Information</h6>

                        <div class="row g-2">
                          <div class="col">
                            <label class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" name="uname" class="form-control" required>
                          </div>
                          <div class="col">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="text" name="pword" class="form-control" required>
                          </div>
                        </div>
                      </div>

                    </div> <!-- row -->
                  </div> <!-- modal-body -->

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="addemployee2">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>

                </form>
              </div>
            </div>
          </div>

          <!-- Edit Employee Modal -->
          <div id="editemployee" class="modal fade effect-newspaper" tabindex="-1" aria-labelledby="editemployeeLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h5 class="modal-title text-uppercase fw-bold" id="editemployeeLabel">Edit Administrator Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-0">
                  <form id="editemployee2" method="POST">
                    <div class="row g-0" id="pasteedit">
                      <!-- Dynamic content will be injected here -->
                    </div>
                  </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm" form="editemployee2">Save Changes</button>
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>


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
          xmlhttp.open("GET", "editadmins.php?q=" + str + "&com=" + str2, true);
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