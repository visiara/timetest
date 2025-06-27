<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM salary_deduction WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $name = $bookpay["name"];
  $dvalue = $bookpay["dvalue"];
  $salaryscale = $bookpay["salaryscale"];
}

$huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale'");
while ($hugya = mysqli_fetch_array($huya)) {
  $salaryscale3 = $hugya["nickname"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <!--<h3 class="tx-inverse mg-b-25">Organisation Information!</h3>-->

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Name: <span class="tx-danger">*</span></label>
        <input type="text" name="nickname" class="form-control" placeholder="Name" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Amount: <span class="tx-danger">*</span></label>
        <input type="number" name="amount" class="form-control" placeholder="Name" value="<?php echo $dvalue; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Salary Step: <span class="tx-danger">*</span></label>
        <select class="form-control select2 wd-100p" name="salarystep" data-placeholder="Choose" required>
          <option value="<?php echo $salaryscale; ?>"><?php echo $salaryscale3; ?></option>
          <?php
          $huyag = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale'");
          while ($hugyag = mysqli_fetch_array($huyag)) {
            $salaryscale3gid = $hugyag["id"];
            $salaryscale3gnick = $hugyag["nickname"];
          ?>
            <option value="<?php echo $salaryscale3gid; ?>"><?php echo $salaryscale3gnick; ?></option>
          <?php
          }
          ?>
        </select>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>