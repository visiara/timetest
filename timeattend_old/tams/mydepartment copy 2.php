<?php
// BE IN ALL PAGES
include "" . __DIR__ . "/header.php";
// include("" . __DIR__ . "/stats.php");

@$ct_type = $_GET['ct_type'];


if (! empty($_GET['activate'])) {
  $h       = $_GET['activate'];
  $id      = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE employee SET status = '$h' WHERE id = '$id'");
  $status  = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Status Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (! empty($_GET['did'])) {
  $h3     = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE employee SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (! empty($_POST['editp'])) {

  $theid           = $_POST['theid'];
  $employeeid4     = $_POST['employeeid'];
  $fname4          = $_POST['fname'];
  $mname4          = $_POST['mname'];
  $lname4          = $_POST['lname'];
  $email4          = $_POST['email'];
  $address4        = $_POST['address'];
  $country4        = $_POST['country'];
  $state4          = $_POST['state'];
  $gender4         = $_POST['gender'];
  $phone4          = $_POST['phone'];
  $nextofkin4      = $_POST['nextofkin'];
  $dofb4           = $_POST['dofb'];
  $employmenttype4 = $_POST['employmenttype'];
  $location4       = $_POST['location'];
  $department4     = $_POST['department'];
  $workshift4      = $_POST['workshift'];
  $uname4          = $_POST['uname'];
  $pword4          = $_POST['pword'];
  $status4         = $_POST['status'];
  $createdby4      = $_POST['createdby'];

  $path     = "../images/employee/";
  $oldimage = $_POST['oldpic'];

  if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

    //READING THE MAGES:::::::::::::::::::::

    $picname1       = $_FILES['filename']['name'];
    $size1          = $_FILES['filename']['size'];
    $type1          = $_FILES['filename']['type'];
    $error1         = $_FILES['filename']['type'];
    $get_extension1 = explode(".", $_FILES['filename']['name']);
    $extension1     = $get_extension1[1];
    $word1          = date("mdYgisa");
    $img_name1      = (date("mdyHis") + 1);
    $newimage       = "$img_name1.$extension1";

    copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
    $profilepic4 = $newimage;
  } else {
    $profilepic4 = $oldimage;
  }

  $saveinsert1 = "UPDATE employee SET employeeid ='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {;
    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Detail Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating User Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

?>

<!-- ########## START: LEFT PANEL ########## -->
<?php

include '../auth/admin_header.php';

include "" . __DIR__ . "/adminHeader.php";
include "" . __DIR__ . "/sidebar.php";

include "" . __DIR__ . "/rightSidebar.php";

?>

<?php echo $status; ?>



<div class="card-header mt-6">

  =
  <div class="card-toolbar">
    <!--begin::Button-->

    <div class="btn-group ml-2 mr-2" role="group" id="viewToggle">
      <a href="?ct_type=grid" class="btn <?php
                                          if ($ct_type == 'grid') {

                                            echo 'btn-light-primary';
                                          } ?>
                                          " data-type="grid">
        <i class="ki-duotone ki-element-11 fs-3">
          <span class="path1"></span>
          <span class="path2"></span>
          <span class="path3"></span>
        </i>
        Grid
      </a>

      <a href="?ct_type=list" class="btn <?php
                                          if ($ct_type == 'list' || !$ct_type) {

                                            echo 'btn-light-primary';
                                          } ?>" data-type="list">
        <i class="ki-duotone ki-text-align-justify-center fs-3">
          <span class="path1"></span>
          <span class="path2"></span>
          <span class="path3"></span>
        </i>
        List
      </a>
    </div>

    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
      <i class="ki-duotone ki-filter fs-2">
        <span class="path1"></span>
        <span class="path2"></span>
      </i>
      Filter
    </button>

    <!-- <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
      <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bold">Filter Options</div>
      </div>

      <div class="separator border-gray-200"></div>

      <div class="px-7 py-5" data-kt-user-table-filter="form">
        <div class="mb-10">
          <label class="form-label fs-6 fw-semibold">Role:</label>
          <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
            <option></option>
            <option value="Administrator">Administrator</option>
            <option value="Analyst">Analyst</option>
            <option value="Developer">Developer</option>
            <option value="Support">Support</option>
            <option value="Trial">Trial</option>
          </select>
        </div>

        <div class="mb-10">
          <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
          <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
            <option></option>
            <option value="Enabled">Enabled</option>
          </select>
        </div>

        <div class="d-flex justify-content-end">
          <button type="reset" class="btn  fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
          <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
        </div>
      </div>
    </div> -->

    <div class="d-flex align-items-center mx-5 position-relative my-1 me-5">
      <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
        <span class="path1"></span>
        <span class="path2"></span>
      </i>
      <input id="customTableSearch" type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search..." />
    </div>


    <!-- 
    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addemployeekpi">
      <i class="ki-duotone ki-plus-square fs-3">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </i>
      Add KPI Indices

    </button> -->
  </div>
  <!--end::Card toolbar-->
</div>


<?php if ($ct_type == 'list' || !$ct_type): ?>
  <!-- List Here-->
  <div class="table-responsive mg-t-15 container">
    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
      <thead class="thead-colored thead-dark">
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0 ">
          <th class="min-w-50px ml-30">S/N</th>
          <th class="">Unique ID</th>
          <th class="">Full name</th>
          <th class="">Location</th>
          <th class="">Department</th>
          <th class="">Status</th>
          <th class="">Phone No</th>
          <th></th>

        </tr>
      </thead>
      <tbody class=" fw-semibold text-gray-600">
        <?php
        $x        = '0';
        $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain' AND department = '$loggeddepartment' ");
        while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
          $eid            = $huserb1d5["id"];
          $empuniqid      = $huserb1d5["uniqid"];
          $employeeid     = $huserb1d5["employeeid"];
          $fname          = $huserb1d5["fname"];
          $mname          = $huserb1d5["mname"];
          $lname          = $huserb1d5["lname"];
          $email          = $huserb1d5["email"];
          $address        = $huserb1d5["address"];
          $country        = $huserb1d5["country"];
          $state          = $huserb1d5["state"];
          $gender         = $huserb1d5["gender"];
          $phone          = $huserb1d5["phone"];
          $nextofkin      = $huserb1d5["nextofkin"];
          $dofb           = $huserb1d5["dofb"];
          $employmenttype = $huserb1d5["employmenttype"];
          $location1      = $huserb1d5["location"];
          $department1    = $huserb1d5["department"];
          $workshift1     = $huserb1d5["workshift"];
          $uname          = $huserb1d5["uname"];
          $pword          = $huserb1d5["pword"];
          $status         = $huserb1d5["status"];
          $createdby      = $huserb1d5["createdby"];
          $profilepic     = $huserb1d5["profilepic"];

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

          $bookpay1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company='$companyMain'");
          $bo       = mysqli_num_rows($bookpay1);
          if ($bo > 0) {
            while ($bookpay = mysqli_fetch_array($bookpay1)) {
              $photo_preview = $bookpay["photo_preview"];
            }
          }

          if ($status == "Active") {
            $statusd     = "badge-light-success";
            $btnactivate = "btn-danger";
            $iconState = "bg-success";
            $btnicon     = "fa-lock";
            $actionText = 'Deactivate user';
            $onoff       = "InActive";
          } else {
            $statusd     = "badge-light-danger";
            $btnactivate = "btn-success";
            $iconState = "bg-danger";
            $btnicon     = "fa-lock-open";
            $actionText = 'Activate user';
            $onoff       = "Active";
          }

          $x = $x + '1';
        ?>
          <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td><?php echo $x; ?>.</td>
            <td><?php echo $empuniqid; ?></td>

            <td class="d-flex align-items-center">

              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="#">
                  <div class="symbol-label">
                    <?php
                    if ($bo > 0) {
                    ?>
                      <img src="data:image/png;base64,<?php echo $photo_preview; ?>" class="w-100">
                    <?php
                    } else {
                    ?>
                      <img src="../images/employee/<?php echo $profilepic; ?>" class="w-100">
                    <?php
                    }
                    ?>
                  </div>
                </a>
              </div>

              <div class="d-flex flex-column">
                <a href="#" class="text-gray-800 text-hover-primary mb-1"><?php echo $lname . " " . $mname . " " . $fname; ?></a>
                <span><?php echo $email; ?></span>
              </div>
            </td>

            <td><?php echo $location; ?></td>
            <td><?php echo $department; ?></td>
            <td>
              <span class="badge <?php echo $statusd; ?>">
                <span class="bullet <?= $iconState; ?> me-2 h-5px w-5px"></span> <?php echo $status; ?>
              </span>

            </td>
            <td><?php echo $phone; ?></td>

            <td>
              <a href="#" class="btn  btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-dots-horizontal" style="font-size: 40px;">
                  <span class="path1"></span>
                  <span class="path2"></span>
                  <span class="path3"></span>
                </i>
              </a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item">
                  <a href="" class="menu-link px-3 fw-bold" data-bs-toggle="modal" onclick="viewEmployee(<?php echo $eid; ?>);" data-bs-target="#viewEmployee">View profile</a>
                </div>

                <div class="menu-item">
                  <a href="" class="menu-link px-3 fw-bold" onclick="EditEmployee(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">Edit details</a>
                </div>

                <div class="menu-item">
                  <a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" id="<?php echo $onoff; ?>" class="menu-link px-3 fw-bold" onclick="return confirmActivation(this.id);"><?php echo $actionText; ?></a>
                </div>

                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item">
                  <a href="?did=<?php echo $eid; ?>"" class=" menu-link px-3 text-danger fw-bold" onclick="return confirmDelete();">Delete account</a>
                </div>
                <!--end::Menu item-->
              </div>
              <!--end::Menu-->
            </td>

          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>
  </div><!-- table-wrapper -->
<?php endif; ?>

<?php if ($ct_type == 'grid'): ?>
  <div class="row g-6 mb-6 g-xl-9 mb-xl-9 m-2">

    <?php
    $x        = '0';
    $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain' AND department = '$loggeddepartment' ");
    while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
      $eid            = $huserb1d5["id"];
      $empuniqid      = $huserb1d5["uniqid"];
      $employeeid     = $huserb1d5["employeeid"];
      $fname          = $huserb1d5["fname"];
      $mname          = $huserb1d5["mname"];
      $lname          = $huserb1d5["lname"];
      $email          = $huserb1d5["email"];
      $address        = $huserb1d5["address"];
      $country        = $huserb1d5["country"];
      $state          = $huserb1d5["state"];
      $gender         = $huserb1d5["gender"];
      $phone          = $huserb1d5["phone"];
      $nextofkin      = $huserb1d5["nextofkin"];
      $dofb           = $huserb1d5["dofb"];
      $employmenttype = $huserb1d5["employmenttype"];
      $location1      = $huserb1d5["location"];
      $department1    = $huserb1d5["department"];
      $workshift1     = $huserb1d5["workshift"];
      $uname          = $huserb1d5["uname"];
      $pword          = $huserb1d5["pword"];
      $status         = $huserb1d5["status"];
      $createdby      = $huserb1d5["createdby"];
      $profilepic     = $huserb1d5["profilepic"];

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

      $bookpay1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company='$companyMain'");
      $bo       = mysqli_num_rows($bookpay1);
      if ($bo > 0) {
        while ($bookpay = mysqli_fetch_array($bookpay1)) {
          $photo_preview = $bookpay["photo_preview"];
        }
      }

      if ($status == "Active") {
        $statusd     = "badge-light-success";
        $btnactivate = "btn-danger";
        $iconState = "bg-success";
        $btnicon     = "fa-lock";
        $actionText = 'Deactivate user';
        $onoff       = "InActive";
      } else {
        $statusd     = "badge-light-danger";
        $btnactivate = "btn-success";
        $iconState = "bg-danger";
        $btnicon     = "fa-lock-open";
        $actionText = 'Activate user';
        $onoff       = "Active";
      }

      $x = $x + '1';
    ?>

      <div class="col-md-4 col-xxl-4">
        <div class="card position-relative">
          <!-- Top Controls -->
          <div class="d-flex justify-content-between align-items-center w-100 px-4 pt-3 position-absolute top-0 start-0">
            <div class="d-flex align-items-center">
              <span class="badge <?php echo $statusd; ?>">
                <span class="bullet <?= $iconState; ?> me-2 h-5px w-5px"></span> <?php echo $status; ?>
              </span>
            </div>
            <a href="#" class="btn  btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
              <i class="ki-duotone ki-dots-horizontal" style="font-size: 40px;">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
              </i>
            </a>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
              <!--begin::Menu item-->
              <div class="menu-item">
                <a href="#" class="menu-link px-3 fw-bold">View profile</a>
              </div>

              <div class="menu-item">
                <a href="" class="menu-link px-3 fw-bold" onclick="EditEmployee(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">Edit details</a>
              </div>

              <div class="menu-item">
                <a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" id="<?php echo $onoff; ?>" class="menu-link px-3 fw-bold" onclick="return confirmActivation(this.id);"><?php echo $actionText; ?></a>
              </div>

              <!--end::Menu item-->
              <!--begin::Menu item-->
              <div class="menu-item">
                <a href="?did=<?php echo $eid; ?>"" class=" menu-link px-3 text-danger fw-bold" onclick="return confirmDelete();">Delete account</a>
              </div>
              <!--end::Menu item-->
            </div>
            <!--end::Menu-->
          </div>

          <div class="card-body d-flex flex-center flex-column py-9 px-5 mt-10">
            <div class="symbol symbol-65px symbol-circle mb-5">
              <?php
              if ($bo > 0) {
              ?>
                <img src="data:image/png;base64,<?php echo $photo_preview; ?>">
              <?php
              } else {
              ?>
                <img src="../images/employee/<?php echo $profilepic; ?>">
              <?php
              }
              ?>
              <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
            </div>


            <div class="fw-semibold text-gray-400 mb-6 fw-bold">ID: <?= $empuniqid ?></div>

            <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0"><?= $fname; ?>
              <?= substr(strtoupper($lname), 0, 1); ?>. </a>

            <div class="d-flex flex-center flex-wrap mb-5">
              <div class="rounded min-w-90px py-3 px-4 mx-2 mb-3">

                <div class="fw-semibold text-gray-400"><?= $department; ?></div>
              </div>
            </div>

            <button class="btn btn-sm fs-4 text-muted btn-flex btn-center" data-kt-follow-btn="true">
              <i class="ki-duotone ki-geolocation fs-3">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              <span class="indicator-label"><?= $location; ?></span>

            </button>
          </div>
        </div>
      </div>
    <?php
    }
    ?>

  </div>
<?php endif; ?>


<!-- Viewing User -->
<div id="viewEmployee" class="modal fade effect-newspaper" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary tx-size-xs" form="editemployee2">Save changes</button>
        <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade effect-newspaper" id="addemployeekpi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add KPI Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="addemployee2" action="kpi1.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="addp" value="1">

          <div class="row g-3">
            <!-- Month, Year, KPI Type -->
            <div class="col-md-4">
              <label for="month" class="form-label">End Month <span class="text-danger">*</span></label>
              <select id="month" name="month" class="form-select select2" required>
                <option value="">Choose End Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="year" class="form-label">End Year <span class="text-danger">*</span></label>
              <select id="year" name="year" class="form-select select2" required>
                <option value="">Choose End Year</option>
                <option value="<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></option>
                <option value="<?= date('Y') ?>"><?= date('Y') ?></option>
                <option value="<?= date('Y') + 1 ?>"><?= date('Y') + 1 ?></option>
                <option value="<?= date('Y') + 2 ?>"><?= date('Y') + 2 ?></option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="type" class="form-label">KPI Type <span class="text-danger">*</span></label>
              <select id="type" name="type" class="form-select select2" onchange="show();" required>
                <option value="">Choose KPI</option>
                <option value="Individual">Individual</option>
                <option value="Departmental">Departmental</option>
              </select>
            </div>

            <!-- Dynamic section -->
            <div class="col-12" id="show"></div>

            <!-- Title -->
            <div class="col-md-12">
              <label class="form-label">Title <span class="text-danger">*</span></label>
              <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>

            <!-- Comments -->
            <div class="col-md-12">
              <label class="form-label">Comments</label>
              <textarea name="com" rows="3" class="form-control" placeholder="Comments"></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit employee -->
<div id="editemployee" class="modal fade effect-newspaper" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
  </div>
</div>


<!-- modal -->
</div>
<?php
// BE IN ALL PAGES
include '../auth/admin_footer.php';
?>


<!-- ######################### DEPARTMENT #################################################  -->
<script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>
<script src="../lib/select2/js/select2.min.js"></script>
<script src="../js/ResizeSensor.js"></script>
<script src="../js/map.shiftworker.js"></script>
<script src="../js/dashboard.js"></script>

<script>
  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
  });
