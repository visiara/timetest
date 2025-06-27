<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Create Job</h5>
        <div class="d-flex justify-content-end">
          <a href="#" class="btn btn-primary mb-3" onclick="showPage('dash1.php')">Create Job</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash2.php')">Upload CV (Curriculum Vitae)</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash3.php')">Explore Applicant Pool</a>
        </div>
      </div><!-- card-header -->

      <div class="card-body pd-0 bd-t-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">

          <style>
            #collectedData {
              background: #f8f9fa;
              border: 1px solid #ddd;
              padding: 15px;
              border-radius: 5px;
              font-family: Arial, sans-serif;
            }

            #collectedData h3 {
              text-align: center;
              font-size: 22px;
              color: #333;
              margin-bottom: 15px;
            }

            #collectedData h4 {
              font-size: 18px;
              color: #007bff;
              border-bottom: 2px solid #007bff;
              padding-bottom: 5px;
              margin-top: 15px;
            }

            #collectedData ul {
              list-style: none;
              padding: 0;
            }

            #collectedData li {
              background: white;
              padding: 8px;
              margin-bottom: 5px;
              border-radius: 4px;
              border-left: 4px solid #007bff;
              font-size: 16px;
            }

            #collectedData li strong {
              color: #333;
            }
          </style>

          <form id="dynamicForm" class="dynamicForm" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="newjob" value="1">

            <div id="wizard1">

              <h3>Job Details</h3>
              <section>
                <p>Try the keyboard navigation by clicking arrow left or right!</p>

                <div class="row">
                  <div class="form-group col-4">
                    <label for="jobtitle2">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle2" name="jobtitle2" required>
                  </div>

                  <div class="form-group col-4">
                    <label for="jobLevel">Job Level</label>
                    <select class="form-control" id="jobLevel" name="jobLevel" required>
                      <option value="">-- Select Job Level --</option>
                      <option value="Entry">Entry</option>
                      <option value="Mid-Level">Mid-Level</option>
                      <option value="Senior Level">Senior Level</option>
                    </select>
                  </div>

                  <div class="form-group col-4">
                    <label for="employmentType">Employment Type</label>
                    <select class="form-control" id="employmentType" name="employmentType" required>
                      <option value="">-- Select Employment Type --</option>
                      <option value="Full-Time">Full-Time</option>
                      <option value="Part-Time">Part-Time</option>
                      <option value="Contract">Contract</option>
                      <option value="Internship">Internship</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-4">
                    <label for="country">Country</label>
                    <select class="form-control " name="country" id="country" data-placeholder="Choose Country"
                      required>
                      <option value="<?php echo $countryy ?? ''; ?>">
                        <?php echo $countryyname ?? '--Select Country--'; ?>
                      </option>
                      <?php
                      $intload14gb = mysqli_query($conn, "SELECT * FROM country ORDER BY id asc");
                      while ($intload14agb = mysqli_fetch_array($intload14gb)) {
                        $inid14gb = $intload14agb["id"];
                        $iname14gb = $intload14agb["name"];
                      ?>
                        <option value="<?php echo $inid14gb; ?>"><?php echo $iname14gb; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-4">
                    <label for="location">Location of Job</label>
                    <select class="form-control " name="location" id="location" data-placeholder="Choose Location"
                      required>
                      <option value="<?php echo $location ?? ''; ?>">
                        <?php echo $location ?? '--Select Location--'; ?>
                      </option>
                      <?php
                      $intload14gbx = mysqli_query($conn, "SELECT * FROM location WHERE company = '$companyMain' ORDER BY id asc");
                      while ($intload14agbx = mysqli_fetch_array($intload14gbx)) {
                        $inid14gbx = $intload14agbx["id"];
                        $iname14gbx = $intload14agbx["locationname"];
                      ?>
                        <option value="<?php echo $inid14gbx; ?>"><?php echo $iname14gbx; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-4">
                    <label for="workstyle">Workstyle</label>
                    <select class="form-control" id="workstyle" name="workstyle" required>
                      <option value="">-- Select Work Style --</option>
                      <option value="Onsite">Onsite</option>
                      <option value="Remote">Remote</option>
                      <option value="Hybrid">Hybrid</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="form-group col-4">
                    <label>Pay Range</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="minPay" name="minPay" min="100"
                        placeholder="Minimum Pay" required>
                      <input type="number" class="form-control" id="maxPay" name="maxPay" min="100"
                        placeholder="Maximum Pay" required>
                    </div>
                    <div class="form-check mt-2">
                      <input type="checkbox" class="form-check-input" id="showPay" name="showPay">
                      <label class="form-check-label" for="showPay">Show Remuneration to Candidate</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-4">
                    <label for="jobDescriptio2">Job Description</label>
                    <textarea class="form-control" id="jobDescription2" name="jobDescription2" rows="3"
                      required></textarea>
                  </div>

                  <div class="form-group col-4">
                    <label for="jobResponsibilities">Job Responsibilities</label>
                    <textarea class="form-control" id="jobResponsibilities" name="jobResponsibilities" rows="3"
                      required></textarea>
                  </div>

                  <div class="form-group col-4">
                    <label for="jobRequirements">Job Requirements</label>
                    <textarea class="form-control" id="jobRequirements" name="jobRequirements" rows="3"
                      required></textarea>
                  </div>
                </div>

              </section>

              <h3>Job Settings</h3>
              <section>
                <p>Wonderful transition effects.</p>

                <div class="form-group">
                  <label for="jobExpiryDate">Job Expiry Date</label>
                  <input type="date" class="form-control" id="jobExpiryDate" name="jobExpiryDate" required>
                </div>

                <div class="form-group">
                  <label for="jobVisibility">Job Visibility</label>
                  <select class="form-control" id="jobVisibility" name="jobVisibility" required>
                    <option value="">-- Select Job Visibility --</option>
                    <option value="Internal">Internal</option>
                    <option value="External">External</option>
                    <option value="Both">Both</option>
                  </select>
                </div>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="makeJobPrivate" name="makeJobPrivate">
                  <label class="form-check-label" for="makeJobPrivate">Make Job Private</label>
                </div>

                <div class="form-group mt-3 mb-3">
                  <label for="specialization">Specialization</label>
                  <input type="text" class="form-control" id="specialization" name="specialization" required>
                </div>

                <div class="form-group">
                  <label for="jobTeam">Select Job Team</label>
                  <select class="form-control jobTeam" id="jobTeam" name="jobTeam" style="width: 100%;" required multiple>
                    <option value="Manager">Manager</option>
                    <option value="Department Head">Department Head</option>
                    <option value="HR">HR</option>
                    <option value="CEO">CEO</option>
                    <?php
                    $intload14gbx = mysqli_query($conn, "SELECT * FROM user_roles ORDER BY id asc");
                    while ($intload14agbx = mysqli_fetch_array($intload14gbx)) {
                      $inid14gbx = $intload14agbx["id"];
                      $iname14gbx = $intload14agbx["name"];
                    ?>
                      <option value="<?php echo $inid14gbx; ?>"><?php echo $iname14gbx; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <small class="form-text text-muted">Users added will receive email notifications and full
                    access.</small>
                </div>

                <div class="form-group">
                  <label for="applicationWorkflow">Application Workflow</label>
                  <select class="form-control" id="applicationWorkflow" name="applicationWorkflow" required>
                    <option value="">--Select Application Workflow--</option>
                    <?php
                    $intload14gb = mysqli_query($conn, "SELECT * FROM job_workflow WHERE company='$companyMain' ORDER BY id asc");
                    while ($intload14agb = mysqli_fetch_array($intload14gb)) {
                      $inid14gb = $intload14agb["id"];
                      $iname14gb = $intload14agb["workflow_name"];
                    ?>
                      <option value="<?php echo $inid14gb; ?>"><?php echo $iname14gb; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

              </section>

              <h3>Application Setup</h3>
              <section id="valform">
                <p>The next and previous buttons help you to navigate through your content.</p>

                <!-- Personal Information Section -->
                <div class="d-flex justify-content-start">
                  <h4>Personal Information</h4>
                  <button type="button" class="btn btn-teal btn-sm mg-l-20" id="addPersonalInfo">Add others</button>
                </div>

                <div id="personalInfo" class="row bd bd-success bd-1 pd-t-20 mg-t-10">

                  <div class="form-group personal-info col-4">
                    <label>Name </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]" checked>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name[]" value="Name" readonly required>
                    </div><!-- input-group -->
                  </div>

                  <div class="form-group personal-info col-4">
                    <label>Email Address></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]" checked>
                        </span>
                      </div>
                      <input type="email" class="form-control" name="name[]" value="Email Address" readonly required>
                    </div><!-- input-group -->

                  </div>

                  <div class="form-group personal-info col-4">
                    <label>Phone Number></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]" checked>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name[]" value="Phone Number" readonly required>
                    </div><!-- input-group -->

                  </div>

                  <div class="form-group personal-info col-4">
                    <label>State of Residence</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]" checked>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name[]" value="State of Residence" readonly
                        required>
                    </div><!-- input-group -->

                  </div>

                  <div class="form-group personal-info col-4">
                    <label>Date of Birth</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]" checked>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name[]" value="Date of Birth" readonly required>
                    </div><!-- input-group -->

                  </div>

                </div>

                <!-- Education History Section -->

                <div class="d-flex justify-content-start mt-4">
                  <h4>Education History</h4>
                  <button type="button" class="btn btn-teal btn-sm mg-l-20" id="addEducation">Add others</button>
                </div>

                <div id="educationHistory" class="row bd bd-success bd-1 pd-t-20 mg-t-10">

                  <div class="form-group education-info row col-12">
                    <div class="col-4">
                      <label>School Attended</label>
                      <input type="text" class="form-control" name="school[]" required>
                    </div>

                    <div class="col-4">
                      <label>Course of Study</label>
                      <input type="text" class="form-control" name="course[]" required>
                    </div>

                    <div class="col-4">
                      <label>Degree Obtained</label>
                      <div class="input-group">
                        <select class="form-control" name="degree[]" required>
                          <option value="B.sc">B.Sc</option>
                          <option value="HND">HND</option>
                          <option value="OND">OND</option>
                          <option value="NCE">NCE</option>
                          <option value="FSLC">FSLC</option>
                          <option value="SSCE">SSCE</option>
                          <option value="M.Sc">M.Sc</option>
                          <option value="PhD">PhD</option>
                        </select>
                      </div><!-- input-group -->
                    </div>

                  </div>
                </div>

                <!-- Work Experience Section -->

                <div class="d-flex justify-content-start mt-4">
                  <h4>Work Experience</h4>
                  <button type="button" class="btn btn-teal btn-sm mg-l-20" id="addWorkExperience">Add others</button>
                </div>

                <div id="workExperience" class="row bd bd-success bd-1 pd-t-20 mg-t-10">

                  <div class="form-group work-info row col-12">

                    <div class="col-4">
                      <label>Job Title</label>
                      <input type="text" class="form-control" name="jobTitle[]" required>
                    </div>

                    <div class="col-4">
                      <label>Description</label>
                      <input type="text" class="form-control" name="jobDescription[]" required>
                    </div>

                    <div class="col-4">
                      <label>Duration</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="jobDuration[]" required>
                      </div><!-- input-group -->
                    </div>

                  </div>

                </div>

                <!-- Documents Section -->

                <div class="d-flex justify-content-start mt-4">
                  <h4>Documents</h4>
                  <button type="button" class="btn btn-teal btn-sm mg-l-20" id="addDocument">Add others</button>
                </div>

                <div id="documentUploads" class="row bd bd-success bd-1 pd-t-20 mg-t-10">

                  <div class="form-group doc-info row col-12">
                    <div class="col-6">
                      <label>Document Name</label>
                      <input type="text" class="form-control" name="documentName[]" required>
                    </div>

                    <div class="col-6">
                      <label>Document Type</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="documentFile[]" required>
                      </div><!-- input-group -->
                    </div>
                  </div>

                </div>


                <script>
                  // Add new personal info field
                  document.getElementById("addPersonalInfo").addEventListener("click", function() {
                    var newField = `<div class="form-group personal-info col-4">
                    <label>Custom Field </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="toggle-required" name="checkname[]">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name[]" required>
                      <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-field">Delete</button>
                      </div>
                    </div><!-- input-group -->
                  </div>`;
                    document.getElementById("personalInfo").insertAdjacentHTML("beforeend", newField);
                  });

                  // Add new education history field
                  document.getElementById("addEducation").addEventListener("click", function() {
                    var newField = `<div class="form-group education-info row col-12">
                    <div class="col-4">
                      <label>School Attended</label>
                      <input type="text" class="form-control" name="school[]" required>
                    </div>

                    <div class="col-4">
                      <label>Course of Study</label>
                      <input type="text" class="form-control" name="course[]" required>
                    </div>

                    <div class="col-4">
                      <label>Degree Obtained</label>
                      <div class="input-group">
                        <select class="form-control" name="degree[]" required>
                          <option value="B.sc">B.Sc</option>
                          <option value="HND">HND</option>
                          <option value="OND">OND</option>
                          <option value="NCE">NCE</option>
                          <option value="FSLC">FSLC</option>
                          <option value="SSCE">SSCE</option>
                          <option value="M.Sc">M.Sc</option>
                          <option value="PhD">PhD</option>
                        </select>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-danger remove-field">Delete</button>
                        </div>
                      </div><!-- input-group -->
                    </div>

                  </div>`;
                    document.getElementById("educationHistory").insertAdjacentHTML("beforeend", newField);
                  });

                  // Add new work experience field
                  document.getElementById("addWorkExperience").addEventListener("click", function() {
                    var newField = `<div class="form-group work-info row col-12">

                    <div class="col-4">
                      <label>Job Title</label>
                      <input type="text" class="form-control" name="jobTitle[]" required>
                    </div>

                    <div class="col-4">
                      <label>Description</label>
                      <input type="text" class="form-control" name="jobDescription[]" required>
                    </div>

                    <div class="col-4">
                      <label>Duration</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="jobDuration[]" required>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-danger remove-field">Delete</button>
                        </div>
                      </div><!-- input-group -->
                    </div>

                  </div>`;
                    document.getElementById("workExperience").insertAdjacentHTML("beforeend", newField);
                  });

                  // Add new document field
                  document.getElementById("addDocument").addEventListener("click", function() {
                    var newField = `<div class="form-group doc-info row col-12">
                    <div class="col-6">
                      <label>Document Name</label>
                      <input type="text" class="form-control" name="documentName[]" required>
                    </div>

                    <div class="col-6">
                      <label>Document Type</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="documentFile[]" required>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-danger remove-field">Delete</button>
                        </div>
                      </div><!-- input-group -->
                    </div>
                  </div>`;
                    document.getElementById("documentUploads").insertAdjacentHTML("beforeend", newField);
                  });

                  // Remove field on delete button click
                  document.addEventListener("click", function(e) {
                    if (e.target.classList.contains("remove-field")) {
                      //e.target.parentElement.remove();
                      e.target.closest(".form-group").remove();
                    }
                  });

                  // Toggle required field
                  document.addEventListener("change", function(e) {
                    if (e.target.classList.contains("toggle-required")) {
                      var input = e.target.closest(".form-group").querySelector("input, select");
                      input.required = e.target.checked;
                    }
                  });
                </script>

              </section>

              <h3>Overview</h3>
              <section>
                <p>Review details of your selection before submittion.</p>
                <div id="collectedData" style="margin-top:20px;"></div>
              </section>

              <h3 style="display:none;">Submit</h3>
              <section style="display:none;">
              </section>

            </div>

          </form>

        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- widget-2 -->
</div><!-- col-12 -->