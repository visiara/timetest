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

/**
 * Function to get the next ID after a given step_id.
 *
 * @param mysqli $conn Database connection
 * @param int $step_id Current step ID
 * @return int Next ID (or same step_id if it's the last one)
 */
function getNextStepId($conn, $job_id, $step_id)
{
    $sql = "SELECT application_workflow FROM jobs_settings WHERE job_id = '$job_id' ORDER BY id ASC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $workflowid = $row['application_workflow'];
    }

    $sql2 = "SELECT workflow_steps FROM job_workflow WHERE id = '$workflowid' ORDER BY id ASC";
    $result2 = $conn->query($sql2);
    while ($row2 = $result2->fetch_assoc()) {
        $id_array = empty($row2['workflow_steps']) ? array() : explode(",", $row2['workflow_steps']);
    }

    sort($id_array); // Ensure array is sorted in ascending order

    $next_id = $step_id;
    $found = false;

    foreach ($id_array as $id) {
        if ($found) {
            $next_id = $id;
            break;
        }
        if ($id == $step_id) {
            $found = true;
        }
    }

    return $next_id;
}



// If form is submitted 
if (isset($_POST['newjob'])) {

    $job_id = 'JOB' . time();

    $job_title2 = $_POST['jobtitle2'];
    $job_level = $_POST['jobLevel'];
    $employment_type = $_POST['employmentType'];
    $country = $_POST['country'];
    $location = $_POST['location'];
    $workstyle = $_POST['workstyle'];
    $min_pay = $_POST['minPay'];
    $max_pay = $_POST['maxPay'];
    $show_pay = isset($_POST['showPay']) ? 1 : 0;
    $job_description = $_POST['jobDescription2'];
    $job_responsibilities = $_POST['jobResponsibilities'];
    $job_requirements = $_POST['jobRequirements'];

    // Prepare SQL statement
    $sql = "INSERT INTO jobs_details_settings (job_id, job_title, job_level, employment_type, country, location, workstyle, min_pay, max_pay, show_pay, job_description, job_responsibilities, job_requirements, company) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $job_id, $job_title2, $job_level, $employment_type, $country, $location, $workstyle, $min_pay, $max_pay, $show_pay, $job_description, $job_responsibilities, $job_requirements, $companyMain);

    if ($stmt->execute()) {

        // Insert into applicants table
        $job_expiry_date = $_POST['jobExpiryDate'];
        $job_visibility = $_POST['jobVisibility'];
        $is_private = isset($_POST['makeJobPrivate']) ? 1 : 0;
        $specialization = trim($_POST['specialization']);
        $job_team = implode(",", $_POST['jobTeam']);
        $application_workflow = $_POST['applicationWorkflow'];

        // Convert the array to a comma-separated string
        $idList = implode(',', array_map('intval', $_POST['jobTeam'])); // Ensure values are integers

        // SQL query using IN clause
        $sqly = "SELECT id FROM admins WHERE user_role IN ($idList)";
        $resulty = $conn->query($sqly);

        // New array to store result IDs
        $job_team_members = [];

        if ($resulty->num_rows > 0) {
            while ($row = $resulty->fetch_assoc()) {
                $job_team_members[] = $row["id"]; // Store each found ID into the new array
            }
        }

        // Prepare SQL statement
        $sql = "INSERT INTO jobs_settings (job_id, job_expiry_date, job_visibility, is_private, specialization, job_team, job_team_members, application_workflow, company) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $job_id, $job_expiry_date, $job_visibility, $is_private, $specialization, $job_team, $job_team_members, $application_workflow, $companyMain);
        $stmt->execute();

        // Insert applicants details
        if (!empty($_POST['name'])) {
            $sql = "INSERT INTO job_applicants_settings (job_id, input_name, input_type, compulsory, company) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_POST['name'] as $key => $name) {
                $checkname = isset($_POST['checkname'][$key]) ? 1 : 0;
                //$type = $_POST['type'][$key];
                $text = 'text';
                $stmt->bind_param("sssss", $job_id, $name, $text, $checkname, $companyMain);
                $stmt->execute();
            }
        }

        // Insert education history
        if (!empty($_POST['school'])) {
            $sql = "INSERT INTO job_education_history (job_id, school, course, degree, company) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_POST['school'] as $key => $school) {
                $course = $_POST['course'][$key];
                $degree = $_POST['degree'][$key];
                $stmt->bind_param("sssss", $job_id, $school, $course, $degree, $companyMain);
                $stmt->execute();
            }
        }

        // Insert work experience
        if (!empty($_POST['jobTitle'])) {
            $sql = "INSERT INTO job_work_experience (job_id, job_title, description, duration, company) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_POST['jobTitle'] as $key => $jobTitle) {
                $jobDescription = $_POST['jobDescription'][$key];
                $jobDuration = $_POST['jobDuration'][$key];
                $stmt->bind_param("sssss", $job_id, $jobTitle, $jobDescription, $jobDuration, $companyMain);
                $stmt->execute();
            }
        }

        // Insert documents
        $dufile = time();
        if (!empty($_FILES['documentFile']['name'][0])) {
            $sql = "INSERT INTO job_documents (job_id, document_name, document_file, company) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            foreach ($_FILES['documentFile']['name'] as $key => $filename) {
                $dufile = $dufile + 1;
                $documentName = $_POST['documentName'][$key];
                $targetDir = "../uploads/";

                $get_extension1 = explode(".", $_FILES['documentFile']['name'][$key]);
                $extension1 = $get_extension1[1];
                $img_name1 = $dufile;
                $newimage = "$img_name1.$extension1";

                //$targetFile = $targetDir . basename($_FILES["documentFile"]["name"][$key]);
                $targetFile = $targetDir . basename($newimage);

                if (move_uploaded_file($_FILES["documentFile"]["tmp_name"][$key], $targetFile)) {
                    $stmt->bind_param("ssss", $job_id, $documentName, $newimage, $companyMain);
                    $stmt->execute();
                }
            }
        }

        $response['status'] = 1;
        $response['message'] = "Job Created Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['uploadfile'])) {
    $applicant_id = $_POST["applicant_id_form"];
    $fileName = $_POST["fileName"];
    $uploadtype = $_POST["uploadtype"];

    //$fileSize = $_POST["fileSize"];

    $fileSize = $_FILES['fileUpload']['size'];
    $fileType = $_FILES['fileUpload']['type'];

    $uploadDir = "../uploads/";

    $fileTmpName = $_FILES["fileUpload"]["tmp_name"];
    $originalFileName = basename($_FILES["fileUpload"]["name"]);
    $newFileName = time() . "_" . $originalFileName;
    $filePath = $uploadDir . $newFileName;

    // Validate file type (Example: Allow only images and PDFs)
    $allowedTypes = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
    if (!in_array($fileType, $allowedTypes)) {
        $response['message'] = "Invalid file type. Only PDF, DOC, and DOCX are allowed.";
    } elseif ($fileSize > 5 * 1024 * 1024) {
        $response['message'] = "File too large. Maximum size allowed is 5MB.";
    } else {
        if ($uploadtype == 'cv') {
            $result = $conn->query("SELECT * FROM job_applications WHERE company = '$companyMain' AND id = '$applicant_id'");
            while ($row = $result->fetch_assoc()) {
                $therow = $row['cv_file'];
            }

            if (empty($therow)) {
                // Move uploaded file to server directory
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    // Store file info in database
                    $stmt = "UPDATE job_applications SET cv_file = '$newFileName', cv_file_type = '$fileType' WHERE id = '$applicant_id'";
                    if (mysqli_query($conn, $stmt)) {
                        $response['status'] = 1;
                        $response['message'] = "Applicant CV uploaded  Successfully!";
                    } else {
                        $response['message'] = "Database error:: - ";
                    }
                } else {
                    $response['message'] = "Error uploading Applicant CV.";
                }
            } else {
                $response['message'] = "Applicant CV already uploaded.";
            }
        } else {
            // Move uploaded file to server directory
            if (move_uploaded_file($fileTmpName, $filePath)) {
                // Store file info in database
                $stmt = $conn->prepare("INSERT INTO applicant_documents (applicant_id, file_name, file_path, file_type, file_size, company) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $applicant_id, $fileName, $newFileName, $fileType, $fileSize, $companyMain);

                if ($stmt->execute()) {
                    $response['status'] = 1;
                    $response['message'] = "Applicant document uploaded  Successfully!";
                } else {
                    $response['message'] = "Database error:: - " . $stmt->error;
                }
            } else {
                $response['message'] = "Error uploading file.";
            }
        }
    }
}

