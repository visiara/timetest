<?php
$therealpagename = '';
include "" . __DIR__ . "/header.php";


// Get filter data from the frontend
$filters = json_decode(file_get_contents("php://input"), true);

$jobid = $filters['jobid'] ?? null;
$step = $filters['step'] ?? null;

//$jobid = 'JOB1741199777';
//$step = '1';

$whereClauses = [];
$params = [];

if (!empty($filters['Gender'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Gender']), "?"));
    $whereClauses[] = "gender IN ($placeholders)";
    $params = array_merge($params, $filters['Gender']);
}
if (!empty($filters['CV Source'])) {
    $placeholders = implode(",", array_fill(0, count($filters['CV Source']), "?"));
    $whereClauses[] = "cv_source IN ($placeholders)";
    $params = array_merge($params, $filters['CV Source']);
}
if (!empty($filters['Years of Experience'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Years of Experience']), "?"));
    $whereClauses[] = "experience IN ($placeholders)";
    $params = array_merge($params, $filters['Years of Experience']);
}
if (!empty($filters['Degree'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Degree']), "?"));
    $whereClauses[] = "degree IN ($placeholders)";
    $params = array_merge($params, $filters['Degree']);
}
if (!empty($filters['Graduation Grade'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Graduation Grade']), "?"));
    $whereClauses[] = "grad_grade IN ($placeholders)";
    $params = array_merge($params, $filters['Graduation Grade']);
}
if (!empty($filters['Willing to Relocate'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Willing to Relocate']), "?"));
    $whereClauses[] = "relocate IN ($placeholders)";
    $params = array_merge($params, $filters['Willing to Relocate']);
}
if (!empty($filters['Marital Status'])) {
    $placeholders = implode(",", array_fill(0, count($filters['Marital Status']), "?"));
    $whereClauses[] = "marital_status IN ($placeholders)";
    $params = array_merge($params, $filters['Marital Status']);
}

// Adding Age Filter using date of birth (dateofb column)
if (!empty($filters['Age'])) {
    $ageConditions = [];
    $currentYear = date("Y"); // Get current year

    foreach ($filters['Age'] as $ageRange) {
        if ($ageRange === "18-30") {
            $minDate = ($currentYear - 30) . "-01-01";
            $maxDate = ($currentYear - 18) . "-12-31";
            $ageConditions[] = "(dateofb BETWEEN ? AND ?)";
            array_push($params, $minDate, $maxDate);
        } elseif ($ageRange === "31-40") {
            $minDate = ($currentYear - 40) . "-01-01";
            $maxDate = ($currentYear - 31) . "-12-31";
            $ageConditions[] = "(dateofb BETWEEN ? AND ?)";
            array_push($params, $minDate, $maxDate);
        } elseif ($ageRange === "41 and above") {
            $maxDate = ($currentYear - 41) . "-12-31";
            $ageConditions[] = "(dateofb <= ?)";
            $params[] = $maxDate;
        }
    }

    if (!empty($ageConditions)) {
        $whereClauses[] = "(" . implode(" OR ", $ageConditions) . ")";
    }
}

// Construct SQL query
$sql = "SELECT * FROM job_applications WHERE company='$companyMain' AND job_id='$jobid' AND applicant_step='$step'";
//$sql = "SELECT * FROM job_applications WHERE company='$companyMain'";

if (!empty($whereClauses)) {
    $sql .= " AND " . implode(" AND ", $whereClauses);
}

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$applicants = [];
while ($row = $result->fetch_assoc()) {
    $applicants[] = $row;
}

////////////// interview & questions
$interview = [];
$questions = [];

$query1 = mysqli_query($conn, "SELECT * FROM job_steps WHERE company='$companyMain' AND id='$step'");
while ($row1 = $query1->fetch_assoc()) {
    $step_template_interview_id = $row1["step_template_interview"];

    $query2 = mysqli_query($conn, "SELECT * FROM job_questions WHERE template_id='$step_template_interview_id'");
    while ($row2 = $query2->fetch_assoc()) {
        $questions[] = $row2;
    }

    $query3 = mysqli_query($conn, "SELECT * FROM job_template_interview WHERE id='$step_template_interview_id'");
    while ($row3 = $query3->fetch_assoc()) {
        $interview[] = $row3;
    }
}

/// get job row id
$jobresult = $conn->query("SELECT * FROM jobs_details_settings WHERE company='$companyMain' AND job_id = '$jobid' ORDER BY id desc");
while ($jobrow = $jobresult->fetch_assoc()) {
    $jobrowid = $jobrow['id'];
}

$response = array(
    'applicants' => $applicants,
    'questions' => $questions,
    'interview' => $interview,
    'jobrowid' => $jobrowid
);

echo json_encode($response);
