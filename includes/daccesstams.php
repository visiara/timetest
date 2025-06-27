<?php // accesscontrol.php

include("" . __DIR__ . "/config.php");
$llogin2 = time();

@session_start();

if (isset($_POST['uid'])) {
  $uid = $_POST['uid'];
  $uid = strtolower($uid);
} elseif (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];
  $uid = strtolower($uid);
} else {
}

if (isset($_POST['pwd'])) {
  $pwd = $_POST['pwd'];
} elseif (isset($_SESSION['pwd'])) {
  $pwd = $_SESSION['pwd'];
} else {
}

if (!isset($uid) || !isset($pwd) || empty($uid) || empty($pwd)) {
  @session_start();
  session_destroy();
  header("Location: index.php");
  $logmessage = "";
} else {

  //Clean the input submitted to mysql
  $uid = addslashes($uid);
  $pwd = addslashes($pwd);

  //this puts the variable into the session
  $_SESSION['uid'] = $uid;
  $_SESSION['pwd'] = $pwd;
  setcookie("lf_session", $_SESSION['uid']);

  $accesssql = "SELECT * FROM admins WHERE uname = '$uid' AND pword = '$pwd' AND status = 'Active'";
  $accessresult = mysqli_query($conn, $accesssql);

  if (!$accessresult) {
    echo "A database error occurred while checking your login details";
  }
  //if bad user/pass combo access denied
  if (mysqli_num_rows($accessresult) == 0) {
    unset($_SESSION['uid']);
    unset($_SESSION['pwd']);
    session_destroy();
    setcookie("lf_session", "", time() - 3600);
    header("Location: index.php?2=2");
  } else {
    $upllogin = mysqli_query($conn, "UPDATE admins SET llogin = '$llogin2' WHERE uname = '$uid' AND pword = '$pwd'");
    //$upllogin2 = mysqli_query($conn, $upllogin);

    while ($accessresult1 = mysqli_fetch_array($accessresult)) {
      $companyMain = $accessresult1["company"];
    }

    if (!isset($_SESSION['logged'])) {
      $_SESSION['logged'] = time();
      $_SESSION['company'] = $companyMain;
      log_audit_event($uid, "LOGIN", "User logged in", "users", "success", '', '', $_SESSION['logged']);
    }
  }
}
