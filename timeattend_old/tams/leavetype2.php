<?php
include __DIR__ . "/../includes/config.php"; // go one level up


function getlevel($conn, $lid)
{
  $plevelg = 'None';

  if ($lid != 'None') {
    $hu = mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$lid'");
    while ($hug = mysqli_fetch_array($hu)) {
      $plevelg = $hug["levelnick"];
    }
  }

  return $plevelg;
}

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM leavetype WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $name = $bookpay["name"];
  $days = $bookpay["days"];
  $plevelyd1 = $bookpay["plevel"];
  $plevelyd2 = $bookpay["plevel2"];
  $plevelyd3 = $bookpay["plevel3"];
  $plevelyd4 = $bookpay["plevel4"];

  $plevelnamed1 = getlevel($conn, $plevelyd1);
  $plevelnamed2 = getlevel($conn, $plevelyd2);
  $plevelnamed3 = getlevel($conn, $plevelyd3);
  $plevelnamed4 = getlevel($conn, $plevelyd4);
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <h3 class="tx-inverse mg-b-25">Leave Information!</h3>

    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Leave Name: <span class="tx-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Leave Name" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-info btn-sm" onclick="createInput2();">Add Approval Level</button>
    </div>

    <div id="applevel2">

      <?php if ($plevelyd1 != 'None') {
      ?>
        <div class="form-group mg-b-20-force levelclass2">
          <label>Approval Level 1: <span class="tx-danger">*</span></label>
          <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
            <option value="<?php echo $plevelyd1; ?>"><?php echo $plevelnamed1; ?></option>
            <?php
            $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
            while ($intload1a = mysqli_fetch_array($intload1)) {
              $inid1 = $intload1a["id"];
              $iname1 = $intload1a["levelnick"];
            ?>
              <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      <?php
      } ?>

      <?php if ($plevelyd2 != 'None') {
      ?>
        <div class="form-group mg-b-20-force levelclass2" id="row2">
          <label>Approval Level 2: <span class="tx-danger">*</span></label>

          <div class="input-group">
            <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
              <option value="<?php echo $plevelyd2; ?>"><?php echo $plevelnamed2; ?></option>
              <?php
              $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
              while ($intload1a = mysqli_fetch_array($intload1)) {
                $inid1 = $intload1a["id"];
                $iname1 = $intload1a["levelnick"];
              ?>
                <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
              <?php
              }
              ?>
            </select>
            <div class="input-group-append">
              <button class="btn btn-danger" id="DeleteRow2" type="button">
                Remove
              </button>
            </div>
          </div>

        </div>
      <?php
      } ?>

      <?php if ($plevelyd3 != 'None') {
      ?>
        <div class="form-group mg-b-20-force levelclass2" id="row2">
          <label>Approval Level 3: <span class="tx-danger">*</span></label>

          <div class="input-group">
            <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
              <option value="<?php echo $plevelyd3; ?>"><?php echo $plevelnamed3; ?></option>
              <?php
              $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
              while ($intload1a = mysqli_fetch_array($intload1)) {
                $inid1 = $intload1a["id"];
                $iname1 = $intload1a["levelnick"];
              ?>
                <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
              <?php
              }
              ?>
            </select>
            <div class="input-group-append">
              <button class="btn btn-danger" id="DeleteRow2" type="button">
                Remove
              </button>
            </div>
          </div>

        </div>
      <?php
      } ?>

      <?php if ($plevelyd4 != 'None') {
      ?>
        <div class="form-group mg-b-20-force levelclass2" id="row2">
          <label>Approval Level 4: <span class="tx-danger">*</span></label>

          <div class="input-group">
            <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
              <option value="<?php echo $plevelyd4; ?>"><?php echo $plevelnamed4; ?></option>
              <?php
              $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
              while ($intload1a = mysqli_fetch_array($intload1)) {
                $inid1 = $intload1a["id"];
                $iname1 = $intload1a["levelnick"];
              ?>
                <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
              <?php
              }
              ?>
            </select>
            <div class="input-group-append">
              <button class="btn btn-danger" id="DeleteRow2" type="button">
                Remove
              </button>
            </div>
          </div>

        </div>
      <?php
      } ?>

    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>No of Days: <span class="tx-danger">*</span></label>
        <input type="number" name="days" class="form-control" placeholder="0" min="1" value="<?php echo $days; ?>" required>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div>