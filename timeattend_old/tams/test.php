<?php

//$TodayDate = "2022-07-07";
//$expectedTimin1 = "8:00am";
//$eTotal = "9";

//$expectedTimin = strtotime("$TodayDate $expectedTimin1");
//$expectedTimeOut = strtotime($TodayDate.' '.$expectedTimin1. " + $eTotal hours");
    
//echo date('Y-m-d H:i:s', $expectedTimin). "<br>";
//echo date('Y-m-d H:i:s', $expectedTimeOut);

include __DIR__ . "/../includes/config.php"; // go one level up


$hu=mysqli_query($conn, "SELECT * FROM attendance WHERE attendancereport = 'Active'");
while ($hug= mysqli_fetch_array($hu))
{
  $id = $hug["id"];
  $TodayDate = $hug["date"];
  $expectedTimin1 = "8:00am";
  $eTotal = "9";
  
  $expectedTimin = strtotime("$TodayDate $expectedTimin1");
  $expectedTimeOut = strtotime($TodayDate.' '.$expectedTimin1. " + $eTotal hours");
  
  //$saveinsert1 = "UPDATE attendance SET `expectedTimin`='$expectedTimin', `expectedTimeOut`='$expectedTimeOut', `eTotal`='$eTotal' WHERE id='$id'";
  //mysqli_query($conn, $saveinsert1);
}

CREATE TABLE job_requisitions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(255) NOT NULL,
  job_title VARCHAR(255) NOT NULL,
  requestor VARCHAR(255) NOT NULL,
  reason TEXT NOT NULL,
  request_type ENUM('Internal', 'External', 'Both') NOT NULL,
  job_description TEXT NOT NULL,
  date_required VARCHAR(255) NOT NULL,
  staff_needed VARCHAR(255) NOT NULL,
  job_status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  post_link TEXT NOT NULL,
  post_where VARCHAR(255) NOT NULL,
  approval_steps VARCHAR(255) NOT NULL,
  work_style VARCHAR(255) NOT NULL,
  employment_style VARCHAR(255) NOT NULL,
  date_created VARCHAR(255) NOT NULL
);

-- Published Jobs Table
CREATE TABLE published_jobs (
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    request_type ENUM('Internal', 'External', 'Both') NOT NULL,
    status ENUM('Active', 'Suspended') DEFAULT 'Active'
);

-- Applicants Table
CREATE TABLE job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_id VARCHAR(100) NULL,
    fname VARCHAR(255) NULL,
    mname VARCHAR(255) NULL,
    lname VARCHAR(255) NULL,
    phone VARCHAR(100) NULL,
    email VARCHAR(255) NULL,
    job_id VARCHAR(255) NULL,
    employment_style ENUM('Full-time', 'Part-time', 'Contract') NULL,
    workstyle ENUM('On-site', 'Remote', 'Hybrid') NULL,
    date_created VARCHAR(255) NULL
);

////////////

CREATE TABLE jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_title VARCHAR(255) NULL,
  job_level ENUM('Entry', 'Mid-Level', 'Senior Level') NULL,
  employment_type ENUM('Full-Time', 'Part-Time', 'Contract', 'Internship') NULL,
  country VARCHAR(100) NULL,
  location VARCHAR(255) NULL,
  workstyle ENUM('Onsite', 'Remote', 'Hybrid') NULL,
  min_pay VARCHAR(255) NULL,
  max_pay VARCHAR(255) NULL,
  show_pay VARCHAR(2) NULL DEFAULT 0,
  job_description TEXT NULL,
  job_responsibilities TEXT NULL,
  job_requirements TEXT NULL,
  job_expiry_date VARCHAR(100) NULL,
  job_visibility ENUM('Internal', 'External', 'Both') NULL,
  is_private VARCHAR(2) NULL DEFAULT 0,
  specialization VARCHAR(255) NULL,
  job_team TEXT NULL,
  application_workflow VARCHAR(255) NULL,
  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
