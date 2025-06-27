<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];
$type = $_GET['type'];
$value = $_GET['value'];

if ($type == "1") {
    $saveinsert1 = "UPDATE company SET breakoption ='$q' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "2") {
    $saveinsert1 = "UPDATE company SET deducttime ='$q' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "3") {
    $saveinsert1 = "UPDATE company SET kpion ='$q', kpidata ='$value' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "4") {
    $saveinsert1 = "UPDATE company SET salaryon ='$q', salarydata ='$value' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "5") {
    $saveinsert1 = "UPDATE company SET kpidata ='$q' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "6") {
    $saveinsert1 = "UPDATE company SET salarydata ='$q' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}

if ($type == "7") {
    $saveinsert1 = "UPDATE company SET atcomp ='$q' WHERE id='$companyMain'";
    mysqli_query($conn, $saveinsert1);
}
