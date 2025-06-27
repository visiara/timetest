<?php
header('Content-Type: application/json; charset=UTF-8');
$therealpagename = '';
//include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
include "" . __DIR__ . "/header.php";


$go = json_encode(["success" => "0"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['addp'])) {
        $pid = $_POST['pid'];
        $school = $_POST['school'];
        $schoolperiod = $_POST['schoolperiod'];
        $qualification = $_POST['qualification'];

        $query = "INSERT INTO profile_education (pid, school, schoolperiod, qualification, company) VALUES ('$pid', '$school', '$schoolperiod', '$qualification', '$companyMain')";
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
            $go = json_encode(["success" => "1", "id" => $last_id, "school" => $school, "schoolperiod" => $schoolperiod, "qualification" => $qualification]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } elseif (isset($_POST['editp'])) {
        $id = $_POST['id'];

        $theid = $_POST['theid'];

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
        $state = $_POST['state'];
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

        $saveinsert1 = "UPDATE employee SET employeeid='$employeeid', fname='$fname', mname='$mname', lname='$lname', email='$email', address='$address', country='$country', salaryscale='$salary', state='$state', gender='$gender', phone='$phone', nextofkin='$nextofkin', dofb='$dofb', employmenttype='$employmenttype', location='$location', department='$department', workshift='$workshift', pword='$pword', updaby='$uid', gphone='$kinphone', gemail='$kinemail' WHERE id='$theid'";

        $saveinsert2 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        $saveinsert3 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        $saveinsert4 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        $saveinsert5 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        $saveinsert6 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        $saveinsert7 = "UPDATE employee SET employeeid='$employeeid4', fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', address='$address4', country='$country4', salaryscale='$salary4', state='$state4', gender='$gender4', phone='$phone4', nextofkin='$nextofkin4', dofb='$dofb4', employmenttype='$employmenttype4', location='$location4', department='$department4', workshift='$workshift4', pword='$pword4', updaby='$uid', gphone='$gphone', gemail='$gemail' WHERE id='$theid'";
        //mysqli_query($conn, $saveinsert1);


        $query = "DELETE FROM profile_education WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            $go = json_encode(["success" => "1"]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } else {
    }
}

echo $go;
