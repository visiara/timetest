<?php // accesscontrol.php
$llogin2 = time();

include __DIR__ . "/../includes/config.php"; // go one level up


//session_start(['cookie_lifetime' => -1000,]);

ini_set('session.cokie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
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
  header("Location: login.php");
  $logmessage = "";
} else {

  //Clean the input submitted to mysql
  $uid = addslashes($uid);
  $pwd = addslashes($pwd);

  //this puts the variable into the session
  $_SESSION['uid'] = $uid;
  $_SESSION['pwd'] = $pwd;

  $accesssql = "SELECT * FROM mainmembers WHERE (uname = '$uid' OR phone = '$uid') AND pword = '$pwd' ";
  $accessresult = mysql_query($accesssql);

  if (!$accessresult) {
    echo "A database error occurred while checking your login details";
  }
  //if bad user/pass combo access denied
  if (mysql_num_rows($accessresult) == 0) {
    unset($_SESSION['uid']);
    unset($_SESSION['pwd']);
    session_destroy();
    header("Location: login.php?2=2");
  } else {
    $upllogin = mysql_query("UPDATE mainmembers SET llogin = '$llogin2' WHERE (uname = '$uid' OR phone = '$uid') AND pword = '$pwd'");
    $upllogin2 = mysql_query($upllogin);
  }
}
