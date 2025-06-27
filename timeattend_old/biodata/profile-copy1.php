<?php
include("" . $_SERVER['DOCUMENT_ROOT'] . "/biodata/header.php");

$cool = time();
//$coolo = $cool.substr(4);
$coolo = substr($cool,5,5);

// Function to check if the record exists
function recordExists($conn, $table, $pid)
{
  $query = "SELECT 1 FROM `$table` WHERE `pid` = '$pid' LIMIT 1";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result) > 0;
}

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
            //log_audit_event($uid, "UPDATE", "Updated record: $theid", "Employee Data", "success", '', '', $_SESSION['logged']);

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

$closeall = '1';

$q = $_GET['q'] ?? '';
//$companyMain = $_GET['com'] ?? '';

if(isset($_GET['q'])){
    $mainreadonly = 'readonly';
    $maintype = "edit";
    $theid = $q;
} else {
    $mainreadonly = 'readonly';
    $maintype = "add";
    $theid = "0";
}

if(isset($_GET['x'])){
    $closeall = '0';
}

$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
    $eidy = $bookpay["id"];
    $uniqid = $bookpay["uniqid"];
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
    $gphone = $bookpay["gphone"];
    $gemail = $bookpay["gemail"];

    $mstatus = $bookpay["mstatus"];
    $joindate = $bookpay["joindate"];
    $addressy2 = $bookpay["addressy2"];
    $religion = $bookpay["religion"];
    $nationality = $bookpay["nationality"];
    $lga = $bookpay["lga"];
    $designation = $bookpay["designation"];
    $nextofkinr = $bookpay["nextofkinr"];
    $kinaddress = $bookpay["kinaddress"];

    $huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
    while ($hugya = mysqli_fetch_array($huya)) {
        $salaryscale3 = $hugya["nickname"];
    }

    $huy = mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1y' AND company='$companyMain'");
    while ($hugy = mysqli_fetch_array($huy)) {
        $locationy = $hugy["locationname"];
    }

    $hu1y = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1y' AND company='$companyMain'");
    while ($hug1y = mysqli_fetch_array($hu1y)) {
        $departmenty = $hug1y["departmentname"];
    }

    $hu2y = mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1y' AND company='$companyMain'");
    while ($hug2y = mysqli_fetch_array($hu2y)) {
        $workshifty = $hug2y["shiftname"];
    }

    $hu3y = mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttypey1'");
    while ($hug3y = mysqli_fetch_array($hu3y)) {
        $employmenttypey = $hug3y["name"];
    }

    $hu2yc = mysqli_query($conn, "SELECT * FROM country WHERE id = '$countryy'");
    while ($hug2yc = mysqli_fetch_array($hu2yc)) {
        $countryyname = $hug2yc["name"];
    }

    $hu3ys = mysqli_query($conn, "SELECT * FROM states WHERE id = '$statey'");
    while ($hug3ys = mysqli_fetch_array($hu3ys)) {
        $stateyname = $hug3ys["name"];
    }

    $hu3ysx = mysqli_query($conn, "SELECT * FROM lga WHERE id = '$lga'");
    while ($hug3ysz = mysqli_fetch_array($hu3ysx)) {
        $lganame = $hug3ysz["name"];
    }

}

// salary
$salaryq = mysqli_query($conn, "SELECT * FROM profile_salary WHERE pid = '$q'");
while ($salaryq1 = mysqli_fetch_array($salaryq)) {
    $bank_nameid = $salaryq1["bankname"];
    $account_number = $salaryq1["accountnumber"];
    $pfaid = $salaryq1["pensionadmin"];
    $rsa_pin = $salaryq1["rsapin"];

    $banki = mysqli_query($conn, "SELECT * FROM pension_funds WHERE id = '$pfaid'");
    while ($bankiy = mysqli_fetch_array($banki)) {
        $pfa = $bankiy["pfa_name"];
    }

    $banki1 = mysqli_query($conn, "SELECT * FROM banks WHERE id = '$bank_nameid'");
    while ($bankiy1 = mysqli_fetch_array($banki1)) {
        $bank_name = $bankiy1["bank_name"];
    }
}

// Fetch Next of Kin details
$salaryq1 = mysqli_query($conn, "SELECT * FROM profile_kin WHERE pid = '$q'");
$kin = mysqli_fetch_array($salaryq1);

// Fetch Emergency Contact details
$salaryq2 = mysqli_query($conn, "SELECT * FROM profile_emergency WHERE pid = '$q'");
$emergency = mysqli_fetch_array($salaryq2);

// Fetch Spouse details
$salaryq3 = mysqli_query($conn, "SELECT * FROM profile_spouse WHERE pid = '$q'");
$spouse = mysqli_fetch_array($salaryq3);

// Fetch children details
$salaryq4 = mysqli_query($conn, "SELECT * FROM profile_children WHERE pid = '$q'");

// Fetch profile_employers details
$salaryq5 = mysqli_query($conn, "SELECT * FROM profile_employers WHERE pid = '$q'");

// Fetch profile_references details
$salaryq6 = mysqli_query($conn, "SELECT * FROM profile_references WHERE pid = '$q'");

// Fetch profile_references details
$salaryq7 = mysqli_query($conn, "SELECT * FROM profile_education WHERE pid = '$q'");

// Fetch profile_medical details
$salaryq8 = mysqli_query($conn, "SELECT * FROM profile_medical WHERE pid = '$q'");
$medical = mysqli_fetch_array($salaryq8);

// Fetch consent details
$salaryq9 = mysqli_query($conn, "SELECT * FROM allconsent WHERE pid = '$q'");
$consent = mysqli_fetch_array($salaryq9);

