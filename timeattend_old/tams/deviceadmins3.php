<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM deviceadmins WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $adminidy = $bookpay["adminid"];
  $deviceidy = $bookpay["deviceid"];
  $location1y = $bookpay["location"];
  $unamey = $bookpay["uname"];
  $pwordy = $bookpay["pword"];

  $huy = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$adminidy' AND company='$companyMain'");
  while ($hugy = mysqli_fetch_array($huy)) {
    $fnamey = $hugy["fname"];
    $mnamey = $hugy["mname"];
    $lnamey = $hugy["lname"];
  }
  $fullname = $lnamey . " " . $mnamey . " " . $fnamey;

  $huy1 = mysqli_query($conn, "SELECT * FROM devices WHERE id = '$deviceidy' AND company='$companyMain'");
  while ($hugy1 = mysqli_fetch_array($huy1)) {
    $deviceidy2 = $hugy1["devicename"];
  }
}
?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">
<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Device: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="device" data-placeholder="Choose Device" required>
          <option value="<?php echo $deviceidy; ?>"><?php echo $deviceidy2; ?></option>
          <?php
          $intload31 = mysqli_query($conn, "SELECT * FROM devices WHERE location = '$location1y' AND dele='0' AND status='Active' AND company='$companyMain' ORDER BY id asc");
          while ($intload31a = mysqli_fetch_array($intload31)) {
            $inid31 = $intload31a["id"];
            $iname31 = $intload31a["devicename"];
          ?>
            <option value="<?php echo $inid31; ?>"><?php echo $iname31; ?></option>
          <?php
          }
          ?>
        </select>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>User: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="employee" data-placeholder="Choose User" required>
          <option value="<?php echo $adminidy; ?>"><?php echo $fullname; ?></option>
          <?php
          $intload32 = mysqli_query($conn, "SELECT * FROM employee WHERE location = '$location1y' AND dele='0' AND status='Active' AND company='$companyMain' ORDER BY id asc");
          while ($intload32a = mysqli_fetch_array($intload32)) {
            $inid32 = $intload32a["id"];
            $iname32 = $intload32a["lname"] . " " . $intload32a["mname"] . " " . $intload32a["fname"];
          ?>
            <option value="<?php echo $inid32; ?>"><?php echo $iname32; ?></option>
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
        <input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $unamey; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Password" value="<?php echo $pwordy; ?>" required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>