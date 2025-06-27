<?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
//header('Content-Type: application/json; charset=UTF-8');
//header('Content-Type: charset=UTF-8');
date_default_timezone_set("Africa/Lagos");
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");

/*    

$q = $_GET['q'];

////////
//////// get employee details
////////
if (isset($_GET['get_employee'])) {
   $location = $_GET['location'];
   $bookpay1=mysqli_query($conn, "SELECT * FROM employee WHERE location = '$location'");
   $total = mysqli_num_rows($bookpay1);
   $array = array();
   while ($huserb1d5 = mysqli_fetch_array($bookpay1))
   {
    $employeeid = $huserb1d5["employeeid"];
    
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '1'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger1 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '2'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger2 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '3'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger3 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '4'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger4 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '5'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger5 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '6'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger6 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '7'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger7 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '8'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger8 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '9'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger9 = base64_encode($huserb1d53["image"]);
    }
    $bookpay13=mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '10'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13))
    {
      $finger10 = base64_encode($huserb1d53["image"]);
    }
    
      $array[] = array (
         "employeeid" => $huserb1d5["employeeid"],
         "fname" => $huserb1d5["fname"],
         "employeeid" => $huserb1d5["employeeid"],
         "fname" => $huserb1d5["fname"],
         "mname" => $huserb1d5["mname"],
         "lname" => $huserb1d5["lname"],
         "email" => $huserb1d5["email"],
         "address" => $huserb1d5["address"],
         "country" => $huserb1d5["country"],
         "state" => $huserb1d5["state"],
         "gender" => $huserb1d5["gender"],
         "phone" => $huserb1d5["phone"],
         "nextofkin" => $huserb1d5["nextofkin"],
         "dofb" => $huserb1d5["dofb"],
         "employmenttype" => $huserb1d5["employmenttype"],
         "location1" => $huserb1d5["location"],
         "department1" => $huserb1d5["department"],
         "workshift1" => $huserb1d5["workshift"],
         "uname" => $huserb1d5["uname"],
         "pword" => $huserb1d5["pword"],
         "status" => $huserb1d5["status"],
         "createdby" => $huserb1d5["createdby"],
         "profilepic" => $huserb1d5["profilepic"],
         "finger1" => $finger1,
         "finger2" => $finger2,
         "finger3" => $finger3,
         "finger4" => $finger4,
         "finger5" => $finger5,
         "finger6" => $finger6,
         "finger7" => $finger7,
         "finger8" => $finger8,
         "finger9" => $finger9,
         "finger10" => $finger10,
      );

   }
   if($total > 0){
     echo json_encode ($array);
   }else{
     echo json_encode(array("message" => "No Employee found."));
   }
}
*/
//
/*
$someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

// Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
  print_r($someArray);        // Dump all data of the Array
  echo $someArray[0]["name"]; // Access Array data

  // Loop through Array
  $someArray = ...; // Replace ... with your PHP Array
  foreach ($someArray as $key => $value) {
    echo $value["name"] . ", " . $value["gender"] . "<br>";
  }


// Convert JSON string to Object
  $someObject = json_decode($someJSON);
  print_r($someObject);      // Dump all data of the Object
  echo $someObject[0]->name; // Access Object data

  // Loop through Object
  $someObject = ...; // Replace ... with your PHP Object
  foreach($someObject as $key => $value) {
    echo $value->name . ", " . $value->gender . "<br>";
  }  
  
  
  
  
*/

/*
{
    "deviceid": "982j9d9823eu",
    "devicename": "device.name",
    "serialno": "device.serial",
    "location":" device.location",
    "gpslocation": "device.gpsLocation",
    "admin": "device.admin"
}

*/

