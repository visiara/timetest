<?php
include __DIR__ . "/../includes/config.php"; // go one level up


@session_start();

$uid = $_SESSION['uid'];
log_audit_event($uid, "LOGOUT", "User logged out", "users", "success", '', '', $_SESSION['logged']);

session_destroy();

header("Location: index.php");
