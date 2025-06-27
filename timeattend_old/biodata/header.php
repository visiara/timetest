<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/daccessbiodata.php"); 

date_default_timezone_set('Africa/Lagos');
$maindate = date("Y-m-d");
$shortdate = date("Y-m-d");
$fdatetime = time();
$thisyear = date("Y");
$thismonth = date("m");

$loggedquery=mysqli_query($conn, "SELECT * FROM employee WHERE uname = '$uid'");
while ($loggedquery1= mysqli_fetch_array($loggedquery))
{
$loggedid = $loggedquery1["id"];
$loggedemployeeid = $loggedquery1["employeeid"];
$loggedfname = $loggedquery1["fname"];
$loggedmname = $loggedquery1["mname"];
$loggedlname = $loggedquery1["lname"];
$loggedinuser = $loggedquery1["uname"];
$loggedinp = $loggedquery1["pword"];
$loggedemail = $loggedquery1["email"];
$loggedphone = $loggedquery1["phone"];
$loggedgender = $loggedquery1["gender"];
$loggeddepartment = $loggedquery1["department"];
$loggedprofilepic = $loggedquery1["profilepic"];
$llogin = $loggedquery1["llogin"];
$companyMain = $loggedquery1["company"];
$ison = $loggedquery1["ison"];
}
$loggedinname = $loggedfname." ".$loggedlname;
$loggedinfullname = $loggedfname." ".$loggedmname." ".$loggedlname;

$com1=mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p= mysqli_fetch_array($com1))
{
$companyid = $com1p["id"];
$comName = $com1p["companyname"];
$comStatus = $com1p["status"];
$comStart1 = $com1p["startdate"];
$comEnd1 = $com1p["enddate"];
$comReg1 = $com1p["regdate"];
$comAddy = $com1p["comaddress"];
$comPhone = $com1p["comephone"];
$comMail = $com1p["comemail"];
$companyref = $com1p["compref"];
$breakoption = $com1p["breakoption"];
$deducttime = $com1p["deducttime"];

$masterkpi = $com1p["masterkpi"];
$mastersalary = $com1p["mastersalary"];
$kpion = $com1p["kpion"];
$kpidata = $com1p["kpidata"];
$salaryon = $com1p["salaryon"];
$salarydata = $com1p["salarydata"];
$atcomp = $com1p["atcomp"];
}
$pieces = explode(" ", $comName);
$take1 = $pieces[0];
$take2 = $pieces[1];
$take3 = isset($pieces[2]) ? $pieces[2] : '';

$take1 = empty($take1) ? '' : strtoupper($take1[0]); 
$take2 = empty($take2) ? '' : strtoupper($take2[0]);
$take3 = empty($take3) ? '' : strtoupper($take3[0]);

$ddrr = time();
$dnewname = substr("$ddrr", 5);
$dnewname1 = $take1.$take2.$take3.$dnewname;

///////////// password change
if(isset($_POST['changepassword'])){//to run PHP script on submit

 if(!empty($_POST['pword'])){
   $ghh = $_POST['pword'];

   if(isset($_POST['ison'])){
    $ison = $_POST['ison'];
    $notec1=mysqli_query($conn, "UPDATE employee SET pword = '$ghh', ison = '$ison' WHERE uname = '$uid'");
   } else {
    $notec1=mysqli_query($conn, "UPDATE employee SET pword = '$ghh' WHERE uname = '$uid'");
   }
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Login Information Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
 }

}
//// end password

// profile image upload image
if(isset($_POST["lo"])){

$path = "../images/profilepics/";
$oldimage = "avatar2.png";

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
		$bcover = $newimage;
}else{
        $bcover = $oldimage;
}

$postinsert = "UPDATE employee SET profilepic = '$bcover' WHERE uname = '$uid'";
if (mysqli_query($conn, $postinsert)){
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Profile Picture Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}


}

/// image upload end

$loggedquery=mysqli_query($conn, "SELECT * FROM employee WHERE uname = '$uid'");
while ($loggedquery1= mysqli_fetch_array($loggedquery))
{
$loggedid = $loggedquery1["id"];
$loggedemployeeid = $loggedquery1["employeeid"];
$loggedfname = $loggedquery1["fname"];
$loggedmname = $loggedquery1["mname"];
$loggedlname = $loggedquery1["lname"];
$loggedinuser = $loggedquery1["uname"];
$loggedinp = $loggedquery1["pword"];
$loggedemail = $loggedquery1["email"];
$loggedphone = $loggedquery1["phone"];
$loggedgender = $loggedquery1["gender"];
$loggeddepartment = $loggedquery1["department"];
$loggedprofilepic = $loggedquery1["profilepic"];
$llogin = $loggedquery1["llogin"];
$ison = $loggedquery1["ison"];
}
$loggedinname = $loggedfname." ".$loggedlname;

