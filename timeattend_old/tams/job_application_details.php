<?php
// application_summary_card.php
$therealpagename = '';
include "" . __DIR__ . "/header.php";


////
//$application = [];
//$job_id = 'JOB1741199777';
//$applicant_id = 'A002';

// Sample data (Replace with dynamic data from the database)
/*
$application = [
    'fullname' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '+1234567890',
    'address' => '123 Main Street, City, Country',
    'work_auth' => 'Citizen',
    'drivers_license' => 'Yes',
    'current_job' => 'Software Engineer',
    'current_employer' => 'Tech Corp',
    'experience' => '5 years',
    'education_level' => 'BSc Computer Science',
    'institution' => 'XYZ University',
    'graduation_year' => '2018',
    'technical_skills' => 'PHP, JavaScript, MySQL, Bootstrap',
    'certifications' => 'AWS Certified Developer',
    'job_interest' => 'I am passionate about web development.',
    'salary' => '$80,000 per year',
    'notice_period' => '2 weeks',
    'references' => 'Available upon request',
    'criminal_record' => 'No',
    'background_check' => 'Yes'
];
*/

$job_id = $_GET["jobid"];
$applicant_id = $_GET["applicantid"];

function generateInterviewQuestionsHTML($questions, $index)
{
    $html = "<div id='interviewQuestionsy{$index}' class='accordion'>";
    foreach ($questions as $questionIndex => $question) {
        $html .= "<div class='card mb-2'>
                    <div class='card-header bg-light text-dark' id='heading{$index}{$questionIndex}'>
                      <a href='javascript:;' data-toggle='collapse' data-target='#body{$index}{$questionIndex}' aria-expanded='true' style='text-decoration: none;'>
                        <h6 class='mb-0 text-dark'>
                          {$question['question_name']}
                        </h6>
                      </a>
                    </div>
                    <div id='body{$index}{$questionIndex}' class='collapse' aria-labelledby='heading{$index}{$questionIndex}' data-parent='#interviewQuestionsy{$index}'>
                        <div class='card-body'>
                          <div class='row mt-2'>
                            <div class='col-8'>{$question['question_description']}</div>
                            <div class='col-4 bd bd-1 border p-2'>Report: <br>{$question['question_rating']}</div>
                          </div>
                        </div>
                    </div>
                </div>";
    }
    $html .= '</div>';
    return $html;
}

$application = [];
$query2z = mysqli_query($conn, "SELECT * FROM job_applications WHERE job_id='$job_id' AND applicant_id='$applicant_id'");
while ($row2z = $query2z->fetch_assoc()) {
    $application[] = $row2z;
}

// Steps dynamically generated from database (Sample example)
$stepsiNFO = [
    'Personal Information',
    'Professional Details',
    'Education',
    'Skills & Certifications',
    'Job Preferences',
    'Background Check',
    'Interview History'
];

$application = [
    'fullname' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '+1234567890',
    'address' => '123 Main Street, City, Country',
    'work_auth' => 'Citizen',
    'drivers_license' => 'Yes',
    'current_job' => 'Software Engineer',
    'current_employer' => 'Tech Corp',
    'experience' => '5 years',
    'education_level' => 'BSc Computer Science',
    'institution' => 'XYZ University',
    'graduation_year' => '2018',
    'technical_skills' => 'PHP, JavaScript, MySQL, Bootstrap',
    'certifications' => 'AWS Certified Developer',
    'job_interest' => 'I am passionate about web development.',
    'salary' => '$80,000 per year',
    'notice_period' => '2 weeks',
    'references' => 'Available upon request',
    'criminal_record' => 'No',
    'background_check' => 'Yes'
];

?>

