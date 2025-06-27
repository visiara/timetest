<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];
?>
<div class=" mg-b-20">
  <div class="form-group mg-b-0-force">
    <label>Device: <span class="tx-danger">*</span></label>
    <select class="form-control select2 " name="device" data-placeholder="Choose Device" required>
      <option value="">Choose Device</option>
      <?php
      $intload31 = mysqli_query($conn, "SELECT * FROM devices WHERE location = '$q' AND dele='0' AND status='Active' AND company='$companyMain' ORDER BY id asc");
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
      <option value="">Choose User</option>
      <?php
      $intload32 = mysqli_query($conn, "SELECT * FROM employee WHERE location = '$q' AND dele='0' AND status='Active' AND company='$companyMain' ORDER BY id asc");
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