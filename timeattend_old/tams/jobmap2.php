<?php
$therealpagename = '';
include "" . __DIR__ . "/header.php";


$jobid = $_GET['jobid'];
//$jobid = '1';

$total_applications = 0;
$total_passed = 0;
$percentage_passed = 0;
$total_failed = 0;
$percentage_failed = 0;
$total_repeat = 0;
$percentage_repeat = 0;
$total_employed = 0;
$percentage_employed = 0;
$total_app = 0;
$staff_needed = 0;

$result = $conn->query("SELECT * FROM jobs_details_settings WHERE id = '$jobid'");
while ($rowy = $result->fetch_assoc()) {
    $job_id = $rowy['job_id'];
}

$resultz = $conn->query("SELECT * FROM published_jobs WHERE job_id = '$job_id'");
while ($rowz = $resultz->fetch_assoc()) {
    $staff_needed = $rowz['staff_needed'];
}

$resultzx = $conn->query("SELECT COUNT(id) AS total_applications FROM job_applications_steps WHERE job_id = '$job_id'");
while ($rowzx = $resultzx->fetch_assoc()) {
    $total_app = $rowzx['total_applications'];
}

// Fetch data: Count total entries grouped by month from `published_jobs` for the selected year first data
$totaljobs = 0;
$resulty = $conn->query("SELECT 
    COUNT(job_id) AS total_applications,
    SUM(CASE WHEN step_result = 'Passed' THEN 1 ELSE 0 END) AS total_passed,
    ROUND((SUM(CASE WHEN step_result = 'Passed' THEN 1 ELSE 0 END) / COUNT(job_id)) * 100, 2) AS percentage_passed,
    SUM(CASE WHEN step_result = 'Failed' THEN 1 ELSE 0 END) AS total_failed,
    ROUND((SUM(CASE WHEN step_result = 'Failed' THEN 1 ELSE 0 END) / COUNT(job_id)) * 100, 2) AS percentage_failed,
    SUM(CASE WHEN step_result = 'Repeat' THEN 1 ELSE 0 END) AS total_repeat,
    ROUND((SUM(CASE WHEN step_result = 'Repeat' THEN 1 ELSE 0 END) / COUNT(job_id)) * 100, 2) AS percentage_repeat,
    SUM(CASE WHEN step_result = 'Employed' THEN 1 ELSE 0 END) AS total_employed,
    ROUND((SUM(CASE WHEN step_result = 'Employed' THEN 1 ELSE 0 END) / COUNT(job_id)) * 100, 2) AS percentage_employed FROM job_applications WHERE job_id = '$job_id'");

while ($row = $resulty->fetch_assoc()) {
    $total_applications = $row['total_applications'];
    $total_passed = $row['total_passed'];
    $percentage_passed = $row['percentage_passed'];
    $total_failed = $row['total_failed'];
    $percentage_failed = $row['percentage_failed'];
    $total_repeat = $row['total_repeat'];
    $percentage_repeat = $row['percentage_repeat'];
    $total_employed = $row['total_employed'];
    $percentage_employed = $row['percentage_employed'];
}

$total_unprocessed = (int)$total_app - (int)$total_applications;

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    "staff_needed" => $staff_needed,
    "total_applications" => $total_applications ?? 0,
    "total_passed" => $total_passed  ?? 0,
    "percentage_passed" => $percentage_passed ?? 0,
    "total_failed" => $total_failed  ?? 0,
    "percentage_failed" => $percentage_failed ?? 0,
    "total_repeat" => $total_repeat ?? 0,
    "percentage_repeat" => $percentage_repeat ?? 0,
    "total_employed" => $total_employed ?? 0,
    "percentage_employed" => $percentage_employed ?? 0,
    "total_unprocessed" => $total_unprocessed ?? 0,
    "total_app" => $total_app ?? 0,
    //"jobid" => $jobid
]);
