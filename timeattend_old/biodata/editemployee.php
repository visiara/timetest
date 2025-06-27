<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1=mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$employeeidy = $bookpay["employeeid"];
$fnamey = $bookpay["fname"];
$mnamey = $bookpay["mname"];
$lnamey = $bookpay["lname"];
$emaily = $bookpay["email"];
$addressy = $bookpay["address"];
$countryy = $bookpay["country"];
$statey = $bookpay["state"];
$gendery = $bookpay["gender"];
$phoney = $bookpay["phone"];
$nextofkiny = $bookpay["nextofkin"];
$dofby = $bookpay["dofb"];
$employmenttypey1 = $bookpay["employmenttype"];
$location1y = $bookpay["location"];
$department1y = $bookpay["department"];
$workshift1y = $bookpay["workshift"];
$unamey = $bookpay["uname"];
$pwordy = $bookpay["pword"];
$profilepicy = $bookpay["profilepic"];
$salaryscale2 = $bookpay["salaryscale"];

$huya=mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
while ($hugya = mysqli_fetch_array($huya))
{
  $salaryscale3 = $hugya["nickname"];
}

$huy=mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1y' AND company='$companyMain'");
while ($hugy= mysqli_fetch_array($huy))
{
  $locationy = $hugy["locationname"];
}

$hu1y=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1y' AND company='$companyMain'");
while ($hug1y= mysqli_fetch_array($hu1y))
{
  $departmenty = $hug1y["departmentname"];
}

$hu2y=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1y' AND company='$companyMain'");
while ($hug2y= mysqli_fetch_array($hu2y))
{
  $workshifty = $hug2y["shiftname"];
}

$hu3y=mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttypey1'");
while ($hug3y= mysqli_fetch_array($hu3y))
{
  $employmenttypey = $hug3y["name"];
}

$hu2yc=mysqli_query($conn, "SELECT * FROM country WHERE id = '$countryy'");
while ($hug2yc= mysqli_fetch_array($hu2yc))
{
  $countryyname = $hug2yc["name"];
}

$hu3ys=mysqli_query($conn, "SELECT * FROM states WHERE id = '$statey'");
while ($hug3ys = mysqli_fetch_array($hu3ys))
{
  $stateyname = $hug3ys["name"];
}

}

?>
<div class="col-lg-6 ">
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">
<input type="hidden" name="oldpic" value="<?php echo $profilepicy; ?>">

                      <div class="pd-20 bd-r bd-success">
                        <h3 class="tx-inverse mg-b-25">Personal Information</h3>
                        
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Firstname: <span class="tx-danger">*</span></label>
        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $fnamey; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Middlename: </label>
        <input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $mnamey; ?>">
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Lastname: <span class="tx-danger">*</span></label>
        <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lnamey; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Phone: <span class="tx-danger">*</span></label>
        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phoney; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Date of Birth: <span class="tx-danger">*</span></label>
        <input type="date" name="dofb" class="form-control fc-datepicker" id="dateMask2" value="<?php echo $dofby; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Gender: <span class="tx-danger">*</span></label>
<select class="form-control select2 wd-100" name="gender" data-placeholder="Choose" required>
  <option value="<?php echo $gendery; ?>"><?php echo $gendery; ?></option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Email: <span class="tx-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $emaily; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Next of Kin: <span class="tx-danger">*</span></label>
        <input type="text" name="nextofkin" class="form-control" data-placeholder="Next of Kin" value="<?php echo $nextofkiny; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Address: <span class="tx-danger">*</span></label>
        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $addressy; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">

      <div class="form-group mg-b-0">
        <label>Country: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="country" id="country2" data-placeholder="Choose Country" onchange="ChangeStateU(this.value)" required>
          <option value="<?php echo $countryy; ?>"><?php echo $countryyname; ?></option>
<?php
$intload14gb=mysqli_query($conn, "SELECT * FROM country ORDER BY id asc");
while ($intload14agb = mysqli_fetch_array($intload14gb))
{
$inid14gb = $intload14agb["id"];
$iname14gb = $intload14agb["name"];
?>
<option value="<?php echo $inid14gb; ?>"><?php echo $iname14gb; ?></option>
<?php
}
?>
        </select>

      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10" id="stateid2">
        <label>State: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="state" data-placeholder="Choose State" required>
          <option value="<?php echo $statey; ?>"><?php echo $stateyname; ?></option>
<?php
$intload14gb3=mysqli_query($conn, "SELECT * FROM states WHERE countryid = '$countryy' ORDER BY id asc");
while ($intload14agb3 = mysqli_fetch_array($intload14gb3))
{
$inid14gb3 = $intload14agb3["id"];
$iname14gb3 = $intload14agb3["name"];
?>
<option value="<?php echo $inid14gb3; ?>"><?php echo $iname14gb3; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-0">
      <div class="form-group mg-b-0-force">
      <label>Profile Picture: </label>
<div class="custom-file">
  <input type="file" id="file" name="filename" class="custom-file-input">
  <label class="custom-file-label"></label>
</div>
      </div><!-- form-group -->
    </div>
                        
                        
                      </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>
                          
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Employee ID: <span class="tx-danger">*</span></label>
        <input type="text" name="employeeid" class="form-control" placeholder="Employee ID" value="<?php echo $employeeidy; ?>" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0">
        <label>Employment Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="employmenttype" data-placeholder="Choose" required>
          <option value="<?php echo $employmenttypey1; ?>"><?php echo $employmenttypey; ?></option>
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

    <div class=" mg-b-20">
      <div class="form-group mg-b-0">
        <label>Salary Scale: </label>
        <select class="form-control select2 " name="salary" data-placeholder="Choose" disabled>
          <option value="<?php echo $salaryscale2; ?>"><?php echo $salaryscale3; ?></option>
<?php
$intload14h=mysqli_query($conn, "SELECT * FROM salaryscale WHERE company='$companyMain' ORDER BY id asc");
while ($intload14ah = mysqli_fetch_array($intload14h))
{
$inid14h = $intload14ah["id"];
$iname14h = $intload14ah["nickname"];
?>
<option value="<?php echo $inid14h; ?>"><?php echo $iname14h; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Department: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="department" data-placeholder="Choose Department" required>
          <option value="<?php echo $department1y; ?>"><?php echo $departmenty; ?></option>
<?php
$intload1=mysqli_query($conn, "SELECT * FROM departments WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
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
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Work Schedule: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="workshift" data-placeholder="Choose Work Schedule" required>
          <option value="<?php echo $workshift1y; ?>"><?php echo $workshifty; ?></option>
<?php
$intload2=mysqli_query($conn, "SELECT * FROM workshift WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
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
    
    <div class=" mg-b-40">
      <div class="form-group mg-b-0-force">
        <label>Location: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="location" data-placeholder="Choose Location" required>
          <option value="<?php echo $location1y; ?>"><?php echo $locationy; ?></option>
<?php
$intload3=mysqli_query($conn, "SELECT * FROM location WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
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
    
    <h3 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h3>
    
    <div class="d-flex mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="Employee Username" value="<?php echo $unamey; ?>" readonly required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Employee Password" value="<?php echo $pwordy; ?>" required>
      </div><!-- form-group -->
    </div>
                              
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
