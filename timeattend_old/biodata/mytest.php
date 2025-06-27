<?php

$con = mysqli_connect("localhost","root","","bipatas");

if (mysqli_connect_errno()){ 

echo mysqli_error($con);

exit();

}

$sql = "select * from applicant_fingerprints WHERE id = '1549'" ;

if (!$result=mysqli_query($con, $sql)){

echo mysqli_error($con);

}

else {

$row = mysqli_fetch_array($result);

header('Content-type: image/png'); 

echo $row["image"];

}

mysqli_close($con);

?>