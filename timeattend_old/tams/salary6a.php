<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM salary_allowance_labels WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $name = $bookpay["name"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <!--<h3 class="tx-inverse mg-b-25">Organisation Information!</h3>-->

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Label: <span class="tx-danger">*</span></label>
        <input type="text" name="nickname" class="form-control" placeholder="Label" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>