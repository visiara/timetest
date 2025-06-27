<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(!empty($_GET['activate'])){
$h = $_GET['activate'];
$id = $_GET['id'];
   $notec13=mysqli_query($conn, "UPDATE employee SET status = '$h' WHERE id = '$id'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Employee Status Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_GET['did'])){
$h3 = $_GET['did'];
   $notec1=mysqli_query($conn, "UPDATE employee SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Employee Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_POST['editp'])){

$theid = $_POST['theid'];
$employeeid4 = $_POST['employeeid'];
$fname4 = $_POST['fname'];
$mname4 = $_POST['mname'];
$lname4 = $_POST['lname'];
$email4 = $_POST['email'];
$address4 = $_POST['address'];
$country4 = $_POST['country'];
$state4 = $_POST['state'];
$gender4 = $_POST['gender'];
$phone4 = $_POST['phone'];
$nextofkin4 = $_POST['nextofkin'];
$dofb4 = $_POST['dofb'];
$employmenttype4 = $_POST['employmenttype'];
$location4 = $_POST['location'];
$department4 = $_POST['department'];
$workshift4 = $_POST['workshift'];
$uname4 = $_POST['uname'];
$pword4 = $_POST['pword'];
$status4 = $_POST['status'];
$createdby4 = $_POST['createdby'];

$path = "../images/employee/";
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

$saveinsert1 = "UPDATE employee SET employeeid ='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid' WHERE id='$theid'";
if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Employee Detail Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Employee Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
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
          <h4>Employee Management</h4>
          <p class="mg-b-0">Employee Management Panel - Active Employee.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        
        <?php echo $status; ?>
        <h4 class="mg-b-0">Active Employee</h4>
          <div class="table-wrapper mg-t-15">
            <table id="datatable1" class="table table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class="wd-15p">Unique ID</th>
                  <th class="wd-15p">Employee ID</th>
                  <th class="">Full name</th>
                  <th class="wd-20p">Location</th>
                  <th class="wd-20p">Department</th>
                  <th class="wd-10p">Status</th>
                  <th class="">Work Schedule</th>
                  <th class="">Gender</th>
                  <th class="">Phone No</th>
                  <th class="">Email Address</th>
                  <th class="">Address</th>
                  <th class="">State</th>
                  <th class="">Country</th>
                  <th class="">Employment Type</th>
                  <th class="">Next Of Kin</th>
                  <th class="">Date Of Birth</th>
                  <th class="">Picture</th>
                  <th class="">Created By</th>
                  <th class=""></th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$empuniqid = $huserb1d5["uniqid"];
$employeeid = $huserb1d5["employeeid"];
$fname = $huserb1d5["fname"];
$mname = $huserb1d5["mname"];
$lname = $huserb1d5["lname"];
$email = $huserb1d5["email"];
$address = $huserb1d5["address"];
$country = $huserb1d5["country"];
$state = $huserb1d5["state"];
$gender = $huserb1d5["gender"];
$phone = $huserb1d5["phone"];
$nextofkin = $huserb1d5["nextofkin"];
$dofb = $huserb1d5["dofb"];
$employmenttype = $huserb1d5["employmenttype"];
$location1 = $huserb1d5["location"];
$department1 = $huserb1d5["department"];
$workshift1 = $huserb1d5["workshift"];
$uname = $huserb1d5["uname"];
$pword = $huserb1d5["pword"];
$status = $huserb1d5["status"];
$createdby = $huserb1d5["createdby"];
$profilepic = $huserb1d5["profilepic"];

$hu=mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1' AND company='$companyMain'");
while ($hug= mysqli_fetch_array($hu))
{
  $location = $hug["locationname"];
}

$hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
while ($hug1= mysqli_fetch_array($hu1))
{
  $department = $hug1["departmentname"];
}

$hu2=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1' AND company='$companyMain'");
while ($hug2= mysqli_fetch_array($hu2))
{
  $workshift = $hug2["shiftname"];
}

$hu3y=mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttype'");
while ($hug3y= mysqli_fetch_array($hu3y))
{
  $employmenttypey = $hug3y["name"];
}

$bookpay1=mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company='$companyMain'");
$bo = mysqli_num_rows($bookpay1);
if($bo > 0){
   while ($bookpay = mysqli_fetch_array($bookpay1))
   {
     $photo_preview = $bookpay["photo_preview"];
   }
}

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
                  <td><?php echo $empuniqid; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname." ".$mname." ".$fname; ?></td>
                  <td><?php echo $location; ?></td>
                  <td><?php echo $department; ?></td>
                  <td>
<div class="progress ht-30">
  <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
</div>
                  </td>
                  <td><?php echo $workshift; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php echo $phone; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $address; ?></td>
                  <td><?php echo $state; ?></td>
                  <td><?php echo $country; ?></td>
                  <td><?php echo $employmenttypey; ?></td>
                  <td><?php echo $nextofkin; ?></td>
                  <td><?php echo $dofb; ?></td>
                  <td>
                  <?php
                      if($bo > 0){
                    ?>
                      <img src="data:image/png;base64,<?php echo $photo_preview; ?>" class="wd-100 rounded-circle">
                    <?php
                      } else {
                    ?>
                      <img src="../images/employee/<?php echo $profilepic; ?>" class="wd-100 rounded-circle">
                    <?php
                      }
                    ?>
                  </td>
                  <td><?php echo $createdby; ?></td>
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
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Employee Information</h6>
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
        <label>Date of Birth: <span class="tx-danger">*</span></label>
        <input type="text" name="dofb" class="form-control" id="dateMask" required>
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
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Email: <span class="tx-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Next of Kin: <span class="tx-danger">*</span></label>
        <input type="text" name="nextofkin" class="form-control" data-placeholder="Next of Kin" required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Address: <span class="tx-danger">*</span></label>
        <input type="text" name="address" class="form-control" placeholder="Address" required>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>State: <span class="tx-danger">*</span></label>
        <input type="text" name="state" class="form-control" placeholder="State" required>
      </div><!-- form-group -->
      <div class="form-group mg-b-0 mg-l-10">
        <label>Country: <span class="tx-danger">*</span></label>
        <input type="text" name="country" class="form-control" placeholder="Country" required>
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
                          
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0">
        <label>Employee ID: <span class="tx-danger">*</span></label>
        <input type="text" name="employeeid" class="form-control" placeholder="Employee ID" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0">
        <label>Employment Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="employmenttype" data-placeholder="Choose" required>
          <option value="">Choose</option>
          <option value="Permanent">Permanent</option>
          <option value="Contract">Contract</option>
          <option value="Part-Time">Part-Time</option>
        </select>
      </div><!-- form-group -->
    </div>
    
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
    
    <h3 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h3>
    
    <div class="d-flex mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="Employee Username" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Employee Password" required>
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
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Employee Information</h6>
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
        xmlhttp.open("GET", "editemployee.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
    }
}
</script>

<script>
function ChangeState(str){
  //var str = document.getElementById("country").value;
   if (str.length == 0) {
        document.getElementById("stateid").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stateid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "changestate.php?q=" + str, true);
        xmlhttp.send();
    }
}

function ChangeStateU(str){
  //var str = document.getElementById("country").value;
   if (str.length == 0) {
        document.getElementById("stateid2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stateid2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "changestateu.php?q=" + str, true);
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

        //minimizeMenu();

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
