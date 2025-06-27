<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];

$bookpay1=mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$levelnick = $bookpay["levelnick"];
}
?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">
<div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>
    <div class="mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>Level Name: <span class="tx-danger">*</span></label>
        <input type="text" name="levelnick" class="form-control" placeholder="Level Name" value="<?php echo $levelnick; ?>" required>
      </div><!-- form-group -->
    </div>
                              
                      </div><!-- pd-20 -->
                    </div>














