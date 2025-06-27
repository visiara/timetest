<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1=mysqli_query($conn, "SELECT * FROM exemptiontype WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$name = $bookpay["name"];
$days = $bookpay["days"];
$plevely = $bookpay["plevel"];

$hu=mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$plevely'");
while ($hug= mysqli_fetch_array($hu))
{
  $plevel = $hug["levelnick"];
}

}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Exemption Information!</h3>
                          
    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Exemption Name: <span class="tx-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Exemption Name" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Approval Level: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="plevel" data-placeholder="Choose Approval Level" required>
          <option value="<?php echo $plevely; ?>"><?php echo $plevel; ?></option>
<?php
$intload1=mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
while ($intload1a = mysqli_fetch_array($intload1))
{
$inid1 = $intload1a["id"];
$iname1 = $intload1a["levelnick"];
?>
<option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>No of Days: <span class="tx-danger">*</span></label>
        <input type="number" name="days" class="form-control" placeholder="0" min="1" value="<?php echo $days; ?>" required>
      </div><!-- form-group -->
    </div>
                              
                      </div><!-- pd-20 -->
                    </div>