if (isset($_POST['create_requisition2'])) {

    $job_id = 'JOB' . time();

    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);

    // Prepare SQL statement
    $sql = "INSERT INTO job_workflow (workflow_name, workflow_desc, company) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $template_name, $template_desc, $companyMain);

    if ($stmt->execute()) {

        $response['status'] = 1;
        $response['message'] = "Workflow Created Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['teamrowid'])) {

    $teamrowid = $_POST['teamrowid'];
    $team_member = $_POST['team_member'];

    $result1 = $conn->query("SELECT * FROM jobs_settings WHERE id = '$teamrowid'");
    while ($row1 = $result1->fetch_assoc()) {
        $job_team = $row1['job_team'];
        $job_team_members = $row1['job_team_members'];
    }

    $array = empty($job_team_members) ? array() : explode(",", $job_team_members);

    foreach ($_POST['team_member'] as $key => $member) {
        $array[] = $member;
    }

    $array = array_values($array);
    $newvalue = implode(",", $array);

    // Prepare SQL statement
    $sql = "UPDATE jobs_settings SET job_team_members = '$newvalue' WHERE id = '$teamrowid'";
    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Team Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_POST['updatetemplate2'])) {

    $template_id = $_POST['template_id'];
    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);

    // Prepare SQL statement
    $sql = "UPDATE job_workflow SET workflow_name = '$template_name', workflow_desc = '$template_desc' WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Workflow Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_GET['dele'])) {

    $template_id = $_GET['dele'];

    // Prepare SQL statement
    $sql = "DELETE FROM job_workflow WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Workflow Deleted Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_GET['deleteam'])) {

    $row_id = $_GET['deleteam'];
    $job_id = $_GET['jobid'];

    $result1 = $conn->query("SELECT * FROM jobs_settings WHERE job_id = '$job_id'");
    while ($row1 = $result1->fetch_assoc()) {
        $job_team = $row1['job_team'];
        $job_team_members = $row1['job_team_members'];
    }

    $array = empty($job_team_members) ? array() : explode(",", $job_team_members);
    $key = array_search($row_id, $array);
    if ($key !== false) {
        unset($array[$key]);
    }
    $array = array_values($array);
    $newvalue = implode(",", $array);

    // Prepare SQL statement
    $sql = "UPDATE jobs_settings SET job_team_members = '$newvalue' WHERE job_id = '$job_id'";
    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Team Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_POST['addstep'])) {

    $job_id = 'JOB' . time();

    $steps_name = $_POST['steps_name'];
    $steps_type = $_POST['steps_type'];
    $step_description = htmlspecialchars($_POST['step_description']);
    $step_check = isset($_POST['step_check']) ? '1' : '0';
    $step_template_interview = $_POST['step_template_interview'] ?? '';
    $step_template_email = $_POST['step_template_email'] ?? '';
    $workflowid = $_POST['workflowid'];

    // Prepare SQL statement
    $sql = "INSERT INTO job_steps (steps_name, steps_type, step_description, step_check, step_template_interview, step_template_email, company) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $steps_name, $steps_type, $step_description, $step_check, $step_template_interview, $step_template_email, $companyMain);

    if ($stmt->execute()) {
        $stepid = $conn->insert_id;
        $result = $conn->query("SELECT * FROM job_workflow WHERE id = '$workflowid'");
        while ($row = $result->fetch_assoc()) {
            $thework = empty($row['workflow_steps']) ? array() : explode(",", $row['workflow_steps']);
        }
        $thework[] = $stepid;
        $workflow_steps = implode(",", $thework);

        $sql = "UPDATE job_workflow SET workflow_steps = '$workflow_steps' WHERE id = '$workflowid'";
        mysqli_query($conn, $sql);

        $response['status'] = 1;
        $response['message'] = "Step Created Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['editstep'])) {

    $steps_name = $_POST['steps_name'];
    $steps_type = $_POST['steps_type'];
    $step_description = htmlspecialchars($_POST['step_description']);
    $step_template_interview = $_POST['step_template_interview'] ?? '';
    $step_template_email = $_POST['step_template_email'] ?? '';
    $job_id = $_POST['job_id'];

    // Prepare SQL statement
    $sql = "UPDATE job_steps SET steps_name='$steps_name', steps_type='$steps_type', step_description='$step_description', step_template_interview='$step_template_interview', step_template_email='$step_template_email' WHERE id = '$job_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Step Updated Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }
}

if (isset($_GET['rid'])) {

    $template_id = $_GET['rid'];
    $type = $_GET['type'];

    if ($type == '1') {
        $typename = 'Suspended';
    } elseif ($type == '2') {
        $typename = 'Draft';
    } elseif ($type == '3') {
        $typename = 'Delete';
    } elseif ($type == '4') {
        $typename = 'Active';
    } elseif ($type == '5') {
        $typename = 'Public';
    } elseif ($type == '6') {
        $typename = 'Private';
    }

    if ($type == '3') {
        $sql = "DELETE FROM jobs_details_settings WHERE id = '$template_id'";
    } elseif ($type == '5' || $type == '6') {
        $result1 = $conn->query("SELECT * FROM jobs_details_settings WHERE id = '$template_id'");
        while ($row1 = $result1->fetch_assoc()) {
            $job_main_id = $row1['job_id'];
        }

        if ($type == '5') {
            $sql = "UPDATE jobs_settings SET is_private = '0' WHERE job_id = '$job_main_id'";
        } else {
            $sql = "UPDATE jobs_settings SET is_private = '1' WHERE job_id = '$job_main_id'";
        }
    } else {
        $sql = "UPDATE jobs_details_settings SET job_status = '$typename' WHERE id = '$template_id'";
    }

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Workflow Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_POST['job_interview'])) {

    $job_id = $_POST['job_interview_id'];
    $applicant_id = $_POST['job_applicant_id'];
    $job_step = $_POST['job_step'];

    $dnum = mysqli_query($conn, "SELECT * FROM job_question_response WHERE job_id = '$job_id' AND applicant_id='$applicant_id' AND step_id = '$job_step'");
    $dnum1 = mysqli_num_rows($dnum);

    if ($dnum1 > 0) {
        $response['message'] = "Error!: You already uploaded report for this applicant";
    } else {
        foreach ($_POST['questions'] as $key => $questions_id) {
            $question_rating = $_POST['rate'][$key];

            $result = $conn->query("SELECT * FROM job_questions WHERE id = '$questions_id'");
            while ($row = $result->fetch_assoc()) {
                $question_name = $row['question_name'];
                $question_description = $row['description'];
            }

            $sql = "INSERT INTO job_question_response (job_id, applicant_id, step_id, question_name, question_description, question_rating) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $job_id, $applicant_id, $job_step, $question_name, $question_description, $question_rating);
            $stmt->execute();
        }

        $response['status'] = 1;
        $response['message'] = "Interview Notes saved Successfully";

        $stmt->close();
        $conn->close();
    }
}

