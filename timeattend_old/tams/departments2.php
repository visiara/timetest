<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $locationname = $bookpay["departmentname"];
  $adminhead = $bookpay["adminhead"];
}

$bookpay12 = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$adminhead'");
while ($bookpay2 = mysqli_fetch_array($bookpay12)) {
  $fname = $bookpay2["fname"];
  $mname = $bookpay2["mname"];
  $lname = $bookpay2["lname"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Department Name: <span class="tx-danger">*</span></label>
        <input type="text" name="departmentname" class="form-control" placeholder="Department Name" value="<?php echo $locationname; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Departmental Head: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="uroles" data-placeholder="Choose Departmental Head" required>
          <option value="<?php echo $adminhead; ?>"><?php echo "$fname $mname $lname"; ?></option>
          <?php
          $intload3u = mysqli_query($conn, "SELECT * FROM admins WHERE user_role = '3' AND company='$companyMain' ORDER BY id asc");
          while ($intload3au = mysqli_fetch_array($intload3u)) {
            $inid3u = $intload3au["id"];
            $iname3u1 = $intload3au["fname"];
            $iname3u2 = $intload3au["mname"];
            $iname3u3 = $intload3au["lname"];
          ?>
            <option value="<?php echo $inid3u; ?>"><?php echo "$iname3u1 $iname3u2 $iname3u3"; ?></option>
          <?php
          }
          ?>
        </select>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>