<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(!empty($_GET['activate'])){
$h = $_GET['activate'];
$id = $_GET['id'];
   $notec13=mysqli_query($conn, "UPDATE admins SET status = '$h' WHERE id = '$id'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Status Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_GET['did'])){
$h3 = $_GET['did'];
   $notec1=mysqli_query($conn, "UPDATE admins SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_POST['editp'])){

$theid = $_POST['theid'];
$fname4 = $_POST['fname'];
$mname4 = $_POST['mname'];
$lname4 = $_POST['lname'];
$email4 = $_POST['email'];
$plevel4 = $_POST['plevel'];
$gender4 = $_POST['gender'];
$phone4 = $_POST['phone'];
$uroles4 = $_POST['uroles'];

if(isset($_POST['main'])){
$mainadmin4 = $_POST['main'];
}else{
$mainadmin4 = "0";
}
if(isset($_POST['edms'])){
$edms4 = $_POST['edms'];
}else{
$edms4 = "0";
}
if(isset($_POST['tams'])){
$tams4 = $_POST['tams'];
}else{
$tams4 = "0";
}
if(isset($_POST['dcapture'])){
$datacapture4 = $_POST['dcapture'];
}else{
$datacapture4 = "0";
}
if(isset($_POST['payroll'])){
$payroll4 = $_POST['payroll'];
}else{
$payroll4 = "0";
}

$uname4 = $_POST['uname'];
$pword4 = $_POST['pword'];
$status4 = $_POST['status'];

$path = "../images/profilepics/";
$oldimage = $_POST['oldpic'];

if( isset( $_FILES['filename']['name'] ) && strlen( $_FILES['filename']['name'] ) > 0){

	//READING THE MAGES:::::::::::::::::::::
	    
		$picname1 = $_FILES['filename']['name'];
		$size1 = $_FILES['filename']['size'];
		$type1 = $_FILES['filename']['type'];
		$error1 = $_FILES['filename']['type'];
		$get_extension1 = explode(".", $_FILES['filename']['name']);
		$extension1 = $get_extension1[1];
		$word1 = date("mdYgisa");
		$img_name1 = (date("mdyHis") + 1);
		$newimage = "$img_name1.$extension1";
		
		copy($_FILES["filename"]["tmp_name"],$path.$newimage) or die("<b>Unknown error!</b>");  		
		$profilepic4 = $newimage;
}else{
        $profilepic4 = $oldimage;
}

$saveinsert1 = "UPDATE admins SET fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', plevel='$plevel4', gender='$gender4', edms='$edms4', payroll='$payroll4', phone='$phone4', datacapture='$datacapture4', tams='$tams4', mainadmin='$mainadmin4', uname='$uname4', updaby='$uid', profilepic='$profilepic4', user_role='$uroles4' WHERE id='$theid'";
if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}else{
$status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Updating Administrator Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

}

if(!empty($_POST['addp'])){
$h2 = $_POST['addp'];

$fname4 = $_POST['fname'];
$mname4 = $_POST['mname'];
$lname4 = $_POST['lname'];
$email4 = $_POST['email'];
$plevel4 = $_POST['plevel'];
$gender4 = $_POST['gender'];
$phone4 = $_POST['phone'];
$uroles4 = $_POST['uroles'];

if(isset($_POST['main'])){
$mainadmin4 = $_POST['main'];
}else{
$mainadmin4 = "0";
}
if(isset($_POST['edms'])){
$edms4 = $_POST['edms'];
}else{
$edms4 = "0";
}
if(isset($_POST['tams'])){
$tams4 = $_POST['tams'];
}else{
$tams4 = "0";
}
if(isset($_POST['dcapture'])){
$datacapture4 = $_POST['dcapture'];
}else{
$datacapture4 = "0";
}
if(isset($_POST['payroll'])){
$payroll4 = $_POST['payroll'];
}else{
$payroll4 = "0";
}

$uname4 = $_POST['uname'];
$pword4 = $_POST['pword'];
$status4 = $_POST['status'];

$path = "../images/profilepics/";
$oldimage = "avatar2.png";

$notec13user = mysqli_query($conn, "SELECT id FROM admins WHERE uname='$uname4'");
$ifuser = mysqli_num_rows($notec13user);

if($ifuser > 0){

  $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Administrator Details. Username already exist on file (Reserved)</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';

} else {

if( isset( $_FILES['filename']['name'] ) && strlen( $_FILES['filename']['name'] ) > 0){

	//READING THE MAGES:::::::::::::::::::::
	    
		$picname1 = $_FILES['filename']['name'];
		$size1 = $_FILES['filename']['size'];
		$type1 = $_FILES['filename']['type'];
		$error1 = $_FILES['filename']['type'];
		$get_extension1 = explode(".", $_FILES['filename']['name']);
		$extension1 = $get_extension1[1];
		$word1 = date("mdYgisa");
		$img_name1 = (date("mdyHis") + 1);
		$newimage = "$img_name1.$extension1";
		
		copy($_FILES["filename"]["tmp_name"],$path.$newimage) or die("<b>Unknown error!</b>");  		
		$profilepic4 = $newimage;
}else{
        $profilepic4 = $oldimage;
}

$saveinsert1 = "INSERT INTO admins (`fname`, `mname`, `lname`, `email`, `phone`, `gender`, `plevel`, `uname`, `pword`, `edms`, `payroll`, `datacapture`, `tams`, `mainadmin`, `profilepic`, `createdby`, `company`, user_role) VALUES ('$fname4', '$mname4', '$lname4', '$email4', '$phone4', '$gender4', '$plevel4', '$uname4', '$pword4', '$edms4', '$payroll4', '$datacapture4', '$tams4', '$mainadmin4', '$profilepic4', '$uid', '$companyMain', '$uroles4')";
if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Inserted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}else{
$status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Administrator Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

}


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="HECKER PEOPLE Project.">
    <meta name="author" content="Visiara Ltd">

    <!-- Meta -->
    <meta name="description" content="HECKER PEOPLE Project - TAMS">
    <meta name="author" content="ThemePixels">

    <title>HECKER PEOPLE</title>

    <!-- vendor css -->
    <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
    
    <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/left_panel.php");
?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/head_panel.php");
?>
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/right_panel.php");
?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <!-- br-mainpanel -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-contact-outline"></i>
        <div>
          <h4>Administrator Management</h4>
          <p class="mg-b-0">Administrative Login User Management Panel - All Administrators.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        
        <?php echo $status; ?>
          <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus mg-r-10"></i> Add Administrator</button>

          <div class="table-wrapper mg-t-15">
            <table id="datatable1" class="table table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class="">Full name</th>
                  <th class="">Admin Level</th>
                  <th class="wd-10p">Status</th>
                  <th class="">User Role</th>
                  <th class="">Gender</th>
                  <th class="">Phone No</th>
                  <th class="">Email Address</th>
                  <th class="">Profile Picture</th>
                  <th class="">User Name</th>
                  <th class="">Created By</th>
                  <th class="">Last LogOn</th>
                  <th class=""></th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM admins WHERE dele = '0' AND company='$companyMain'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$fname = $huserb1d5["fname"];
$mname = $huserb1d5["mname"];
$lname = $huserb1d5["lname"];
$email = $huserb1d5["email"];
$phone = $huserb1d5["phone"];
$gender = $huserb1d5["gender"];
$plevel1 = $huserb1d5["plevel"];
$status = $huserb1d5["status"];
$uname = $huserb1d5["uname"];
$pword = $huserb1d5["pword"];
$edms = $huserb1d5["edms"];
$payroll = $huserb1d5["payroll"];
$datacapture = $huserb1d5["datacapture"];
$tams = $huserb1d5["tams"];
$mainadmin = $huserb1d5["mainadmin"];
$department1 = $huserb1d5["department"];
$profilepic = $huserb1d5["profilepic"];
$createdby = $huserb1d5["createdby"];
$llogin5 = $huserb1d5["llogin"];
$user_roley = $huserb1d5["user_role"];
//$llogin6 = ($llogin5 / 1000);
$llogin = date("Y-m-d h:i:s", $llogin5);

if($edms=="1"){
  $edms = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
}else{
  $edms = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
}

if($payroll=="1"){
  $payroll = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
}else{
  $payroll = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
}

if($datacapture=="1"){
  $datacapture= '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
}else{
  $datacapture = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
}

if($tams=="1"){
  $tams = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
}else{
  $tams = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
}

if($mainadmin=="1"){
  $mainadmin = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
}else{
  $mainadmin = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
}

$hu=mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$plevel1'");
while ($hug= mysqli_fetch_array($hu))
{
  $plevel = $hug["levelnick"];
}

$hu2=mysqli_query($conn, "SELECT * FROM user_roles WHERE id = '$user_roley'");
while ($hugu = mysqli_fetch_array($hu2))
{
  $user_roley2 = $hugu["name"];
}

/*
$hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1'");
while ($hug1= mysqli_fetch_array($hu1))
{
  $department = $hug1["departmentname"];
}
*/

if ($status == "Active"){
   $statusd = "bg-success";
   $btnactivate = "btn-danger";
   $btnicon = "fa-lock";
   $onoff = "InActive";
}else{
   $statusd = "bg-danger";
   $btnactivate = "btn-success";
   $btnicon = "fa-lock-open";
   $onoff = "Active";
}

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $lname." ".$mname." ".$fname; ?></td>
                  <td><?php echo $plevel; ?></td>
                  <td>
<div class="progress ht-30">
  <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
</div>
                  </td>
                  <td><?php echo $user_roley2; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php echo $phone; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><img src="../images/profilepics/<?php echo $profilepic; ?>" class="wd-100 rounded-circle"></td>
                  <td><?php echo $uname; ?></td>
                  <td><?php echo $createdby; ?></td>
                  <td><?php echo $llogin; ?></td>
                  <td>
<a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" class="btn <?php echo $btnactivate; ?> btn-icon" id="<?php echo $onoff; ?>" onclick="return confirmActivation(this.id);">
  <div><i class="fa <?php echo $btnicon; ?>"></i></div>
</a>
<a href="javascript:;" class="btn btn-primary btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">
  <div><i class="fa fa-edit"></i></div>
</a>
<a href="?did=<?php echo $eid; ?>" class="btn btn-danger btn-icon" onclick="return confirmDelete();">
  <div><i class="fa fa-trash"></i></div>
</a>
                  </td>
                </tr>
<?php
}
?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->

<!-- add employee -->
          <div id="addemployee" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Administrator Information</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="addemployee2" action="" method="POST">
<input type="hidden" name="addp" value="1">
                  <div class="row no-gutters">
                    <div class="col-lg-6 ">
                      <div class="pd-20 bd-r bd-success">
                        <h3 class="tx-inverse mg-b-25">Personal Information</h3>
                        
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Firstname: <span class="tx-danger">*</span></label>
        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Middlename: <span class="tx-danger">*</span></label>
        <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Lastname: <span class="tx-danger">*</span></label>
        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Phone: <span class="tx-danger">*</span></label>
        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Gender: <span class="tx-danger">*</span></label>
<select class="form-control select2 wd-100" name="gender" data-placeholder="Choose" required>
  <option value="">Choose</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
      </div><!-- form-group -->
      
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0">
        <label>Email: <span class="tx-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-0">
      <div class="form-group mg-b-0-force">
      <label>Profile Picture: <span class="tx-danger">*</span></label>
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
   
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Admin Level: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="plevel" data-placeholder="Choose Level" required>
          <option value="">Choose Admin Level</option>
<?php
$intload3=mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
while ($intload3a = mysqli_fetch_array($intload3))
{
$inid3 = $intload3a["id"];
$iname3 = $intload3a["levelnick"];
?>
<option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>User Roles: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="uroles" data-placeholder="Choose User Roles" required>
          <option value="">Choose User Roles</option>
<?php
$intload3u=mysqli_query($conn, "SELECT * FROM user_roles ORDER BY id asc");
while ($intload3au = mysqli_fetch_array($intload3u))
{
$inid3u = $intload3au["id"];
$iname3u = $intload3au["name"];
?>
<option value="<?php echo $inid3u; ?>"><?php echo $iname3u; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
    
    <!-- form-group  <div class="mg-b-20">
    <p class="mg-b-10">Grant LogOn Access?</p>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="edms" value="1">
           <span>E Document Management System</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="payroll" value="1">
           <span>Payroll System</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="dcapture" value="1">
           <span>Data Capture</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="tams" value="1">
           <span>Time and Attendance Management</span>
        </label>
      </div>
      <div class="form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="main" value="1">
           <span>Main Panel</span>
        </label>
      </div>
    </div> -->
    
    <h3 class="tx-inverse mg-b-15 mg-t-60">Access Information!</h3>
    
    <div class="d-flex mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="Username" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Password" required>
      </div><!-- form-group -->
    </div>
                              
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="addemployee2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->

<!-- Edit employee -->
          <div id="editemployee" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Administrator Information</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="editemployee2" action="" method="POST">
                  <div class="row no-gutters" id="pasteedit">
                    
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="editemployee2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->

 

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
      <footer class="br-footer">
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/footer_panel.php");
?>
      </footer>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../lib/moment/min/moment.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.min.js"></script>
    <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
    <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

    <script src="../js/bracket.js"></script>
    <script src="../js/map.shiftworker.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../js/dashboard.js"></script>
    
<script>
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>

<script>
function Edit(str){
  var str2 = "<?php echo $companyMain; ?>";
   if (str.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pasteedit").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "editadmins.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
    }
}
</script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
        
        // Input Masks
        $('#dateMask').mask('9999-99-99');
        $('#phoneMask').mask('(999) 999-9999');

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
</html>
