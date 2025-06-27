<?php
$therealpagename = "";
header('Content-Type: application/json; charset=UTF-8');
//include __DIR__ . "/../includes/config.php"; // go one level up

include "" . __DIR__ . "/header.php";


$cool = time();
//$coolo = $cool.substr(4);
$coolo = substr($cool, 3, 7);

$regdate = time();
$today = time();
$date_created = date('Y-m-d H:i:s');

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

// Function to check if the record exists
function recordExists($conn, $table, $job_id)
{
    $query = "SELECT 1 FROM `$table` WHERE `job_id` = '$job_id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['upload'])) {
        $fileName = $_POST['fileName'];
        //$fileType = $_POST['fileType'];
        $fileLabel = $_POST['fileLabel'];
        $fileClassification = $_POST['fileClassification'];

        $fileSize = $_FILES['fileInput']['size'];
        $fileType = $_FILES['fileInput']['type'];
        $fileExtension = strtolower(pathinfo($_FILES["fileInput"]["name"], PATHINFO_EXTENSION));

        $targetDir = "../uploads/";

        $fileTmpName = $_FILES["fileInput"]["tmp_name"];
        $originalFileName = basename($_FILES["fileInput"]["name"]);
        $newFileName = time() . "_" . $originalFileName;
        $filePath = $targetDir . $newFileName;

        // Validate file type (Example: Allow only images and PDFs)
        /*
            $allowedTypes = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        if (!in_array($fileType, $allowedTypes)) {
            $response['message'] = "Invalid file type. Only PDF, DOC, and DOCX are allowed.";
            exit;
        }
        */

        // Validate file size (Example: Maximum 5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            $response['message'] = "File too large. Maximum size allowed is 5MB.";
        } elseif (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $filePath)) {
            $sql = "INSERT INTO archive_files (old_filename, file_name, file_type, label, classification, file_path, company) VALUES ('$originalFileName', '$fileName', '$fileExtension', '$fileLabel', '$fileClassification', '$newFileName', '$companyMain')";

            if ($conn->query($sql) === TRUE) {
                $response['status'] = 1;
                $response['message'] = "File uploaded successfully";
            } else {
                $response['message'] = "Error: " . $sql . " - " . $conn->error;
            }
        } else {
            $response['message'] = "Error uploading file.";
        }
    }

    if (isset($_POST['editFileId'])) {

        $fileid = $_POST['editFileId'];
        $fileLabel = $_POST['editFileLabel'];
        $fileClassification = $_POST['editFileClassification'];

        $sql = "UPDATE archive_files SET label='$fileLabel', classification='$fileClassification' WHERE id = '$fileid'";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 1;
            $response['message'] = "File updated successfully";
        } else {
            $response['message'] = "Error: " . $sql . " - " . $conn->error;
        }
    }

    if (isset($_POST['delefileId'])) {
        $fileId = $_POST['delefileId'];

        /*
        $sql = "SELECT file_path FROM files WHERE id = '$fileId'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            unlink($row['file_path']);
        }
        */

        $sql = "DELETE FROM archive_files WHERE id = '$fileId'";
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 1;
            $response['message'] = "File deleted successfully";
        } else {
            $response['message'] = "Error: " . $sql . " - " . $conn->error;
        }
    }

    if (isset($_POST['delefileId2'])) {
        $fileIds = $_POST['delefileId2'];
        $filesarray = explode(",", $fileIds);

        foreach ($filesarray as $fileId) {
            $sql = "DELETE FROM archive_files WHERE id = '$fileId'";

            if ($conn->query($sql) === TRUE) {
                $response['status'] = 1;
                $response['message'] = "File deleted successfully";
            } else {
                $response['message'] = "Error: " . $sql . " - " . $conn->error;
            }
        }
    }
}

// Return response 
echo json_encode($response);