<div class="card bd-0">
    <div class="card-header bg-dark">
        <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
            <?php foreach ($stepsiNFO as $index => $stepy): ?>
                <li class="nav-item">
                    <a class="nav-link bd-0 <?= $index === 0 ? 'active text-dark' : 'text-white' ?>" data-toggle="tab"
                        href="#stepy<?= $index; ?>" onclick="toggleTextColor(this)">
                        <?= $stepy; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- card-header -->

    <div class="card-body tab-content">
        <?php foreach ($stepsiNFO as $index => $stepy): ?>
            <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="stepy<?= $index; ?>">
                <h5 class="card-title"> <?= $stepy; ?> </h5>
                <p>
                    <?php
                    switch ($stepy) {
                        case 'Personal Information':
                            echo "<strong>Name:</strong> {$application['fullname']}<br>
                                          <strong>Email:</strong> {$application['email']}<br>
                                          <strong>Phone:</strong> {$application['phone']}<br>
                                          <strong>Address:</strong> {$application['address']}<br>
                                          <strong>Work Authorization:</strong> {$application['work_auth']}<br>
                                          <strong>Driver's License:</strong> {$application['drivers_license']}";
                            break;
                        case 'Professional Details':
                            echo "<strong>Current Job Title:</strong> {$application['current_job']}<br>
                                          <strong>Current Employer:</strong> {$application['current_employer']}<br>
                                          <strong>Experience:</strong> {$application['experience']}";
                            break;
                        case 'Education':
                            echo "<strong>Highest Level:</strong> {$application['education_level']}<br>
                                          <strong>Institution:</strong> {$application['institution']}<br>
                                          <strong>Graduation Year:</strong> {$application['graduation_year']}";
                            break;
                        case 'Skills & Certifications':
                            echo "<strong>Technical Skills:</strong> {$application['technical_skills']}<br>
                                          <strong>Certifications:</strong> {$application['certifications']}";
                            break;
                        case 'Job Preferences':
                            echo "<strong>Interest in Position:</strong> {$application['job_interest']}<br>
                                          <strong>Salary Expectation:</strong> {$application['salary']}<br>
                                          <strong>Notice Period:</strong> {$application['notice_period']}";
                            break;
                        case 'Background Check':
                            echo "<strong>References:</strong> {$application['references']}<br>
                                          <strong>Criminal Record:</strong> {$application['criminal_record']}<br>
                                          <strong>Willing for Background Check:</strong> {$application['background_check']}";
                            break;
                        case 'Interview History':

                            $interview = [];
                            $query2 = mysqli_query($conn, "SELECT * FROM job_applications_steps WHERE job_id='$job_id' AND applicant_id='$applicant_id'");
                            while ($row2 = $query2->fetch_assoc()) {
                                $interview[] = $row2;
                            }

                    ?>
                <div class="card bd-0">
                    <div class="card-header bg-teal">
                        <ul class="nav nav-tabs nav-tabs-for-light card-header-tabs" role="tablist">
                            <?php
                            // Preload job steps to avoid repeated queries
                            $stepsData = [];
                            $querySteps = mysqli_query($conn, "SELECT * FROM job_steps");
                            while ($rowStep = $querySteps->fetch_assoc()) {
                                $stepsData[$rowStep['id']] = $rowStep['steps_name'];
                            }

                            foreach ($interview as $interIndex => $inter):
                                $stepx = $inter['step_id'];
                                $steps_name = isset($stepsData[$stepx]) ? $stepsData[$stepx] : "Unknown Step";
                            ?>
                                <li class="nav-item">
                                    <a style="color: black !important;" class="nav-link bd-0 text-dark <?= $interIndex === 0 ? 'active' : '' ?>"
                                        data-toggle="tab" href="#inter<?= $interIndex; ?>" role="tab">
                                        <?= htmlspecialchars($steps_name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- card-header -->

                    <div class="card-body tab-content">
                        <?php foreach ($interview as $index => $interviewK): ?>
                            <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="inter<?= $index; ?>"
                                role="tabpanel">
                                <?php
                                $step = $interviewK['step_id'];
                                $questions = [];
                                $query3 = mysqli_query($conn, "SELECT * FROM job_question_response WHERE job_id='$job_id' 
                                                AND applicant_id='$applicant_id' AND step_id='$step'");
                                while ($row3 = $query3->fetch_assoc()) {
                                    $questions[] = $row3;
                                }

                                $dcolor = ($interviewK['step_result'] == 'Passed' || $interviewK['step_result'] == 'Employed')
                                    ? 'text-success' : 'text-danger';

                                echo "<div class='pd-2 mb-2'>
                        <p><strong>Interview Date:</strong>  " . htmlspecialchars($interviewK['created_at']) . "</p>
                        <div class='mg-b-10'><strong>Interview Report:</strong>  " . htmlspecialchars($interviewK['step_report']) . "</div>
                        <div class='mg-b-50'><strong>Interview Result:</strong>  
                            <span class='{$dcolor}'><strong>" . htmlspecialchars($interviewK['step_result']) . "</strong></span>
                        </div>
                      </div>";

                                echo generateInterviewQuestionsHTML($questions, $index);
                                ?>
                            </div> <!-- Close tab-pane -->
                        <?php endforeach; ?>
                    </div><!-- card-body -->
                </div><!-- card -->

        <?php

                            break;
                    }
        ?>
        </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>