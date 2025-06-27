<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $salarystep = $bookpay["salarystep"];
  $nickname = $bookpay["nickname"];
  $description = $bookpay["description"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <!--<h3 class="tx-inverse mg-b-25">Organisation Information!</h3>-->

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Nick Name: <span class="tx-danger">*</span></label>
        <input type="text" name="nickname" class="form-control" placeholder="Nick Name" value="<?php echo $nickname; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Description: <span class="tx-danger">*</span></label>
        <input type="text" name="description" class="form-control" placeholder="Description" value="<?php echo $description; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Salary Step: <span class="tx-danger">*</span></label>
        <input type="number" name="salarystep" class="form-control" placeholder="Salary Step" min="0" step="1" value="<?php echo $salarystep; ?>" readonly required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>