/////////


CREATE TABLE jobs_details_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(255) NULL,
  job_title VARCHAR(255) NULL,
  job_level ENUM('Entry', 'Mid-Level', 'Senior Level') NULL,
  employment_type ENUM('Full-Time', 'Part-Time', 'Contract', 'Internship') NULL,
  country VARCHAR(100) NULL,
  location VARCHAR(255) NULL,
  workstyle ENUM('Onsite', 'Remote', 'Hybrid') NULL,
  min_pay VARCHAR(255) NULL,
  max_pay VARCHAR(255) NULL,
  show_pay BOOLEAN NULL DEFAULT 0,
  job_description TEXT NULL,
  job_responsibilities TEXT NULL,
  job_requirements TEXT NULL,
  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE jobs_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(255) NULL,
  job_expiry_date DATE NULL,
  job_visibility ENUM('Internal', 'External', 'Both') NULL,
  is_private BOOLEAN NULL DEFAULT 0,
  specialization VARCHAR(255) NULL,
  job_team TEXT NULL,
  application_workflow VARCHAR(255) NULL,
  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_applicants_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(255) NULL,
  input_name VARCHAR(255) NULL,
  input_type VARCHAR(255) NULL,
  compulsory VARCHAR(100) NULL,
);

CREATE TABLE job_education_history (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(100) NULL,
  school VARCHAR(255) NULL,
  course VARCHAR(255) NULL,
  degree ENUM('B.Sc', 'HND', 'OND', 'NCE', 'FSLC', 'SSCE', 'M.Sc', 'PhD')
);

CREATE TABLE job_work_experience (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(100) NULL,
  job_title VARCHAR(255) NULL,
  description TEXT NULL,
  duration VARCHAR(100) NULL
);

CREATE TABLE job_documents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(100) NULL,
  document_name VARCHAR(255) NULL,
  document_file VARCHAR(255) NULL
);

CREATE TABLE applicant_documents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  applicant_id VARCHAR(100) NULL,
  file_name VARCHAR(255) NULL,
  file_path VARCHAR(255) NULL,
  file_type VARCHAR(100) NULL,
  file_size VARCHAR(100) NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `jobs_details_settings` ADD `job_status` ENUM('Active', 'Draft', 'Private', 'Suspended', 'Expired') NOT NULL AFTER `date_created`; 