$com1=mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p= mysqli_fetch_array($com1))
{
$companyid = $com1p["id"];
$comName = $com1p["companyname"];
$comStatus = $com1p["status"];
$comStart1 = $com1p["startdate"];
$comEnd1 = $com1p["enddate"];
$comReg1 = $com1p["regdate"];
$comAddy = $com1p["comaddress"];
$comPhone = $com1p["comephone"];
$comMail = $com1p["comemail"];
$companyref = $com1p["compref"];
$breakoption = $com1p["breakoption"];
$deducttime = $com1p["deducttime"];

$masterkpi = $com1p["masterkpi"];
$mastersalary = $com1p["mastersalary"];
$kpion = $com1p["kpion"];
$kpidata = $com1p["kpidata"];
$salaryon = $com1p["salaryon"];
$salarydata = $com1p["salarydata"];
$atcomp = $com1p["atcomp"];
}

////////////////// counters

$notec1=mysqli_query($conn, "SELECT * FROM notifications WHERE user = '$uid' AND company='$companyMain' AND hasread = '0'");
$noticount = mysqli_num_rows($notec1);
/*
$messagec1=mysqli_query($conn, "SELECT * FROM dmessages WHERE dto = '$uid' AND dread = '0'");
$messagec = mysqli_num_rows($messagec1);

$messagec2=mysqli_query($conn, "SELECT * FROM dmessages WHERE dfrom = '$uid' AND dread = '0'");
$messagec3 = mysqli_num_rows($messagec2);

$dfed1=mysqli_query($conn, "SELECT * FROM friendrequest WHERE owner = '$uid'");
$dfed = mysqli_num_rows($dfed1);

$responsecount1=mysqli_query($conn, "SELECT * FROM thepostresp WHERE user = '$uid' AND feedorspread = '0'");
$responsecount = mysqli_num_rows($responsecount1);
*/
///////////////// counters end

$thepagename = basename($_SERVER['PHP_SELF']);

