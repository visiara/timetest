<?php

//Database connection info
/*
$hostname = "localhost";
$username = "ebipatas_projectadmin";
$password = "Admin123@@guy2";
$dbName = "ebipatas_project"; 
MYSQL_CONNECT($hostname, $username, $password) OR DIE("Unable to connect to database"); 
@mysql_select_db( "$dbName") or die( "Unable to select database"); 
*/

/*
$servername = "localhost";
$serverusername = "n4ee625_project";
$serverpassword = "H34wg72nQ94U#q3n83&b";
$dbname = "n4ee625_project";
*/

$servername = "localhost";
$serverusername = "root";
$serverpassword = "root";
$dbname = "timeattend";
// Create connection
$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set('Africa/Lagos');
//date_default_timezone_set('UTC');

//Loadmore configuarion
$resultsPerPage = 10;

//money symbol
$moneyp = "&#8358;";
$websiteMain = 'https://www.timatend.com';
$websiteMainMail = 'info@timatend.com';
$siteName = 'TimaTend';
$localAdminUrl = 'http://localhost/timeattend/tams/';
$localAdminRoot = $_SERVER['DOCUMENT_ROOT'] . '/timeattend/';
$status = '';


//  page settings
$thepagename = basename($_SERVER['PHP_SELF']);