CREATE TABLE job_workflow (
  id INT AUTO_INCREMENT PRIMARY KEY,
  workflow_name VARCHAR(255) NULL,
  workflow_desc TEXT NULL,
  workflow_steps TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(100) NULL,
  question_name VARCHAR(255) NULL,
  description TEXT,
  response_type ENUM('Text', 'Rating') NULL,
  rating_scale VARCHAR(100) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NULL,
  file_type VARCHAR(50) NULL,
  label VARCHAR(255) NULL,
  classification ENUM('Confidential', 'Public', 'Internal', 'Restricted') NULL,
  file_path VARCHAR(255) NULL,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_applications_steps (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id VARCHAR(100) NULL,
  application_id VARCHAR(100) NULL,
  applicant_id VARCHAR(100) NULL,
  step_id VARCHAR(100) NULL,
  step_report TEXT,
  interview_report TEXT,
  step_result ENUM('Passed', 'Failed', 'Repeat') NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $job_id = 'JOB'.time();

  $job_title = trim($_POST['jobTitle']);
    $job_level = $_POST['jobLevel'];
    $employment_type = $_POST['employmentType'];
    $country = trim($_POST['country']);
    $location = trim($_POST['location']);
    $workstyle = $_POST['workstyle'];
    $min_pay = floatval($_POST['minPay']);
    $max_pay = floatval($_POST['maxPay']);
    $show_pay = isset($_POST['showPay']) ? 1 : 0;
    $job_description = trim($_POST['jobDescription2']);
    $job_responsibilities = trim($_POST['jobResponsibilities']);
    $job_requirements = trim($_POST['jobRequirements']);

    // Prepare SQL statement
    $sql = "INSERT INTO jobs (job_id, job_title, job_level, employment_type, country, location, workstyle, min_pay, max_pay, show_pay, job_description, job_responsibilities, job_requirements) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $job_id, $job_title, $job_level, $employment_type, $country, $location, $workstyle, $min_pay, $max_pay, $show_pay, $job_description, $job_responsibilities, $job_requirements);
    
    if ($stmt->execute()) {
        
      // Insert into applicants table
    $job_expiry_date = $_POST['jobExpiryDate'];
    $job_visibility = $_POST['jobVisibility'];
    $is_private = isset($_POST['makeJobPrivate']) ? 1 : 0;
    $specialization = trim($_POST['specialization']);
    $job_team = $_POST['jobTeam'];
    $application_workflow = $_POST['applicationWorkflow'];

    // Prepare SQL statement
    $sql = "INSERT INTO jobs (job_id, job_expiry_date, job_visibility, is_private, specialization, job_team, application_workflow) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $job_id, $job_expiry_date, $job_visibility, $is_private, $specialization, $job_team, $application_workflow);
    $stmt->execute();

        // Insert applicants details
        if (!empty($_POST['name'])) {
          $sql = "INSERT INTO job_applicants_settings (job_id, input_name, input_type, compulsory) VALUES (?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          foreach ($_POST['name'] as $key => $name) {
              $checkname = $_POST['checkname'][$key];
              //$type = $_POST['type'][$key];
              $stmt->bind_param("ssss", $job_id, $name, 'text', $checkname);
              $stmt->execute();
          }
        }

        // Insert education history
        if (!empty($_POST['school'])) {
            $sql = "INSERT INTO education_history (job_id, school, course, degree) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_POST['school'] as $key => $school) {
                $course = $_POST['course'][$key];
                $degree = $_POST['degree'][$key];
                $stmt->bind_param("ssss", $job_id, $school, $course, $degree);
                $stmt->execute();
            }
        }

        // Insert work experience
        if (!empty($_POST['jobTitle'])) {
            $sql = "INSERT INTO work_experience (job_id, job_title, description, duration) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_POST['jobTitle'] as $key => $jobTitle) {
                $jobDescription = $_POST['jobDescription'][$key];
                $jobDuration = $_POST['jobDuration'][$key];
                $stmt->bind_param("ssss", $job_id, $jobTitle, $jobDescription, $jobDuration);
                $stmt->execute();
            }
        }

        // Insert documents
        if (!empty($_FILES['documentFile']['name'][0])) {
            $sql = "INSERT INTO documents (job_id, document_name, document_file) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_FILES['documentFile']['name'] as $key => $filename) {
                $documentName = $_POST['documentName'][$key];
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES["documentFile"]["name"][$key]);

                if (move_uploaded_file($_FILES["documentFile"]["tmp_name"][$key], $targetFile)) {
                    $stmt->bind_param("sss", $job_id, $documentName, $targetFile);
                    $stmt->execute();
                }
            }
        }

        echo json_encode(['success' => true, 'message' => 'Application submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>



?>


published_jobs date_created 

job_applications date_created


<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change to your DB username
$password = ""; // Change to your DB password
$database = "your_database"; // Change to your DB name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Fetch data from table (assuming table has `x_value` and `y_value` columns)
$sql = "SELECT x_value AS x, y_value AS y FROM your_table ORDER BY x_value";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            "x" => (int)$row["x"], // Ensure x is an integer
            "y" => (int)$row["y"]  // Ensure y is an integer
        ];
    }
}

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode(["data" => $data]);
?>


fetch("fetch_chart_data.php")
  .then(response => response.json())
  .then(data => {
    console.log(data); // Log the data to check the format
    // Use the data in your charting library
  })
  .catch(error => console.error("Error fetching data:", error));



  ///////////////////#stepy??