if ($thepagename=="dashboard.php"){
  $where1 = "active";
}elseif($thepagename=="employeelist.php" || $thepagename=="employeelista.php" || $thepagename=="employeelisti.php" || $thepagename=="employeelistd.php"){
  $where2 = "active";
  if($thepagename=="employeelist.php"){
  $where2a = "active";
  }elseif($thepagename=="employeelista.php"){
  $where2b = "active";
  }elseif($thepagename=="employeelisti.php"){
  $where2c = "active";
  }elseif($thepagename=="employeelistd.php"){
  $where2d = "active";
  }
}elseif($thepagename=="applyleave.php" || $thepagename=="leaves.php" || $thepagename=="exemptions.php" || $thepagename=="applyworkshift.php" || $thepagename=="attendance_overrule.php" || $thepagename=="leaves_history.php" || $thepagename=="exemptions_history.php"){
  $where3 = "active";
  if($thepagename=="applyleave.php"){
  $where3a = "active";
  }elseif($thepagename=="leaves.php"){
  $where3b = "active";
  }elseif($thepagename=="exemptions.php"){
  $where3c = "active";
  }elseif($thepagename=="applyworkshift.php"){
  $where3d = "active";
  }elseif($thepagename=="attendance_overrule.php"){
    $where3e = "active";
  }elseif($thepagename=="leaves_history.php"){
    $where3f = "active";
  }elseif($thepagename=="exemptions_history.php"){
    $where3g = "active";
  }
}elseif($thepagename=="adminusers.php" || $thepagename=="deviceadmins.php"){
  $where4 = "active";
  if($thepagename=="adminusers.php"){
  $where4a = "active";
  }elseif($thepagename=="deviceadmins.php"){
  $where4b = "active";
  }
}elseif($thepagename=="approvallevel.php" || $thepagename=="leavetype.php" || $thepagename=="holidays.php" || $thepagename=="exemptiontype.php" || $thepagename=="workshift.php"){
  $where5 = "active";
  if($thepagename=="approvallevel.php"){
  $where5a = "active";
  }elseif($thepagename=="leavetype.php"){
  $where5b = "active";
  }elseif($thepagename=="holidays.php"){
  $where5c = "active";
  }elseif($thepagename=="exemptiontype.php"){
  $where5d = "active";
  }elseif($thepagename=="workshift.php"){
  $where5e = "active";
  }
}elseif($thepagename=="devices.php" || $thepagename=="locations.php" || $thepagename=="departments.php" || $thepagename=="company.php"){
  $where6 = "active";
  if($thepagename=="devices.php"){
  $where6a = "active";
  }elseif($thepagename=="locations.php"){
  $where6b = "active";
  }elseif($thepagename=="departments.php"){
  $where6c = "active";
  }elseif($thepagename=="company.php"){
  $where6d = "active";
  }
}elseif($thepagename=="reports.php" || $thepagename=="reports1.php" || $thepagename=="reports2.php"){
  $where7 = "active";
  if($thepagename=="reports.php"){
  $where7a = "active";
  }elseif($thepagename=="reports1.php"){
  $where7b = "active";
  }elseif($thepagename=="reports2.php"){
  $where7c = "active";
  }elseif($thepagename=="reports3.php"){
  $where7d = "active";
  }
}elseif($thepagename=="biometrics.php" || $thepagename=="biometrics1.php" || $thepagename=="biometrics2.php"){
  $where8 = "active";
  if($thepagename=="biometrics1.php"){
  $where8a = "active";
  }elseif($thepagename=="biometrics2.php"){
  $where8b = "active";
  }elseif($thepagename=="biometrics3.php"){
  $where8c = "active";
  }elseif($thepagename=="biometrics4.php"){
  $where8d = "active";
  }
}elseif($thepagename=="attendance.php" || $thepagename=="attendance1.php" || $thepagename=="attendance2.php" || $thepagename=="attendance3.php" || $thepagename=="attendance4.php"){
  $where9 = "active";
  if($thepagename=="attendance1.php"){
  $where9a = "active";
  }elseif($thepagename=="attendance2.php"){
  $where9b = "active";
  }elseif($thepagename=="attendance3.php"){
  $where9c = "active";
  }elseif($thepagename=="attendance4.php"){
  $where9d = "active";
  }elseif($thepagename=="attendance.php"){
  $where9e = "active";
  }
}elseif($thepagename=="salary.php" || $thepagename=="salary1.php" || $thepagename=="salary2.php" || $thepagename=="salary3.php" || $thepagename=="salary4.php" || $thepagename=="salary5.php" || $thepagename=="salary6.php" || $thepagename=="salary7.php"){
  $where12 = "active";
  if($thepagename=="salary.php"){
  $where12a = "active";
  }elseif($thepagename=="salary1.php"){
  $where12b = "active";
  }elseif($thepagename=="salary2.php"){
  $where12c = "active";
  }elseif($thepagename=="salary3.php"){
  $where12d = "active";
  }elseif($thepagename=="salary4.php"){
    $where12e = "active";
  }elseif($thepagename=="salary5.php"){
    $where12f = "active";
  }elseif($thepagename=="salary6.php"){
    $where12g = "active";
  }elseif($thepagename=="salary7.php"){
    $where12h = "active";
  }
}elseif($thepagename=="kpi.php" || $thepagename=="kpi1.php" || $thepagename=="kpi2.php" || $thepagename=="kpi3.php" || $thepagename=="kpi4.php" || $thepagename=="kpi5.php"){
  $where13 = "active";
  if($thepagename=="kpi.php"){
  $where13a = "active";
  }elseif($thepagename=="kpi1.php"){
  $where13b = "active";
  }elseif($thepagename=="kpi2.php"){
  $where13c = "active";
  }elseif($thepagename=="kpi3.php"){
  $where13d = "active";
  }elseif($thepagename=="kpi4.php"){
  $where13e = "active";
  }elseif($thepagename=="kpi5.php"){
    $where13f = "active";
  }
}elseif($thepagename=="profile.php" || $thepagename=="profile1.php" || $thepagename=="profile2.php" || $thepagename=="profile3.php" || $thepagename=="profile4.php" || $thepagename=="profile5.php"){
  $where14 = "active";
  if($thepagename=="profile.php"){
  $where14a = "active";
  }elseif($thepagename=="profile1.php"){
  $where14b = "active";
  }elseif($thepagename=="profile2.php"){
  $where14c = "active";
  }elseif($thepagename=="profile3.php"){
  $where14d = "active";
  }elseif($thepagename=="profile4.php"){
  $where14e = "active";
  }elseif($thepagename=="profile5.php"){
    $where14f = "active";
  }
}
?>