$bank_query = "SELECT * FROM banks";
$bank_result = $conn->query($bank_query);

// Fetch pension fund administrators (PFAs)
$pfa_query = "SELECT * FROM pension_funds";
$pfa_result = $conn->query($pfa_query);

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

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
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
    include("" . $_SERVER['DOCUMENT_ROOT'] . "/biodata/left_panel.php");
    ?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <?php
    include("" . $_SERVER['DOCUMENT_ROOT'] . "/biodata/head_panel.php");
    ?>
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <?php
    include("" . $_SERVER['DOCUMENT_ROOT'] . "/biodata/right_panel.php");
    ?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <!-- br-mainpanel -->
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-contact-outline"></i>
            <div>
                <h4>User Management</h4>
                <p class="mg-b-0">User Management Panel - Employee Profile.</p>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                <?php echo $status; ?>

                <!--<div class="d-flex justify-content-between align-items-center">
                    <div>
                        <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i
                                class="fa fa-plus mg-r-10"></i> Add User</button>
                    </div>
                </div>-->
                <form id="mainForm" method="POST" action="" enctype="multipart/form-data">

                <?php if (!empty($profilepicy)) { ?>
                    <div class="card widget-4">
                        <div class="card-body">
                            <div class="card-profile-img">
                                <img src="../images/profilepics/<?php echo $profilepicy; ?>" height="120" width="120" alt="">
                            </div><!-- card-profile-img -->
                            <h4 class="tx-roboto br-section-label"><?php echo "$fnamey $mnamey $lnamey"; ?></h4>
                            <p class="mg-b-25 tx-normal "><?php echo $designation; ?></p>

                            <p>
                                <?php if($closeall == "1"){ ?>
                                <a href="?q=<?php echo $q; ?>&x=x" class="btn btn-info">Update Profile</a>
                                <?php } ?>
                            </p>

                            <!--<p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">Singer, Lawyer, Achiever, Wearer of unrelated hats, Data Visualizer, Mayonaise Tester. I don't know what alt-tab does. Storyteller.</p>-->
                        </div><!-- card-body -->
                    </div><!-- card -->
                <?php } ?>

                <div id="wizard2" class="mt-3">
                    <input type="hidden" name="maintype" value="<?php echo $maintype; ?>" required>
                    <input type="hidden" name="theid" value="<?php echo $q; ?>" required>
                    <input type="hidden" name="oldpic" value="<?php echo $profilepicy; ?>">

                    <h3>Personal Information</h3>
                    <section>
                        <p>Try the keyboard navigation by clicking arrow left or right!</p>
                        <div class="d-flex mg-b-20">
                            <div class="form-group wd-xs-300">
                                <label class="form-control-label">Join Date:<span class="tx-danger">*</span></label>
                                <input id="joindate" class="form-control fc-datepicker" name="joindate"
                                    placeholder="Enter Join Date" type="date" value="<?php echo $joindate ?? ''; ?>"
                                    readonly required>
                            </div><!-- form-group -->

                            <div class="form-group wd-xs-300 mg-l-10">
                                <label class="form-control-label">Nationality: <span class="tx-danger">*</span></label>
                                <input id="nationality" class="form-control" name="nationality"
                                    placeholder="Enter Nationality" type="text"
                                    value="<?php echo $nationality ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">
                            <div class="form-group mg-b-0 wd-xs-300">
                                <label>Firstname: <span class="tx-danger">*</span></label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name"
                                    value="<?php echo $fnamey ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 wd-xs-300 mg-l-10">
                                <label>Middlename: </label>
                                <input type="text" id="mname" name="mname" class="form-control"
                                    placeholder="Middle Name" value="<?php echo $mnamey ?? ''; ?>" readonly>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 wd-xs-300 mg-l-10">
                                <label>Lastname: <span class="tx-danger">*</span></label>
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name"
                                    value="<?php echo $lnamey ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">
                            <div class="form-group mg-b-0 wd-xs-300">
                                <label>Date of Birth: <span class="tx-danger">*</span></label>
                                <input type="date" name="dofb" class="form-control fc-datepicker" id="dateMask2"
                                    value="<?php echo $dofby ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 mg-l-10 wd-xs-300">
                                <label>Gender: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="gender" name="gender" data-placeholder="Choose"
                                readonly required>
                                    <option value="<?php echo $gendery ?? ''; ?>">
                                        <?php echo $gendery ?? '--Select Gender--'; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div><!-- form-group -->

                            <div class="form-group mg-b-0 mg-l-10 wd-xs-300">
                                <label>Marita Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="mstatus" name="mstatus"
                                    data-placeholder="Choose" required>
                                    <option value="<?php echo $mstatus ?? ''; ?>">
                                        <?php echo $mstatus ?? '--Select Marital Status--'; ?></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">
                            <div class="form-group mg-b-0 wd-xs-300">
                                <label>Religion: </label>
                                <select class="form-control select2" id="religion" name="religion"
                                    data-placeholder="Choose">
                                    <option value="<?php echo $religion ?? ''; ?>">
                                        <?php echo $religion ?? '--Select Religion--'; ?></option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Traditional">Traditional</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 mg-l-10 wd-xs-300">
                                <label>Phone: <span class="tx-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control dateMask"
                                    placeholder="Phone" value="<?php echo $phoney ?? ''; ?>" maxlength="11"
                                    pattern="\d{11}" required>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 mg-l-10 wd-xs-300">
                                <label>Email: <span class="tx-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                    value="<?php echo $emaily ?? ''; ?>" oninput="syncUname()" readonly required>
                            </div><!-- form-group -->

                        </div>

                        <div class="d-flex mg-b-20">
                            <div class="form-group mg-b-0-force wd-xs-450">
                                <label>Residential Address: <span class="tx-danger">*</span></label>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="Residential Address" value="<?php echo $addressy ?? ''; ?>" required>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0-force mg-l-10 wd-xs-450">
                                <label>Mailing Address: <span class="tx-danger">*</span></label>
                                <input type="text" id="address2" name="address2" class="form-control"
                                    placeholder="Mailing Address" value="<?php echo $addressy2 ?? ''; ?>" required>
                            </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">

                            <div class="form-group mg-b-0 wd-xs-300">
                                <label>Country: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " name="country" id="country2"
                                    data-placeholder="Choose Country" onchange="ChangeStateU(this.value)" required>
                                    <option value="<?php echo $countryy ?? ''; ?>">
                                        <?php echo $countryyname ?? '--Select Country--'; ?></option>
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
                            <div class="form-group mg-b-0 wd-xs-300 mg-l-10" id="stateid2">
                                <label>State: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="state" name="stateU"
                                    data-placeholder="Choose State" onchange="ChangelgaU(this.value)" required>
                                    <option value="<?php echo $statey ?? ''; ?>">
                                        <?php echo $stateyname ?? '--Select State--'; ?></option>
                                </select>
                            </div><!-- form-group -->
                            <div class="form-group mg-b-0 wd-xs-300 mg-l-10" id="lga2">
                                <label>Local Gorvernment Area: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="lga" name="lga" data-placeholder="Choose LGA"
                                    required>
                                    <option value="<?php echo $lga ?? ''; ?>">
                                        <?php echo $lganame ?? '--Select LGA--'; ?></option>
                                </select>
                            </div><!-- form-group -->
                        </div>

