<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];

$bookpay1=mysqli_query($conn, "SELECT * FROM company WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$locationname = $bookpay["companyname"];

$comstartdate1 = $bookpay["startdate"];
$comenddate1 = $bookpay["enddate"];
$comregdate1 = $bookpay["regdate"];
$comaddress = $bookpay["comaddress"];
$comephone = $bookpay["comephone"];
$comemail = $bookpay["comemail"];
$comref = $bookpay["compref"];
$masterkpi1 = $bookpay["masterkpi"];
$mastersalary1 = $bookpay["mastersalary"];
}

$comstartdate = date("Y-m-d", $comstartdate1);
$comenddate = date("Y-m-d", $comenddate1);
$comregdate = date("Y-m-d", $comregdate1);

if($masterkpi1 == "1"){
  $masterkpi = "checked";
  }else{
  $masterkpi = "";
}
if($mastersalary1 == "1"){
  $mastersalary = "checked";
  }else{
  $mastersalary = "0";
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>
                          
    <div class=" mg-b-20">
      <div class="row mg-b-20">
        <div class="form-group mg-b-0 col-md-8">
           <label>Company Name: <span class="tx-danger">*</span></label>
           <input type="text" name="companyname" class="form-control" placeholder="Company Name" value="<?php echo $locationname; ?>" required>
        </div><!-- form-group -->
        <div class="form-group mg-b-0 col-md-4">
           <label>Prefix: <span class="tx-danger">*</span></label>
           <input type="text" name="pref" class="form-control" placeholder=".eg (VL)" value="<?php echo $comref; ?>" required>
        </div><!-- form-group -->
      </div>
      <div class="form-group mg-b-20-force">
        <label>Address: <span class="tx-danger">*</span></label>
        <input type="text" name="companyaddress" class="form-control" placeholder="Address" value="<?php echo $comaddress; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-20-force">
        <label>Phone Number: <span class="tx-danger">*</span></label>
        <input type="text" name="companyphone" class="form-control" placeholder="Phone Number" value="<?php echo $comephone; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-20-force">
        <label>Email Address: <span class="tx-danger">*</span></label>
        <input type="email" name="companyemail" class="form-control" placeholder="Email Address" value="<?php echo $comemail; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-20-force">
        <label>Start Date: <span class="tx-danger">*</span></label>
        <input type="date" name="startdate" class="form-control" placeholder="Start Date" value="<?php echo $comstartdate; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0-force">
        <label>End Date: <span class="tx-danger">*</span></label>
        <input type="date" name="enddate" class="form-control" placeholder="End Date" value="<?php echo $comenddate; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class="mg-b-20">
    <p class="mg-b-10">Enable Salary Management Modules?</p>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="salay" value="1" <?php echo $mastersalary; ?>>
           <span>Enable Attendance Module</span>
        </label>
      </div><!-- form-group -->
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="kpiy" value="1" <?php echo $masterkpi; ?>>
           <span>Enable KPI Module</span>
        </label>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div>