<?php
include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");

// Update query
$sql = "UPDATE employee SET uname = email";

if ($conn->query($sql) === TRUE) {
    echo "Records updated successfully";
} else {
    echo "Error updating records: " . $conn->error;
}

// Close the connection
$conn->close();
?>
