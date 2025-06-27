<?php
header('Content-Type: application/json; charset=UTF-8');
include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");

$go = json_encode(["success" => "0"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = "INSERT INTO profile_references (pid, name, address, phone, email) VALUES ('$pid', '$name', '$address', '$phone', '$email')";
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
            $go = json_encode(["success" => "1", "id" => $last_id, "name" => $name, "address" => $address, "phone" => $phone, "email" => $email]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } elseif (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM profile_references WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            $go = json_encode(["success" => "1"]);
        } else {
            $go = json_encode(["success" => "0"]);
        }
    } else {}

}

echo $go;
?>