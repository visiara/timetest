<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];
$companyMain = $_GET['com'];
?>
<input type="hidden" name="assp" value="1">
<?php
if($q=="1"){
?>             
    <div class=" mg-b-20">
      <div class="form-group mg-b-0">
        <label>Leave Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " id="thenodays" name="ltype" data-placeholder="Choose Leave Type" onchange="getNodAYS();" onselect="getNodAYS();" required>
          <option value="">Choose Leave Type</option>
<?php
$intload14=mysqli_query($conn, "SELECT * FROM leavetype WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
while ($intload14a = mysqli_fetch_array($intload14))
{
$inid14 = $intload14a["id"];
$iname14 = $intload14a["name"];
$days14 = $intload14a["days"];
?>
<option title="<?php echo $days14; ?>" value="<?php echo $inid14; ?>"><?php echo "$iname14 ( $days14 days )"; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
<?php
}elseif($q=="2"){
?>    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Exemption Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " id="thenodays" name="etype" data-placeholder="Choose Exemption Type" onchange="getNodAYS();" onselect="getNodAYS();" required>
          <option value="">Choose Exemption Type</option>
<?php
$intload1=mysqli_query($conn, "SELECT * FROM exemptiontype WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
while ($intload1a = mysqli_fetch_array($intload1))
{
$inid1 = $intload1a["id"];
$iname1 = $intload1a["name"];
$days1 = $intload1a["days"];
?>
<option title="<?php echo $days1; ?>" value="<?php echo $inid1; ?>"><?php echo "$iname1 ( $days1 days )"; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
<?php
} 
?>