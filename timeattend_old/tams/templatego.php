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


// If form is submitted 
if (isset($_POST['create_requisition'])) {

    $job_id = 'JOB' . time();

    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);
    $template_body = htmlspecialchars($_POST['template_body']);

    // Prepare SQL statement
    $sql = "INSERT INTO job_template_email (template_name, template_desc, template_body, company) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $template_name, $template_desc, $template_body, $companyMain);

    if ($stmt->execute()) {

        $response['status'] = 1;
        $response['message'] = "Template Created Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['create_requisition2'])) {

    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);

    // Prepare SQL statement
    $sql = "INSERT INTO job_template_interview (template_name, template_desc, company) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $template_name, $template_desc, $companyMain);

    if ($stmt->execute()) {
        $template_id = $conn->insert_id;

        if (isset($_POST['qname'])) {
            // Prepare SQL statement
            $stmt2 = $conn->prepare("INSERT INTO job_questions (template_id, question_name, description, response_type, rating_scale, company) VALUES (?, ?, ?, ?, ?, ?)");

            $array_of_question_ids = array();
            foreach ($_POST['qname'] as $key => $question) {
                $question_name = $_POST['qname'][$key];
                $description = $_POST['qdescription'][$key];
                $response_type = $_POST['qresponse_type'][$key];
                $rating_scale = isset($_POST['qrating_scale'][$key]) ? $_POST['qrating_scale'][$key] : null;

                $stmt2->bind_param("ssssss", $template_id, $question_name, $description, $response_type, $rating_scale, $companyMain);
                $stmt2->execute();
                $question_id = $conn->insert_id;
                array_push($array_of_question_ids, $question_id);
            }

            $question_ids = implode(",", $array_of_question_ids);
            $sql = "UPDATE job_template_interview SET template_questions = '$question_ids' WHERE id = '$template_id'";
            mysqli_query($conn, $sql);
        }

        $response['status'] = 1;
        $response['message'] = "Template Created Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt->close();
    $stmt2->close();
    $conn->close();
}

if (isset($_POST['add_question'])) {
    $template_id = $_POST['add_question'];
    $array_of_question_ids = array();

    $result1 = $conn->query("SELECT * FROM job_template_interview WHERE id = '$template_id'");
    while ($row1 = $result1->fetch_assoc()) {
        $oldtemplate_questions = empty($row1['template_questions']) ? array() : explode(",", $row1['template_questions']);
    }

    foreach ($oldtemplate_questions as $value) {
        array_push($array_of_question_ids, $value);
    }

    // Prepare SQL statement
    $stmt2 = $conn->prepare("INSERT INTO job_questions (template_id, question_name, description, response_type, rating_scale, company) VALUES (?, ?, ?, ?, ?, ?)");

    foreach ($_POST['qname'] as $key => $question) {
        $question_name = $_POST['qname'][$key];
        $description = $_POST['qdescription'][$key];
        $response_type = $_POST['qresponse_type'][$key];
        $rating_scale = isset($_POST['qrating_scale'][$key]) ? $_POST['qrating_scale'][$key] : null;

        $stmt2->bind_param("ssssss", $template_id, $question_name, $description, $response_type, $rating_scale, $companyMain);
        $stmt2->execute();
        $question_id = $conn->insert_id;
        array_push($array_of_question_ids, $question_id);
    }

    $question_ids = implode(",", $array_of_question_ids);
    $sql = "UPDATE job_template_interview SET template_questions = '$question_ids' WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {
        $response['status'] = 1;
        $response['message'] = "Template Updated with Questions Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt2->close();
    $conn->close();
}

if (isset($_POST['edit_question'])) {
    $template_id = $_POST['edit_question'];
    $array_of_question_ids = array();

    // delete old
    $dsql = "DELETE FROM job_questions WHERE template_id = '$template_id'";
    mysqli_query($conn, $dsql);

    // Prepare SQL statement
    $stmt2 = $conn->prepare("INSERT INTO job_questions (template_id, question_name, description, response_type, rating_scale, company) VALUES (?, ?, ?, ?, ?, ?)");

    foreach ($_POST['qname'] as $key => $question) {
        $question_name = $_POST['qname'][$key];
        $description = $_POST['qdescription'][$key];
        $response_type = $_POST['qresponse_type'][$key];
        $rating_scale = isset($_POST['qrating_scale'][$key]) ? $_POST['qrating_scale'][$key] : null;

        $stmt2->bind_param("ssssss", $template_id, $question_name, $description, $response_type, $rating_scale, $companyMain);
        $stmt2->execute();
        $question_id = $conn->insert_id;
        array_push($array_of_question_ids, $question_id);
    }

    $question_ids = implode(",", $array_of_question_ids);
    $sql = "UPDATE job_template_interview SET template_questions = '$question_ids' WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {
        $response['status'] = 1;
        $response['message'] = "Template Updated with Questions Successfully";
    } else {
        $response['message'] = "Error: - " . $conn->error;
    }

    $stmt2->close();
    $conn->close();
}

if (isset($_POST['updatetemplate1'])) {

    $template_id = $_POST['template_id'];
    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);
    $template_body = htmlspecialchars($_POST['template_body']);

    // Prepare SQL statement
    $sql = "UPDATE job_template_email SET template_name = '$template_name', template_desc = '$template_desc', template_body = '$template_body' WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Template Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_POST['updatetemplate2'])) {

    $template_id = $_POST['template_id'];
    $template_name = htmlspecialchars($_POST['template_name']);
    $template_desc = htmlspecialchars($_POST['template_desc']);

    // Prepare SQL statement
    $sql = "UPDATE job_template_interview SET template_name = '$template_name', template_desc = '$template_desc' WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Template Updated Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_GET['dele'])) {

    $template_id = $_GET['dele'];

    // Prepare SQL statement
    $sql = "DELETE FROM job_template_email WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Template Deleted Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}

if (isset($_GET['dele2'])) {

    $template_id = $_GET['dele2'];

    // Prepare SQL statement
    $sql = "DELETE FROM job_template_interview WHERE id = '$template_id'";

    if (mysqli_query($conn, $sql)) {

        $response['status'] = 1;
        $response['message'] = "Template Deleted Successfully";
    } else {
        $response['message'] = "Error: - ";
    }
}


// Return response 
echo json_encode($response);
