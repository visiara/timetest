<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM location WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $locationname = $bookpay["locationname"];
  $address = $bookpay["address"];
  $gpslocation = $bookpay["gpslocation"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Location Name: <span class="tx-danger">*</span></label>
        <input type="text" name="locationname" class="form-control" placeholder="Location Name" value="<?php echo $locationname; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Location Address: <span class="tx-danger">*</span></label>
        <input type="text" name="address" class="form-control" placeholder="Location Address" value="<?php echo $address; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>GPS Co-ordinates: <span class="tx-danger">*</span></label>
        <input type="text" name="gpslocation" class="form-control" placeholder="GPS Co-ordinates" value="<?php echo $gpslocation; ?>" required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>