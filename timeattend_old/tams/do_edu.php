<?php
header('Content-Type: application/json; charset=UTF-8');
$therealpagename = '';
//include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
include "" . __DIR__ . "/header.php";


$go = json_encode(["success" => "0"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $school = $_POST['school'];
        $schoolperiod = $_POST['schoolperiod'];
        $qualification = $_POST['qualification'];

        $query = "INSERT INTO profile_education (pid, school, schoolperiod, qualification, company) VALUES ('$pid', '$school', '$schoolperiod', '$qualification', '$companyMain')";
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
            $go = json_encode(["success" => "1", "id" => $last_id, "school" => $school, "schoolperiod" => $schoolperiod, "qualification" => $qualification]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } elseif (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM profile_education WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            $go = json_encode(["success" => "1"]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } else {
    }
}

echo $go;