if (isset($_POST['gradestep'])) {

    $job_id = $_POST['job_interview_id'];
    $applicant_id = $_POST['job_applicant_id'];
    $step_id = $_POST['job_step'];
    $step_result = $_POST['grade'];
    $step_report = $_POST['review'];
    $applicationid = $_POST['applicationid'];

    $next_id = getNextStepId($conn, $job_id, $step_id);

    //$dnum = mysqli_query($conn, "SELECT * FROM job_applications WHERE job_id = '$job_id' AND applicant_id='$applicant_id' AND step_id = '$step_id' AND (step_report IS NULL OR step_result IS NULL)");
    //$dnum1 = mysqli_num_rows($dnum);

    $dnum = mysqli_query($conn, "SELECT * FROM job_applications WHERE job_id = '$job_id' AND applicant_id='$applicant_id' AND step_result = 'Failed'");
    $dnum1 = mysqli_num_rows($dnum);

    $dnum2 = mysqli_query($conn, "SELECT * FROM job_applications_steps WHERE job_id = '$job_id' AND applicant_id='$applicant_id' AND step_id = '$step_id'");
    $dnum2 = mysqli_num_rows($dnum2);

    $dnum3 = mysqli_query($conn, "SELECT * FROM job_applications WHERE job_id = '$job_id' AND applicant_id='$applicant_id' AND applicant_step = '$step_id' AND step_result = 'Repeat'");
    $dnum3 = mysqli_num_rows($dnum3);

    if ($dnum1 < 1) {
        // Prepare SQL statement
        $sql = "INSERT INTO job_applications_steps (job_id, applicant_id, step_id, step_report, step_result) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $job_id, $applicant_id, $step_id, $step_report, $step_result);

        if ($stmt->execute()) {
            if ($step_result == 'Failed' || $step_result == 'Repeat' || $step_id == $next_id) {
                $sql = "UPDATE job_applications SET applicant_step = '$step_id', step_report = '$step_report', step_result = '$step_result' WHERE id = '$applicationid'";
            } else {
                $sql = "UPDATE job_applications SET applicant_step = '$next_id', step_report = '$step_report', step_result = '$step_result' WHERE id = '$applicationid'";
            }
            mysqli_query($conn, $sql);

            $response['status'] = 1;
            $response['message'] = "Step Graded Successfully";
        } else {
            $response['message'] = "Error: - " . $conn->error;
        }
    } elseif ($dnum2 > 0 && $dnum3 < 1) {
        $response['message'] = "Error!: You already uploaded report for this applicant";
    } else {
        $response['message'] = "Error!: This applicant already failed and their application process has ended.";
    }
}

if (isset($_POST['linkedin_access_token'])) {

    $linkedin_token = $conn->real_escape_string($_POST['linkedin_access_token']);
    $linkedin_company_id = $conn->real_escape_string($_POST['linkedin_company_id']);
    $facebook_token = $conn->real_escape_string($_POST['facebook_access_token']);

    // Prepare SQL statement
    $sql = "UPDATE company SET linkedin_access_token='$linkedin_token', linkedin_company_id='$linkedin_company_id', facebook_access_token='$facebook_token' WHERE id = '$companyMain'";
    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Social Media Settings Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

// Return response 
echo json_encode($response);
