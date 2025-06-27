<?php
include __DIR__ . "/../includes/config.php"; // go one level up


if (isset($_POST['job_id'])) {
    //$job_id = intval($_POST['job_id']);
    $job_id = $_POST['job_id'];

    // Get the current status of the job
    $result = $conn->query("SELECT job_status FROM published_jobs WHERE job_id = '$job_id'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_status = ($row['job_status'] == 'Active') ? 'Suspended' : 'Active';

        // Update the status in the database
        $update = $conn->query("UPDATE published_jobs SET job_status = '$new_status' WHERE job_id = '$job_id'");

        if ($update) {
            echo json_encode(['success' => true, 'new_status' => $new_status]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Job not found']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}

$conn->close();
