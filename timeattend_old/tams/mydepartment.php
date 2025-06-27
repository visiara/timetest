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

// include "" . __DIR__ . "/rightSidebar.php";
include("" . __DIR__ . "/pageName.php");



?>

<?php echo $status; ?>



<div class="card-header mt-6 row-auto text-end">

  .
  <div class="card-toolbar">
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

      <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <i class="ki-duotone ki-filter fs-2">
          <span class="path1"></span>
          <span class="path2"></span>
        </i>
        Filter
      </button>


      <div class="d-flex align-items-center mx-5 position-relative my-1 me-5">
        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
          <span class="path1"></span>
          <span class="path2"></span>
        </i>
        <input id="customTableSearch" type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search..." />
      </div>

    </div>



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




  </div>
  <!--end::Card toolbar-->
</div>

<?php if ($ct_type == 'list' || !$ct_type): ?>
  <div class="table-responsive mg-t-15 container">
    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
      <thead class="thead-colored thead-dark">
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ml-30">S/N</th>
          <th>Unique ID</th>
          <th>Full name</th>
          <th>Location</th>
          <th>Department</th>
          <th>Status</th>
          <th>Phone No</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-600">
        <?php
        $x = 0;
        $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company = '$companyMain' AND department = '$loggeddepartment'");
        while ($emp = mysqli_fetch_array($huserbd5)) {
          $eid               = $emp["id"];
          $empuniqid         = $emp["uniqid"];
          $employeeid        = $emp["employeeid"];
          $fname             = $emp["fname"];
          $mname             = $emp["mname"];
          $lname             = $emp["lname"];
          $email             = $emp["email"];
          $address           = $emp["address"];
          $country_id        = $emp["country"];
          $state             = $emp["state"];
          $gender            = $emp["gender"];
          $phone             = $emp["phone"];
          $nextofkin         = $emp["nextofkin"];
          $dofb              = $emp["dofb"];
          $employmenttype_id = $emp["employmenttype"];
          $location_id       = $emp["location"];
          $department_id     = $emp["department"];
          $workshift_id      = $emp["workshift"];
          $uname             = $emp["uname"];
          $pword             = $emp["pword"];
          $status            = $emp["status"];
          $createdby         = $emp["createdby"];
          $profilepic        = $emp["profilepic"];

          $location       = $getval("SELECT locationname FROM location WHERE id = '$location_id' AND company = '$companyMain'")['locationname'] ?? '';
          $mainCountry    = $getval("SELECT name FROM country WHERE id = '$country_id'")['name'] ?? '';
          $department     = $getval("SELECT departmentname FROM departments WHERE id = '$department_id' AND company = '$companyMain'")['departmentname'] ?? '';
          $workshift      = $getval("SELECT shiftname FROM workshift WHERE id = '$workshift_id' AND company = '$companyMain'")['shiftname'] ?? '';
          $employmenttype = $getval("SELECT name FROM employmenttype WHERE id = '$employmenttype_id'")['name'] ?? '';

          $bo = 0;
          $photo_preview = '';
          $res = mysqli_query($conn, "SELECT photo_preview FROM photos WHERE applicant_id = '$employeeid' AND company = '$companyMain'");
          $bo = mysqli_num_rows($res);
          if ($bo > 0) {
            $photo_preview = mysqli_fetch_assoc($res)["photo_preview"];
          }

          $statusd     = ($status == "Active") ? "badge-light-success" : "badge-light-danger";
          $btnactivate = ($status == "Active") ? "btn-danger" : "btn-success";
          $iconState   = ($status == "Active") ? "bg-success fw-bold" : "bg-danger fw-bold";
          $btnicon     = ($status == "Active") ? "fa-lock" : "fa-lock-open";
          $actionText  = ($status == "Active") ? "Deactivate user" : "Activate user";
          $onoff       = ($status == "Active") ? "InActive" : "Active";

          $x++;
        ?>
          <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td><?= $x ?>.</td>
            <td><?= $empuniqid ?></td>
            <td class="d-flex align-items-center">
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="#">
                  <div class="symbol-label">
                    <?php if ($bo > 0): ?>
                      <img src="data:image/png;base64,<?= $photo_preview ?>" class="w-100">
                    <?php else: ?>
                      <img src="../images/employee/<?= $profilepic ?>" class="w-100">
                    <?php endif; ?>
                  </div>
                </a>
              </div>
              <div class="d-flex flex-column">
                <a href="#" class="text-gray-800 text-hover-primary mb-1"><?= $lname . " " . $mname . " " . $fname ?></a>
                <span><?= $email ?></span>
              </div>
            </td>
            <td><?= $location ?></td>
            <td><?= $department ?></td>
            <td>
              <span class="badge <?= $statusd ?>">
                <span class="bullet <?= $iconState ?> me-2 h-5px w-5px fw-bold"></span> <?= $status ?>
              </span>
            </td>
            <td><?= $phone ?></td>
            <td>
              <a href="#" class="btn btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-dots-horizontal" style="font-size: 40px;">
                  <span class="path1"></span>
                  <span class="path2"></span>
                  <span class="path3"></span>
                </i>
              </a>
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <div class="menu-item"><a href="#" class="menu-link px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal<?= $eid ?>">View profile</a></div>
                <div class="menu-item"><a href="" class="menu-link px-3 fw-bold" onclick="EditEmployee(<?= $eid ?>);" data-toggle="modal" data-target="#editemployee">Edit details</a></div>
                <div class="menu-item"><a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="menu-link px-3 fw-bold" onclick="return confirmActivation(this.id);"><?= $actionText ?></a></div>
                <div class="menu-item"><a href="?did=<?= $eid ?>" class="menu-link px-3 text-danger fw-bold" onclick="return confirmDelete();">Delete account</a></div>
              </div>
            </td>
          </tr>

          <!-- Modal for View -->
          <div class="modal fade" id="viewEmployeeModal<?= $eid ?>" tabindex="-1" aria-labelledby="viewUserModalLabel<?= $eid ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content rounded-4 p-4">
                <div class="modal-header border-0 pb-0">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="text-center mb-4">
                    <center>

                      <img src="../images/employee/<?= $profilepic ?>" class="rounded-circle mb-2" width="100" height="100" alt="User Avatar">
                    </center>
                    <h4 class="fw-bold mb-0"><?= $lname . " " . $mname . " " . $fname ?></h4>
                    <small class="text-muted"><?= $employmenttype ?></small>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Unique ID</strong><span><?= $empuniqid ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Location</strong><span><?= $location ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Department</strong><span class="badge bg-light text-dark"><?= $department ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Account Status</strong><span class="badge <?= $status == 'Active' ? 'bg-success' : 'bg-danger' ?> text-white">● <?= $status ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Phone number</strong><span><?= $phone ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Work schedule</strong><span><?= $workshift ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Gender</strong><span><?= $gender ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Email</strong><span><?= $email ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Address</strong><span><?= $address ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">State</strong><span><?= $state ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Country</strong><span><?= $mainCountry ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Employment type</strong><span><?= $employmenttype ?></span></div>
                    <div class="col-md-6 mb-3"><strong class="text-muted d-block">Date of Birth</strong><span><?= $dofb ?></span></div>
                    <div class="col-md-6 mb-3 d-flex align-items-center"><img src="https://i.pravatar.cc/30" class="rounded-circle me-2" width="30" height="30"><span class="text-muted small"><?= $createdby ?></span></div>
                  </div>
                  <div class="d-grid gap-2">
                    <button class="btn btn-light-primary">View Basic Information</button>
                    <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-light-danger" onclick="return confirmActivation(this.id);">Deactivate User</a>
                    <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-danger" onclick="return confirmDelete(this.id);">Delete User Account</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>


<?php if ($ct_type == 'grid'): ?>
  <div class="row g-6 mb-6 g-xl-9 mb-xl-9 m-2">
    <?php
    $x = 0;
    $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company = '$companyMain' AND department = '$loggeddepartment'");
    while ($emp = mysqli_fetch_array($huserbd5)) {
      $eid               = $emp["id"];
      $empuniqid         = $emp["uniqid"];
      $employeeid        = $emp["employeeid"];
      $fname             = $emp["fname"];
      $mname             = $emp["mname"];
      $lname             = $emp["lname"];
      $email             = $emp["email"];
      $address           = $emp["address"];
      $country_id        = $emp["country"];
      $state             = $emp["state"];
      $gender            = $emp["gender"];
      $phone             = $emp["phone"];
      $nextofkin         = $emp["nextofkin"];
      $dofb              = $emp["dofb"];
      $employmenttype_id = $emp["employmenttype"];
      $location_id       = $emp["location"];
      $department_id     = $emp["department"];
      $workshift_id      = $emp["workshift"];
      $uname             = $emp["uname"];
      $pword             = $emp["pword"];
      $status            = $emp["status"];
      $createdby         = $emp["createdby"];
      $profilepic        = $emp["profilepic"];

      // Safe fallback for all lookups
      $getval = fn($query) => mysqli_fetch_assoc(mysqli_query($conn, $query)) ?? [];

      $location       = $getval("SELECT locationname FROM location WHERE id = '$location_id' AND company = '$companyMain'")['locationname'] ?? '';
      $mainCountry    = $getval("SELECT name FROM country WHERE id = '$country_id'")['name'] ?? '';
      $department     = $getval("SELECT departmentname FROM departments WHERE id = '$department_id' AND company = '$companyMain'")['departmentname'] ?? '';
      $workshift      = $getval("SELECT shiftname FROM workshift WHERE id = '$workshift_id' AND company = '$companyMain'")['shiftname'] ?? '';
      $employmenttype = $getval("SELECT name FROM employmenttype WHERE id = '$employmenttype_id'")['name'] ?? '';

      $bo = 0;
      $photo_preview = '';
      $res = mysqli_query($conn, "SELECT photo_preview FROM photos WHERE applicant_id = '$employeeid' AND company = '$companyMain'");
      $bo = mysqli_num_rows($res);
      if ($bo > 0) {
        $photo_preview = mysqli_fetch_assoc($res)["photo_preview"];
      }

      $statusd     = ($status == "Active") ? "badge-light-success" : "badge-light-danger";
      $btnactivate = ($status == "Active") ? "btn-danger" : "btn-success";
      $iconState   = ($status == "Active") ? "bg-success" : "bg-danger";
      $btnicon     = ($status == "Active") ? "fa-lock" : "fa-lock-open";
      $actionText  = ($status == "Active") ? "Deactivate user" : "Activate user";
      $onoff       = ($status == "Active") ? "InActive" : "Active";

      $x++;
    ?>

      <div class="col-md-4 col-xxl-4">
        <div class="card position-relative shadow-lg border border-primary-subtle rounded-4 bg-white">
          <!-- Top Controls -->
          <div class="d-flex justify-content-between align-items-center w-100 px-4 pt-3 position-absolute top-0 start-0 z-1">
            <span class="badge <?= $statusd ?>">
              <span class="bullet <?= $iconState ?> me-2 h-5px w-5px"></span> <?= $status ?>
            </span>
            <div class="dropdown">
              <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical fs-4"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                  <a href="#" class="dropdown-item fw-semibold" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal<?= $eid ?>">
                    View profile
                  </a>
                </li>
                <li><a href="#" class="dropdown-item fw-semibold" onclick="EditEmployee(<?= $eid ?>);" data-bs-toggle="modal" data-bs-target="#editemployee">Edit details</a></li>
                <li><a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="dropdown-item fw-semibold" onclick="return confirmActivation(this.id);"><?= $actionText ?></a></li>
                <li><a href="?did=<?= $eid ?>" class="dropdown-item text-danger fw-semibold" onclick="return confirmDelete();">Delete account</a></li>
              </ul>
            </div>
          </div>

          <div class="card-body d-flex flex-column align-items-center pt-5 px-4 pb-4 mt-5">
            <!-- Profile Image -->
            <div class="position-relative mb-4">
              <div class="symbol symbol-65px symbol-circle overflow-hidden">
                <?php if ($bo > 0): ?>
                  <img src="data:image/png;base64,<?= $photo_preview ?>" class="img-fluid" alt="User">
                <?php else: ?>
                  <img src="../images/employee/<?= $profilepic ?>" class="img-fluid" alt="User">
                <?php endif; ?>
              </div>
              <span class="position-absolute translate-middle p-1 bg-success border border-light rounded-circle top-100 start-100"></span>
            </div>

            <!-- ID -->
            <div class="text-muted fw-semibold mb-2">ID: <?= $empuniqid ?></div>

            <!-- Name -->
            <a href="#" class="fs-4 fw-bold text-dark text-decoration-none mb-2">
              <?= $fname ?> <?= strtoupper(substr($lname, 0, 1)) ?>.
            </a>

            <!-- Department -->
            <div class="bg-light text-primary fw-semibold rounded px-3 py-1 mb-3">
              <?= $department ?>
            </div>

            <!-- Location -->
            <button class="btn btn-outline-secondary btn-sm px-3 d-flex align-items-center gap-2">
              <i class="bi bi-geo-alt-fill fs-5"></i>
              <span><?= $location ?></span>
            </button>
          </div>
        </div>

      </div>

      <!-- View Employee Modal -->

      <div class="modal fade" id="viewEmployeeModal<?= $eid ?>" tabindex="-1" aria-labelledby="viewUserModalLabel<?= $eid ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content rounded-4 p-4">
            <div class="modal-header border-0 pb-0">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="text-center mb-4">
                <center>

                  <img src="../images/employee/<?= $profilepic ?>" class="rounded-circle mb-2" width="100" height="100" alt="User Avatar">
                </center>
                <h4 class="fw-bold mb-0"><?= $lname . " " . $mname . " " . $fname; ?></h4>
                <small class="text-muted"><?= $employmenttype ?></small>
              </div>

              <div class="row mb-4">
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Unique ID</strong>
                  <span><?= $empuniqid ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Location</strong>
                  <span><?= $location ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Department</strong>
                  <span class="badge bg-light text-dark"><?= $department ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Account Status</strong>
                  <span class="badge <?= $status == 'Active' ? 'bg-success' : 'bg-danger' ?> text-white">● <?= $status ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Phone number</strong>
                  <span><?= $phone ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Work schedule</strong>
                  <span><?= $workshift ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Gender</strong>
                  <span><?= $gender ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Email</strong>
                  <span><?= $email ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Address</strong>
                  <span><?= $address ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">State</strong>
                  <span><?= $state ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Country</strong>
                  <span><?= $mainCountry ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Employment type</strong>
                  <span><?= $employmenttype ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <strong class="text-muted d-block">Date of Birth</strong>
                  <span><?= $dofb ?></span>
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-center">
                  <img src="https://i.pravatar.cc/30" class="rounded-circle me-2" width="30" height="30" alt="Creator">
                  <span class="text-muted small"><?= $createdby ?></span>
                </div>
              </div>

              <div class="d-grid gap-2">

                <button class="btn btn-light-primary">View Basic Information</button>

                <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-light-danger" onclick="return confirmActivation(this.id);">Deactivate User</a>

                <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-danger" onclick="return confirmDelete(this.id);">Delete User Account</a>


              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>

  </div>
<?php endif; ?>




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
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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