if ($thepagename == "dashboard.php") {
    $where1 = "active";
    $therealpagename = "Dashboard";
} elseif ($thepagename == "mydepartment.php") {
    $where14 = "active";
    $therealpagename = "My Department";
} elseif ($thepagename == "employeelist.php" || $thepagename == "employeelista.php" || $thepagename == "employeelisti.php" || $thepagename == "employeelistd.php" || $thepagename == "employedata.php") {
    $where2 = "active";
    $therealpagename = "User Enrollment";
    if ($thepagename == "employeelist.php" || $thepagename == "employedata.php") {
        $where2a = "active";
    } elseif ($thepagename == "employeelista.php") {
        $where2b = "active";
    } elseif ($thepagename == "employeelisti.php") {
        $where2c = "active";
    } elseif ($thepagename == "employeelistd.php") {
        $where2d = "active";
    }
} elseif ($thepagename == "applyleave.php" || $thepagename == "leaves.php" || $thepagename == "exemptions.php" || $thepagename == "applyworkshift.php" || $thepagename == "attendance_overrule.php" || $thepagename == "leaves_history.php" || $thepagename == "exemptions_history.php") {
    $where3 = "active";
    $therealpagename = "Attendance";
    if ($thepagename == "applyleave.php") {
        $where3a = "active";
    } elseif ($thepagename == "leaves.php") {
        $where3b = "active";
    } elseif ($thepagename == "exemptions.php") {
        $where3c = "active";
    } elseif ($thepagename == "applyworkshift.php") {
        $where3d = "active";
    } elseif ($thepagename == "attendance_overrule.php") {
        $where3e = "active";
    } elseif ($thepagename == "leaves_history.php") {
        $where3f = "active";
    } elseif ($thepagename == "exemptions_history.php") {
        $where3g = "active";
    }
} elseif ($thepagename == "adminusers.php" || $thepagename == "deviceadmins.php") {
    $where4 = "active";
    $therealpagename = "Administrators";
    if ($thepagename == "adminusers.php") {
        $where4a = "active";
    } elseif ($thepagename == "deviceadmins.php") {
        $where4b = "active";
    }
} elseif ($thepagename == "approvallevel.php" || $thepagename == "leavetype.php" || $thepagename == "holidays.php" || $thepagename == "exemptiontype.php" || $thepagename == "workshift.php") {
    $where5 = "active";
    $therealpagename = "Organization";
    if ($thepagename == "approvallevel.php") {
        $where5a = "active";
    } elseif ($thepagename == "leavetype.php") {
        $where5b = "active";
    } elseif ($thepagename == "holidays.php") {
        $where5c = "active";
    } elseif ($thepagename == "exemptiontype.php") {
        $where5d = "active";
    } elseif ($thepagename == "workshift.php") {
        $where5e = "active";
    }
} elseif ($thepagename == "devices.php" || $thepagename == "locations.php" || $thepagename == "departments.php" || $thepagename == "company.php") {
    $where6 = "active";
    $therealpagename = "Settings";
    if ($thepagename == "devices.php") {
        $where6a = "active";
    } elseif ($thepagename == "locations.php") {
        $where6b = "active";
    } elseif ($thepagename == "departments.php") {
        $where6c = "active";
    } elseif ($thepagename == "company.php") {
        $where6d = "active";
    }
} elseif ($thepagename == "sms1.php" || $thepagename == "sms2.php" || $thepagename == "sms3.php" || $thepagename == "sms4.php" || $thepagename == "sms5.php") {
    $where7 = "active";
    $therealpagename = "SMS Configuration";
    if ($thepagename == "sms1.php") {
        $where7a = "active";
    } elseif ($thepagename == "sms2.php") {
        $where7b = "active";
    } elseif ($thepagename == "sms3.php") {
        $where7c = "active";
    } elseif ($thepagename == "sms4.php") {
        $where7d = "active";
    } elseif ($thepagename == "sms5.php") {
        $where7e = "active";
    }

    /*
  $where7 = "active";
  $therealpagename = "SMS Configuration";
  if($thepagename=="sms1.php"){
  $where7a = "active";
  }elseif($thepagename=="sms2.php"){
  $where7b = "active";
  }elseif($thepagename=="sms3.php"){
  $where7c = "active";
  }elseif($thepagename=="sms4.php"){
  $where7d = "active";
  }elseif($thepagename=="sms5.php"){
  $where7e = "active";
  }
    */
} elseif ($thepagename == "biometrics.php" || $thepagename == "biometrics1.php" || $thepagename == "biometrics2.php") {
    $where8 = "active";
    $therealpagename = "Biometric Data";
    if ($thepagename == "biometrics1.php") {
        $where8a = "active";
    } elseif ($thepagename == "biometrics2.php") {
        $where8b = "active";
    } elseif ($thepagename == "biometrics3.php") {
        $where8c = "active";
    } elseif ($thepagename == "biometrics4.php") {
        $where8d = "active";
    }
} elseif ($thepagename == "attendance.php" || $thepagename == "attendance1.php" || $thepagename == "attendance2.php" || $thepagename == "attendance3.php" || $thepagename == "attendance4.php") {
    $where9 = "active";
    $therealpagename = "Reports";
    if ($thepagename == "attendance1.php") {
        $where9a = "active";
    } elseif ($thepagename == "attendance2.php") {
        $where9b = "active";
    } elseif ($thepagename == "attendance3.php") {
        $where9c = "active";
    } elseif ($thepagename == "attendance4.php") {
        $where9d = "active";
    } elseif ($thepagename == "attendance.php") {
        $where9e = "active";
    }
} elseif ($thepagename == "salary.php" || $thepagename == "salary1.php" || $thepagename == "salary2.php" || $thepagename == "salary3.php" || $thepagename == "salary4.php" || $thepagename == "salary5.php" || $thepagename == "salary6.php" || $thepagename == "salary7.php" || $thepagename == "salary8.php") {
    $where12 = "active";
    $therealpagename = "Salary Management";
    if ($thepagename == "salary.php") {
        $where12a = "active";
    } elseif ($thepagename == "salary1.php") {
        $where12b = "active";
    } elseif ($thepagename == "salary2.php") {
        $where12c = "active";
    } elseif ($thepagename == "salary3.php") {
        $where12d = "active";
    } elseif ($thepagename == "salary4.php") {
        $where12e = "active";
    } elseif ($thepagename == "salary5.php") {
        $where12f = "active";
    } elseif ($thepagename == "salary6.php") {
        $where12g = "active";
    } elseif ($thepagename == "salary7.php") {
        $where12h = "active";
    } elseif ($thepagename == "salary8.php") {
        $where12i = "active";
    }
} elseif ($thepagename == "kpi.php" || $thepagename == "kpi1.php" || $thepagename == "kpi2.php" || $thepagename == "kpi3.php" || $thepagename == "kpi4.php" || $thepagename == "kpi5.php" || $thepagename == "kpi6.php" || $thepagename == "kpi7.php" || $thepagename == "kpi8.php") {
    $where13 = "active";
    $therealpagename = "KPI Managemnet";
    if ($thepagename == "kpi.php") {
        $where13a = "active";
    } elseif ($thepagename == "kpi1.php") {
        $where13b = "active";
    } elseif ($thepagename == "kpi2.php" || $thepagename == "kpi4.php") {
        $where13c = "active";
    } elseif ($thepagename == "kpi3.php") {
        $where13d = "active";
    } elseif ($thepagename == "kpi44.php") {
        $where13e = "active";
    } elseif ($thepagename == "kpi5.php") {
        $where13f = "active";
    } elseif ($thepagename == "kpi6.php" || $thepagename == "kpi7.php" || $thepagename == "kpi8.php") {
        $where13g = "active";
    }
} elseif ($thepagename == "recruitment.php" || $thepagename == "recruitment1.php" || $thepagename == "recruitment2.php" || $thepagename == "recruitment3.php" || $thepagename == "jobmanagement.php" || $thepagename == "jobmanagement1.php" || $thepagename == "jobmanagement2.php" || $thepagename == "jobmanagement3.php" || $thepagename == "templates.php" || $thepagename == "templates1.php" || $thepagename == "templates2.php" || $thepagename == "templates3.php" || $thepagename == "settings.php" || $thepagename == "settings1.php" || $thepagename == "settings2.php" || $thepagename == "settings3.php") {
    $where15 = "active";
    $therealpagename = "Recruitment Managemnet";
    if ($thepagename == "recruitment.php" || $thepagename == "recruitment1.php" || $thepagename == "recruitment2.php" || $thepagename == "recruitment3.php") {
        $where15a = "active";
    } elseif ($thepagename == "jobmanagement.php" || $thepagename == "jobmanagement1.php" || $thepagename == "jobmanagement2.php" || $thepagename == "jobmanagement3.php") {
        $where15b = "active";
    } elseif ($thepagename == "templates.php" || $thepagename == "templates1.php" || $thepagename == "templates2.php" || $thepagename == "templates3.php") {
        $where15c = "active";
    } elseif ($thepagename == "settings.php" || $thepagename == "settings1.php" || $thepagename == "settings2.php" || $thepagename == "settings3.php") {
        $where15d = "active";
    }
} elseif ($thepagename == "assetmanagement.php" || $thepagename == "assetmanagement1.php" || $thepagename == "assetmanagement2.php" || $thepagename == "assetmanagement3.php") {
    $where16 = "active";
    $therealpagename = "HRDA (Human Resource Document Archive)";
    if ($thepagename == "assetmanagement.php") {
        $where16a = "active";
    } elseif ($thepagename == "assetmanagement1.php") {
        $where16b = "active";
    } elseif ($thepagename == "assetmanagement2.php") {
        $where16c = "active";
    } elseif ($thepagename == "assetmanagement3.php") {
        $where16d = "active";
    }
}
// end page settings

// audit settings
/**
 * Log an audit event
 *
 * @param int $user_id User performing the action
 * @param string $event_type Type of event (e.g., login, update, delete)
 * @param string $action_performed Description of the action
 * @param string|null $object_affected Object being affected (optional)
 * @param string $status Event status (success, failure, error)
 * @param string|null $previous_value Old value (optional)
 * @param string|null $new_value New value (optional)
 */
function log_audit_event($user_id, $event_type, $action_performed, $object_affected, $status, $previous_value, $new_value, $sessid)
{
    global $conn;

    @session_start();
    $ip_address = $_SERVER['REMOTE_ADDR']; // Capture user's IP address
    $companyid  = $_SESSION['company'];
    $thetime = time();

    $stmt = $conn->prepare("
        INSERT INTO audit_log (user_id, event_type, action_performed, object_affected, status, previous_value, new_value, ip_address, sessid, companyid, thetime) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("sssssssssss", $user_id, $event_type, $action_performed, $object_affected, $status, $previous_value, $new_value, $ip_address, $sessid, $companyid, $thetime);

    if ($stmt->execute()) {
        //echo "Audit log recorded successfully.";
    } else {
        //echo "Error logging event: " . $stmt->error;
    }

    $stmt->close();
}

// end audit settings
