<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Face Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .face-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background-color: #f9f9f9;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .initials {
            font-size: 24px;
            font-weight: bold;
            background: #007bff;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .comment-box {
            display: none;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div id="applicantsContainer" class="row"></div>
</div>

<!-- INTERVIEW NOTE MODAL -->
<div class="modal fade" id="interviewNoteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interview Note</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" placeholder="Enter Interview Note"></textarea>
                <textarea class="form-control mt-2" placeholder="Enter Interview Report"></textarea>
                <select class="form-control mt-2">
                    <option>Select Interview Result</option>
                    <option>Passed</option>
                    <option>Failed</option>
                    <option>On Hold</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- DOCUMENTS MODAL -->
<div class="modal fade" id="documentsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Applicant Documents</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>List of uploaded documents will appear here.</p>
            </div>
        </div>
    </div>
</div>

<!-- VIEW APPLICATION MODAL -->
<div class="modal fade" id="viewApplicationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Application Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="applicationDetails">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const applicants = [
        { id: 1, fname: "John", lname: "Doe", email: "john.doe@example.com", phone: "1234567890", dateofb: "1990-05-15", date_created: "2025-03-01", step: "Screening", job_title: "Software Engineer" },
        { id: 2, fname: "Jane", lname: "Smith", email: "jane.smith@example.com", phone: "9876543210", dateofb: "1995-07-20", date_created: "2025-03-02", step: "Technical Interview", job_title: "UI/UX Designer" }
    ];

    function calculateAge(dateofb) {
        const birthDate = new Date(dateofb);
        const diff = Date.now() - birthDate.getTime();
        return new Date(diff).getUTCFullYear() - 1970;
    }

    function renderApplicants() {
        let container = document.getElementById("applicantsContainer");
        container.innerHTML = "";
        applicants.forEach(applicant => {
            let card = document.createElement("div");
            card.className = "face-card col-md-4 text-center";
            card.innerHTML = `
                <div class="initials">${applicant.fname.charAt(0)}${applicant.lname.charAt(0)}</div>
                <h5>${applicant.fname} ${applicant.lname}</h5>
                <p>Email: ${applicant.email}</p>
                <p>Phone: ${applicant.phone}</p>
                <p>Age: ${calculateAge(applicant.dateofb)}</p>
                <p>Applied: ${applicant.date_created}</p>
                <p>Step: ${applicant.step}</p>
                <p>Job: ${applicant.job_title}</p>
                <button class="btn btn-primary" onclick="openModal('interviewNoteModal')">INTERVIEW NOTE</button>
                <button class="btn btn-info" onclick="openModal('documentsModal')">DOCUMENTS</button>
                <button class="btn btn-success" onclick="viewApplication(${applicant.id})">VIEW APPLICATION</button>
                <button class="btn btn-warning" onclick="toggleCommentBox(this)">COMMENT</button>
                <textarea class="form-control comment-box" placeholder="Enter Comment"></textarea>
            `;
            container.appendChild(card);
        });
    }

    function openModal(modalId) {
        $('#' + modalId).modal('show');
    }

    function toggleCommentBox(button) {
        let commentBox = button.nextElementSibling;
        commentBox.style.display = commentBox.style.display === "none" || commentBox.style.display === "" ? "block" : "none";
    }

    function viewApplication(applicantId) {
        const applicant = applicants.find(a => a.id === applicantId);
        document.getElementById("applicationDetails").innerHTML = `
            <p><strong>Name:</strong> ${applicant.fname} ${applicant.lname}</p>
            <p><strong>Email:</strong> ${applicant.email}</p>
            <p><strong>Phone:</strong> ${applicant.phone}</p>
            <p><strong>Age:</strong> ${calculateAge(applicant.dateofb)}</p>
            <p><strong>Applied Date:</strong> ${applicant.date_created}</p>
            <p><strong>Step:</strong> ${applicant.step}</p>
            <p><strong>Job Title:</strong> ${applicant.job_title}</p>
        `;
        openModal('viewApplicationModal');
    }

    document.addEventListener("DOMContentLoaded", renderApplicants);
</script>
</body>
</html>
