<?php
header('Content-Type: application/json; charset=UTF-8');
$therealpagename = '';
//include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
include "" . __DIR__ . "/header.php";


$go = json_encode(["success" => "0"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $myrole = $_POST['myrole'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];

        $query = "INSERT INTO profile_employers (pid, name, myrole, startdate, enddate, company) VALUES ('$pid', '$name', '$myrole', '$startdate', '$enddate', '$companyMain')";
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
            $go = json_encode(["success" => "1", "id" => $last_id, "name" => $name, "myrole" => $myrole, "startdate" => $startdate, "enddate" => $enddate]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } elseif (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM profile_employers WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            $go = json_encode(["success" => "1"]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } else {
    }
}

echo $go;
