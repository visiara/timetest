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
  $company = $_GET['company'];
  $location = $_GET['location'];

  $filename = "noimage.png";
  $file = fopen($filename, "rb");
  $noimage = fread($file, filesize($filename));
  fclose($file);
  $tehnoimage = base64_encode($noimage);

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE location = '$location' AND status = 'Active' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $employeeid = $huserb1d5["employeeid"];

    $desc = $huserb1d5["gender"];
    $date1 = $huserb1d5["created_at"];
    $date2 = $huserb1d5["updated_at"];

    $bookpay133 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company = '$company'");
    $nomimages = mysqli_num_rows($bookpay133);
    while ($huserb1d533 = mysqli_fetch_array($bookpay133)) {
      $profilepic1 = $huserb1d533["photo_preview"];
    }
    //if ($profilepic1==null){
    if ($nomimages > 0) {
      $profilepic1 = $profilepic1;
    } else {
      $profilepic1 = $tehnoimage;
    }

    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '1' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger1 = $huserb1d53["template"];
    }

    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '2' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger2 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '3' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger3 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '4' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger4 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '5' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger5 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '6' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger6 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '7' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger7 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '8' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger8 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '9' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger9 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '10' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger10 = $huserb1d53["template"];
    }

    //process fingers
    $finger1 != null ? $finger1 : base64_encode('0');
    $finger2 != null ? $finger2 : base64_encode('0');
    $finger3 != null ? $finger3 : base64_encode('0');
    $finger4 != null ? $finger4 : base64_encode('0');
    $finger5 != null ? $finger5 : base64_encode('0');
    $finger6 != null ? $finger6 : base64_encode('0');
    $finger7 != null ? $finger7 : base64_encode('0');
    $finger8 != null ? $finger8 : base64_encode('0');
    $finger9 != null ? $finger9 : base64_encode('0');
    $finger10 != null ? $finger10 : base64_encode('0');

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
//////// get single employee details
////////
if (isset($_GET['get_employee2'])) {
  $company = $_GET['company'];
  $location = $_GET['location'];
  $eid = $_GET['eid'];

  $filename = "noimage.png";
  $file = fopen($filename, "rb");
  $noimage = fread($file, filesize($filename));
  fclose($file);
  $tehnoimage = base64_encode($noimage);

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE employeeid = '$eid' AND location = '$location' AND status = 'Active' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $employeeid = $huserb1d5["employeeid"];

    $desc = $huserb1d5["gender"];
    $date1 = $huserb1d5["created_at"];
    $date2 = $huserb1d5["updated_at"];

    $bookpay133 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company = '$company'");
    $nomimages = mysqli_num_rows($bookpay133);
    while ($huserb1d533 = mysqli_fetch_array($bookpay133)) {
      $profilepic1 = $huserb1d533["photo_preview"];
    }
    //if ($profilepic1==null){
    if ($nomimages > 0) {
      $profilepic1 = $profilepic1;
    } else {
      $profilepic1 = $tehnoimage;
    }

    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '1' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger1 = $huserb1d53["template"];
    }

    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '2' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger2 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '3' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger3 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '4' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger4 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '5' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger5 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '6' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger6 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '7' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger7 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '8' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger8 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '9' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger9 = $huserb1d53["template"];
    }
    $bookpay13 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '10' AND company = '$company'");
    while ($huserb1d53 = mysqli_fetch_array($bookpay13)) {
      $finger10 = $huserb1d53["template"];
    }

    //process fingers
    $finger1 != null ? $finger1 : base64_encode('0');
    $finger2 != null ? $finger2 : base64_encode('0');
    $finger3 != null ? $finger3 : base64_encode('0');
    $finger4 != null ? $finger4 : base64_encode('0');
    $finger5 != null ? $finger5 : base64_encode('0');
    $finger6 != null ? $finger6 : base64_encode('0');
    $finger7 != null ? $finger7 : base64_encode('0');
    $finger8 != null ? $finger8 : base64_encode('0');
    $finger9 != null ? $finger9 : base64_encode('0');
    $finger10 != null ? $finger10 : base64_encode('0');

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
//////// get all employee
////////

