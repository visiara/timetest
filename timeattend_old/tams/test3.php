<?php
/* Step 1: Create a Bootstrap-styled job application form (HTML + CSS) */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Job Application Form</h2>
    <form action="process_application.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        
        <h4>Personal Information</h4>
        <div class="mb-3">
            <label class="form-label">Full Name:</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Address:</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Work Authorization Status:</label>
            <input type="text" name="work_auth" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Do you have a valid driver's license?</label>
            <select name="drivers_license" class="form-control" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        
        <h4>Resume & Work Experience</h4>
        <div class="mb-3">
            <label class="form-label">Upload Resume:</label>
            <input type="file" name="resume" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Job Title:</label>
            <input type="text" name="current_job" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Employer:</label>
            <input type="text" name="current_employer" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Current Job Responsibilities:</label>
            <textarea name="job_responsibilities" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Years of Experience:</label>
            <input type="number" name="experience" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Previous Employers:</label>
            <textarea name="previous_employers" class="form-control"></textarea>
        </div>
        
        <h4>Educational Background</h4>
        <div class="mb-3">
            <label class="form-label">Highest Level of Education:</label>
            <input type="text" name="education_level" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Institution Attended:</label>
            <input type="text" name="institution" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Year of Graduation:</label>
            <input type="text" name="graduation_year" class="form-control">
        </div>
        
        <h4>Technical & Professional Skills</h4>
        <div class="mb-3">
            <label class="form-label">Technical Skills:</label>
            <textarea name="technical_skills" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Certifications:</label>
            <input type="text" name="certifications" class="form-control">
        </div>
        
        <h4>Job-Specific Questions</h4>
        <div class="mb-3">
            <label class="form-label">Why are you interested in this position?</label>
            <textarea name="job_interest" class="form-control" required></textarea>
        </div>
        
        <h4>Salary & Compensation</h4>
        <div class="mb-3">
            <label class="form-label">Salary Expectations:</label>
            <input type="text" name="salary" class="form-control" required>
        </div>
        
        <h4>Availability</h4>
        <div class="mb-3">
            <label class="form-label">Notice Period:</label>
            <input type="text" name="notice_period" class="form-control">
        </div>
        
        <h4>References & Background Checks</h4>
        <div class="mb-3">
            <label class="form-label">Can you provide professional references?</label>
            <input type="text" name="references" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Have you ever been convicted of a crime?</label>
            <select name="criminal_record" class="form-control">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Are you willing to undergo a background check?</label>
            <select name="background_check" class="form-control">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
/* Step 2: Process the job application */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "username", "password", "database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $current_job = $_POST['current_job'];
    $experience = $_POST['experience'];
    $previous_employers = $_POST['previous_employers'];
    $salary = $_POST['salary'];
    $availability = $_POST['availability'];
    $reference_name = $_POST['reference_name'];
    $reference_contact = $_POST['reference_contact'];
    
    $resume_name = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_path = "uploads/" . basename($resume_name);
    move_uploaded_file($resume_tmp, $resume_path);
    
    $stmt = $conn->prepare("INSERT INTO applications (fullname, email, phone, address, current_job, experience, previous_employers, salary, availability, reference_name, reference_contact, resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $fullname, $email, $phone, $address, $current_job, $experience, $previous_employers, $salary, $availability, $reference_name, $reference_contact, $resume_path);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    echo "<div class='alert alert-success'>Application submitted successfully!</div>";
    
    // Display the face card with the submitted information
    echo "
    <div class='container mt-5'>
        <div class='card'>
            <div class='card-header'>
                <h3>Application Details</h3>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>Personal Information</h5>
                <p class='card-text'><strong>Full Name:</strong> $fullname</p>
                <p class='card-text'><strong>Email:</strong> $email</p>
                <p class='card-text'><strong>Phone:</strong> $phone</p>
                <p class='card-text'><strong>Address:</strong> $address</p>
                <h5 class='card-title'>Work Experience</h5>
                <p class='card-text'><strong>Current Job Title:</strong> $current_job</p>
                <p class='card-text'><strong>Years of Experience:</strong> $experience</p>
                <p class='card-text'><strong>Previous Employers:</strong> $previous_employers</p>
                <h5 class='card-title'>Job Preferences</h5>
                <p class='card-text'><strong>Desired Salary:</strong> $salary</p>
                <p class='card-text'><strong>Availability:</strong> $availability</p>
                <h5 class='card-title'>References</h5>
                <p class='card-text'><strong>Reference Name:</strong> $reference_name</p>
                <p class='card-text'><strong>Reference Contact:</strong> $reference_contact</p>
                <h5 class='card-title'>Resume</h5>
                <p class='card-text'><a href='$resume_path' target='_blank'>Download Resume</a></p>
            </div>
        </div>
    </div>
    ";
}
?>
