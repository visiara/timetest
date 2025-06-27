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

    // If form is submitted 
    if (isset($_POST['create_requisition'])) {
        $job_id = $companyref . $coolo;
        $job_title = $_POST['job_title'];
        $requestor = $loggedid;
        $reason = $_POST['reason'];
        $request_type = $_POST['request_type'];
        $job_description = $_POST['job_description'];
        $date_required = $_POST['date_required'];
        $staff_needed = $_POST['number_needed'];

        $approval_steps = implode(",", $_POST['approval_steps']);

        $date_created = date("Y-m-d");

        $sql = "INSERT INTO job_requisitions (job_id, job_title, requestor, reason, request_type, job_description, date_required, staff_needed, job_status, approval_steps, date_created, company) VALUES ('$job_id', '$job_title', '$requestor', '$reason', '$request_type', '$job_description', '$date_required', '$staff_needed', 'Pending', '$approval_steps', '$date_created', '$companyMain')";
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 1;
            $response['message'] = "Job Requisition Created Successfully";
        } else {
            $response['message'] = "Error: " . $sql . " - " . $conn->error;
        }
    }

    // If form is submitted 
    if (isset($_POST['post_job'])) {
        $job_id = $_POST['job_id'];
        $job_title = $_POST['job_title'];
        $requestor = $_POST['requestor'];
        $reason = $_POST['reason'];
        $request_type = $_POST['request_type'];
        $job_description = $_POST['job_description'];
        $date_required = $_POST['date_required'];
        $staff_needed = $_POST['number_needed'];

        $approval_steps = implode(",", $_POST['approval_steps']);

        $date_created = date("Y-m-d");

        $website = $_POST['website'] ?? '0';
        $linkedin = $_POST['linkedin'] ?? '0';
        $facebook = $_POST['facebook'] ?? '0';

        $edittype = $_POST['edittype'];

        if ($edittype == '1') {
            $query = "UPDATE job_requisitions SET job_title='$job_title', requestor='$requestor', reason='$reason', request_type='$request_type', job_description='$job_description', date_required='$date_required', staff_needed='$staff_needed', approval_steps='$approval_steps' WHERE `job_id` = '$job_id'";
            mysqli_query($conn, $query);
        }

        if (recordExists($conn, 'published_jobs', $job_id)) {
            $response['message'] = "Job already exist on file";
        } else {
            $sql = "INSERT INTO published_jobs (job_id, job_title, requestor, reason, request_type, job_description, date_required, staff_needed, job_status, , approval_steps, date_created, website, linkedin, facebook, company) VALUES ('$job_id', '$job_title', '$requestor', '$reason', '$request_type', '$job_description', '$date_required', '$staff_needed', 'Pending', , '$approval_steps', '$date_created', '$website', '$linkedin', '$facebook', '$companyMain')";
            if ($conn->query($sql) === TRUE) {

                $queryx = "UPDATE job_requisitions SET job_status = 'Approved' WHERE `job_id` = '$job_id'";
                mysqli_query($conn, $queryx);

                $response['status'] = 1;
                $response['message'] = "Job Posted Successfully";
            } else {
                $response['message'] = "Error: " . $sql . " - " . $conn->error;
            }
        }
    }
}

// Return response 
echo json_encode($response);
