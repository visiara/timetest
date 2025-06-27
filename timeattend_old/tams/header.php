<?php
include(__DIR__ . "/../includes/daccesstams.php");



date_default_timezone_set('Africa/Lagos');
$maindate = date("Y-m-d");
$shortdate = date("Y-m-d");
$fdatetime = time();
$thisyear = date("Y");
$thismonth = date("m");

$loggedquery = mysqli_query($conn, "SELECT * FROM admins WHERE uname = '$uid'");
while ($loggedquery1 = mysqli_fetch_array($loggedquery)) {
  $loggedid = $loggedquery1["id"];
  $loggedfname = $loggedquery1["fname"];
  $loggedmname = $loggedquery1["mname"];
  $loggedlname = $loggedquery1["lname"];
  $loggedinuser = $loggedquery1["uname"];
  $loggedinp = $loggedquery1["pword"];
  $loggedemail = $loggedquery1["email"];
  $loggedphone = $loggedquery1["phone"];
  $loggedgender = $loggedquery1["gender"];
  $loggedplevel = $loggedquery1["plevel"];
  $loggeddepartment = $loggedquery1["department"];
  $loggedprofilepic = $loggedquery1["profilepic"];
  $llogin = $loggedquery1["llogin"];
  $companyMain = $loggedquery1["company"];
  //$deducttime = $loggedquery1["deducttime"];
  $user_role = $loggedquery1["user_role"];
}
$loggedinname = $loggedfname . " " . $loggedlname;
$loggedinfullname = $loggedfname . " " . $loggedmname . " " . $loggedlname;

$com1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p = mysqli_fetch_array($com1)) {
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

  $masterkpi = $com1p["masterkpi"];
  $mastersalary = $com1p["mastersalary"];
  $kpion = $com1p["kpion"];
  $kpidata = $com1p["kpidata"];
  $salaryon = $com1p["salaryon"];
  $salarydata = $com1p["salarydata"];
  $atcomp = $com1p["atcomp"];
  $comsmsbal = $com1p["smsbal"];
  $comsmson = $com1p["smson"];
}
$pieces = explode(" ", $comName);
$take1 = $pieces[0];
$take2 = $pieces[1];
$take3 = isset($pieces[2]) ? $pieces[2] : "";

$take1 = empty($take1) ? '' : strtoupper($take1[0]);
$take2 = empty($take2) ? '' : strtoupper($take2[0]);
$take3 = empty($take3) ? '' : strtoupper($take3[0]);

$ddrr = time();
$dnewname = substr("$ddrr", 5);
$dnewname1 = $take1 . $take2 . $take3 . $dnewname;

///////////// password change
if (isset($_POST['changepassword'])) { //to run PHP script on submit

  if (!empty($_POST['pword'])) {
    $ghh = $_POST['pword'];
    $notec1 = mysqli_query($conn, "UPDATE admins SET pword = '$ghh' WHERE uname = '$uid'");
    //$notec = mysql_query($notec1);

    //log event
    log_audit_event($uid, "UPDATE", "Updated password", "Password", "success", '', '', $_SESSION['logged']);

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
if (isset($_POST["lo"])) {

  $path = "../images/profilepics/";
  $oldimage = "avatar2.png";

  if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

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

    copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
    $bcover = $newimage;
  } else {
    $bcover = $oldimage;
  }

  $postinsert = "UPDATE admins SET profilepic = '$bcover' WHERE uname = '$uid'";
  if (mysqli_query($conn, $postinsert)) {
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

$loggedquery = mysqli_query($conn, "SELECT * FROM admins WHERE uname = '$uid'");
while ($loggedquery1 = mysqli_fetch_array($loggedquery)) {
  $loggedid = $loggedquery1["id"];
  $loggedfname = $loggedquery1["fname"];
  $loggedmname = $loggedquery1["mname"];
  $loggedlname = $loggedquery1["lname"];
  $loggedinuser = $loggedquery1["uname"];
  $loggedinp = $loggedquery1["pword"];
  $loggedemail = $loggedquery1["email"];
  $loggedphone = $loggedquery1["phone"];
  $loggedgender = $loggedquery1["gender"];
  $loggedplevel = $loggedquery1["plevel"];
  $loggeddepartment = $loggedquery1["department"];
  $loggedprofilepic = $loggedquery1["profilepic"];
  $llogin = $loggedquery1["llogin"];
  $companyMain = $loggedquery1["company"];
  $user_role = $loggedquery1["user_role"];
}
$loggedinname = $loggedfname . " " . $loggedlname;

$com1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p = mysqli_fetch_array($com1)) {
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

  $dtypeMain = $com1p["dtype"];
  $dvalueMain = $com1p["dvalue"];
  $noemployeeMain = $com1p["noemployee"];
  $comsmsbal = $com1p["smsbal"];
  $comsmson = $com1p["smson"];
}

if ($comEnd1 < time()) {
  $coldays = 0;
} else {
  $coldays = 1;
}

$dfed1 = mysqli_query($conn, "SELECT * FROM employee WHERE company = '$companyMain' AND status = 'Active' AND dele = '0'");
$allEmployee = mysqli_num_rows($dfed1);

////////////////// counters

//$notec1=mysqli_query($conn, "SELECT * FROM notifications WHERE user = '$uid' AND hasread = '0'");

if ($user_role == "3") {
  $notec1 = mysqli_query($conn, "SELECT * FROM notifications WHERE department = '$loggeddepartment' AND company='$companyMain' AND hasread='0' AND admin='1'");
} elseif ($user_role == "1") {
  $notec1 = mysqli_query($conn, "SELECT * FROM notifications WHERE company='$companyMain' AND hasread='0' AND admin='1'");
} else {
  $notec1 = mysqli_query($conn, "SELECT * FROM notifications WHERE company='$companyMain' AND hasread='0' AND admin='1' AND id='0'");
}
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

// audits
$thepagename2 = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);

// Example Usage: Logging a user update event
$user_id = $uid; // Example user ID
//$event_type = "Update";
$event_type = "Access";
$action_performed = "Accessed $thepagename2 page";
//$object_affected = "User Profile";
$object_affected = $therealpagename;
$statusy = "success";
$previous_value = "";
$new_value = "";

log_audit_event($user_id, $event_type, $action_performed, $object_affected, $statusy, $previous_value, $new_value, $_SESSION['logged']);

/*
log_audit_event($uid, "INSERT", "Inserted record", $record['object_affected'], "success", $previous_value, $new_value, $_SESSION['logged']);
log_audit_event($uid, "INSERT_FAILED", "Failed insert attempt", "some_table", "failed", $previous_value, $new_value, $_SESSION['logged']);

log_audit_event($uid, "DELETE", "Deleted record", $record['object_affected'], "success", $previous_value, $new_value, $_SESSION['logged']);
log_audit_event($uid, "DELETE_FAILED", "Failed deletion attempt", "some_table", "failed", $previous_value, $new_value, $_SESSION['logged']);

log_audit_event($uid, "UPDATE", "Updated record", $record['object_affected'], "success", $previous_value, $new_value, $_SESSION['logged']);
log_audit_event($uid, "UPDATE_FAILED", "Failed update attempt", "some_table", "failed", $previous_value, $new_value, $_SESSION['logged']);
*/

// Close the database connection
//$mysqli->close();
// end audits
