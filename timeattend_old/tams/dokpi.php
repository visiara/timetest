<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$id = $_GET['id'];
$r = $_GET['r'];
$a = $_GET['a'];
$w = $_GET['w'];
$v = $_GET['v'];
$c = $_GET['c'];


if ($c === '0') {
    mysqli_query($conn, "UPDATE kpi_list SET dpoll='$v', endinfo='$r', kachieve='$a', fstatus = '1', innitialscore='$v' WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE kpi_list SET dpoll='$v', endinfo='$r', kachieve='$a', innitialscore='$v' WHERE id='$id'");
}

echo "1";
