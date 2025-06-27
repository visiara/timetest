<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $fnamey = $bookpay["fname"];
  $mnamey = $bookpay["mname"];
  $lnamey = $bookpay["lname"];
  $emaily = $bookpay["email"];
  $phoney = $bookpay["phone"];
  $gendery = $bookpay["gender"];
  $plevel1y = $bookpay["plevel"];
  $statusy = $bookpay["status"];
  $unamey = $bookpay["uname"];
  $pwordy = $bookpay["pword"];
  $edms = $bookpay["edms"];
  $payroll = $bookpay["payroll"];
  $datacapture = $bookpay["datacapture"];
  $tams = $bookpay["tams"];
  $mainadmin = $bookpay["mainadmin"];
  $profilepicy = $bookpay["profilepic"];
  $companyMain = $bookpay["company"];
  $plevel1yu = $bookpay["user_role"];
  $department4 = $bookpay["department"];

  if ($edms == "1") {
    $edmsy = 'checked';
  } else {
    $edmsy = '';
  }

  if ($payroll == "1") {
    $payrolly = 'checked';
  } else {
    $payrolly = '';
  }

  if ($datacapture == "1") {
    $datacapturey = 'checked';
  } else {
    $datacapturey = '';
  }

  if ($tams == "1") {
    $tamsy = 'checked';
  } else {
    $tamsy = '';
  }

  if ($mainadmin == "1") {
    $mainadminy = 'checked';
  } else {
    $mainadminy = '';
  }

  $hu = mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$plevel1y'");
  while ($hug = mysqli_fetch_array($hu)) {
    $plevellya = $hug["levelnick"];
  }

  $hu2 = mysqli_query($conn, "SELECT * FROM user_roles WHERE id = '$plevel1yu'");
  while ($hugu = mysqli_fetch_array($hu2)) {
    $plevellyau = $hugu["name"];
  }

  $hu2z = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department4'");
  while ($huguz = mysqli_fetch_array($hu2z)) {
    $department4y = $huguz["departmentname"];
  }
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">
<input type="hidden" name="oldpic" value="<?php echo $profilepicy; ?>">
<div class="col-lg-6 ">
  <div class="pd-20 bd-r bd-success">
    <h3 class="tx-inverse mg-b-25">Personal Information</h3>

    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Firstname: <span class="tx-danger">*</span></label>
        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $fnamey; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Middlename: <span class="tx-danger">*</span></label>
        <input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $mnamey; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Lastname: <span class="tx-danger">*</span></label>
        <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lnamey; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Phone: <span class="tx-danger">*</span></label>
        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phoney; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Gender: <span class="tx-danger">*</span></label>
        <select class="form-control select2 wd-100" name="gender" data-placeholder="Choose" required>
          <option value="<?php echo $gendery; ?>"><?php echo $gendery; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div><!-- form-group -->

    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0">
        <label>Email: <span class="tx-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $emaily; ?>" required>
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

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Department: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="department" data-placeholder="Choose Department">
          <option value="<?php echo $department4; ?>"><?php echo $department4y; ?></option>
          <?php
          $intload1 = mysqli_query($conn, "SELECT * FROM departments WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
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
        <label>Admin Level: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="plevel" data-placeholder="Choose Admin Level" required>
          <option value="<?php echo $plevel1y; ?>"><?php echo $plevellya; ?></option>
          <?php
          $intload3 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
          while ($intload3a = mysqli_fetch_array($intload3)) {
            $inid3 = $intload3a["id"];
            $iname3 = $intload3a["levelnick"];
          ?>
            <option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
          <?php
          }
          ?>
        </select>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>User Roles: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="uroles" data-placeholder="Choose User Roles" required>
          <option value="<?php echo $plevel1yu; ?>"><?php echo $plevellyau; ?></option>
          <?php
          $intload3u = mysqli_query($conn, "SELECT * FROM user_roles ORDER BY id asc");
          while ($intload3au = mysqli_fetch_array($intload3u)) {
            $inid3u = $intload3au["id"];
            $iname3u = $intload3au["name"];
          ?>
            <option value="<?php echo $inid3u; ?>"><?php echo $iname3u; ?></option>
          <?php
          }
          ?>
        </select>
      </div><!-- form-group -->
    </div>

    <!-- form-group <div class="mg-b-20">
    <p class="mg-b-10">Grant LogOn Access?</p>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="edms" value="1" <?php echo $edmsy; ?>>
           <span>E Document Management System</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="payroll" value="1" <?php echo $payrolly; ?>>
           <span>Payroll System</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="dcapture" value="1" <?php echo $datacapturey; ?>>
           <span>Data Capture</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="tams" value="1" <?php echo $tamsy; ?>>
           <span>Time and Attendance Management</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="main" value="1" <?php echo $mainadminy; ?>>
           <span>Main Panel</span>
        </label>
      </div>

    </div> -->

    <h3 class="tx-inverse mg-b-15 mg-t-60">Access Information!</h3>

    <div class="d-flex mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $unamey; ?>" readonly required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Password" value="<?php echo $pwordy; ?>" required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div><!-- col-6 -->