<?php
include "" . __DIR__ . "/header.php";

$cool = time();
//$coolo = $cool.substr(4);
$coolo = substr($cool, 5, 5);

// Function to check if the record exists
function recordExists($conn, $table, $pid)
{
  $query = "SELECT 1 FROM `$table` WHERE `pid` = '$pid' LIMIT 1";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result) > 0;
}

if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE employee SET status = '$h' WHERE id = '$id'");

  //log event
  log_audit_event($uid, "UPDATE", "Updated record: $id", "Employee Status", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Status Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE employee SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
  //log event
  log_audit_event($uid, "DELETE", "Deleted record: $h3", "Employee", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['assp'])) {

  $theid = $_POST['theid'];
  $employmenttype4 = $_POST['employmenttype'];
  $department4 = $_POST['department'];
  $workshift4 = $_POST['workshift'];
  $location4 = $_POST['location'];
  $sal4 = $_POST['sal'];
  $atype = $_POST['atype'];

  // Check if any option is selected 
  if (isset($_POST["employee"])) {
    // Retrieving each selected option 
    foreach ($_POST['employee'] as $employee) {
      if ($atype == "1") {
        $saveinsert1 = "UPDATE employee SET employmenttype='$employmenttype4' WHERE id='$employee'";
      } elseif ($atype == "3") {
        $saveinsert1 = "UPDATE employee SET workshift='$workshift4' WHERE id='$employee'";
      } elseif ($atype == "2") {
        $saveinsert1 = "UPDATE employee SET department='$department4' WHERE id='$employee'";
      } elseif ($atype == "4") {
        $saveinsert1 = "UPDATE employee SET location='$location4' WHERE id='$employee'";
      } elseif ($atype == "5") {
        $saveinsert1 = "UPDATE employee SET salaryscale='$sal4' WHERE id='$employee'";
      }

      mysqli_query($conn, $saveinsert1);
    }
  }

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Detail Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

// upload csv
if (isset($_POST["submit_file"])) {
  $file = $_FILES["file"]["tmp_name"];

  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $mime_type = mime_content_type($_FILES['file']['tmp_name']);

    // If you want to allow certain files
    $allowed_file_types = ['text/csv', 'text/plain'];
    if (!in_array($mime_type, $allowed_file_types)) {
      // File type is NOT allowed. error message
      $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting User Details. Only CSV files allowed.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
    } else {

      $allowed = array('csv');
      $filename = $_FILES['file']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (!in_array($ext, $allowed)) {
        // File type is NOT allowed. error message
        $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting User Details. Only CSV files allowed.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
      } else {
        $coola = time();
        $cooloa = substr($coola, 5, 5);
        $xc = 0;

        $lines = count(file($file));
        $totalLines = ($lines + $allEmployee);

        if ($totalLines > $noemployeeMain) {
          $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting User Details. Maximum nuber of employee alocated reached.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
        } else {

          $file_open = fopen($file, "r");
          while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
            $xc = $xc + 1;
            $uniqid4 = $companyref . $cooloa . $xc;
            //
            $employeeid4 = $csv[0];
            $fname4 = $csv[1];
            $mname4 = $csv[2];
            $lname4 = $csv[3];
            $email4 = $csv[4];
            $address4 = $csv[5];
            $gender4 = $csv[6];
            $phone4 = $csv[7];
            $nextofkin4 = $csv[8];
            $dofb41 = strtotime($csv[9]);
            $dofb4 = empty($dofb41) ? "0" : date("Y-m-d", $dofb41);

            $country4 = $_POST['country'];
            $state4 = $_POST['state'];
            $employmenttype4 = "";
            $location4 = "";
            $department4 = "";
            $workshift4 = "";
            $uname4 = $employeeid4;
            $pword4 = $employeeid4;
            $profilepic4 = "avatar2.png";
            //

            mysqli_query($conn, "INSERT INTO employee (`uniqid`, `employeeid`, `fname`, `mname`, `lname`, `email`, `address`, `country`, `state`, `gender`, `phone`, `nextofkin`, `dofb`, `employmenttype`, `location`, `department`, `workshift`, `uname`, `pword`, `status`, `createdby`, `profilepic`, `company`) VALUES ('$uniqid4', '$employeeid4', '$fname4', '$mname4', '$lname4', '$email4', '$address4', '$country4', '$state4', '$gender4', '$phone4', '$nextofkin4', '$dofb4', '$employmenttype4', '$location4', '$department4', '$workshift4', '$uname4', '$pword4', 'Active', '$uid', '$profilepic4', '$companyMain')");

            //log event
            $dinsert = mysqli_insert_id($conn);
            log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Employee", "success", '', '', $_SESSION['logged']);

            // send mail
            $output = "<p>Dear $fname4,</p>";
            $output .= "<p>Your profile has just been created on $siteName with the sign-on details below.</p>";
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= "<p>Username: $uname4 <br>Password: $pword4.</p>";
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= "<p>Kindly go to <a href=$websiteMain/biodata/forgot.php target=_blank>$websiteMain/biodata/forgot.php</a> to change your password.</p>";
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= "<p>Go to <a href=$websiteMain/biodata/index.php target=_blank>$websiteMain/biodata/index.php</a> to see your attendance records,
 KPI information, submit a leave or exemption request and other profile management functions.</p>";
            $output .= '<p>Thanks,</p>';
            $output .= '<p>' . $siteName . ' Team</p>';
            $body = $output;
            $subject = "Profile Setup - $siteName";
            $email_to = $email4;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <$websiteMainMail>" . "\r\n";

            //mail($email_to,$subject,$body,$headers);
            include "" . __DIR__ . "/mainmailsend.php";
          }

          $status = '
       <div class="alert alert-success" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <div class="d-flex align-items-center justify-content-start">
           <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
           <span><strong>Success!</strong> Users Uploaded Successfully.</span>
         </div><!-- d-flex -->
       </div><!-- alert -->
       ';
        }
      }
    }
  }
}
// end csv upload