if (isset($_GET['get_allemployee'])) {
  $location = $_GET['location'];
  $company = $_GET['company'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE location = '$location' AND status = 'Active' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $array[] = array(
      "eid" => $huserb1d5["employeeid"],
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
//////// get device admins
////////

if (isset($_GET['get_deviceadmin'])) {
  $location = $_GET['location'];
  $deviceid = $_GET['deviceid'];
  $company = $_GET['company'];

  $bookpay1dd = mysqli_query($conn, "SELECT * FROM company WHERE id = '$company'");
  while ($huserb1d5dd = mysqli_fetch_array($bookpay1dd)) {
    $breakoption = trim($huserb1d5dd["breakoption"]);
    $comtype = trim($huserb1d5dd["comtype"]);
  }

  $bookpay1 = mysqli_query($conn, "SELECT * FROM deviceadmins WHERE devicefullid = '$deviceid' AND location = '$location' AND status = 'Active' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  $array = array();
  $array2 = array();
  while ($huserb1d5 = mysqli_fetch_array($bookpay1)) {
    $array[] = array(
      "adminid" => $huserb1d5["adminid"],
      "deviceid" => $huserb1d5["devicefullid"],
      "location" => $huserb1d5["location"],
      "uname" => $huserb1d5["uname"],
      "pword" => $huserb1d5["pword"],
      "status" => $huserb1d5["status"],
      "breakoption" => "$breakoption",
      "comtype" => "$comtype",
      "message" => "1",
    );
  }
  if ($total > 0) {
    echo json_encode($array);
  } else {
    $array2[] = array(
      "adminid" => "1000002",
      "deviceid" => "All",
      "location" => "All",
      "uname" => "uname",
      "pword" => "pword",
      "status" => "Active",
      "breakoption" => "$breakoption",
      "comtype" => "$comtype",
      "message" => "1",
    );
    echo json_encode($array2);
    //echo json_encode(array("message" => "0"));
  }
}

////////
//////// get locations
////////

if (isset($_GET['get_location'])) {
  $location = $_GET['location'];
  $company = $_GET['company'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM location WHERE company = '$company' AND status = 'Active' AND company = '$company'");
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
  $company = $data->company;

  if (!empty($gpslocation)) {

    $hup1 = mysqli_query($conn, "SELECT * FROM devices WHERE deviceid = '$deviceid' AND company = '$company'");
    $hup = mysqli_num_rows($hup1);
    if ($hup > 0) {
      $saveinsert1 = "UPDATE devices SET deviceid='$deviceid', devicename='$devicename', serialno='$serialno', location='$location', gpslocation='$gpslocation', devicefinger='$devicefinger', company='$company' WHERE deviceid='$deviceid'";
    } else {
      $saveinsert1 = "INSERT INTO devices (`deviceid`, `devicename`, `serialno`, `location`, `gpslocation`, devicefinger, company) VALUES ('$deviceid', '$devicename', '$serialno', '$location', '$gpslocation', '$devicefinger', '$company')";
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
  $company = $_GET['company'];
  $bookpay1 = mysqli_query($conn, "SELECT * FROM devices WHERE deviceid = '$deviceid' AND company = '$company'");
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
  $atype = $value->atype;
  $company = $value->company;

  $bookpay1dd = mysqli_query($conn, "SELECT * FROM company WHERE id = '$company'");
  while ($huserb1d5dd = mysqli_fetch_array($bookpay1dd)) {
    $breakoption = $huserb1d5dd["breakoption"];
    $comtype = $huserb1d5dd["comtype"];
  }

  if ($comtype == "1") {
    $saveinsert1xx = "INSERT INTO attendancedangote (`date`, `month`, `year`, `employeeid`, `timeIn`, `timeInseconds`, `timeOut`, `timeOutseconds`, `totaltime`, `totaltimeseconds`, `deviceid`, `location`, `attendance`, `company`) VALUES ('$date', '$month', '$year', '$employeeid', '$timeIn', '$timeInseconds', '$timeOut', '$timeOutseconds', '$totaltime', '$totaltimeseconds', '$deviceid', '$location', '$attendance', '$company')";
    mysqli_query($conn, $saveinsert1xx);
  }

  if (!empty($employeeid)) {

    $hup1 = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND company = '$company'");
    $hup = mysqli_num_rows($hup1);

    if ($hup > 0) {
      if ($atype == 'ClockIn') {

        $hup1x = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND timeIn='0' AND timeInseconds='0' AND company = '$company'");
        $hupx = mysqli_num_rows($hup1x);

        if ($hupx > 0) {
          $saveinsert1 = "UPDATE attendance SET timeIn='$timeIn', timeInseconds='$timeInseconds', deviceid='$deviceid', attendance='$attendance', devicein='$deviceid' WHERE employeeid='$employeeid' AND date='$date' AND company = '$company'";
        } else {
          $saveinsert1 = null;
        }
      } elseif ($atype == 'BreakIn') {

        $saveinsert1 = "UPDATE attendance2 SET timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds = '$totaltimeseconds', deviceid='$deviceid', attendance='$attendance' WHERE employeeid='$employeeid' AND date='$date' AND company = '$company' AND timeOut='0'";
      } elseif ($atype == 'BreakOut') {

        $saveinsert1 = "INSERT INTO attendance2 (`date`, `month`, `year`, `employeeid`, `timeIn`, `timeInseconds`, `timeOut`, `timeOutseconds`, `totaltime`, `totaltimeseconds`, `deviceid`, `location`, `attendance`, `company`) VALUES ('$date', '$month', '$year', '$employeeid', '$timeIn', '$timeInseconds', '$timeOut', '$timeOutseconds', '$totaltime', '$totaltimeseconds', '$deviceid', '$location', '$attendance', '$company')";
      } else {

        $hup1xb = mysqli_query($conn, "SELECT id FROM attendance2 WHERE employeeid='$employeeid' AND date='$date' AND timeOut='0' AND company = '$company' ");
        $hupxb = mysqli_num_rows($hup1xb);
        $saveinsert13 = "UPDATE attendance2 SET timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds = '$totaltimeseconds', deviceid='$deviceid', attendance='$attendance' WHERE employeeid='$employeeid' AND date='$date' AND company = '$company' AND timeOut='0'";
        if ($hupxb > 0) {
          mysqli_query($conn, $saveinsert13);
        }

        if ($comtype == "1") {
          $hup1x = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND timeIn != '0' AND timeInseconds != '0' AND company = '$company' ");
        } else {
          $hup1x = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND timeOut='0' AND timeOutseconds='0' AND timeIn != '0' AND timeInseconds != '0' AND company = '$company' ");
        }
        $hupx = mysqli_num_rows($hup1x);

        if ($hupx > 0) {
          $saveinsert1 = "UPDATE attendance SET timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds = '$totaltimeseconds', deviceid='$deviceid', attendance='$attendance', deviceout='$deviceid' WHERE employeeid='$employeeid' AND date='$date' AND company = '$company'";
        } else {
          $saveinsert1 = null;
        }
      }
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

  $template = $data->template;
  $imageWidth = $data->imageWidth;
  $bitByte = $data->bitByte;
  $imageHeight = $data->imageHeight;
  $imageDPI = $data->imageDPI;
  $applicant_id = $data->applicant_id;
  $fingerid = $data->fingerid;
  $quality = $data->quality;
  $created = $data->created_at;
  $admin = $data->admin;
  $rawImage = $data->rawImage;
  $company = $data->company;
  //$created = time();
  $created = (trim($created) / 1000);

  //if (isset($_POST['id'])) {
  //$id = $_POST['id'];
  //$template = $_POST['template'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$applicant_id' AND fingerid = '$fingerid' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  //$total = 0;

  if ($total > 0) {
    echo json_encode(array("message" => "0"));
  } else {
    $saveinsert1 = "INSERT INTO employee_fingerprints (`applicant_id`, `fingerid`, `bitByte`, rawImage, `imageWidth`, `imageHeight`, `imageDPI`, `template`, created_at, quality, admin, company) VALUES ('$applicant_id', '$fingerid', '$bitByte', '$rawImage', '$imageWidth', '$imageHeight', '$imageDPI', '$template', '$created', '$quality', '$admin', '$company')";
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
  $company = $data->company;
  $created_at = $data->created_at;
  $id = $data->id;
  $created = time();

  if (!empty($id)) {
    $pid = $id;
    $created = $created_at;
  } else {
    $pid = "1";
    $created = time();
  }

  $bookpay1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$applicant_id' AND company = '$company' ");
  $total = mysqli_num_rows($bookpay1);
  //$total = 0;

  if ($total > 0) {
    echo json_encode(array("message" => "0"));
  } else {
    $saveinsert1 = "INSERT INTO photos (`applicant_id`, `photo`, `photo_preview`, created_at, admin, company) VALUES ('$applicant_id', '$bitByte', '$bitByte', '$created', '$admin', '$company')";
    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => "$pid"));
    } else {
      echo json_encode(array("message" => "0"));
    }
  }
}

////////
//////// get templates
////////

if (isset($_GET['gettemplate'])) {
  //$location = $_GET['location'];
  //$deviceid = $_GET['deviceid'];

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee_fingerprints_infos WHERE id = '2'");
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

////////
//////// get enrollment
////////

if ($uri[3] == 'getEnrollment') {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $template = $data->template;
  $imageWidth = $data->imageWidth;
  $bitByte = $data->bitByte;
  $imageHeight = $data->imageHeight;
  $imageDPI = $data->imageDPI;
  $applicant_id = $data->applicant_id;
  $fingerid = $data->fingerid;
  $quality = $data->quality;
  $created = $data->created_at;
  $admin = $data->admin;
  $rawImage = $data->rawImage;
  $table_id = $data->table_id;
  $company = $data->company;
  //$created = (trim($created) / 1000);

  $bookpay1 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$applicant_id' AND fingerid = '$fingerid' AND company = '$company'");
  $total = mysqli_num_rows($bookpay1);
  //$total = 0;

  if ($total > 0) {
    echo json_encode(array("message" => $table_id));
  } else {
    $saveinsert1 = "INSERT INTO employee_fingerprints (`applicant_id`, `fingerid`, `bitByte`, rawImage, `imageWidth`, `imageHeight`, `imageDPI`, `template`, created_at, quality, `admin`, company) VALUES ('$applicant_id', '$fingerid', '$bitByte', '$rawImage', '$imageWidth', '$imageHeight', '$imageDPI', '$template', '$created', '$quality', '$admin', '$company')";
    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => $table_id));
    } else {
      echo json_encode(array("message" => "0"));
    }
  }
}

////////
//////// update attendance
////////

if ($uri[3] == 'upload_attendance') {
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
  $company = $value->company;
  $id = $value->id;

  if (!empty($employeeid)) {

    $hup1 = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND company='$company'");
    $hup = mysqli_num_rows($hup1);

    if ($hup > 0) {

      $hup1x = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND timeIn='0' AND timeInseconds='0' AND company = '$company'");
      $hupx = mysqli_num_rows($hup1x);

      $hup1x2 = mysqli_query($conn, "SELECT id FROM attendance WHERE employeeid='$employeeid' AND date='$date' AND timeOut='0' AND timeOutseconds='0' AND company = '$company'");
      $hupx2 = mysqli_num_rows($hup1x2);

      if ($hupx > 0) {
        $saveinsert1 = "UPDATE attendance SET timeIn='$timeIn', timeInseconds='$timeInseconds', timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds='$totaltimeseconds', deviceid='$deviceid', attendance='$attendance', devicein='$deviceid', deviceout='$deviceid' WHERE employeeid='$employeeid' AND date='$date' AND company='$company'";
      } elseif (($hupx2 > 0) && ($timeOut != "0")) {
        $saveinsert1 = "UPDATE attendance SET timeOut='$timeOut', timeOutseconds='$timeOutseconds', deviceid='$deviceid', deviceout='$deviceid' WHERE employeeid='$employeeid' AND date='$date' AND company='$company'";
      } else {
        $saveinsert1 = null;
      }

      if (mysqli_query($conn, $saveinsert1)) {
        echo json_encode(array("message" => "$id"));
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
//////// update attendance2
////////

if ($uri[3] == 'upload_attendance2') {
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
  $company = $value->company;
  $id = $value->id;

  if (!empty($employeeid)) {

    $hup1 = mysqli_query($conn, "SELECT id FROM attendance2 WHERE timeInseconds='$timeInseconds' AND date='$date' AND company='$company'");
    $hup = mysqli_num_rows($hup1);

    if ($hup > 0) {
      $saveinsert1 = "UPDATE attendance2 SET timeIn='$timeIn', timeInseconds='$timeInseconds', timeOut='$timeOut', timeOutseconds='$timeOutseconds', totaltime='$totaltime', totaltimeseconds='$totaltimeseconds', deviceid='$deviceid', attendance='$attendance' WHERE timeInseconds='$timeInseconds' AND date='$date' AND company='$company'";
      if (mysqli_query($conn, $saveinsert1)) {
        echo json_encode(array("message" => "$id"));
      } else {
        echo json_encode(array("message" => "0"));
      }
    } else {
      $saveinsert1 = "INSERT INTO attendance2 (`date`, `month`, `year`, `employeeid`, `timeIn`, `timeInseconds`, `timeOut`, `timeOutseconds`, `totaltime`, `totaltimeseconds`, `deviceid`, `location`, `attendance`, `company`) VALUES ('$date', '$month', '$year', '$employeeid', '$timeIn', '$timeInseconds', '$timeOut', '$timeOutseconds', '$totaltime', '$totaltimeseconds', '$deviceid', '$location', '$attendance', '$company')";
      if (mysqli_query($conn, $saveinsert1)) {
        echo json_encode(array("message" => "$id"));
      } else {
        echo json_encode(array("message" => "0"));
      }
    }
  } else {
    echo json_encode(array("message" => "0"));
  }
}

////////
//////// update attendance3
////////

if ($uri[3] == 'upload_attendance3') {
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
  $company = $value->company;
  $id = $value->id;

  if (!empty($employeeid)) {

    $saveinsert1 = "INSERT INTO attendance2attendancedangote (`date`, `month`, `year`, `employeeid`, `timeIn`, `timeInseconds`, `timeOut`, `timeOutseconds`, `totaltime`, `totaltimeseconds`, `deviceid`, `location`, `attendance`, `company`) VALUES ('$date', '$month', '$year', '$employeeid', '$timeIn', '$timeInseconds', '$timeOut', '$timeOutseconds', '$totaltime', '$totaltimeseconds', '$deviceid', '$location', '$attendance', '$company')";
    if (mysqli_query($conn, $saveinsert1)) {
      echo json_encode(array("message" => "$id"));
    } else {
      echo json_encode(array("message" => "0"));
    }
  } else {
    echo json_encode(array("message" => "0"));
  }
}


if ($uri[3] == 'test_upload') {
  $someJSON = file_get_contents('php://input');
  $content = $_POST['commands'];
  $json = json_decode($content, true);


  $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $json);
  fclose($myfile);

  /*
    foreach ($json as $key => $value) {
         $firstname = $value["firstname"];
         $lastname = $value["lastname"];
         // perform other actions.

    }
*/
}


////////
//////// adminmain login
////////
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM `deviceadmins` WHERE `uname` = '" . $username . "' AND status = 'Active'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    //$row = mysqli_fetch_object($result);

    while ($huserb1d5 = mysqli_fetch_array($result)) {
      $pword = $huserb1d5["pword"];
      $company = $huserb1d5["company"];
    }

    if ($password == $pword) {
      echo json_encode(array(
        "status" => "success",
        "message" => "Successfully logged in",
        "user_id" => $company
      ));
    } else {
      echo json_encode(array(
        "status" => "errorP",
        "message" => "Password does not match"
      ));
    }
  } else {
    echo json_encode(array(
      "status" => "error",
      "message" => "User not found"
    ));
  }
  exit();
}
