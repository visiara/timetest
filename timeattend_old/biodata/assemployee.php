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
      <div class="form-group mg-b-0-force">
        <label>Employment Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="employmenttype" data-placeholder="Choose Employment Type" required>
          <option value="">Choose Employment Type</option>
<?php
$intload14=mysqli_query($conn, "SELECT * FROM employmenttype ORDER BY id asc");
while ($intload14a = mysqli_fetch_array($intload14))
{
$inid14 = $intload14a["id"];
$iname14 = $intload14a["name"];
?>
<option value="<?php echo $inid14; ?>"><?php echo $iname14; ?></option>
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
        <label>Department: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="department" data-placeholder="Choose Department" required>
          <option value="">Choose Department</option>
<?php
$intload1=mysqli_query($conn, "SELECT * FROM departments WHERE company='$companyMain' ORDER BY id asc");
while ($intload1a = mysqli_fetch_array($intload1))
{
$inid1 = $intload1a["id"];
$iname1 = $intload1a["departmentname"];
?>
<option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
<?php
}elseif($q=="3"){ 
?>  
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Work Schedule: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="workshift" data-placeholder="Choose Work Schedule" required>
          <option value="">Choose Work Schedule</option>
<?php
$intload2=mysqli_query($conn, "SELECT * FROM workshift WHERE company='$companyMain' ORDER BY id asc");
while ($intload2a = mysqli_fetch_array($intload2))
{
$inid2 = $intload2a["id"];
$iname2 = $intload2a["shiftname"];
?>
<option value="<?php echo $inid2; ?>"><?php echo $iname2; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
<?php
}elseif($q=="4"){  
?>  
    <div class=" mg-b-40">
      <div class="form-group mg-b-0-force">
        <label>Location: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="location" data-placeholder="Choose Location" required>
          <option value="">Choose Location</option>
<?php
$intload3=mysqli_query($conn, "SELECT * FROM location WHERE company='$companyMain' ORDER BY id asc");
while ($intload3a = mysqli_fetch_array($intload3))
{
$inid3 = $intload3a["id"];
$iname3 = $intload3a["locationname"];
?>
<option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
<?php
}elseif($q=="5"){  
  ?>  
      <div class=" mg-b-40">
        <div class="form-group mg-b-0-force">
          <label>Salary Scale: <span class="tx-danger">*</span></label>
          <select class="form-control select2 " name="sal" data-placeholder="Choose Salary Scale" required>
            <option value="">Choose Salary Scale</option>
  <?php
  $intload3=mysqli_query($conn, "SELECT * FROM salaryscale WHERE company='$companyMain' AND status='Active' ORDER BY id asc");
  while ($intload3a = mysqli_fetch_array($intload3))
  {
  $inid3 = $intload3a["id"];
  $iname3 = $intload3a["nickname"];
  ?>
  <option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
  <?php
  }
  ?>
          </select>
        </div><!-- form-group -->
      </div>
  <?php
  }
?>