<script>
    document.getElementById("gender").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
</script>

                    </section>

                    <h3>Organisation Information</h3>
                    <section>
                        <div class="d-flex mg-b-20 mg-t-20">
                            <div class="form-group mg-b-0 wd-xs-300">
                                <label>Designation: <span class="tx-danger">*</span></label>
                                <input type="text" id="designation" name="designation" class="form-control"
                                    placeholder="Designation" value="<?php echo $designation ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                            <div class="form-group mg-l-10 mg-b-0 wd-xs-300">
                                <label>Employment Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="employmenttype" name="employmenttype"
                                    data-placeholder="Choose" readonly required>
                                    <option value="<?php echo $employmenttypey1 ?? ''; ?>">
                                        <?php echo $employmenttypey ?? '--Select Employment Type--'; ?>
                                    </option>
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
                            <div class="form-group mg-l-10 mg-b-0 wd-xs-300">
                                <label>Salary Scale: </label>
                                <select class="form-control select2 " id="salary" name="salary"
                                    data-placeholder="Choose" readonly required>
                                    <option value="<?php echo $salaryscale2 ?? ''; ?>">
                                        <?php echo $salaryscale3 ?? '--Select Salary Scale--'; ?></option>
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

                        <div class="d-flex mg-b-40">
                            <div class="form-group mg-b-0-force wd-xs-300">
                                <label>Department: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="department" name="department"
                                    placeholder="Choose Department" readonly required>
                                    <option value="<?php echo $department1y ?? ''; ?>">
                                        <?php echo $departmenty ?? '--Select Department--'; ?></option>
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
                            <div class="form-group mg-b-0-force mg-l-10 wd-xs-300">
                                <label>Work Schedule: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="workshift" name="workshift"
                                    placeholder="Choose Work Schedule" readonly required>
                                    <option value="<?php echo $workshift1y ?? ''; ?>">
                                        <?php echo $workshifty ?? '--Select Work Schedule--'; ?></option>
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
                            <div class="form-group mg-b-0-force mg-l-10 wd-xs-300">
                                <label>Location: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 " id="location" name="location"
                                    placeholder="Choose Location" readonly required>
                                    <option value="<?php echo $location1y ?? ''; ?>">
                                        <?php echo $locationy ?? '--Select Location--'; ?></option>
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

                        <h5 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h5>

                        <div class="d-flex mg-b-0">
                            <div class="form-group mg-b-0 wd-xs-250">
                                <label>Unique ID: <span class="tx-danger">*</span></label>
                                <input type="text" id="uniqid" name="uniqid" class="form-control"
                                    placeholder="Unique ID" value="<?php echo $uniqid ?? $companyref.$coolo; ?>" required readonly>
                            </div><!-- form-group -->
                            <div class="form-group mg-l-10 mg-b-0 wd-xs-250">
                                <label>User ID: <span class="tx-danger">*</span></label>
                                <input type="text" id="employeeid" name="employeeid" class="form-control"
                                    placeholder="User ID" value="<?php echo $employeeidy ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                            <div class="form-group mg-l-10 mg-b-0-force wd-xs-200">
                                <label>User Name: <span class="tx-danger">*</span></label>
                                <input type="text" id="uname" name="uname" class="form-control"
                                    placeholder="User Username" value="<?php echo $unamey ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                            <div class="form-group mg-l-10 mg-b-0-force wd-xs-200">
                                <label>Password: <span class="tx-danger">*</span></label>
                                <input type="password" id="pword" name="pword" class="form-control"
                                    placeholder="User Password" value="<?php echo $pwordy ?? ''; ?>" readonly required>
                            </div><!-- form-group -->
                        </div>

<script>
    document.getElementById("employmenttype").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
    document.getElementById("salary").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
    document.getElementById("department").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
    document.getElementById("workshift").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
    document.getElementById("location").addEventListener("mousedown", function(event) {
        event.preventDefault(); // Prevents dropdown from opening
    });
