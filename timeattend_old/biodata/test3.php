<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
date_default_timezone_set("Africa/Lagos");

include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");  
$json = file_get_contents('php://input');
$data = json_decode($json);

    $deviceid->deviceid;
    $devicename->devicename;
    $serialno->serialno;
    $location->location;
    $gpslocation->gpslocation;
    $update_device->update_device;

if (isset($update_device)) {
    $hu=mysqli_query($conn, "SELECT * FROM devices WHERE deviceid = '$deviceid'");
    
    if($hu > "0"){
      $saveinsert1 = "UPDATE devices SET deviceid='$deviceid', devicename='$devicename', serialno='$serialno', location='$location', gpslocation='$gpslocation' WHERE deviceid='$deviceid'";
    }else{
      $saveinsert1 = "INSERT INTO devices (`deviceid`, `devicename`, `serialno`, `location`, `gpslocation`, `company`) VALUES ('$deviceid', '$devicename', '$serialno', '$location', '$gpslocation', '$companyMain')";
    }
    mysqli_query($conn, $saveinsert1);
  
   $location = $location;
   $deviceid = $deviceid;
   $bookpay1=mysqli_query($conn, "SELECT * FROM deviceadmins WHERE deviceid = '$deviceid' AND location = '$location'");
   $total = mysqli_num_rows($bookpay1);
   $array = array();
   while ($huserb1d5 = mysqli_fetch_array($bookpay1))
   {
      $array[] = array (
         "adminid" => $huserb1d5["adminid"],
         "deviceid" => $huserb1d5["deviceid"],
         "location" => $huserb1d5["location"],
         "uname" => $huserb1d5["uname"],
         "pword" => $huserb1d5["pword"],
         "status" => $huserb1d5["status"],
      );
   }
   if($total > 0){
     echo json_encode ($array);
   }else{
     echo json_encode(array("message" => "No Admin found."));
   }

}



?>