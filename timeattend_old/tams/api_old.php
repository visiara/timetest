<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
date_default_timezone_set("Africa/Lagos");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

include __DIR__ . "/../includes/config.php"; // go one level up


$q = $_GET['q'];

//echo $uri;
//echo json_encode ($uri);

////////
//////// get employee details
////////
if (isset($_GET['get_employee'])) {

  $filename = "noimage.png";
  $file = fopen($filename, "rb");
  $noimage = fread($file, filesize($filename));
  fclose($file);

  $location = $_GET['location'];
  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE location = '$location' AND status = 'Active'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $employeeid = $huserb1d5["employeeid"];

    $bookpay133 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid'");
    while ($huserb1d533 = mysqli_fetch_array($bookpay133)) {
      $profilepic1 = base64_encode($huserb1d533["photo_preview"]);
    }
    if ($profilepic1 == null) {
      $profilepic1 = $noimage;
    } else {
      $profilepic1 = $profilepic1;
    }

    $bookpay13 = mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '1'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger1 = base64_encode($huserb1d53["image"]);
    }
    /*    
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
*/
    $bookpay13 = mysqli_query($conn, "SELECT * FROM applicant_fingerprints WHERE applicant_id = '$employeeid' AND finger_id = '6'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger6 = base64_encode($huserb1d53["image"]);
    }
    /*    
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
*/
    $bookpay134 = mysqli_query($conn, "SELECT * FROM applicants WHERE id = '$employeeid'");
    while ($huserb1d534 = mysqli_fetch_array($bookpay134)) {
      $desc = $huserb1d534["unique_id"];
      $date1 = $huserb1d534["created_at"];
      $date2 = $huserb1d534["updated_at"];
    }

    $array[] = array(
      "employeeid" => $huserb1d5["employeeid"],
      "fname" => $huserb1d5["fname"],
      "mname" => $huserb1d5["mname"],
      "lname" => $huserb1d5["lname"],
      "location" => $huserb1d5["location"],
      "department" => $huserb1d5["department"],
      "profilepic" => $profilepic1,
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
      "desc" => $desc,
      "date1" => $date1,
      "date2" => $date2,
      "message" => "1",
    );

    $saveinsert2 = "UPDATE employee SET gone='1' WHERE employeeid='$employeeid'";
    mysqli_query($conn, $saveinsert2);
  }
  if ($total > 0) {
    echo json_encode($array);
  } else {
    echo json_encode(array("message" => "0"));
  }
}

////////
//////// get device admins
////////

if (isset($_GET['get_deviceadmin'])) {
  $location = $_GET['location'];
  $deviceid = $_GET['deviceid'];
  $bookpay1 = mysqli_query($conn, "SELECT * FROM deviceadmins WHERE devicefullid = '$deviceid' AND location = '$location' AND status = 'Active'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $array[] = array(
      "adminid" => $huserb1d5["adminid"],
      "deviceid" => $huserb1d5["devicefullid"],
      "location" => $huserb1d5["location"],
      "uname" => $huserb1d5["uname"],
      "pword" => $huserb1d5["pword"],
      "status" => $huserb1d5["status"],
      "message" => "1",
    );
  }
  if ($total > 0) {
    echo json_encode($array);
  } else {
    echo json_encode(array("message" => "0"));
  }
}

////////
//////// get locations
////////

if (isset($_GET['get_location'])) {
  $location = $_GET['location'];
  $bookpay1 = mysqli_query($conn, "SELECT * FROM location WHERE status = 'Active'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $array[] = array(
      "id" => $huserb1d5["id"],
      "locationname" => $huserb1d5["locationname"],
      "message" => "1",
    );
  }
  if ($total > 0) {
    echo json_encode($array);
  } else {
    echo json_encode(array("message" => "0"));
  }
}


////////
//////// update devices
////////
if ($uri[3] == 'update_device') {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $deviceid = $data->deviceid;
  $devicename = $data->devicename;
  $serialno = $data->serialno;
  $location = $data->location;
  $gpslocation = $data->gpslocation;
  $devicefinger = $data->devicefinger;

  if (!empty($gpslocation)) {

    $hup1 = mysqli_query($conn, "SELECT * FROM devices WHERE deviceid = '$deviceid'");
    $hup = mysqli_num_rows($hup1);
    if ($hup > 0) {
      $saveinsert1 = "UPDATE devices SET deviceid='$deviceid', devicename='$devicename', serialno='$serialno', location='$location', gpslocation='$gpslocation', devicefinger='$devicefinger' WHERE deviceid='$deviceid'";
    } else {
      $saveinsert1 = "INSERT INTO devices (`deviceid`, `devicename`, `serialno`, `location`, `gpslocation`, devicefinger) VALUES ('$deviceid', '$devicename', '$serialno', '$location', '$gpslocation', '$devicefinger')";
    }
    //mysqli_query($conn, $saveinsert1);

    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => "1"));
    } else {
      echo json_encode(array("message" => "0"));
    }
  }
}