/* date range alculations

// Declare two dates 
$Date1 = '2010-01-01'; 
$Date2 = '2010-01-10'; 
  
// Declare an empty array 
$array = array(); 
  
// Use strtotime function 
$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  
// Use for loop to store dates into array 
// 86400 sec = 24 hrs = 60*60*24 = 1 day 
for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 
$array[] = $Store; 
} 
  
// Display the dates in array format 
print_r($array); 

*/


/* date range without array
// Declare two dates 
$Date1 = '2010-01-01'; 
$Date2 = '2010-01-10'; 
  
// Use strtotime function 
$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  
// Use for loop to store dates into array 
// 86400 sec = 24 hrs = 60*60*24 = 1 day 
for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 
echo $Store."<br>"; 
} 

*/

/*
$paymentDate = date('Y-m-d');
$paymentDate=date('Y-m-d', strtotime($paymentDate)); 
$contractDateBegin = date('Y-m-d', strtotime("2020-01-10"));
$contractDateEnd = date('Y-m-d', strtotime("2020-01-20"));

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
    echo "is between";
}else{
    echo "NO GO!";  
}

$weekDay = date("w");

if ($weekDay == 0 || $weekDay == 6){
  echo "WeekEnd";
}
*/

/*
$bookpay1=mysqli_query($conn, "SELECT * FROM employee");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$employeeidy = $bookpay["employeeid"];
$company = $bookpay["company"];

$hu3ys=mysqli_query($conn, "SELECT * FROM company WHERE id = '$company'");
while ($hug3ys = mysqli_fetch_array($hu3ys))
{
  $compref = $hug3ys["compref"];
}

$cvbg = "$compref$employeeidy";

//$saveinsert1 = "UPDATE employee SET uniqid='$cvbg' WHERE id='$eidy'";
//mysqli_query($conn, $saveinsert1);


//echo "$cvbg - $employeeidy </br>";

}
*/

$TodayDate = date('Y-m-d');
/*
$ShiftQuery=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '1'");
    while ($ShiftQueryResult = mysqli_fetch_array($ShiftQuery))
    {
      $shifttype = $ShiftQueryResult["shifttype"];
      $saturday = $ShiftQueryResult["saturday"];
      $sunday = $ShiftQueryResult["sunday"];
      $holiday = $ShiftQueryResult["holiday"];
      $expectedTimin1 = $ShiftQueryResult["timein"];
      $expectedTimeOut1 = $ShiftQueryResult["timeout"];
      $eTotal = $ShiftQueryResult["hours"];
    }

    $expectedTimin = strtotime("$TodayDate $expectedTimin1");
    $expectedTimeOut50 = date("Y-m-d H:i:s", strtotime($TodayDate.' '.$expectedTimin1. " + ".floor($eTotal)." hours"));
    if(filter_var($eTotal, FILTER_VALIDATE_INT) !== false){
      $expectedTimeOut = strtotime($expectedTimeOut50);
    } else {
      $expectedTimeOut = strtotime($expectedTimeOut50. " + 30 mins");
    }

echo date("Y-m-d h:i:s A", $expectedTimin)."<br>";
echo date("Y-m-d h:i:s A", $expectedTimeOut);
*/

/*
$LeaveQuery = 0;
      $companyMain = '1';

      $HolQuery1=mysqli_query($conn, "SELECT * FROM holidays WHERE status = 'Active' AND company='$companyMain' AND CURDATE() BETWEEN date and date2"); //date = '$TodayDate' AND 
      $HolQuery = mysqli_num_rows($HolQuery1);

      echo $HolQuery;
*/

      $bookpay1=mysqli_query($conn, "SELECT * FROM employee");
      while ($bookpay = mysqli_fetch_array($bookpay1))
      {
      $eidy = $bookpay["id"];
      $employeeidy = $bookpay["employeeid"];
      $company = $bookpay["company"];
            
      $saveinsert1 = "UPDATE employee SET uname='$employeeidy' WHERE id='$eidy'";
      //mysqli_query($conn, $saveinsert1);
      
      
      echo "$employeeidy </br>";
      
      }

?>