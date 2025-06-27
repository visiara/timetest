<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $employeeidy = $bookpay["employeeid"];
  $fnamey = $bookpay["fname"];
  $mnamey = $bookpay["mname"];
  $lnamey = $bookpay["lname"];
  $emaily = $bookpay["email"];
  $addressy = $bookpay["address"];
  $countryy = $bookpay["country"];
  $statey = $bookpay["state"];
  $gendery = $bookpay["gender"];
  $phoney = $bookpay["phone"];
  $nextofkiny = $bookpay["nextofkin"];
  $nextofkinr = $bookpay["nextofkinr"]; // ✅ Add this line


  $dofby = $bookpay["dofb"];
  $employmenttypey1 = $bookpay["employmenttype"];
  $location1y = $bookpay["location"];
  $department1y = $bookpay["department"];
  $workshift1y = $bookpay["workshift"];
  $unamey = $bookpay["uname"];
  $pwordy = $bookpay["pword"];
  $profilepicy = $bookpay["profilepic"];
  $salaryscale2 = $bookpay["salaryscale"];
  $gphone = $bookpay["gphone"];
  $gemail = $bookpay["gemail"];

  $huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
  while ($hugya = mysqli_fetch_array($huya)) {
    $salaryscale3 = $hugya["nickname"];
  }

  $huy = mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1y' AND company='$companyMain'");
  while ($hugy = mysqli_fetch_array($huy)) {
    $locationy = $hugy["locationname"];
  }

  $hu1y = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1y' AND company='$companyMain'");
  while ($hug1y = mysqli_fetch_array($hu1y)) {
    $departmenty = $hug1y["departmentname"];
  }

  $hu2y = mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1y' AND company='$companyMain'");
  while ($hug2y = mysqli_fetch_array($hu2y)) {
    $workshifty = $hug2y["shiftname"];
  }

  $hu3y = mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttypey1'");
  while ($hug3y = mysqli_fetch_array($hu3y)) {
    $employmenttypey = $hug3y["name"];
  }

  $hu2yc = mysqli_query($conn, "SELECT * FROM country WHERE id = '$countryy'");
  while ($hug2yc = mysqli_fetch_array($hu2yc)) {
    $countryyname = $hug2yc["name"];
  }

  $hu3ys = mysqli_query($conn, "SELECT * FROM states WHERE id = '$statey'");
  while ($hug3ys = mysqli_fetch_array($hu3ys)) {
    $stateyname = $hug3ys["name"];
  }
}