////////
//////// get device Updates
////////

if (isset($_GET['get_device_update'])) {
  $location = $_GET['location'];
  $deviceid = $_GET['deviceid'];
  $bookpay1 = mysqli_query($conn, "SELECT * FROM devices WHERE deviceid = '$deviceid'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $array[] = array(
      "status" => $huserb1d5["status"],
      "message" => "1",
    );
  }
  if ($total > 0) {
    echo json_encode($array);
  } else {
    echo json_encode(array("message" => "0"));
  }
}


////////
//////// update attendance
////////

if ($uri[3] == 'update_attendance') {
  $someJSON = file_get_contents('php://input');
  $value = json_decode($someJSON);

  $date = $value->date;
  $month = $value->month;
  $year = $value->year;
  $employeeid = $value->employeeid;
  $timeIn = $value->timeIn;
  $timeInseconds = $value->timeInseconds;
  $timeOut = $value->timeOut;
  $timeOutseconds = $value->timeOutseconds;
  $totaltime = $value->totaltime;
  $totaltimeseconds = $value->totaltimeseconds;
  $deviceid = $value->deviceid;
  $location  = $value->location;
  $attendance = $value->attendance;

  if (!empty($employeeid)) {

    $hup1 = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date'");
    $hup = mysqli_num_rows($hup1);

    if ($hup > 0) {
      $saveinsert1 = "UPDATE attendance SET timeIn='$timeIn', timeInseconds='$timeInseconds', timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds='$totaltimeseconds', deviceid='$deviceid', attendance='$attendance' WHERE employeeid='$employeeid' AND date='$date'";
      if (mysqli_query($conn, $saveinsert1)) {
        echo json_encode(array("message" => "1"));
      } else {
        echo json_encode(array("message" => "0"));
      }
    } else {
      echo json_encode(array("message" => "0"));
    }
  } else {
    echo json_encode(array("message" => "0"));
  }
}

////////
//////// upload template
////////

if ($uri[3] == 'upload_template') {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $id = $data->id;
  $template = $data->template;
  $fpBmp = $data->fpBmp;
  $bitByte = $data->bitByte;
  $fpTemp = $data->fpTemp;
  $fpFeat = $data->fpFeat;
  $applicant_id = $data->applicant_id;
  $fingerid = $data->fingerid;
  $quality = $data->quality;
  $created = $data->created_at;
  $admin = $data->admin;
  $created = time();

  //if (isset($_POST['id'])) {
  //$id = $_POST['id'];
  //$template = $_POST['template'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM fingerprints_infos WHERE applicant_id = '$applicant_id' AND fingerid = '$fingerid' AND templateid = '$id' ");
  $total = mysqli_num_rows($bookpay1);
  //$total = 0;

  if ($total > 0) {
    echo json_encode(array("message" => "0"));
  } else {
    $saveinsert1 = "INSERT INTO fingerprints_infos (`applicant_id`, `fingerid`, `templateid`, `fpBmp`, `bitByte`, `fpTemp`, `fpFeat`, `template`, created_at, quality, admin) VALUES ('$applicant_id', '$fingerid', '$id', '$fpBmp', '$bitByte', '$fpTemp', '$fpFeat', '$template', '$created', '$quality', '$admin')";
    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => "1"));
    } else {
      echo json_encode(array("message" => "0"));
    }
  }


  //}

}

////////
//////// upload picture
////////

if ($uri[3] == 'upload_picture') {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $bitByte = $data->bitByte;
  $applicant_id = $data->applicant_id;
  $admin = $data->admin;
  $created = time();

  //if (isset($_POST['id'])) {
  //$id = $_POST['id'];
  //$template = $_POST['template'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$applicant_id' ");
  $total = mysqli_num_rows($bookpay1);
  //$total = 0;

  if ($total > 0) {
    echo json_encode(array("message" => "0"));
  } else {
    $saveinsert1 = "INSERT INTO photos (`applicant_id`, `photo`, `photo_preview`, created_at, admin) VALUES ('$applicant_id', '$bitByte', '$bitByte', '$created', '$admin')";
    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => "1"));
    } else {
      echo json_encode(array("message" => "0"));
    }
  }


  //}

}

////////
//////// get templates
////////

if (isset($_GET['gettemplate'])) {
  //$location = $_GET['location'];
  //$deviceid = $_GET['deviceid'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM applicant_fingerprints_infos WHERE id = '2'");
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $finger6 = base64_encode($huserb1d5["template"]);
    $array[] = array(
      "id" => $huserb1d5["applicant_id"],
      "fi" => $huserb1d5["bitByte"],
    );
  }
  echo json_encode($array);
}
