<?php
include __DIR__ . "/../includes/config.php"; // go one level up


$bookpay1 = mysqli_query($conn, "SELECT * FROM attendance");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
    $eidy = $bookpay["id"];
    $TodayDate = $bookpay["date"];
    $deda = strtotime($TodayDate);

    $saveinsert1 = "UPDATE attendance SET daydatetime = '$deda' WHERE id = '$eidy'";
    mysqli_query($conn, $saveinsert1);
}