</script>

<!-- View Employee Profile -->
<script>
  function viewEmployee(str) {
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
      xmlhttp.open("GET", "viewemployee.php?q=" + str + "&com=" + str2, true);
      xmlhttp.send();
    }
  }
</script>
<!-- View Employee Profile -->


<script>
  function EditEmployee(str) {
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
      xmlhttp.open("GET", "editemployee.php?q=" + str + "&com=" + str2, true);
      xmlhttp.send();
    }
  }
</script>

<script>
  function ChangeState(str) {
    //var str = document.getElementById("country").value;
    if (str.length == 0) {
      document.getElementById("stateid").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("stateid").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "changestate.php?q=" + str, true);
      xmlhttp.send();
    }
  }

  function ChangeStateU(str) {
    //var str = document.getElementById("country").value;
    if (str.length == 0) {
      document.getElementById("stateid2").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("stateid2").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "changestateu.php?q=" + str, true);
      xmlhttp.send();
    }
  }

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
      xmlhttp.open("GET", "kpi1a.php?q=" + str, true);
      xmlhttp.send();
    }
  }

  function show() {
    var str2 = "<?php echo $companyMain; ?>";
    var monthchange = document.getElementById("type");
    var str = monthchange.options[monthchange.selectedIndex].value;
    var dept = "<?php echo $loggeddepartment; ?>";

    if (str.length == 0) {
      document.getElementById("show").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("show").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "kpi1b.php?q=" + str + "&com=" + str2 + "&dept=" + dept, true);
      xmlhttp.send();
    }
  }

  function show2(str) {
    var str2 = "<?php echo $companyMain; ?>";

    if (str.length == 0) {
      document.getElementById("show2").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("show2").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "kpi1c.php?q=" + str, true);
      xmlhttp.send();
    }
  }
</script>

<script>
  $(document).ready(function() {
    'use strict';

    // Initialize DataTable once
    var table = $('#datatable1').DataTable({
      responsive: true,
      language: {
        paginate: {
          previous: '<i class="fa fa-angle-left"></i> Previous',
          next: 'Next <i class="fa fa-angle-right"></i>'
        },
        searchPlaceholder: 'Search...',
        sSearch: '', // Keep empty to not render native input
        lengthMenu: '_MENU_ items/page',
        lengthChange: false, // hides "Show X items" dropdown

      }
    });

    // Bind custom search input
    $('#customTableSearch').on('keyup', function() {
      table.search(this.value).draw();
    });

    // Input Masks
    $('#dateMask').mask('9999-99-99');
    $('#phoneMask').mask('(999) 999-9999');

    // Enhance select dropdown with Select2
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
<!-- ######################### DEPARTMENT JS ENDS #################################################  -->