if (isset($_POST['maintype'])) {
  $theid = $_POST['theid'];
  $maintype = $_POST['maintype'];

  $uniqid4 = $_POST['uniqid'];
  $employeeid = $_POST['employeeid'];
  $uname = $_POST['uname'];

  // profile and company
  $joindate = $_POST['joindate'];
  $nationality = $_POST['nationality'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $mstatus = $_POST['mstatus'];
  $religion = $_POST['religion'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $dofb = $_POST['dofb'];
  $dofb41 = strtotime($_POST['dofb']);
  $dofb4 = date("Y-m-d", $dofb41);

  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $country = $_POST['country'];
  $state = $_POST['stateU'];
  $lga = $_POST['lga'];

  $designation = $_POST['designation'];
  $employmenttype = $_POST['employmenttype'];
  $salary = $_POST['salary'];
  $department = $_POST['department'];
  $workshift = $_POST['workshift'];
  $location = $_POST['location'];
  $pword = $_POST['pword'];

  // salary
  $bank_name = $_POST['bank_name'];
  $account_number = $_POST['account_number'];
  $pfa = $_POST['pfa'];
  $rsa_pin = $_POST['rsa_pin'];

  // next of kin
  $kinname = $_POST['kinname'];
  $kinrelationship = $_POST['kinrelationship'];
  $kinphone = $_POST['kinphone'];
  $kinemail = $_POST['kinemail'];
  $kinaddress = $_POST['kinaddress'];

  // Emergency
  $ename1 = $_POST['ename1'];
  $erelationship1 = $_POST['erelationship1'];
  $ephone1 = $_POST['ephone1'];
  $eemail1 = $_POST['eemail1'];
  $ename2 = $_POST['ename2'];
  $erelationship2 = $_POST['erelationship2'];
  $ephone2 = $_POST['ephone2'];
  $eemail2 = $_POST['eemail2'];

  // spouse and Dependents
  $sname = $_POST['sname'];
  $soccupation = $_POST['soccupation'];
  $sdofb = $_POST['sdofb'];
  $sgender = $_POST['sgender'];
  $sphone = $_POST['sphone'];
  $saddress = $_POST['saddress'];

  // Medical
  $medical1 = $_POST['medical1'];
  $medical2 = $_POST['medical2'];
  $medical3 = $_POST['medical3'];
  $medical4 = $_POST['medical4'];
  $medical5 = $_POST['medical5'];
  $medical6 = $_POST['medical6'];
  $medical7 = $_POST['medical7'];
  $medical8 = $_POST['medical8'];
  $medical9 = $_POST['medical9'];
  $medical10 = $_POST['medical10'];

  // consent
  $consent = $_POST['consent'];

  if ($maintype == "add") {

    $path = "../images/profilepics/";
    $oldimage = "avatar2.png";

    $nuid = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE employeeid='$employeeid' AND company='$companyMain'"));
    $nuemail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE email='$email' AND company='$companyMain'"));
    $nuphone = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE phone='$phone' AND company='$companyMain'"));
    $nuuname = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE uname='$uname' AND company='$companyMain'"));

    if ($nuid > 0) {
      $status = '
    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
        <span><strong>Opps!</strong> Error Inserting User Details. User ID already on file</span>
      </div><!-- d-flex -->
    </div><!-- alert -->
    ';
    } else {
      if ($nuemail > 0) {
        $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Email Address already on file</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
      } else {
        if ($nuphone > 0) {
          $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Phone Number already on file</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
        } else {
          if ($nuuname > 0) {
            $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Username aleady taken</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
          } else {

            if ($noemployeeMain > $allEmployee) {

              // insert the details

              // process image
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
                $profilepic4 = $newimage;
              } else {
                $profilepic4 = $oldimage;
              }
              //

              $saveinsert1 = "INSERT INTO employee (`uniqid`, `employeeid`, `fname`, `mname`, `lname`, `email`, `address`, `country`, `state`, `gender`, `phone`, `nextofkin`, `dofb`, `employmenttype`, `location`, `department`, `workshift`, `uname`, `pword`, `status`, `createdby`, `profilepic`, `company`, `salaryscale`, `gphone`, `gemail`, `mstatus`, `joindate`, `addressy2`, `religion`, `nationality`, `lga`, `designation`, nextofkinr, kinaddress) VALUES ('$uniqid4', '$employeeid', '$fname', '$mname', '$lname', '$email', '$address', '$country', '$state', '$gender', '$phone', '$kinname', '$dofb', '$employmenttype', '$location', '$department', '$workshift', '$uname', '$pword', 'Active', '$uid', '$profilepic4', '$companyMain', '$salary', '$kinphone', '$kinemail', '$mstatus', '$joindate', '$address2', '$religion', '$nationality', '$lga', '$designation', '$kinrelationship', '$kinaddress')";

              if (mysqli_query($conn, $saveinsert1)) {
                $dinsert = mysqli_insert_id($conn);

                // salary
                $saveinsert2 = "INSERT INTO profile_salary (`pid`, `bankname`, `accountnumber`, `pensionadmin`, `rsapin`) VALUES ('$dinsert', '$bank_name', '$account_number', '$pfa', '$rsa_pin')";
                mysqli_query($conn, $saveinsert2);

                // profile_kin
                $saveinsert3 = "INSERT INTO profile_kin (`pid`, `name`, `relationship`, `phone`, `email`, `address`) VALUES ('$dinsert', '$kinname', '$kinrelationship', '$kinphone', '$kinemail', '$kinaddress')";
                mysqli_query($conn, $saveinsert3);

                // profile_emergency
                $saveinsert4 = "INSERT INTO profile_emergency (`pid`, `name1`, `relationship1`, `phone1`, `email1`, `name2`, `relationship2`, `phone2`, `email2`) VALUES ('$dinsert', '$ename1', '$erelationship1', '$ephone1', '$eemail1', '$ename2', '$erelationship2', '$ephone2', '$eemail2')";
                mysqli_query($conn, $saveinsert4);

                // profile_spouse
                $saveinsert5 = "INSERT INTO profile_spouse (`pid`, `name`, `occupation`, `dofb`, `gender`, `phone`, `address`) VALUES ('$dinsert', '$sname', '$soccupation', '$sdofb', '$sgender', '$sphone', '$saddress')";
                mysqli_query($conn, $saveinsert5);

                // profile_medical
                $saveinsert6 = "INSERT INTO profile_medical (`pid`, `medical1`, `medical2`, `medical3`, `medical4`, `medical5`, `medical6`, `medical7`, `medical8`, `medical9`, `medical10`) VALUES ('$dinsert', '$medical1', '$medical2', '$medical3', '$medical4', '$medical5', '$medical6', '$medical7', '$medical8', '$medical9', '$medical10')";
                mysqli_query($conn, $saveinsert6);

                // allconsent
                $saveinsert7 = "INSERT INTO allconsent (`pid`, `consent`) VALUES ('$dinsert', '$consent')";
                mysqli_query($conn, $saveinsert7);

                //log event
                log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Employee", "success", '', '', $_SESSION['logged']);

                // send mail
                $output = "<p>Dear $fname4,</p>";
                $output .= "<p>Your profile has just been created on $siteName with the sign-on details below.</p>";
                $output .= '<p>-------------------------------------------------------------</p>';
                $output .= "<p>Username: $uname4 <br>Password: $pword4.</p>";
                $output .= '<p>-------------------------------------------------------------</p>';
                $output .= "<p>Kindly go to <a href=$websiteMain/biodata/forgot.php target=_blank>$websiteMain/biodata/forgot.php</a> to change your password.</p>";
                $output .= '<p>-------------------------------------------------------------</p>';
                $output .= "<p>Go to <a href=$websiteMain/biodata/index.php target=_blank>$websiteMain/biodata/index.php</a> to see your attendance records,
   KPI information, submit a leave or exemption request and other profile management functions.</p>";
                $output .= '<p>Thanks,</p>';
                $output .= '<p>' . $siteName . ' Team</p>';
                $body = $output;
                $subject = "Profile Setup - $siteName";
                $email_to = $email4;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: <$websiteMainMail>" . "\r\n";
                mail($email_to, $subject, $body, $headers);

                // create attendance for employee

                $status = '
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Success!</strong> User Detail Successfully Inserted.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
              } else {
                $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
              }
              // end insert
            } else {
              $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. Maximum number of employee allocated reached.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
            }
          }
        }
      }
    }
  } elseif ($maintype == "edit") {

    $path = "../images/profilepics/";
    $oldimage = $_POST['oldpic'];

    $nuemail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE email='$email' AND employeeid != '$employeeid' AND company='$companyMain'"));
    $nuphone = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE phone='$phone' AND employeeid != '$employeeid' AND company='$companyMain'"));
    $nuuname = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE uname='$uname' AND employeeid != '$employeeid' AND company='$companyMain'"));

    if ($nuemail > 0) {
      $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Email Address already on file</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
    } else {
      if ($nuphone > 0) {
        $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Phone Number already on file</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
      } else {
        if ($nuuname > 0) {
          $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Inserting User Details. User Username aleady taken</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
        } else {
          // update the details

          // process image
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
            $profilepic4 = $newimage;

            //work image
            $filenamez = $path . $newimage;
            $filez = fopen($filenamez, "rb");
            $noimagez = fread($filez, filesize($filenamez));
            fclose($filez);
            $tehnoimagez = base64_encode($noimagez);

            $saveinsert1z = "UPDATE photos SET photo='$tehnoimagez', photo_preview='$tehnoimagez', updated_at='$cool', admin='$uid' WHERE applicant_id='$employeeid'";
            mysqli_query($conn, $saveinsert1z);
            // end image work


          } else {
            $profilepic4 = $oldimage;
          }



          $saveinsert1 = "UPDATE employee SET employeeid='$employeeid', fname='$fname', mname='$mname', lname='$lname', email='$email', address='$address', country='$country', salaryscale='$salary', state='$state', gender='$gender', phone='$phone', nextofkin='$kinname', dofb='$dofb', employmenttype='$employmenttype', location='$location', department='$department', workshift='$workshift', pword='$pword', updaby='$uid', gphone='$kinphone', gemail='$kinemail', `mstatus`='$mstatus', `joindate`='$joindate', `addressy2`='$address2', `religion`='$religion', `nationality`='$nationality', `lga`='$lga', `designation`='$designation', nextofkinr='$kinrelationship', kinaddress='$kinaddress' WHERE id='$theid'";
          if (mysqli_query($conn, $saveinsert1)) {

            // Salary (Insert if not exists, else Update)
            if (recordExists($conn, 'profile_salary', $theid)) {
              $query = "UPDATE profile_salary SET `bankname`='$bank_name', `accountnumber`='$account_number', `pensionadmin`='$pfa', `rsapin`='$rsa_pin' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO profile_salary (`pid`, `bankname`, `accountnumber`, `pensionadmin`, `rsapin`) VALUES ('$theid', '$bank_name', '$account_number', '$pfa', '$rsa_pin')";
            }
            mysqli_query($conn, $query);

            // Profile Kin (Insert if not exists, else Update)
            if (recordExists($conn, 'profile_kin', $theid)) {
              $query = "UPDATE profile_kin SET `name`='$kinname', `relationship`='$kinrelationship', `phone`='$kinphone', `email`='$kinemail', `address`='$kinaddress' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO profile_kin (`pid`, `name`, `relationship`, `phone`, `email`, `address`) VALUES ('$theid', '$kinname', '$kinrelationship', '$kinphone', '$kinemail', '$kinaddress')";
            }
            mysqli_query($conn, $query);

            // Profile Emergency (Insert if not exists, else Update)
            if (recordExists($conn, 'profile_emergency', $theid)) {
              $query = "UPDATE profile_emergency SET `name1`='$ename1', `relationship1`='$erelationship1', `phone1`='$ephone1', `email1`='$eemail1', `name2`='$ename2', `relationship2`='$erelationship2', `phone2`='$ephone2', `email2`='$eemail2' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO profile_emergency (`pid`, `name1`, `relationship1`, `phone1`, `email1`, `name2`, `relationship2`, `phone2`, `email2`) VALUES ('$theid', '$ename1', '$erelationship1', '$ephone1', '$eemail1', '$ename2', '$erelationship2', '$ephone2', '$eemail2')";
            }
            mysqli_query($conn, $query);

            // Profile Spouse (Insert if not exists, else Update)
            if (recordExists($conn, 'profile_spouse', $theid)) {
              $query = "UPDATE profile_spouse SET `name`='$sname', `occupation`='$soccupation', `dofb`='$sdofb', `gender`='$sgender', `phone`='$sphone', `address`='$saddress' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO profile_spouse (`pid`, `name`, `occupation`, `dofb`, `gender`, `phone`, `address`) VALUES ('$theid', '$sname', '$soccupation', '$sdofb', '$sgender', '$sphone', '$saddress')";
            }
            mysqli_query($conn, $query);

            // Profile Medical (Insert if not exists, else Update)
            if (recordExists($conn, 'profile_medical', $theid)) {
              $query = "UPDATE profile_medical SET `medical1`='$medical1', `medical2`='$medical2', `medical3`='$medical3', `medical4`='$medical4', `medical5`='$medical5', `medical6`='$medical6', `medical7`='$medical7', `medical8`='$medical8', `medical9`='$medical9', `medical10`='$medical10' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO profile_medical (`pid`, `medical1`, `medical2`, `medical3`, `medical4`, `medical5`, `medical6`, `medical7`, `medical8`, `medical9`, `medical10`) VALUES ('$theid', '$medical1', '$medical2', '$medical3', '$medical4', '$medical5', '$medical6', '$medical7', '$medical8', '$medical9', '$medical10')";
            }
            mysqli_query($conn, $query);

            // Allconsent (Insert if not exists, else Update)
            if (recordExists($conn, 'allconsent', $theid)) {
              $query = "UPDATE allconsent SET `consent`='$consent' WHERE `pid` = '$theid'";
            } else {
              $query = "INSERT INTO allconsent (`pid`, `consent`) VALUES ('$theid', '$consent')";
            }
            mysqli_query($conn, $query);


            //log event
            log_audit_event($uid, "UPDATE", "Updated record: $theid", "Employee Data", "success", '', '', $_SESSION['logged']);

            $status = '
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Success!</strong> User Detail Successfully Updated.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
          } else {
            $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Updating User Details.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
          }
          // end update
        }
      }
    }
  } else {
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
  <link href="../lib/timepicker/jquery.timepicker.css" rel="stylesheet">
  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../multi.min.css" />


  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .ui-datepicker {
      z-index: 99999 !important;
    }
  </style>
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <?php
  include '../auth/admin_header.php';

  include "" . __DIR__ . "/adminHeader.php";
  include "" . __DIR__ . "/sidebar.php";
  ?>
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <?php
  include("" . __DIR__ . "/pageName.php");

  ?>
  <main class="d-flex flex-column overflow-auto mb-4 gap-4 px-3">

    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <?php

    ?>

    <div class="container">
      <div>

        <?php echo $status; ?>



        <div class="table-responsive mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="wd-20p">Unique ID</th>
                <th class="wd-20p">Full Name</th>
                <th class="wd-20p">Location</th>
                <th class="wd-20p">Department</th>
                <th class="wd-10p">Status</th>
                <th class="">Phone number</th>
                <th class=""></th>
                <!-- -->
              </tr>
            </thead>
            <tbody>
              <?php
              $x = 0;

              $employees = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND company='$companyMain'");

              while ($emp = mysqli_fetch_array($employees)) {
                $eid           = $emp["id"];
                $empuniqid     = $emp["uniqid"];
                $employeeid    = $emp["employeeid"];
                $fname         = $emp["fname"];
                $mname         = $emp["mname"];
                $lname         = $emp["lname"];
                $email         = $emp["email"];
                $address       = $emp["address"];
                $country_id    = $emp["country"];
                $state_id      = $emp["state"];
                $gender        = $emp["gender"];
                $phone         = $emp["phone"];
                $nextofkin     = $emp["nextofkin"];
                $dofb          = $emp["dofb"];
                $employmenttype_id = $emp["employmenttype"];
                $location_id   = $emp["location"];
                $department_id = $emp["department"];
                $workshift_id  = $emp["workshift"];
                $uname         = $emp["uname"];
                $pword         = $emp["pword"];
                $status        = $emp["status"];
                $createdby     = $emp["createdby"];
                $profilepic    = $emp["profilepic"];
                $salaryscale_id = $emp["salaryscale"];

                // Fetch all related data using $getval helper
                $salaryscale34    = $getval("SELECT nickname FROM salaryscale WHERE id = '$salaryscale_id' AND company='$companyMain'")['nickname'] ?? '';
                $location         = $getval("SELECT locationname FROM location WHERE id = '$location_id' AND company='$companyMain'")['locationname'] ?? '';
                $department       = $getval("SELECT departmentname FROM departments WHERE id = '$department_id' AND company='$companyMain'")['departmentname'] ?? '';
                $workshift        = $getval("SELECT shiftname FROM workshift WHERE id = '$workshift_id' AND company='$companyMain'")['shiftname'] ?? '';
                $employmenttypey  = $getval("SELECT name FROM employmenttype WHERE id = '$employmenttype_id'")['name'] ?? '';

                $mainCountry          = $getval("SELECT name FROM country WHERE id = '$country_id'")['name'] ?? '';
                $state            = $getval("SELECT name FROM states WHERE id = '$state_id'")['name'] ?? '';

                // Fetch employee photo
                $photo_preview = $tehnoimage ?? '';
                $photo_row = $getval("SELECT photo_preview FROM photos WHERE applicant_id = '$employeeid' AND company='$companyMain'");
                if (!empty($photo_row)) {
                  $photo_preview = $photo_row['photo_preview'] ?? $photo_preview;
                }

                // UI status logic
                $statusd     = ($status === "Active") ? "badge-light-success" : "badge-light-danger";
                $btnactivate = ($status === "Active") ? "btn-danger" : "btn-success";
                $iconState   = ($status === "Active") ? "bg-success" : "bg-danger";
                $btnicon     = ($status === "Active") ? "fa-lock" : "fa-lock-open";
                $actionText  = ($status === "Active") ? "Deactivate user" : "Activate user";
                $onoff       = ($status === "Active") ? "InActive" : "Active";

                $x++;
              ?>
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                  <td><?= $x ?>.</td>
                  <td><?= $empuniqid ?></td>
                  <td class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                      <a href="#">
                        <div class="symbol-label">
                          <?php if (!empty($photo_row)): ?>
                            <img src="data:image/png;base64,<?= $photo_preview ?>" class="w-100">
                          <?php else: ?>
                            <img src="../images/employee/<?= $profilepic ?>" class="w-100">
                          <?php endif; ?>
                        </div>

                      </a>
                    </div>
                    <div class="d-flex flex-column">
                      <a href="#" class="text-gray-800 text-hover-black mb-1"><?= $lname . " " . $mname . " " . $fname ?></a>
                      <span><?= $email ?></span>
                    </div>
                  </td>
                  <td><?= $location ?></td>
                  <td><?= $department ?></td>
                  <td>
                    <span class="badge <?= $statusd ?>">
                      <span class="bullet <?= $iconState ?> me-2 h-5px w-5px fw-bold"></span> <?= $status ?>
                    </span>
                  </td>
                  <td><?= $phone ?></td>
                  <td>
                    <a href="#" class="btn btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                      <i class="ki-duotone ki-dots-horizontal" style="font-size: 40px;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                      </i>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                      <div class="menu-item"><a href="#" class="menu-link px-3 fw-bold" data-toggle="modal" data-target="#viewEmployeeModal<?= $eid ?>">View profile</a></div>
                      <!-- <div class="menu-item"><a href="" class="menu-link px-3 fw-bold" onclick="EditEmployee(<?= $eid ?>);" data-toggle="modal" data-target="#editemployee">Edit details</a></div>
                      <div class="menu-item"><a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="menu-link px-3 fw-bold" onclick="return confirmActivation(this.id);"><?= $actionText ?></a></div>
                      <div class="menu-item"><a href="?did=<?= $eid ?>" class="menu-link px-3 text-danger fw-bold" onclick="return confirmDelete();">Delete account</a></div> -->
                    </div>
                  </td>

                  <div class="modal fade" id="viewEmployeeModal<?= $eid ?>" tabindex="-1" aria-labelledby="viewUserModalLabel<?= $eid ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                      <div class="modal-content rounded-4 p-4">
                        <div class="modal-header border-0 pb-0">
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                          <div class="text-center mb-4">
                            <center>

                              <img src="../images/employee/<?= $profilepic ?>" class="rounded-circle mb-2" width="100" height="100" alt="User Avatar">
                            </center>

                            <h4 class="fw-bold mb-0"><?= $lname . " " . $mname . " " . $fname; ?></h4>
                            <small class="text-muted"><?= $employmenttypey ?></small>
                          </div>

                          <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Unique ID</strong>
                              <span><?= $empuniqid ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Location</strong>
                              <span><?= $location ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Department</strong>
                              <span class="badge bg-light text-dark"><?= $department ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Account Status</strong>
                              <span class="badge <?= $status == 'Active' ? 'bg-success' : 'bg-danger' ?> text-white">● <?= $status ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Phone number</strong>
                              <span><?= $phone ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Work schedule</strong>
                              <span><?= $workshift ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Gender</strong>
                              <span><?= $gender ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Email</strong>
                              <span><?= $email ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Address</strong>
                              <span><?= $address ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">State</strong>
                              <span><?= $state ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Country</strong>
                              <span><?= $mainCountry ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Employment type</strong>
                              <span><?= $employmenttypey ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                              <strong class="text-muted d-block">Date of Birth</strong>
                              <span><?= $dofb ?></span>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-center">
                              <img src="https://i.pravatar.cc/30" class="rounded-circle me-2" width="30" height="30" alt="Creator">
                              <span class="text-muted small"><?= $createdby ?></span>
                            </div>
                          </div>

                          <div class="d-grid gap-2">

                            <button class="btn btn-light-primary">View Basic Information</button>

                            <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-light-danger" onclick="return confirmActivation(this.id);">Deactivate User</a>

                            <a href="?activate=<?= $onoff ?>&id=<?= $eid ?>" id="<?= $onoff ?>" class="btn btn-danger" onclick="return confirmDelete(this.id);">Delete User Account</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php
                $location = "";
                $department = "";
                $workshift = "";
                $employmenttypey = "";
              }
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->

        <script>
          function ChangeState(str) {
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

          function ChangeStateU(str) {
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

      </div><!-- br-section-wrapper -->
    </div><!--  -->


    <?php

    // BE IN ALL PAGES
    include '../auth/admin_footer.php';

    ?>

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

    <script src="../multi.min.js"></script>

    <script>
      $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
      });

      $('#atype').change(function() {
        var b = $(this).val()
        ass(b);
      });
    </script>

    <script>
      var select = document.getElementById("fruit_select");
      multi(select, {
        enable_search: true
      });
    </script>

    <script>
      function Edit(str) {
        var str2 = "<?php echo $companyMain; ?>";
        if (str.length == 0) {
          document.getElementById("pasteedit").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("pasteedit").innerHTML = this.responseText;

              $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
              });
            }
          };
          xmlhttp.open("GET", "editemployee.php?q=" + str + "&com=" + str2, true);
          xmlhttp.send();
        }
      }

      function showpro(str) {
        var str2 = "<?php echo $companyMain; ?>";
        if (str.length == 0) {
          document.getElementById("profiledisplay").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("profiledisplay").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "profileshow.php?q=" + str + "&com=" + str2, true);
          xmlhttp.send();
        }
      }

      function ass(str) {
        var str2 = "<?php echo $companyMain; ?>";
        if (str.length == 0) {
          document.getElementById("assedit").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("assedit").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "assemployee.php?q=" + str + "&com=" + str2, true);
          xmlhttp.send();
        }
      }
    </script>

    <script>
      $(document).ready(function() {

        $('#addemployee').on('shown.bs.modal', function(e) {

          $(function() {
            'use strict';

            // Input Masks
            $('#dateMask').mask('9999-99-99');

            // Datepicker
            $('.fc-datepicker').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true,
              dateFormat: 'yy-mm-dd',
            });

          });

          $("#country").on('change', function() {
            var str = $(this).val();
            if (str.length == 0) {
              //document.getElementById("stateid").innerHTML = "";
              $("#stateid").html("");
              return;
            } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  //document.getElementById("stateid").innerHTML = this.responseText;
                  $("#stateid").html(this.responseText);
                }
              };
              xmlhttp.open("GET", "changestate.php?q=" + str, true);
              xmlhttp.send();
            }
          });

        });

        $('#editemployee').on('shown.bs.modal', function(e) {

          $(function() {
            'use strict';

            // Input Masks
            $('#dateMask2').mask('9999-99-99');

            // Datepicker
            $('.fc-datepicker').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true,
              dateFormat: 'yy-mm-dd',
            });

          });

          $("#country2").on('change', function() {
            var str = $(this).val();
            if (str.length == 0) {
              //document.getElementById("stateid").innerHTML = "";
              $("#stateid2").html("");
              return;
            } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  //document.getElementById("stateid").innerHTML = this.responseText;
                  $("#stateid2").html(this.responseText);
                }
              };
              xmlhttp.open("GET", "changestate.php?q=" + str, true);
              xmlhttp.send();
            }
          });
        });

        $('#modaldemo6').on('shown.bs.modal', function(e) {

          $("#countryU").on('change', function() {
            var str = $(this).val();
            if (str.length == 0) {
              //document.getElementById("stateid").innerHTML = "";
              $("#stateidU").html("");
              return;
            } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  //document.getElementById("stateid").innerHTML = this.responseText;
                  $("#stateidU").html(this.responseText);
                }
              };
              xmlhttp.open("GET", "changestate.php?q=" + str, true);
              xmlhttp.send();
            }
          });
        });


      });
    </script>
    <script>
      $(document).ready(function() {
        'use strict';

        // Initialize DataTable once
        var table = $('#datatable1').DataTable({
          responsive: true,
          language: {
            paginate: {
              previous: '<i class="fa fa-angle-left"></i> Previous',
              next: 'Next <i class="fa fa-angle-right"></i>'
            },
            searchPlaceholder: 'Search...',
            sSearch: '', // Keep empty to not render native input
            lengthMenu: '_MENU_ items/page',
            lengthChange: false, // hides "Show X items" dropdown

          }
        });

        // Bind custom search input
        $('#customTableSearch').on('keyup', function() {
          table.search(this.value).draw();
        });

        $('#entriesSelect').on('change', function() {
          const value = parseInt($(this).val(), 10);
          table.page.len(value).draw();
        });

        // Input Masks
        $('#dateMask').mask('9999-99-99');
        $('#phoneMask').mask('(999) 999-9999');

        // Enhance select dropdown with Select2
        $('.dataTables_length select').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

    <script>
      $(function() {
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function() {
          minimizeMenu();
        });

        //minimizeMenu();

        function minimizeMenu() {
          if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    <script>
      function fileValidation3() {
        var fileInput = document.getElementById('filecsv');
        var filePath = fileInput.value;

        // Allowing file type
        //var allowedExtensions = /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd)$/i;
        var allowedExtensions = /(\.csv)$/i;

        if (!allowedExtensions.exec(filePath)) {
          alert('Invalid file type. CSV files only allowed');
          fileInput.value = '';
          return false;
        }
      }

      function douser() {
        var a = document.getElementById('emailid');
        var b = document.getElementById('uname');

        b.value = a.value;
      }
    </script>

    <!-- add employee -->
    <div id="addemployee" class="modal fade effect-newspaper">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add User Information</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-0">
            <form id="addemployee2" action="" method="POST">
              <input type="hidden" name="addp" value="1">
              <div class="row no-gutters">
                <div class="col-lg-8 ">
                  <div class="pd-20 bd-r bd-success">
                    <h3 class="tx-inverse mg-b-25">Personal Information</h3>

                    <div class="d-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Firstname: <span class="tx-danger">*</span></label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Middlename: </label>
                        <input type="text" name="mname" class="form-control" placeholder="Middle Name">
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Lastname: <span class="tx-danger">*</span></label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div><!-- form-group -->
                    </div>

                    <div class="d-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Phone: </label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Birth Year <span class="tx-danger">*</span></label>
                        <input type="date" name="dofb" class="form-control" placeholder="YYYY-MM-DD" id="dateMask"
                          required>
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Gender: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 " name="gender" data-placeholder="Choose" required>
                          <option value="">Choose</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div><!-- form-group -->
                    </div>

                    <div class="mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Email: <span class="tx-danger">*</span></label>
                        <input type="email" name="email" id="emailid" class="form-control" placeholder="Email"
                          onblur="douser()" onchange="douser()" onkeyup="douser()" required>
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
                        <label>Next of Kin: <span class="tx-danger">*</span></label>
                        <input type="text" name="nextofkin" class="form-control" placeholder="Next of Kin" required>
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Next of Kin Relationship: <span class="tx-danger">*</span></label>
                        <input type="text" name="nextofkinr" class="form-control" placeholder="Next of Kin Relationship"
                          required>
                      </div><!-- form-group -->
                    </div>

                    <div class="d-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Next of Kin Phone No:</label>
                        <input type="text" name="gphone" class="form-control" placeholder="Next of Kin Phone No">
                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Next of Kin Email: </label>
                        <input type="text" name="gemail" class="form-control" placeholder="Next of Kin Email">
                      </div><!-- form-group -->
                    </div>

                    <div class=" mg-b-20">
                      <div class="form-group mg-b-0-force">
                        <label>Next of Kin Address: <span class="tx-danger">*</span></label>
                        <input type="text" name="kinaddress" class="form-control" placeholder="Next of Kin Address">
                      </div><!-- form-group -->
                    </div>

                    <div class="d-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Country: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 " name="country" id="country"
                          data-placeholder="Choose Country" onchange="ChangeState(this.value)" required>
                          <option value="">Choose Country</option>
                          <?php
                          $intload14gb = mysqli_query($conn, "SELECT * FROM country ORDER BY id asc");
                          while ($intload14agb = mysqli_fetch_array($intload14gb)) {
                            $inid14gb = $intload14agb["id"];
                            $iname14gb = $intload14agb["name"];
                          ?>
                            <option value="<?php echo $inid14gb; ?>"><?php echo $iname14gb; ?></option>
                          <?php
                          }
                          ?>
                        </select>

                      </div><!-- form-group -->
                      <div class="form-group mg-b-0 mg-l-10" id="stateid">
                        <label>State: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 " name="state" data-placeholder="Choose State" required>
                          <option value="">Choose State</option>
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
                <div class="col-lg-4 bg-white">
                  <div class="pd-20">
                    <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>

                    <div class="d-flex mg-b-20">
                      <div class="form-group mg-b-0">
                        <label>Unique ID: <span class="tx-danger">*</span></label>
                        <input type="text" name="uniqid" class="form-control" placeholder="Unique ID"
                          value="<?php echo $companyref . $coolo; ?>" required readonly>
                      </div><!-- form-group -->
                      <div class="form-group mg-l-10 mg-b-0">
                        <label>User ID: <span class="tx-danger">*</span></label>
                        <input type="text" id="employeeid" name="employeeid" class="form-control" placeholder="User ID"
                          required>
                      </div><!-- form-group -->
                    </div>

                    <div class="d-flex mg-b-20">

                      <div class="form-group mg-b-0">
                        <label>Employment Type: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 " name="employmenttype" data-placeholder="Choose" required>
                          <option value="">Choose</option>
                          <?php
                          $intload14 = mysqli_query($conn, "SELECT * FROM employmenttype ORDER BY id asc");
                          while ($intload14a = mysqli_fetch_array($intload14)) {
                            $inid14 = $intload14a["id"];
                            $iname14 = $intload14a["name"];
                          ?>
                            <option value="<?php echo $inid14; ?>"><?php echo $iname14; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div><!-- form-group -->

                      <div class="form-group mg-b-0 mg-l-10">
                        <label>Salary Scale: </label>
                        <select class="form-control select2 " name="salary" data-placeholder="Choose">
                          <option value="">Choose</option>
                          <?php
                          $intload14h = mysqli_query($conn, "SELECT * FROM salaryscale WHERE company='$companyMain' ORDER BY id asc");
                          while ($intload14ah = mysqli_fetch_array($intload14h)) {
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
                        <select class="form-control select2 " name="department" data-placeholder="Choose Department">
                          <option value="">Choose Department</option>
                          <?php
                          $intload1 = mysqli_query($conn, "SELECT * FROM departments WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
                          while ($intload1a = mysqli_fetch_array($intload1)) {
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
                        <select class="form-control select2 " name="workshift" data-placeholder="Choose Work Schedule"
                          required>
                          <option value="">Choose Work Schedule</option>
                          <?php
                          $intload2 = mysqli_query($conn, "SELECT * FROM workshift WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
                          while ($intload2a = mysqli_fetch_array($intload2)) {
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
                          $intload3 = mysqli_query($conn, "SELECT * FROM location WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY id asc");
                          while ($intload3a = mysqli_fetch_array($intload3)) {
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
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="User Username"
                          readonly required>
                      </div><!-- form-group -->
                      <div class="form-group mg-l-10 mg-b-0-force">
                        <label>Password: <span class="tx-danger">*</span></label>
                        <input type="text" name="pword" class="form-control" placeholder="User Password" required>
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
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit User Information</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-0">
            <form id="editemployee2" action="" method="POST" enctype="multipart/form-data">
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



    <!-- Group Assign Modal -->
    <!-- Assign Users Modal -->
    <div class="modal fade" id="assemployeemodal" tabindex="-1" aria-labelledby="assignUsersModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content p-4 rounded-3 shadow">
          <div class="modal-header border-0">
            <h5 class="modal-title" id="assignUsersModalLabel">Assign User(s)</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="assemployeeshow" method="POST" action="">
            <div class="modal-body">
              <!-- Assignment Type -->
              <div class="mb-4">
                <label class="form-label fw-semibold">Assignment Type <span class="text-danger">*</span></label>
                <div class="d-flex flex-wrap gap-3" id="atype">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="atype" value="1" required onchange="ass(this.value)">
                    <label class="form-check-label">Employment Type</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="atype" value="2" onchange="ass(this.value)">
                    <label class="form-check-label">Department</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="atype" value="3" onchange="ass(this.value)">
                    <label class="form-check-label">Work Schedule</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="atype" value="4" onchange="ass(this.value)">
                    <label class="form-check-label">Location</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="atype" value="5" onchange="ass(this.value)">
                    <label class="form-check-label">Salary Scale</label>
                  </div>
                </div>
              </div>

              <!-- Dynamically loaded assignment select -->
              <div id="assedit" class="mb-4"></div>

              <!-- Searchable Multi-User Checkbox -->
              <div class="mb-3">
                <label class="form-label fw-semibold">Select User(s) <span class="text-danger">*</span></label>

                <!-- Search and Select All -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <input type="text" class="form-control mb-2 w-50" placeholder="Search users..." onkeyup="filterUsers(this)">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="selectAll" onclick="toggleAllUsers(this)">
                    <label class="form-check-label small" for="selectAll">Select All</label>
                  </div>
                </div>

                <!-- User List -->
                <div id="userList" class="border rounded p-2" style="max-height: 250px; overflow-y: auto;">
                  <?php
                  $users = mysqli_query($conn, "SELECT * FROM employee WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY lname ASC");
                  while ($emp = mysqli_fetch_assoc($users)) {
                    $id = $emp['id'];
                    $name = $emp['lname'] . ' ' . $emp['mname'] . ' ' . $emp['fname'];
                    $empID = $emp['employeeid'];
                    $pic = !empty($emp['profilepic']) ? '../images/profilepics/' . $emp['profilepic'] : 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=0D8ABC&color=fff';
                    echo '
      <div class="form-check user-entry d-flex align-items-center gap-2 border-bottom py-2">
        <img src="' . $pic . '" alt="user" class="rounded-circle" width="36" height="36">
        <div class="d-flex flex-column flex-grow-1">
          <label class="form-check-label d-flex align-items-center gap-2 mb-0" for="emp' . $id . '">
            <input class="form-check-input user-checkbox" type="checkbox" name="employee[]" value="' . $id . '" id="emp' . $id . '" onchange="toggleSelectedState(this)">
            <span>(' . $empID . ') ' . $name . '</span>
            <span class="text-black d-none selected-badge"><i class="bi bi-check-circle-fill"></i> Selected</span>
          </label>
        </div>
      </div>';
                  }
                  ?>
                </div>
              </div>

            </div>

            <div class="modal-footer border-0 pt-0">
              <button type="submit" class="btn btn-primary" form="assemployeeshow">Assign User(s)</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>




    <!-- Import Modal -->
    <div class="modal fade" id="modaldemo6" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-4">

          <!-- Modal Header -->
          <div class="modal-header border-0">
            <h3 class="modal-title fw-bold text-dark" id="importModalLabel">Import Employee Info</h3>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body px-4">
            <form method="POST" action="" enctype="multipart/form-data">

              <!-- Upload Instructions -->
              <div class="mb-3">
                <h6 class="fw-bold text-dark">Important information</h6>
                <p class="text-muted mb-1">The upload file MUST be a comma seperated CSV file arranged in the table structure below.
                  All headers must be removed and first colun must be User ID column. Check sample file below</p>
                <ul class="small text-muted ps-3 mb-3">
                  <li>User ID = CSV column[0]</li>
                  <li>First Name = CSV column[1]</li>
                  <li>Middle Name = CSV column[2]</li>
                  <li>Last Name = CSV column[3]</li>
                  <li>Email Address = CSV column[4]</li>
                  <li>Full Address = CSV column[5]</li>
                  <li>Gender = CSV column[6]</li>
                  <li>Phone Number = CSV column[7]</li>
                  <li>Next of Kin = CSV column[8]</li>
                  <li>Date of Birth = CSV column[9]</li>
                </ul>
              </div>

              <!-- CSV File Upload -->
              <div class="mb-4">
                <label class="form-label fw-semibold">CSV File <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center p-3 bg-white border rounded shadow-sm" id="fileContainer">
                  <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/yrtdlp90_expires_30_days.png" width="22" height="22" class="me-2" />
                  <span id="fileName" class="me-auto text-dark">No file chosen</span>
                  <input type="file" name="file" id="filecsv" class="d-none" onchange="handleFileChange()" required>
                  <label for="filecsv" class="btn btn-sm btn-light-secondary text-dark me-2 mb-0">Choose File</label>
                  <button type="button" class="btn btn-sm btn-light-danger d-none" id="deleteBtn" onclick="clearFile()">Delete</button>
                </div>
              </div>

              <!-- Country -->
              <div class="mb-3">
                <label class="form-label fw-semibold">Country <span class="text-danger">*</span></label>
                <select class="form-select" name="country" id="countryU" onchange="ChangeStateU(this.value)" required>
                  <option value="">Choose Country</option>
                  <?php
                  $intload14gb = mysqli_query($conn, "SELECT * FROM country ORDER BY id ASC");
                  while ($intload14agb = mysqli_fetch_array($intload14gb)) {
                    $inid14gb = $intload14agb["id"];
                    $iname14gb = $intload14agb["name"];
                    echo "<option value=\"$inid14gb\">$iname14gb</option>";
                  }
                  ?>
                </select>
              </div>

              <!-- State -->
              <div class="mb-4" id="stateidU">
                <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                <select class="form-select" name="state" required>
                  <option value="">Choose State</option>
                </select>
              </div>

              <!-- Submit -->
              <button type="submit" name="submit_file" class="btn btn-primary text-white w-100 py-3 fw-bold rounded-pill">
                Upload Users
              </button>

            </form>
          </div>

        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="profiledisplay">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </main>



  <!-- JS for file preview & delete -->
  <script>
    function handleFileChange() {
      const fileInput = document.getElementById('filecsv');
      const fileName = document.getElementById('fileName');
      const deleteBtn = document.getElementById('deleteBtn');

      if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
        deleteBtn.classList.remove('d-none');
      } else {
        fileName.textContent = "No file chosen";
        deleteBtn.classList.add('d-none');
      }
    }

    function clearFile() {
      const fileInput = document.getElementById('filecsv');
      const fileName = document.getElementById('fileName');
      const deleteBtn = document.getElementById('deleteBtn');

      fileInput.value = '';
      fileName.textContent = "No file chosen";
      deleteBtn.classList.add('d-none');
    }

    // $(document).ready(function() {
    //   $('.select2').select2({
    //     dropdownParent: $('#assemployeemodal')
    //   });
    // });

    function toggleAllUsers(source) {
      const checkboxes = document.querySelectorAll('.user-checkbox');
      checkboxes.forEach(cb => {
        cb.checked = source.checked;
        toggleSelectedState(cb);
      });
    }

    function toggleSelectedState(checkbox) {
      const badge = checkbox.closest('label').querySelector('.selected-badge');
      if (checkbox.checked) {
        badge.classList.remove('d-none');
      } else {
        badge.classList.add('d-none');
      }
    }

    function filterUsers(input) {
      const filter = input.value.toLowerCase().trim();

      document.querySelectorAll('#userList .user-entry').forEach(entry => {
        const spans = entry.querySelectorAll('label span');
        let nameText = '';
        spans.forEach(span => {
          if (!span.classList.contains('selected-badge')) {
            nameText = span.innerText.toLowerCase();
          }
        });

        entry.style.display = nameText.includes(filter) ? '' : 'none';
      });
    }
  </script>

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    // Initialize Select2
    $(document).ready(function() {
      $('.select2').select2({
        dropdownParent: $('#assemployeemodal'),
        width: '100%'

      });
    });
  </script>

</body>

</html>