?>
<div class="row g-4">
  <!-- Personal Information -->
  <div class="col-12 col-lg-6">
    <input type="hidden" name="theid" value="<?php echo $q; ?>">
    <input type="hidden" name="editp" value="1">
    <input type="hidden" name="oldpic" value="<?php echo $profilepicy; ?>">

    <div class="p-3 border rounded shadow-sm bg-light">
      <h5 class="mb-4 text-primary">Personal Information</h5>

      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Firstname <span class="text-danger">*</span></label>
          <input type="text" name="fname" class="form-control" value="<?php echo $fnamey; ?>" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Middlename</label>
          <input type="text" name="mname" class="form-control" value="<?php echo $mnamey; ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Lastname <span class="text-danger">*</span></label>
          <input type="text" name="lname" class="form-control" value="<?php echo $lnamey; ?>" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" value="<?php echo $phoney; ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
          <input type="date" name="dofb" class="form-control" value="<?php echo $dofby; ?>" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Gender <span class="text-danger">*</span></label>
          <select name="gender" class="form-select" required>
            <option selected value="<?php echo $gendery; ?>"><?php echo $gendery; ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control" value="<?php echo $emaily; ?>" required>
        </div>

        <div class="col-12">
          <label class="form-label">Address <span class="text-danger">*</span></label>
          <input type="text" name="address" class="form-control" value="<?php echo $addressy; ?>" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Next of Kin <span class="text-danger">*</span></label>
          <input type="text" name="nextofkin" class="form-control" value="<?php echo $nextofkiny; ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Next of Kin Relationship <span class="text-danger">*</span></label>
          <input type="text" name="nextofkinr" class="form-control" value="<?php echo $nextofkinr; ?>" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Next of Kin Phone No</label>
          <input type="text" name="gphone" class="form-control" value="<?php echo $gphone; ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Next of Kin Email</label>
          <input type="text" name="gemail" class="form-control" value="<?php echo $gemail; ?>">
        </div>

        <div class="col-12">
          <label class="form-label">Next of Kin Address <span class="text-danger">*</span></label>
          <input type="text" name="kinaddress" class="form-control" value="<?php echo $addressy; ?>" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Country <span class="text-danger">*</span></label>
          <select class="form-select" name="country" id="country2" onchange="ChangeStateU(this.value)" required>
            <option value="<?php echo $countryy; ?>"><?php echo $countryyname; ?></option>
            <?php
            $intload14gb = mysqli_query($conn, "SELECT * FROM country ORDER BY id ASC");
            while ($intload14agb = mysqli_fetch_array($intload14gb)) {
              $inid14gb = $intload14agb["id"];
              $iname14gb = $intload14agb["name"];
              echo "<option value='$inid14gb'>$iname14gb</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-6" id="stateid2">
          <label class="form-label">State <span class="text-danger">*</span></label>
          <select class="form-select" name="state" required>
            <option value="<?php echo $statey; ?>"><?php echo $stateyname; ?></option>
            <?php
            $intload14gb3 = mysqli_query($conn, "SELECT * FROM states WHERE countryid = '$countryy' ORDER BY id ASC");
            while ($intload14agb3 = mysqli_fetch_array($intload14gb3)) {
              $inid14gb3 = $intload14agb3["id"];
              $iname14gb3 = $intload14agb3["name"];
              echo "<option value='$inid14gb3'>$iname14gb3</option>";
            }
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Organisation Information -->
  <div class="col-12 col-lg-6">
    <div class="p-3 border rounded shadow-sm bg-light">
      <h5 class="mb-4 text-primary">Organisation Information</h5>

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">User ID <span class="text-danger">*</span></label>
          <input type="text" name="employeeid" class="form-control" value="<?php echo $employeeidy; ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Employment Type <span class="text-danger">*</span></label>
          <select class="form-select" name="employmenttype" required>
            <option value="<?php echo $employmenttypey1; ?>"><?php echo $employmenttypey; ?></option>
            <?php
            $types = mysqli_query($conn, "SELECT * FROM employmenttype ORDER BY id ASC");
            while ($type = mysqli_fetch_array($types)) {
              echo "<option value='{$type['id']}'>{$type['name']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-12">
          <label class="form-label">Salary Scale</label>
          <select class="form-select" name="salary">
            <option value="<?php echo $salaryscale2; ?>"><?php echo $salaryscale3; ?></option>
            <?php
            $scales = mysqli_query($conn, "SELECT * FROM salaryscale WHERE company='$companyMain' ORDER BY id ASC");
            while ($scale = mysqli_fetch_array($scales)) {
              echo "<option value='{$scale['id']}'>{$scale['nickname']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Department <span class="text-danger">*</span></label>
          <select class="form-select" name="department" required>
            <option value="<?php echo $department1y; ?>"><?php echo $departmenty; ?></option>
            <?php
            $deps = mysqli_query($conn, "SELECT * FROM departments WHERE status='Active' AND dele='0' AND company='$companyMain'");
            while ($dep = mysqli_fetch_array($deps)) {
              echo "<option value='{$dep['id']}'>{$dep['departmentname']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Work Schedule <span class="text-danger">*</span></label>
          <select class="form-select" name="workshift" required>
            <option value="<?php echo $workshift1y; ?>"><?php echo $workshifty; ?></option>
            <?php
            $shifts = mysqli_query($conn, "SELECT * FROM workshift WHERE status='Active' AND dele='0' AND company='$companyMain'");
            while ($shift = mysqli_fetch_array($shifts)) {
              echo "<option value='{$shift['id']}'>{$shift['shiftname']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label">Location <span class="text-danger">*</span></label>
          <select class="form-select" name="location" required>
            <option value="<?php echo $location1y; ?>"><?php echo $locationy; ?></option>
            <?php
            $locs = mysqli_query($conn, "SELECT * FROM location WHERE status='Active' AND dele='0' AND company='$companyMain'");
            while ($loc = mysqli_fetch_array($locs)) {
              echo "<option value='{$loc['id']}'>{$loc['locationname']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Username <span class="text-danger">*</span></label>
          <input type="text" name="uname" class="form-control" value="<?php echo $unamey; ?>" readonly required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Password <span class="text-danger">*</span></label>
          <input type="text" name="pword" class="form-control" value="<?php echo $pwordy; ?>" required>
        </div>
      </div>
    </div>
  </div>
</div>