</script>

                    </section>

                    <h3>Salary Information</h3>
                    <section>
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <select class="form-control" id="bank_name" name="bank_name">
                                <!--<option value="">-- Select Bank --</option>-->
                                <option value="<?php echo $bank_nameid ?? ''; ?>"><?php echo $bank_name ?? '--Select Bank Name--'; ?></option>
                                <?php while ($bank = $bank_result->fetch_assoc()): ?>
                                    <option value="<?php echo $bank['bank_name']; ?>"><?php echo $bank['bank_name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="account_number">Bank Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number"
                                placeholder="Enter your account number" maxlength="10" pattern="\d{10}"
                                title="Bank account number must be 10 digits"
                                value="<?php echo $account_number ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="pfa">Pension Fund Administrator</label>
                            <select class="form-control" id="pfa" name="pfa">
                                <!--<option value="">-- Select PFA --</option>-->
                                <option value="<?php echo $pfaid ?? ''; ?>"><?php echo $pfa ?? '--Select Pension Fund Administrator--'; ?></option>
                                <?php while ($pfa = $pfa_result->fetch_assoc()): ?>
                                    <option value="<?php echo $pfa['pfa_name']; ?>"><?php echo $pfa['pfa_name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rsa_pin">RSA PIN</label>
                            <input type="text" class="form-control" id="rsa_pin" name="rsa_pin"
                                placeholder="Enter your RSA PIN" maxlength="12" value="<?php echo $rsa_pin ?? ''; ?>">
                        </div>
                    </section>

                    <h3>Next of Kin details</h3>
                    <section>
                        <div class="form-group">
                            <label for="kinname">Next of Kin Name</label>
                            <input placeholder="Enter Next of Kin Name" type="text" class="form-control" id="kinname"
                                name="kinname" value="<?php echo $kin['name'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kinrelationship">Next of Kin Relationship</label>
                            <input placeholder="Enter Next of Kin Relationship" type="text" class="form-control"
                                id="kinrelationship" name="kinrelationship"
                                value="<?php echo $kin['relationship'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kinphone">Next of Kin Phone Number</label>
                            <input placeholder="Enter Next of Kin Phone" type="text" class="form-control" id="kinphone"
                                name="kinphone" value="<?php echo $kin['phone'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kinemail">Next of Kin Email Address</label>
                            <input placeholder="Enter Next of Kin Email" type="email" class="form-control" id="kinemail"
                                name="kinemail" value="<?php echo $kin['email'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kinaddress">Next of Kin Address</label>
                            <input placeholder="Enter Next of Kin Address" type="text" class="form-control"
                                id="kinaddress" name="kinaddress" value="<?php echo $kin['address'] ?? ''; ?>">
                        </div>
                    </section>

                    <h3>Emergency Contact details</h3>
                    <section>
                        <div class="d-flex justify-content-between mg-b-20 mg-t-20">
                            <div class="w-50">
                                <div class="form-group">
                                    <label for="ename1">Emergency Contact 1 - Full Name</label>
                                    <input placeholder="Enter Emergency1 Contact Name" type="text" class="form-control"
                                        id="ename1" name="ename1" value="<?php echo $emergency['name1'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="erelationship1">Emergency Contact 1 Relationship</label>
                                    <input placeholder="Enter Emergency1 Contact Relationship" type="text"
                                        class="form-control" id="erelationship1" name="erelationship1"
                                        value="<?php echo $emergency['relationship1'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ephone1">Emergency Contact 1 Phone Number</label>
                                    <input placeholder="EnterEmergency1 Contact Phone" type="text" class="form-control"
                                        id="ephone1" name="ephone1" value="<?php echo $emergency['phone1'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eemail1">Emergency Contact 1 Email Address</label>
                                    <input placeholder="Enter Emergency1 Contact Email" type="email"
                                        class="form-control" id="eemail1" name="eemail1"
                                        value="<?php echo $emergency['email1'] ?? ''; ?>">
                                </div>
                            </div>
                            <div class="w-50 mg-l-10">
                                <div class="form-group">
                                    <label for="ename2">Emergency Contact 2 - Full Name</label>
                                    <input placeholder="Enter Emergency2 Contact Name" type="text" class="form-control"
                                        id="ename2" name="ename2" value="<?php echo $emergency['name2'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="erelationship2">Emergency Contact 2 Relationship</label>
                                    <input placeholder="Enter Emergency2 Contact Relationship" type="text"
                                        class="form-control" id="erelationship2" name="erelationship2"
                                        value="<?php echo $emergency['relationship2'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ephone2">Emergency Contact 2 Phone Number</label>
                                    <input placeholder="Enter Emergency2 Contact Phone" type="text" class="form-control"
                                        id="ephone2" name="ephone2" value="<?php echo $emergency['phone2'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eemail2">Emergency Contact 2 Email Address</label>
                                    <input placeholder="Enter Emergency2 Contact Email" type="email"
                                        class="form-control" id="eemail2" name="eemail2"
                                        value="<?php echo $emergency['email2'] ?? ''; ?>">
                                </div>
                            </div>
                        </div>
                    </section>

                    <h3>Dependents (Spouse & Children)</h3>
                    <section>
                        <div class="d-flex justify-content-between mg-b-20 mg-t-20">
                            <div class="w-50">
                                <h4>Spouse Details</h4>
                                <div class="form-group">
                                    <label for="sname">Name</label>
                                    <input placeholder="Enter Spouse Name" type="text" class="form-control" id="sname"
                                        name="sname" value="<?php echo $spouse['name'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="soccupation">Occupation</label>
                                    <input placeholder="Enter Spouse Occupation" type="text" class="form-control"
                                        id="soccupation" name="soccupation"
                                        value="<?php echo $spouse['occupation'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="sdofb">Date of Birth</label>
                                    <input placeholder="Enter Spouse Date of Birth" type="date" class="form-control"
                                        id="sdofb" name="sdofb" value="<?php echo $spouse['dofb'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="sgender">Gender</label>
                                    <select class="form-control" id="sgender" name="sgender">
                                            <option value="<?php echo $spouse['gender'] ?? ''; ?>"><?php echo $spouse['gender'] ?? '--Select Gender--'; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sphone">Phone Number</label>
                                    <input placeholder="Enter Spouse Phone" type="text" class="form-control" id="sphone"
                                        name="sphone" value="<?php echo $spouse['phone'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="saddress">Residential Address</label>
                                    <input placeholder="Enter Spouse Address" type="text" class="form-control"
                                        id="saddress" name="saddress" value="<?php echo $spouse['address'] ?? ''; ?>">
                                </div>
                            </div>
                            <div class="w-50 mg-l-10">
                                <h4>Children Details</h4>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                        data-target="#addChildModal">Add Child</button>
                                </div>

                                <table class="table table-bordered datatable1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="childrenTable">
                                        <?php while ($child = mysqli_fetch_assoc($salaryq4)): ?>
                                            <tr id="row_<?php echo $child['id']; ?>">
                                                <td><?php echo $child['name']; ?></td>
                                                <td><?php echo $child['dofb']; ?></td>
                                                <td><?php echo $child['gender']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="deleteChild(<?php echo $child['id']; ?>)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>

                    <h3>Previous Employers</h3>
                    <section>
                        <p>Employers Details.</p>
                        <div class="mg-l-10">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addEmpModal">Add
                                    Employer</button>
                            </div>

                            <table class="table table-bordered datatable1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name of Organisation</th>
                                        <th>Role</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="empTable">
                                    <?php while ($emp = mysqli_fetch_assoc($salaryq5)): ?>
                                        <tr id="rowe_<?php echo $emp['id']; ?>">
                                            <td><?php echo $emp['name']; ?></td>
                                            <td><?php echo $emp['myrole']; ?></td>
                                            <td><?php echo $emp['startdate']; ?></td>
                                            <td><?php echo $emp['enddate']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteEmp(<?php echo $emp['id']; ?>)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </section>

                    <h3>References</h3>
                    <section>
                        <p>Your Referees</p>
                        <div class="mg-l-10">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addRefModal">Add
                                    Referee</button>
                            </div>

                            <table class="table table-bordered datatable1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name of Referee</th>
                                        <th>Address</th>
                                        <th>Phone number</th>
                                        <th>Email Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="RefTable">
                                    <?php while ($emp1 = mysqli_fetch_assoc($salaryq6)): ?>
                                        <tr id="rower_<?php echo $emp1['id']; ?>">
                                            <td><?php echo $emp1['name']; ?></td>
                                            <td><?php echo $emp1['address']; ?></td>
                                            <td><?php echo $emp1['phone']; ?></td>
                                            <td><?php echo $emp1['email']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteRef(<?php echo $emp1['id']; ?>)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </section>

                    <h3>Educational Qualification</h3>
                    <section>
                        <p>Your Qualification</p>
                        <div class="mg-l-10">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addEduModal">Add
                                    Qualification</button>
                            </div>

                            <table class="table table-bordered datatable1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name of Institution</th>
                                        <th>Period</th>
                                        <th>Qualification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="EduTable">
                                    <?php while ($emp12 = mysqli_fetch_assoc($salaryq7)): ?>
                                        <tr id="rowedu_<?php echo $emp12['id']; ?>">
                                            <td><?php echo $emp12['school']; ?></td>
                                            <td><?php echo $emp12['schoolperiod']; ?></td>
                                            <td><?php echo $emp12['qualification']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteEdu(<?php echo $emp12['id']; ?>)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </section>

                    <h3>Medical Information</h3>
                    <section>
                        <div class="row mg-b-20 mg-t-20">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="medical1">Blood Group Type</label>
                                    <input placeholder="Enter Blood Group Type" type="text" class="form-control"
                                        id="medical1" name="medical1" value="<?php echo $medical['medical1'] ?? ''; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="medical2">Blood Group Comment</label>
                                    <input placeholder="Enter Blood Group Comment" type="text"
                                        class="form-control" id="medical2" name="medical2"
                                        value="<?php echo $medical['medical2'] ?? ''; ?>">
                                </div> 
                            </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical3">Genotype Type</label>
                                        <input placeholder="Enter Genotype Type" type="text"
                                            class="form-control" id="medical3" name="medical3"
                                            value="<?php echo $medical['medical3'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical4">Genotype Type Comment</label>
                                        <input placeholder="Enter Genotype Type Comment" type="text"
                                            class="form-control" id="medical4" name="medical4"
                                            value="<?php echo $medical['medical4'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical5">Any Allergies?</label>
                                        <select class="form-control" id="medical5" name="medical5" placeholder="Do you have Allergies?">
                                            <option value="<?php echo $medical['medical5'] ?? ''; ?>"><?php echo $medical['medical5'] ?? '--Select Option--'; ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical6">Allergies Comment</label>
                                        <input placeholder="Enter Allergies Comment" type="text"
                                            class="form-control" id="medical6" name="medical6"
                                            value="<?php echo $medical['medical6'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical7"> Are you Diabetic?</label>
                                        <select class="form-control" id="medical7" name="medical7" placeholder="Are you Diabetic?">
                                            <option value="<?php echo $medical['medical7'] ?? ''; ?>"><?php echo $medical['medical7'] ?? '--Select Option--'; ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical8">Diabetic Comment</label>
                                        <input placeholder="Enter Diabetic Comment" type="text"
                                            class="form-control" id="medical8" name="medical8"
                                            value="<?php echo $medical['medical8'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical9">Any other Medical Issues.</label>
                                        <select class="form-control" id="medical9" name="medical9" placeholder="Other medical issues?">
                                            <option value="<?php echo $medical['medical9'] ?? ''; ?>"><?php echo $medical['medical9'] ?? '--Select Option--'; ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="medical10">Enter Medical Comment</label>
                                        <input placeholder="Enter Medical Comment" type="text"
                                            class="form-control" id="medical10" name="medical10"
                                            value="<?php echo $medical['medical10'] ?? ''; ?>">
                                    </div>
                                </div>
                            </div>
                    </section>

                    <h3>Consent</h3>
                    <section>
                        <p></p>
                        <div class="row mg-b-20 mg-t-20">
                            <div class="col-lg-12">
                                <p><label for="consent">I hereby give my consent that the information given by me can be contacted & verified to ascertain authenticity for <?php echo $comName; ?>.</p>
                            </div>
                            <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" id="consent" name="consent" required>
                                            <option value="<?php echo $consent['consent'] ?? ''; ?>"><?php echo $consent['consent'] ?? '--Select Option--'; ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </section>

                    <?php if($closeall == "0"){ ?>
                        <h3>Submit</h3>
                        <section>
                        </section>
                    <?php } ?>

                </div>

                </form>

                <script>
                    function ChangeState(str) {
                        //var str = document.getElementById("country").value;
                        if (str.length == 0) {
                            document.getElementById("stateid").innerHTML = "";
                            return;
                        } else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
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
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("stateid2").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET", "changestateu.php?q=" + str, true);
                            xmlhttp.send();
                        }
                    }

                    function ChangelgaU(str) {
                        //var str = document.getElementById("country").value;
                        if (str.length == 0) {
                            document.getElementById("lga2").innerHTML = "";
                            return;
                        } else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("lga2").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET", "changelga.php?q=" + str, true);
                            xmlhttp.send();
                        }
                    }

                </script>

            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <footer class="br-footer">
            <?php
            include("" . $_SERVER['DOCUMENT_ROOT'] . "/biodata/footer_panel.php");
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

    <script src="../lib/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="../lib/parsleyjs/parsley.min.js"></script>

    <script src="../js/bracket.js"></script>
    <script src="../js/map.shiftworker.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../js/dashboard.js"></script>

    <script src="../multi.min.js"></script>

    <script>
        // Function to Add Child
        function addChild() {
            var formData = $("#addChildForm").serialize(); // Get form data

            $.ajax({
                url: "do_child.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response.success == "1") {
                        $("#childrenTable").append(
                            `<tr id="row_${response.id}">
                            <td>${response.name}</td>
                            <td>${response.dofb}</td>
                            <td>${response.gender}</td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteChild(${response.id})">Delete</button></td>
                        </tr>`
                        );
                        $("#addChildModal").modal("hide");
                        $("#addChildForm")[0].reset(); // Clear form
                    } else {
                        alert("Failed to add child");
                    }
                }
            });
        }

        // Function to Delete Child
        function deleteChild(id) {
            if (confirm("Are you sure you want to delete this child?")) {
                $.ajax({
                    url: "do_child.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.success == "1") {
                            $("#row_" + id).remove();
                        } else {
                            alert("Failed to delete child");
                        }
                    }
                });
            }
        }

        // Function to Add Employee
        function addEmp() {
            var formData = $("#addEmpForm").serialize(); // Get form data

            $.ajax({
                url: "do_emp.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response.success == "1") {
                        $("#empTable").append(
                            `<tr id="rowe_${response.id}">
                            <td>${response.name}</td>
                            <td>${response.myrole}</td>
                            <td>${response.startdate}</td>
                            <td>${response.enddate}</td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteEmp(${response.id})">Delete</button></td>
                        </tr>`
                        );
                        $("#addEmpModal").modal("hide");
                        $("#addEmpForm")[0].reset(); // Clear form
                    } else {
                        alert("Failed to add Employer");
                    }
                }
            });
        }

        // Function to Delete Employee
        function deleteEmp(id) {
            if (confirm("Are you sure you want to delete this Employer?")) {
                $.ajax({
                    url: "do_emp.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.success == "1") {
                            $("#rowe_" + id).remove();
                        } else {
                            alert("Failed to delete Employer");
                        }
                    }
                });
            }
        }

        // Function to Delete referee
        function deleteRef(id) {
            if (confirm("Are you sure you want to delete this Referee?")) {
                $.ajax({
                    url: "do_ref.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.success == "1") {
                            $("#rower_" + id).remove();
                        } else {
                            alert("Failed to delete Referee");
                        }
                    }
                });
            }
        }

        // Function to Delete education
        function deleteEdu(id) {
            if (confirm("Are you sure you want to delete this Qualification?")) {
                $.ajax({
                    url: "do_edu.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.success == "1") {
                            $("#rowedu_" + id).remove();
                        } else {
                            alert("Failed to delete Qualification");
                        }
                    }
                });
            }
        }

        function syncUname() {
            document.getElementById('uname').value = document.getElementById('email').value;
        }

        function disableFormInputs(condition) {
            if (condition) {
                var inputs = document.querySelectorAll("input, select, textarea, button");
                inputs.forEach(input => input.disabled = true);
            }
        }

        $(document).ready(function (e) {
            // Function to Add Child
            $("#addChildForm").on('submit', function (e) {
                e.preventDefault();
                var formData = $("#addChildForm").serialize(); // Get form data

                $.ajax({
                    url: "do_child.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.success == "1") {
                            $("#childrenTable").append(
                                `<tr id="row_${response.id}">
                            <td>${response.name}</td>
                            <td>${response.dofb}</td>
                            <td>${response.gender}</td>
                            <td><button class="btn btn-danger btn-sm" onclick="deleteChild(${response.id})">Delete</button></td>
                        </tr>`
                            );
                            $("#addChildModal").modal("hide");
                            $("#addChildForm")[0].reset(); // Clear form
                        } else {
                            alert("Failed to add child");
                        }
                    }
                });
            });

            // Function to Add Employers
            $("#addEmpForm").on('submit', function (e) {
                e.preventDefault();
                var formData = $("#addEmpForm").serialize(); // Get form data

                $.ajax({
                    url: "do_emp.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.success == "1") {
                            $("#empTable").append(
                                `<tr id="rowe_${response.id}">
                            <td>${response.name}</td>
                            <td>${response.myrole}</td>
                            <td>${response.startdate}</td>
                            <td>${response.enddate}</td>
                            <td><button class="btn btn-danger btn-sm" onclick="deleteEmp(${response.id})">Delete</button></td>
                        </tr>`
                            );
                            $("#addEmpModal").modal("hide");
                            $("#addEmpForm")[0].reset(); // Clear form
                        } else {
                            alert("Failed to add Employer");
                        }
                    }
                });
            });

            // Function to Add References
            $("#addRefForm").on('submit', function (e) {
                e.preventDefault();
                var formData = $("#addRefForm").serialize(); // Get form data

                $.ajax({
                    url: "do_ref.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.success == "1") {
                            $("#RefTable").append(
                                `<tr id="rower_${response.id}">
                            <td>${response.name}</td>
                            <td>${response.address}</td>
                            <td>${response.phone}</td>
                            <td>${response.email}</td>
                            <td><button class="btn btn-danger btn-sm" onclick="deleteRef(${response.id})">Delete</button></td>
                        </tr>`
                            );
                            $("#addRefModal").modal("hide");
                            $("#addRefForm")[0].reset(); // Clear form
                        } else {
                            alert("Failed to add Referee");
                        }
                    }
                });
            });

            // Function to Add education 
            $("#addEduForm").on('submit', function (e) {
                e.preventDefault();
                var formData = $("#addEduForm").serialize(); // Get form data

                $.ajax({
                    url: "do_edu.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.success == "1") {
                            $("#EduTable").append(
                                `<tr id="rowedu_${response.id}">
                            <td>${response.school}</td>
                            <td>${response.schoolperiod}</td>
                            <td>${response.qualification}</td>
                            <td><button class="btn btn-danger btn-sm" onclick="deleteEdu(${response.id})">Delete</button></td>
                        </tr>`
                            );
                            $("#addEduModal").modal("hide");
                            $("#addEduForm")[0].reset(); // Clear form
                        } else {
                            alert("Failed to add Qualification");
                        }
                    }
                });
            });

        });

        window.onload = function() {
            var das = "<?php echo $closeall; ?>";

            if(das == "1"){
                var isDisabled = true; // Change to `false` to keep inputs enabled
                disableFormInputs(isDisabled);
            }
        };

    </script>


    <script>
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('#atype').change(function () {
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
        $(document).ready(function () {

            $('#addemployee').on('shown.bs.modal', function (e) {

                $(function () {
                    'use strict';

                    // Input Masks
                    $('.dateMask').mask('9999-99-99');

                    // Datepicker
                    $('.fc-datepicker').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        dateFormat: 'yy-mm-dd',
                    });

                });

                $("#country").on('change', function () {
                    var str = $(this).val();
                    if (str.length == 0) {
                        //document.getElementById("stateid").innerHTML = "";
                        $("#stateid").html("");
                        return;
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
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

            $('#editemployee').on('shown.bs.modal', function (e) {

                $(function () {
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

                $("#country2").on('change', function () {
                    var str = $(this).val();
                    if (str.length == 0) {
                        //document.getElementById("stateid").innerHTML = "";
                        $("#stateid2").html("");
                        return;
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
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

            $('#modaldemo6').on('shown.bs.modal', function (e) {

                $("#countryU").on('change', function () {
                    var str = $(this).val();
                    if (str.length == 0) {
                        //document.getElementById("stateid").innerHTML = "";
                        $("#stateidU").html("");
                        return;
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
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
        $(function () {
            'use strict';

            $('.datatable1').DataTable({
                //responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Input Masks
            $('.dateMask').mask('9999-99-99');
            //$('#phoneMask').mask('(999) 999-9999');

            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat: "yy-mm-dd",
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
    <script>
        $(function () {
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function () {
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

    <!-- Add Child Modal -->
    <div class="modal fade" id="addChildModal" tabindex="-1" role="dialog" aria-labelledby="addChildModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Child</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addChildForm" method="POST">
                        <div class="form-group">
                            <label for="childName">Child's Name</label>
                            <input type="text" class="form-control" id="childName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="childDOB">Date of Birth</label>
                            <input type="date" class="form-control" id="childDOB" name="dofb" required>
                        </div>
                        <div class="form-group">
                            <label for="childGender">Gender</label>
                            <select class="form-control" id="childGender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $q; ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary" onclick="addChild()">Save</button>-->
                    <button type="submit" class="btn btn-primary" form="addChildForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Employers Modal -->
    <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="addEmpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEmpForm" method="POST">
                        <div class="form-group">
                            <label for="EmpName">Employer's Name</label>
                            <input type="text" class="form-control" id="EmpName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="EmpDOB">Your Role</label>
                            <input type="text" class="form-control" id="EmpDOB" name="myrole" required>
                        </div>
                        <div class="form-group">
                            <label for="sd1">Start Date</label>
                            <input placeholder="Start Date" type="date" class="form-control" id="sd1" name="startdate"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="sd2">End Date</label>
                            <input placeholder="End Date" type="date" class="form-control" id="sd2" name="enddate"
                                required>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $q; ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary" onclick="addEmp()">Save</button>-->
                    <button type="submit" class="btn btn-primary" form="addEmpForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add rEFERENCE Modal -->
    <div class="modal fade" id="addRefModal" tabindex="-1" role="dialog" aria-labelledby="addRefModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Referee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addRefForm" method="POST">
                        <div class="form-group">
                            <label for="RefName">Referee's Name</label>
                            <input type="text" class="form-control" id="RefName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="RefDOB">Referee's Address</label>
                            <input type="text" class="form-control" id="RefDOB" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="sd12">Referee's Phone Number</label>
                            <input type="phone" class="form-control" id="sd12" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="sd22">Referee's Email Address</label>
                            <input type="email" class="form-control" id="sd22" name="email" required>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $q; ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary" onclick="addRef()">Save</button>-->
                    <button type="submit" class="btn btn-primary" form="addRefForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add educational Modal -->
    <div class="modal fade" id="addEduModal" tabindex="-1" role="dialog" aria-labelledby="addEduModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Qualification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEduForm" method="POST">
                        <div class="form-group">
                            <label for="EduName">Name Of Institution</label>
                            <input type="text" class="form-control" id="EduName" name="school" required>
                        </div>
                        <div class="form-group">
                            <label for="EduDOB">Period</label>
                            <input type="text" class="form-control" id="EduDOB" name="schoolperiod" required>
                        </div>
                        <div class="form-group">
                            <label for="sd12">Qualification</label>
                            <input type="phone" class="form-control" id="sd12" name="qualification" required>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $q; ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary" onclick="addEdu()">Save</button>-->
                    <button type="submit" class="btn btn-primary" form="addEduForm">Save</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            'use strict';

            $('#wizard2').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                stepsOrientation: 1,
                titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex < newIndex) {

                        // Step 1 form validation
                        if (currentIndex === 0) {
                            var joindate = $('#joindate').parsley();
                            var nationality = $('#nationality').parsley();
                            var fname = $('#fname').parsley();
                            var mname = $('#mname').parsley();
                            var lname = $('#lname').parsley();
                            var dateMask2 = $('#dateMask2').parsley();
                            var gender = $('#gender').parsley();
                            var mstatus = $('#mstatus').parsley();
                            //var religion = $('#religion').parsley();
                            var phone = $('#phone').parsley();
                            var address = $('#address').parsley();
                            var address2 = $('#address2').parsley();
                            var country2 = $('#country2').parsley();
                            var state = $('#state').parsley();
                            var lga = $('#lga').parsley();
                            var email = $('#email').parsley();

                            if (joindate.isValid() && nationality.isValid() && fname.isValid() && mname.isValid() && lname.isValid() && dateMask2.isValid() && gender.isValid() && mstatus.isValid() && phone.isValid() && address.isValid() && address2.isValid() && country2.isValid() && state.isValid() && lga.isValid() && email.isValid()) {
                                // && religion.isValid()
                                return true;
                            } else {
                                joindate.validate();
                                nationality.validate();
                                fname.validate();
                                mname.validate();
                                lname.validate();
                                dateMask2.validate();
                                gender.validate();
                                mstatus.validate();
                                //religion.validate();
                                phone.validate();
                                address.validate();
                                address2.validate();
                                country2.validate();
                                state.validate();
                                lga.validate();
                                email.validate();
                            }
                        }

                        // Step 2 form validation
                        if (currentIndex === 1) {
                            var designation = $('#designation').parsley();
                            var employmenttype = $('#employmenttype').parsley();
                            var salary = $('#salary').parsley();
                            var department = $('#department').parsley();
                            var workshift = $('#workshift').parsley();
                            var location = $('#location').parsley();
                            var employeeid = $('#employeeid').parsley();
                            var uname = $('#uname').parsley();
                            var pword = $('#pword').parsley();

                            if (designation.isValid() && employmenttype.isValid() && salary.isValid() && department.isValid() && workshift.isValid() && location.isValid() && employeeid.isValid() && uname.isValid() && pword.isValid()) {
                                // && religion.isValid()
                                return true;
                            } else {
                                designation.validate();
                                employmenttype.validate();
                                salary.validate();
                                department.validate();
                                workshift.validate();
                                location.validate();
                                employeeid.validate();
                                uname.validate();
                                pword.validate();
                            }
                        }

                        // Step 3 form validation
                        if (currentIndex === 2) {
                            return true;
                        }

                        // Step 4 form validation
                        if (currentIndex === 3) {
                            return true;
                        }

                        // Step 5 form validation
                        if (currentIndex === 4) {
                            return true;
                        }

                        // Step 6 form validation
                        if (currentIndex === 5) {
                            return true;
                        }

                        // Step 7 form validation
                        if (currentIndex === 6) {
                            return true;
                        }

                        // Step 8 form validation
                        if (currentIndex === 7) {
                            return true;
                        }

                        // Step 9 form validation
                        if (currentIndex === 8) {
                            return true;
                        }

                        // Step 10 form validation
                        if (currentIndex === 9) {
                            return true;
                        }

                        // Step 11 form validation
                        if (currentIndex === 10) {
                            var consent = $('#consent').parsley();

                            if (consent.isValid()) {

                                //return true;

                                var das = "<?php echo $closeall; ?>";
                                if(das == "1"){
                                    return false;
                                } else {
                                    var form = document.getElementById("mainForm");
                                    form.submit();
                                }

                            } else {
                                consent.validate();
                            }
                        }

                        // Always allow step back to the previous step even if the current step is not valid.
                    } else { return true; }
                }
            });

        });
    </script>

</body>

</html>