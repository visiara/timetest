<?php
include "" . __DIR__ . "/header.php";

//include ("".$_SERVER['DOCUMENT_ROOT']."/tams/stats.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="HECKER PEOPLE Project.">
  <meta name="author" content="Visiara Ltd">

  <!-- Meta -->
  <meta name="description" content="HECKER PEOPLE Project - TAMS">
  <meta name="author" content="ThemePixels">

  <title>HECKER PEOPLE</title>

  <!-- vendor css -->
  <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <!-- Bracket CSS -->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="./assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/admin.css?rand=<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/styles.css?rand=<?php echo rand(); ?>">

  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    #loading-overlay {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    #loading-overlay span {
      color: white;
      font-size: 20px;
      background: black;
      padding: 10px 20px;
      border-radius: 5px;
    }
  </style>

  </style>
</head>

<body onload="showPage('jobmanagement1.php');">

  <!-- ########## START: LEFT PANEL ########## -->
  <?php
  include '../auth/admin_header.php';

  include "" . __DIR__ . "/adminHeader.php";
  include "" . __DIR__ . "/sidebar.php";
  ?>
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <?php
  include "" . __DIR__ . "/rightSidebar.php";
  ?>
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <?php

  ?>
  <!-- ########## END: RIGHT PANEL ########## --->

  <!-- ########## START: MAIN PANEL ########## -->
  <div>
    <div
      class="ht-md-80 wd-200 wd-md-auto bg-dark pd-y-20 pd-md-y-0 pd-md-x-20 d-md-flex align-items-center justify-content-center">
      <ul class="nav nav-effect nav-effect-4 flex-column flex-md-row" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#" role="tab"
            onclick="showPage('jobmanagement1.php')">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab"
            onclick="showPage('jobmanagement2.php')">All Jobs</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab"
            onclick="showPage('jobmanagement3.php')">Manage workflows</a></li>
      </ul>
    </div><!-- ht-65 -->
    <div class="br-pagetitle">
      <i class="icon ion-briefcase"></i>
      <div>
        <h4>Jobs</h4>
        <p class="mg-b-0">Job Management Panel.</p>
      </div>
    </div>

    <div class="">
      <?php echo $status; ?>

      <div id="loading-overlay"><span>Loading...</span></div>

      <div class="row row-sm mg-t-20" id="pageDiv">

      </div><!-- row -->

      <!-- modals -->

      <!-- New Requisition Modal -->
      <div class="modal fade" id="newRequisitionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Job Requisition</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="requisitionForm" action="" method="POST">
                <input type="hidden" name="create_requisition" value="1">
                <div class="form-group">
                  <label>Job Title <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="job_title" required>
                </div>

                <div class="form-group">
                  <label>Approval Steps <span class="tx-danger">*</span></label>
                  <select class="form-control w-100" id="approval_steps" name="approval_steps[]"
                    data-placeholder="Choose Approval Steps" style="width: 100%;" required multiple>
                    <option value="">-- Choose Steps --</option>
                    <?php $resultstep1 = $conn->query("SELECT * FROM job_steps WHERE step_status = '0' ORDER BY id Asc");
                    while ($rowstep1 = $resultstep1->fetch_assoc()) { ?>
                      <option value="<?php echo $rowstep1['id']; ?>"><?php echo $rowstep1['steps_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Reason for Request <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="reason" required></textarea>
                </div>
                <div class="form-group">
                  <label>Request Type <span class="tx-danger">*</span></label>
                  <select class="form-control" name="request_type" required>
                    <option value="">-- Select Request Type --</option>
                    <option value="Internal">Internal</option>
                    <option value="External">External</option>
                    <option value="Both">Both</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Job Description <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="job_description" required></textarea>
                </div>
                <div class="form-group">
                  <label>Number of Staff Needed <span class="tx-danger">*</span></label>
                  <input type="number" class="form-control" name="number_needed" required>
                </div>
                <div class="form-group">
                  <label>Date Required <span class="tx-danger">*</span></label>
                  <input type="date" class="form-control" name="date_required" required>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="requisitionForm">Save
                changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- New interview Modal -->
      <div class="modal fade" id="newRequisitionModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Workflow</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="requisitionForm2" action="" method="POST">
                <input type="hidden" name="create_requisition2" value="1">
                <div class="form-group">
                  <label>Workflow Name <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="template_name" required>
                </div>

                <div class="form-group">
                  <label>Description<span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="template_desc" required></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="requisitionForm2">Save
                changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- New add steps Modal -->
      <div class="modal fade" id="addstepModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Step</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="addstepForm" action="" method="POST">
                <input type="hidden" name="addstep" value="1">
                <input type="hidden" name="workflowid" id="workflowid" required>

                <div class="form-group">
                  <label for="stepName">Name of Step</label>
                  <input type="text" class="form-control" name="steps_name" required>
                </div>
                <div class="form-group">
                  <label for="stepType">Type of Step</label>
                  <select class="form-control" name="steps_type" required>
                    <option value="">--Select Step Type</option>
                    <option value="Screening">Screening</option>
                    <option value="Interview">Interview</option>
                    <option value="Assessment">Assessment</option>
                    <option value="Final Decision">Final Decision</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="stepDescription">Description</label>
                  <textarea class="form-control" name="step_description" rows="3" required></textarea>
                </div>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="requiresMessage" name="step_check"
                    onclick="toggleEmailTemplate()">
                  <label class="form-check-label" for="requiresMessage">Requires sending a message to the
                    applicant</label>
                </div>
                <div class="form-group mt-3" id="emailTemplateDiv" style="display: none;">
                  <label for="emailTemplate">Select Email Template</label>
                  <select class="form-control" id="emailTemplate" name="step_template_interview">
                    <option value="">--Select Email Template</option>
                    <?php $resultx = $conn->query("SELECT * FROM job_template_email ORDER BY id desc");
                    while ($rowx = $resultx->fetch_assoc()) { ?>
                      <option value="<?php echo $rowx['id']; ?>"><?php echo $rowx['template_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="requiresMessage2" name="step_check2"
                    onclick="toggleEmailTemplate2()">
                  <label class="form-check-label" for="requiresMessage2">Require Interview Question</label>
                </div>
                <div class="form-group mt-3" id="emailTemplateDiv2" style="display: none;">
                  <label for="emailTemplate2">Select Interview Template</label>
                  <select class="form-control" id="emailTemplate2" name="step_template_email">
                    <option value="">--Select Email Template</option>
                    <?php $resultx = $conn->query("SELECT * FROM job_template_interview ORDER BY id desc");
                    while ($rowx = $resultx->fetch_assoc()) { ?>
                      <option value="<?php echo $rowx['id']; ?>"><?php echo $rowx['template_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="addstepForm">Save
                changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- View steps Modal -->
      <div class="modal fade" id="viewStepModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Steps</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="viewstepdiv">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- View steps Modal -->
      <div class="modal fade" id="editStepModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="editstepForm" action="" method="POST">
              <div class="modal-header">
                <h5 class="modal-title">Steps</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="editstepdiv">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs submitBtn">Save
                  changes</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- View template2 Modal -->
      <div class="modal fade" id="viewTemplateModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="requisitionForm4" action="" method="POST">
              <div class="modal-header">
                <h5 class="modal-title">Workflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="applicantList2">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs submitBtn">Save
                  changes</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- view Requisition Modal -->
      <div class="modal fade" id="newRequisitionModalView" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Job Requisition</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="viewjobPage">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- post job Modal -->
      <div class="modal fade" id="postJobModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <form id="requisitionPostForm" action="" method="POST">
              <div class="modal-header">
                <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Post Job</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body d-flex align-items-center justify-content-end">
                <label>Edit Mode</label>
                <div class="br-toggle br-toggle-rounded br-toggle-primary ml-2">
                  <div class="br-toggle-switch"></div>
                </div>
                <input type="hidden" id="edittype" name="edittype" value="0">
              </div>
              <div class="modal-body" id="viewjobPage2">

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="requisitionPostForm">Post
                  Job</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- View Applicants Modal -->
      <div class="modal fade" id="viewApplicantsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Applications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="applicantList" style="max-height: 600px !important: overflow-y: auto;">
            </div>
          </div>
        </div>
      </div>

      <!-- View Applicants docs Modal -->
      <div class="modal fade" id="viewApplicantsDocsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Applicant Documents</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="applicantListDocs" style="max-height: 600px !important: overflow-y: auto;">
            </div>
          </div>
        </div>
      </div>

      <!-- Upload Modal -->
      <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="uploadForm" action="jobmanagementgo.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="uploadfile" value="1">
                <input type="hidden" id="applicant_id_form" name="applicant_id_form" required>
                <div class="form-group">
                  <select class="form-control mt-2 mb-2" name="uploadtype">
                    <option>Select Upload Type</option>
                    <option value="cv">CV</option>
                    <option value="Others">Other Documents</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="fileName">File Name</label>
                  <input type="text" class="form-control" id="fileName" name="fileName" required>
                </div>
                <div class="form-group">
                  <label for="fileUpload">Choose File</label>
                  <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- INTERVIEW NOTE MODAL -->
      <div class="modal fade" id="interviewModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="saveinterviewnote" action="" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Interview Notes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="job_interview_id" name="job_interview_id">
                <input type="hidden" id="job_applicant_id" name="job_applicant_id">
                <input type="hidden" id="job_step" name="job_step">
                <input type="hidden" id="job_interview" name="job_interview" value="1">

                <small>Template Name</small>
                <h5 id="interviewTitle"></h5>
                <small>Template Description</small>
                <h5 id="interviewDescription"></h5>

                <div id="interviewQuestions" class="accordion mg-t-30"></div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Report</button>
              </div>
            </form>
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
            <div class="modal-body" id="filediv">

            </div>
          </div>
        </div>
      </div>

      <!-- VIEW APPLICATION MODAL -->
      <style>
        .modal-xl-custom {
          max-width: 90vw;
          height: 90vh;
        }
      </style>
      <div class="modal fade" id="viewApplicationModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-xl-custom">
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

      <!-- grade step MODAL -->
      <div class="modal fade" id="gradeModal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="savegrade" action="" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Grade Interview</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="job_interview_id2" name="job_interview_id">
                <input type="hidden" id="job_applicant_id2" name="job_applicant_id">
                <input type="hidden" id="job_step2" name="job_step">
                <input type="hidden" id="applicationid2" name="applicationid">
                <input type="hidden" id="gradestep" name="gradestep" value="1">
                <input type="hidden" id="job" name="job" value="1">

                <select class="form-control mt-2 mb-2" name="grade">
                  <option>Select Interview Result</option>
                  <option value="Failed">Failed</option>
                  <option value="Repeat">Repeat</option>
                  <option value="Passed">Passed</option>
                  <option value="Employed">Employed</option>
                </select>
                <textarea class="form-control" placeholder="Enter Interview Report" name="review" rows="5"></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Grade</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- New add team Modal -->
      <div class="modal fade" id="newRequisitionModalTeam" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Job Requisition</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="requisitionFormTeam" action="" method="POST">
                <input type="hidden" id="teamrowid" name="teamrowid" value="1">

                <div class="form-group">
                  <label>Approval Steps <span class="tx-danger">*</span></label>
                  <select class="form-control w-100" id="team_member" name="team_member[]" data-placeholder="Choose Team Member" style="width: 100%;" required multiple>
                    <option value="">-- Choose Team Member --</option>
                    <?php $resultstep1 = $conn->query("SELECT * FROM admins WHERE company='$companyMain' ORDER BY id Asc");
                    while ($rowstep1 = $resultstep1->fetch_assoc()) { ?>
                      <option value="<?php echo $rowstep1['id']; ?>"><?php echo $rowstep1['fname'] . ' ' . $rowstep1['mname'] . ' ' . $rowstep1['lname']; ?></option>
                    <?php } ?>
                  </select>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="requisitionFormTeam">Save changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


      <!-- end modals -->

    </div><!--  -->

    <?php

    // BE IN ALL PAGES
    include '../auth/admin_footer.php';

    ?>

  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../lib/moment/min/moment.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>
  <script src="../lib/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../lib/rickshaw/vendor/d3.min.js"></script>
  <script src="../lib/rickshaw/vendor/d3.layout.min.js"></script>
  <script src="../lib/rickshaw/rickshaw.min.js"></script>
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

  <script src="../lib/jquery-steps/build/jquery.steps.min.js"></script>
  <script src="../lib/parsleyjs/parsley.min.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/widgets.js"></script>

  <script>
    function showPage(page) {
      showLoading();
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("pageDiv").innerHTML = this.responseText;
          doTable();

          if (page == "dash1.php") {
            doWizard();
            $('#jobTeam').select2();
          }

          if (page == "jobmanagement1.php") {
            doRick();
          }

          var fruits = page.split("?");
          if (fruits[0] == "job_details.php") {
            doPie(fruits[1]);

            // Check if 'game' exists
            var urlParams = new URLSearchParams(page.split('?')[1]);
            if (urlParams.has('game')) {
              var game = urlParams.get('game');
              showTab(game);
            }

          }
        }

        hideLoading();
      };
      xmlhttp.open("GET", page, true);
      xmlhttp.send();
    }

    function viewTemplate2(jobId) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicantList2").innerHTML = this.responseText;
          $('#viewTemplateModal2').modal('show');
        }
      };
      xmlhttp.open("GET", "job_view2.php?job_id=" + jobId, true);
      xmlhttp.send();
    }

    function viewStep(jobId) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("viewstepdiv").innerHTML = this.responseText;
          $('#viewStepModal').modal('show');
        }
      };
      xmlhttp.open("GET", "job_step_view.php?job_id=" + jobId, true);
      xmlhttp.send();
    }

    function editStep(jobId) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("editstepdiv").innerHTML = this.responseText;
          $("#viewStepModal").modal('hide');
          $('#editStepModal').modal('show');
        }
      };
      xmlhttp.open("GET", "job_step_edit.php?job_id=" + jobId, true);
      xmlhttp.send();
    }

    function deleteTemplate(jobId) {
      var text = "Are you sure you want to DELETE this record?";
      if (confirm(text) == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            showPage('jobmanagement3.php');
          }
        };
        xmlhttp.open("GET", "jobmanagementgo.php?dele=" + jobId, true);
        xmlhttp.send();
      }
    }

    function toggleEmailTemplate() {
      var emailTemplateDiv = document.getElementById("emailTemplateDiv");
      var checkbox = document.getElementById("requiresMessage");
      emailTemplateDiv.style.display = checkbox.checked ? "block" : "none";
    }

    function toggleEmailTemplate2() {
      var emailTemplateDiv = document.getElementById("emailTemplateDiv2");
      var checkbox = document.getElementById("requiresMessage2");
      emailTemplateDiv.style.display = checkbox.checked ? "block" : "none";
    }

    function addStep(workflowid) {
      document.getElementById("workflowid").value = workflowid;
      $('#addstepModal').modal('show');
    }

    function viewJobRequest(jobid) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("viewjobPage").innerHTML = this.responseText;
          //doTable();
        }
      };
      xmlhttp.open("GET", "viewjobPage.php?rid=" + jobid, true);
      xmlhttp.send();
    }

    function postJob(jobid) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("viewjobPage2").innerHTML = this.responseText;
          showEdits(false);

          $('#approval_steps2').select2({
            dropdownParent: $('#postJobModal')
          });
        }
      };
      xmlhttp.open("GET", "viewjobPage2.php?rid=" + jobid, true);
      xmlhttp.send();
    }

    function doTable() {
      $('#mainTableClass').DataTable({
        responsive: false,
        //dom: 'Brtip',
        paging: true,
        ordering: true,
        info: true,
        search: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ ',
          //lengthMenu: '_MENU_ items/page',
        }
      });

      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });
    }

    function showLoading() {
      $('#loading-overlay').show();
    }

    function hideLoading() {
      $('#loading-overlay').hide();
    }

    function toggleJobStatus(jobId) {
      var confirmAction = confirm("Are you sure you want to change the job status?");
      if (!confirmAction) return;

      showLoading();
      $.post('toggle_job_status.php', {
        job_id: jobId
      }, function(response) {
        var row = $('#job-' + jobId);
        var statusCell = row.find('.job-status');
        var button = row.find('.toggle-btn');

        if (statusCell.text().trim() === 'Active') {
          statusCell.text('Closed');
          button.text('Open Job');
          button.removeClass('btn-warning').addClass('btn-success');
        } else {
          statusCell.text('Active');
          button.text('Close Job');
          button.removeClass('btn-success').addClass('btn-warning');
        }
      }).always(function() {
        hideLoading();
      });
    }

    function showEdits(condition) {
      var form = document.getElementById("requisitionPostForm");
      var links = document.getElementById("links");
      var inputs = form.querySelectorAll("input, select, textarea");
      if (condition) {
        //inputs.forEach(input => input.disabled = true);
        inputs.forEach(input => input.readOnly = false);
        var selects = form.querySelectorAll("select");
        selects.forEach(select => select.style.pointerEvents = "auto");
        document.getElementById("edittype").value = 1;
      } else {
        inputs.forEach(input => input.readOnly = true);
        var selects = form.querySelectorAll("select");
        selects.forEach(select => select.style.pointerEvents = "none");
        document.getElementById("edittype").value = 0;
      }

    }

    function viewApplicants(jobId, type) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicantList").innerHTML = this.responseText;
          $('#viewApplicantsModal').modal('show');
        }
      };
      xmlhttp.open("GET", "get_applications.php?job_id=" + jobId + "&type=" + type, true);
      xmlhttp.send();
    }

    function viewJobDetails(jobId) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicantList").innerHTML = this.responseText;
          $('#viewApplicantsModal').modal('show');
        }
      };
      xmlhttp.open("GET", "get_applications.php?job_id=" + jobId + "&type=" + type, true);
      xmlhttp.send();
    }

    function uploadApplicantsDocs(jobId) {
      document.getElementById("applicant_id_form").value = jobId;
      $('#uploadModal').modal('show');
    }

    function viewApplicantDoc(jobId, type) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicantListDocs").innerHTML = this.responseText;
          $('#viewApplicantsDocsModal').modal('show');
        }
      };
      xmlhttp.open("GET", "get_application_docs.php?job_id=" + jobId + "&type=" + type, true);
      xmlhttp.send();
    }

    function doJobs(jobId, type, page) {
      var typename = 'ACTIVE';

      if (type == 1) {
        typename = 'SUSPENDED';
      } else if (type == 2) {
        typename = 'DRAFT';
      } else if (type == 3) {
        typename = 'DELETE';
      } else if (type == 4) {
        typename = 'ACTIVE';
      } else if (type == 5) {
        typename = 'PUBLIC';
      } else if (type == 6) {
        typename = 'PRIVATE';
      }

      var text = "Are you sure you want to change the status of this record to " + typename + "?";
      if (confirm(text) == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            showPage(page);
          }
        };
        xmlhttp.open("GET", "jobmanagementgo.php?rid=" + jobId + "&type=" + type, true);
        xmlhttp.send();
      }
    }

    // Toggles
    $('.br-toggle').on('click', function(e) {
      e.preventDefault();
      $(this).toggleClass('on');

      if ($(this).hasClass('on')) {
        showEdits(true);
      } else {
        showEdits(false)
      }

    });

    $('#approval_steps').select2({
      dropdownParent: $('#newRequisitionModal')
    });

    $('#team_member').select2({
      dropdownParent: $('#newRequisitionModalTeam')
    });

    $('#jobTeam').select2();

    function doWizard() {
      $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
        cssClass: 'wizard wizard-style-1',
        onStepChanging: function(event, currentIndex, newIndex) {
          if (currentIndex < newIndex) {

            // Step 1 form validation
            if (currentIndex === 0) {
              var jobtitle2 = $('#jobtitle2').parsley();
              var jobLevel = $('#jobLevel').parsley();
              var employmentType = $('#employmentType').parsley();
              var country = $('#country').parsley();
              var location = $('#location').parsley();
              var workstyle = $('#workstyle').parsley();
              var minPay = $('#minPay').parsley();
              var maxPay = $('#maxPay').parsley();
              var jobDescription2 = $('#jobDescription2').parsley();
              var jobResponsibilities = $('#jobResponsibilities').parsley();
              var jobRequirements = $('#jobRequirements').parsley();

              if (jobtitle2.isValid() && jobLevel.isValid() && employmentType.isValid() && country.isValid() && location.isValid() && workstyle.isValid() && minPay.isValid() && maxPay.isValid() && jobDescription2.isValid() && jobResponsibilities.isValid() && jobRequirements.isValid()) {
                return true;
              } else {
                jobtitle2.validate();
                jobLevel.validate();
                employmentType.validate();
                country.validate();
                location.validate();
                workstyle.validate();
                minPay.validate();
                maxPay.validate();
                jobDescription2.validate();
                jobResponsibilities.validate();
                jobRequirements.validate();
              }
            }

            // Step 2 form validation
            if (currentIndex === 1) {
              var jobExpiryDate = $('#jobExpiryDate').parsley();
              var jobVisibility = $('#jobVisibility').parsley();
              var specialization = $('#specialization').parsley();
              var jobTeam = $('#jobTeam').parsley();
              var applicationWorkflow = $('#applicationWorkflow').parsley();

              if (jobExpiryDate.isValid() && jobVisibility.isValid() && specialization.isValid() && jobTeam.isValid() && applicationWorkflow.isValid()) {
                return true;
              } else {
                jobExpiryDate.validate();
                jobVisibility.validate();
                specialization.validate();
                jobTeam.validate();
                applicationWorkflow.validate();
              }
            }

            // Step 3 form validation
            if (currentIndex === 2) {

              if (!reValidate()) {
                return false;
              } else {

                review();
                return true;
              }

            }

            // Step 4 form validation
            if (currentIndex === 3) {
              //var form = document.getElementById("dynamicForm");
              var form = $(".dynamicForm");
              form.submit();
            }

            // Always allow step back to the previous step even if the current step is not valid.
          } else {
            return true;
          }
        }
      });

    }

    function reValidate() {
      var isValid = true;

      // Loop through all input, select, and file fields inside #valform
      $('#valform input, #valform select, #valform textarea').each(function() {
        var fieldType = $(this).attr('type');
        var fieldValue = $(this).val().trim(); // Ensure we handle empty values safely
        var fieldName = $(this).attr('name') || '';
        var theInput = $(this).parsley(); // Initialize Parsley validation

        // Normalize input names (handle fields with [])
        /*
        if (fieldName.includes("[]")) {
          fieldName = fieldName.replace(/\[\]$/, ''); // Remove [] at the end
        }
        */

        // Skip validation for fields that are dynamically unchecked
        if ($(this).closest('.form-group').find('.toggle-required').length > 0) {
          var isRequired = $(this).closest('.form-group').find('.toggle-required').prop('checked');
          if (!isRequired) return true; // Skip validation
        }

        // Check required fields
        if ($(this).prop('required') && fieldValue === "") {
          theInput.validate();
          isValid = false;
          return false; // ⛔ Stop loop execution
        }

        // Validate email fields
        if (fieldType === "email" || fieldName.includes("email")) {
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(fieldValue)) {
            theInput.validate();
            isValid = false;
            return false; // ⛔ Stop execution
          }
        }

        /*
        // Validate phone numbers
        if (fieldName.includes("phone")) {
          var phonePattern = /^[0-9\-\+\s()]{10,15}$/;
          if (!phonePattern.test(fieldValue)) {
            theInput.validate();
            isValid = false;
            return false; // ⛔ Stop execution
          }
        }
        */

        // Validate file uploads
        if (fieldType === "file" && this.files.length === 0) {
          theInput.validate();
          isValid = false;
          return false; // ⛔ Stop execution
        }
      });

      return isValid; // ✅ Ensure function returns final validation status
    }

    function doRick(dear = "2025") {
      document.getElementById("chart").innerHTML = '';
      document.getElementById("legend").innerHTML = '';

      // Fetch data from PHP script
      fetch("jobmap.php?year=" + dear) // Change the year as needed
        .then(response => response.json())
        .then(responseData => {
          var chartData = responseData.data;
          var chartData2 = responseData.data2;
          document.getElementById("totaljobs").innerHTML = responseData.totaljobs;
          document.getElementById("totalapp").innerHTML = responseData.totalapp;
          document.getElementById("yeardiv").innerHTML = dear;

          // Rickshaw requires data to be sorted by x values
          chartData.sort((a, b) => a.x - b.x);
          chartData2.sort((a, b) => a.x - b.x);

          // Create the chart
          var graph = new Rickshaw.Graph({
            element: document.getElementById("chart"),
            //width: 600,
            height: 400,
            renderer: "bar",
            stack: false,
            series: [{
              name: "Published Jobs",
              color: "#5058AB",
              data: chartData
            }, {
              name: "Number of Applicants",
              color: "#14A0C1",
              data: chartData2
            }],
          });

          // Render the graph
          graph.render();

          new Rickshaw.Graph.Axis.X({
            graph: graph,
            tickFormat: x => ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][x]
          }).render();

          new Rickshaw.Graph.Axis.Y({
            graph: graph
          }).render();
          new Rickshaw.Graph.HoverDetail({
            graph: graph
          });

          // Legend
          var legend = new Rickshaw.Graph.Legend({
            graph: graph,
            element: document.getElementById("legend")
          });

          new Rickshaw.Graph.Behavior.Series.Toggle({
            graph: graph,
            legend: legend
          });
          new Rickshaw.Graph.Behavior.Series.Highlight({
            graph: graph,
            legend: legend
          });
        })
        .catch(error => console.error("Error fetching data:", error));


      // Load initial chart
      //doRick(currentYear);

    }

    function review() {

      var collectedData = `<div id="dataContainer"><h3>Job Overview</h3>`;

      function collectInputs(sectionTitle, selector) {
        var inputs = $(selector).find("input, select, textarea");
        if (inputs.length > 0) {
          collectedData += `<div class="data-section"><h4>${sectionTitle}</h4><ul>`;
          inputs.each(function() {
            var name = $(this).attr("name") || "Unknown";
            var value = $(this).val() ? $(this).val() : "<span style='color: red;'>N/A</span>";
            collectedData += `<li><strong>${name}:</strong> ${value}</li>`;
          });
          collectedData += "</ul></div>";
        }
      }

      // Grouping based on sections in the form
      collectInputs("Job Details", "#wizard1 section:nth-of-type(1)");
      collectInputs("Job Settings", "#wizard1 section:nth-of-type(2)");
      collectInputs("Application Setup", "#wizard1 section:nth-of-type(3)");
      collectInputs("Education History", "#educationHistory");
      collectInputs("Work Experience", "#workExperience");
      collectInputs("Documents", "#documentUploads");

      collectedData += "</div>";
      $("#collectedData").html(collectedData);

    }

    function doPie(page) {
      document.getElementById("doughnutCanvas").innerHTML = '';

      // Fetch data from PHP script
      fetch("jobmap2.php?" + page) // Change the year as needed
        .then(response => response.json())
        .then(responseData => {
          var staff_needed = responseData.staff_needed;
          var total_applications = responseData.total_applications;
          var total_passed = responseData.total_passed;
          var percentage_passed = responseData.percentage_passed;
          var total_failed = responseData.total_failed;
          var percentage_failed = responseData.percentage_failed;
          var total_repeat = responseData.total_repeat;
          var percentage_repeat = responseData.percentage_repeat;
          var total_employed = responseData.total_employed;
          var percentage_employed = responseData.percentage_employed;
          var total_unprocessed = responseData.total_unprocessed;

          document.getElementById("staff_needed").innerHTML = responseData.staff_needed;
          document.getElementById("total_applications").innerHTML = responseData.total_applications;
          document.getElementById("total_passed").innerText = total_passed;
          document.getElementById("percentage_passed").innerText = responseData.percentage_passed + '%';
          document.getElementById("total_failed").innerText = responseData.total_failed;
          document.getElementById("percentage_failed").innerText = percentage_failed + '%';
          document.getElementById("total_repeat").innerText = responseData.total_repeat;
          document.getElementById("percentage_repeat").innerText = percentage_repeat + '%';
          document.getElementById("total_employed").innerText = responseData.total_employed;
          document.getElementById("percentage_employed").innerText = responseData.percentage_employed + '%';
          document.getElementById("total_unprocessed").innerText = responseData.total_app + ' Activities';
          document.getElementById("total_app").innerText = responseData.total_applications;
          document.getElementById("total_employed2").innerHTML = responseData.total_employed;

          // Doughnut chart data
          var data = [staff_needed, percentage_employed]; // Example values (Published, Pending, Closed)
          var colors = ["#28a745", "#ffc107"]; // Green, Yellow, Red
          var labels = ["Required", "Employed"];

          function drawDoughnutChart(canvasId, data, colors, labels) {
            var canvas = document.getElementById(canvasId);
            var ctx = canvas.getContext("2d");

            var total = data.reduce((sum, value) => sum + value, 0);
            var startAngle = -Math.PI / 2; // Start from top

            // Draw pie slices
            data.forEach((value, index) => {
              var sliceAngle = (value / total) * 2 * Math.PI;

              ctx.beginPath();
              ctx.moveTo(canvas.width / 2, canvas.height / 2);
              ctx.arc(canvas.width / 2, canvas.height / 2, 100, startAngle, startAngle + sliceAngle);
              ctx.closePath();
              ctx.fillStyle = colors[index];
              ctx.fill();

              startAngle += sliceAngle;
            });

            // Draw doughnut hole
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, 50, 0, 2 * Math.PI);
            ctx.fillStyle = "white";
            ctx.fill();

            // Draw legend
            labels.forEach((label, index) => {
              ctx.fillStyle = colors[index];
              ctx.fillRect(220, 100 + index * 30, 15, 15);
              ctx.fillStyle = "#333";
              ctx.fillText(label, 240, 110 + index * 30);
            });
          }

          // Call function to draw the chart
          drawDoughnutChart("doughnutCanvas", data, colors, labels);

        })
        .catch(error => console.error("Error fetching data:", error));

    }
  </script>

  <script>
    $(function() {
      'use strict';

      $('.mainTableClass').DataTable({
        responsive: false,
        dom: 'Brtip',
        paging: true,
        ordering: true,
        info: false,
        search: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ ',
          //lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>

  <script>
    $(function() {
      'use strict'

      // FOR DEMO ONLY
      // menu collapsed by default during first page load or refresh with screen
      // having a size between 992px and 1299px. This is intended on this page only
      // for better viewing of widgets demo.
      $(window).resize(function() {
        minimizeMenu();
      });

      //minimizeMenu();

      function minimizeMenu() {
        if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
          // show only the icons and hide left menu label by default
          $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
          $('body').addClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideUp();
        } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
          $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
          $('body').removeClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideDown();
        }
      }




    });
  </script>

  <script>
    $(document).ready(function() {
      $("input").attr({
        "max": 10, // substitute your own
        "min": 2 // values (or variables) here
      });
    });

    $(document).ready(function() {
      var a = "<?php echo $coldays; ?>";
      if (a == '0') {
        //jQuery.noConflict(); 
        $('#editprofilef').modal({
          backdrop: 'static',
          keyboard: false
        });
      }
    });
  </script>

  <script>
    $(document).ready(function() {

      $(document).on("submit", ".dynamicForm", function(e) {
        e.preventDefault(); // Stop default submission

        // Create FormData object to handle inputs, including files
        var formData = new FormData(this);

        // AJAX request
        $.ajax({
          url: 'jobmanagementgo.php', // Get form action URL
          type: $(this).attr("method"), // Get form method (POST)
          data: formData,
          dataType: 'json',
          processData: false, // Don't process the data
          contentType: false, // Set content type to false
          beforeSend: function() {
            showLoading();
          },
          success: function(response) {
            if (response.status == 1) {
              alert(response.message);
              showPage('dash1.php');
            } else {
              alert(response.message);
            }

            hideLoading();
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error);
            hideLoading();
          }
        });
      });

      $(document).ready(function() {
        $("#uploadForm").submit(function(e) {
          e.preventDefault(); // Prevent default form submission

          var formData = new FormData(this);
          var fileInput = $("#fileUpload")[0].files[0];

          if (!fileInput) {
            alert("Please select a file.");
            return;
          }

          var allowedTypes = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
          var maxSize = 5 * 1024 * 1024; // 5MB

          if (!allowedTypes.includes(fileInput.type)) {
            alert("Invalid file type. Only PDF and Word documents are allowed.");
            return;
          }

          if (fileInput.size > maxSize) {
            alert("File size exceeds the 5MB limit.");
            return;
          }

          //formData.append("fileType", fileInput.type);
          //ormData.append("fileSize", fileInput.size);

          $.ajax({
            url: "jobmanagementgo.php", // Backend PHP script
            type: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
              if (response.status == 1) {
                alert(response.message);
                //showPage('dash1.php');
              } else {
                alert(response.message);
              }
              $("#uploadModal").modal("hide");
              $("#uploadForm")[0].reset();
            },
            error: function(xhr, status, error) {
              alert("File upload failed." + error);
            },
          });
        });
      });

      $("#requisitionForm2").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            $('.submitBtn').attr("disabled", "disabled");
            $('.pillo').css("opacity", ".3");
          },
          success: function(response) {
            if (response.status == 1) {
              $("#newRequisitionModal2").modal('hide');
              alert(response.message);
              showPage('jobmanagement3.php');
            } else {
              alert(response.message);
              //$('#messagedetail1').html(response.message);
            }
            $('.pillo').css("opacity", "");
            $(".submitBtn").removeAttr("disabled");
            hideLoading();
          }
        });
      });

      $("#requisitionFormTeam").on('submit', function(e) {
        e.preventDefault();
        showLoading();

        var teamrowid = document.getElementById("teamrowid").value;

        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(response) {
            if (response.status == 1) {
              $("#newRequisitionModalTeam").modal('hide');
              alert(response.message);
              showPage("job_details.php?jobid=" + teamrowid + "&game=team");
            } else {
              alert(response.message);
              //$('#messagedetail1').html(response.message);
            }

            hideLoading();
          }
        });
      });

      $("#requisitionForm4").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(response) {
            if (response.status == 1) {
              $("#viewTemplateModal2").modal('hide');
              alert(response.message);
              showPage('jobmanagement3.php');
            } else {
              alert(response.message);
              //$('#messagedetail1').html(response.message);
            }
            hideLoading();
          }
        });
      });

      $("#addstepForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            $('.submitBtn').attr("disabled", "disabled");
            $('.pillo').css("opacity", ".3");
          },
          success: function(response) {
            if (response.status == 1) {
              $("#addstepModal").modal('hide');
              alert(response.message);
              showPage('jobmanagement3.php');
            } else {
              alert(response.message);
              //$('#messagedetail1').html(response.message);
            }
            $('.pillo').css("opacity", "");
            $(".submitBtn").removeAttr("disabled");
            hideLoading();
          }
        });
      });

      $("#editstepForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {

          },
          success: function(response) {
            if (response.status == 1) {
              $("#editStepModal").modal('hide');
              alert(response.message);
              showPage('jobmanagement3.php');
            } else {
              alert(response.message);
            }
            hideLoading();
          }
        });
      });

      $("#saveinterviewnote").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {

          },
          success: function(response) {
            if (response.status == 1) {
              $("#interviewModal").modal('hide');
              alert(response.message);
              //showPage('jobmanagement3.php');
            } else {
              alert(response.message);
            }
            hideLoading();
          }
        });
      });

      $("#savegrade").on('submit', function(e) {
        e.preventDefault();
        showLoading();

        var jobrowid = document.getElementById("job").value;

        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {

          },
          success: function(response) {
            if (response.status == 1) {
              $("#gradeModal2").modal('hide');
              alert(response.message);
              //showPage('jobmanagement3.php');
              showPage("job_details.php?jobid=" + jobrowid + "&game=applicants");
            } else {
              alert(response.message);
            }
            hideLoading();
          }
        });
      });



    });
  </script>

  <script>
    var allApplicants = []; // Global storage
    var stepQuestions = []; // Global storage
    var interviewProfile = []; // Global storage
    var oldInterviews = []; // Global storage
    var jobrowid = '0'; // job row id

    function filterApplicants(jobid, step) {
      allApplicants = [];

      /*
      var filters = {
        gender: ["Male", "Female"],
        cv_source: ["Direct Application", "Uploaded Candidate"],
        experience: ["0-2", "3-6", "7-10", "10+"],
        degree: ["B.sc", "HND", "OND", "NCE", "SSCE", "FSLC", "Others"],
        grad_grade: ["First Class", "2nd Class Upper", "2nd Class Lower", "Pass"],
        relocate: ["Yes", "No"],
        marital_status: ["Single", "Married", "Divorced"]
      };

      var selectedFilters = {};

      $(".filter:checked").each(function () {
        var filterType = $(this).data("filter");
        var filterValue = $(this).val();

        if (!selectedFilters[filterType]) {
          selectedFilters[filterType] = [];
        }
        selectedFilters[filterType].push(filterValue);
      });
      */

      var selectedFilters = {
        jobid: jobid,
        step: step
      };

      //var selectedFilters = {};
      document.querySelectorAll('#filtersDiv input:checked').forEach(input => {
        if (!selectedFilters[input.name]) {
          selectedFilters[input.name] = [];
        }
        //selectedFilters[input.name].push(input.value);
      });

      // Send selected filters to PHP script via AJAX
      $.ajax({
        url: "job_filters.php",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(selectedFilters),
        success: function(response) {
          var allResponse = JSON.parse(response);
          var applicants = allResponse.applicants;
          allApplicants = applicants;
          displayApplicants(applicants);
          generateFilters();

          stepQuestions = allResponse.questions;
          interviewProfile = allResponse.interview;
          jobrowid = allResponse.jobrowid;

        },
        error: function(xhr, status, error) {
          console.error("Error fetching applicants:", error);
        }
      });
    }

    function displayApplicants(applicants) {
      var container = $("#applicantsdiv");
      container.html("");

      document.getElementById("applicantsdiv").innerHTML = "";

      applicants.forEach(applicant => {
        container.append(`<li><div class="d-flex alig-items-center justify-content-between">
                                                <div class="mg-x-15 mg-xs-x-20">
                                                    <h6 class="mg-b-2 tx-inverse tx-14">
                                                        ${applicant.fname} ${applicant.mname} ${applicant.lname}
                                                    </h6>
                                                    <p class="mg-b-0 tx-12">${applicant.email}</p>
                                                </div><!-- media-body -->
                                                <a href="#" onclick="showProfile(${applicant.id})" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                                                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                                                </a>
                                            </div></li>`);
      });
    }

    function countApplicantsByFilter(filterType, value) {
      return allApplicants.filter(app => {
        if (filterType === 'Age') {
          if (value === "18-30") return app.age >= 18 && app.age <= 30;
          if (value === "31-40") return app.age >= 31 && app.age <= 40;
          if (value === "41 and above") return app.age > 40;
        }
        return app[filterType.toLowerCase().replace(/ /g, "")] === value;
      }).length;
    }

    function generateFilters() {

      var filters = {
        "Gender": ["Male", "Female"],
        "CV Source": ["Direct", "Uploaded"],
        "Age": ["18-30", "31-40", "41 and above"],
        "Years of Experience": ["0-2", "3-6", "7-10", "10 and above"],
        "Degree": ["B.sc", "HND", "OND", "NCE", "SSCE", "FSLC", "Others"],
        "Graduation Grade": ["First class", "2nd Class Upper", "2nd Class Lower", "Pass"],
        "Willing to Relocate": ["Yes", "No"],
        "Marital Status": ["Single", "Married", "Divorced"]
      };

      var filterDiv = document.getElementById("filtersDiv");
      filterDiv.innerHTML = "";

      Object.keys(filters).forEach(category => {
        var categoryDiv = document.createElement("div");
        categoryDiv.classList.add("filter-category");
        categoryDiv.innerHTML = `<h4>${category}</h4>`;

        filters[category].forEach(value => {
          var count = countApplicantsByFilter(category, value);
          var div = document.createElement("div");
          div.classList.add("filter-item");
          div.innerHTML = `<label><input type="checkbox" name="${category}" value="${value}" onchange="applyFilters()"> ${value} (${count})</label>`;
          categoryDiv.appendChild(div);
        });

        filterDiv.appendChild(categoryDiv);
      });
    }

    function applyFilters() {

      //alert("Applicants: " + JSON.stringify(allApplicants, null, 2));

      // Get all selected filters
      var selectedFilters = {};
      document.querySelectorAll('#filtersDiv input:checked').forEach(input => {
        if (!selectedFilters[input.name]) {
          selectedFilters[input.name] = [];
        }
        selectedFilters[input.name].push(input.value);
      });

      //console.log("Selected Filters:", selectedFilters);
      //alert("Filters selected: " + JSON.stringify(selectedFilters)); // 🔍 Debugging alert

      // Field mapping
      var fieldMapping = {
        "Gender": "gender",
        "Age": "dateofb",
        "Degree": "degree",
        "Marital Status": "marital_status",
        "Years of Experience": "experience",
        "CV Source": "cv_source",
        "Graduation Grade": "grad_grade",
        "Willing to Relocate": "relocate"
      };

      // Filtering applicants based on selected filters
      var filteredApplicants = allApplicants.filter(applicant => {
        return Object.keys(selectedFilters)
          .filter(category => selectedFilters[category].length > 0) // Ignore empty categories
          .every(category => {
            var fieldName = fieldMapping[category];

            if (!fieldName) {
              //console.warn(`No mapping found for category: ${category}`);
              return true; // Ignore unmapped categories
            }

            // Special case: Age filtering
            if (category === "Age") {
              if (!applicant.dateofb) return false; // Skip applicants with missing age

              var birthYear = new Date(applicant.dateofb).getFullYear();
              var currentYear = new Date().getFullYear();
              var age = currentYear - birthYear;

              return selectedFilters["Age"].some(range => {
                if (range === "18-30") return age >= 18 && age <= 30;
                if (range === "31-40") return age >= 31 && age <= 40;
                if (range === "41 and above") return age >= 41;
                return false;
              });
            }

            // General filtering for other categories
            var applicantValue = applicant[fieldName];
            if (!applicantValue) return false; // Skip if the value is missing

            return selectedFilters[category].includes(applicantValue);
          });
      });

      //console.log("Filtered Applicants:", filteredApplicants);
      //alert("Filtered Applicants Count: " + filteredApplicants.length); // 🔍 Debugging alert

      // Update the UI with the filtered applicants
      displayApplicants(filteredApplicants);
    }

    function showProfile(proileid) {
      var container = $("#profilediv");
      container.html("");
      document.getElementById("profilediv").innerHTML = "";

      var filteredApplicants = allApplicants.filter(applicant => applicant.id === proileid);

      filteredApplicants.forEach(proileData => {
        container.append(`<div class="card">
                            <div class="card-body">
                                <h6 class="mg-b-3"><a href="" class="tx-dark">${proileData.fname} ${proileData.mname} ${proileData.lname} ( ${proileData.applicant_id} )</a></h6>
                                <span class="tx-12">Applied: ${proileData.date_created}</span>
                            </div>
                            <img class="card-img-bottom img-fluid" src="../uploads/applicants/${proileData.profile_image}" alt="Image">
                        </div>
                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-0">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-20">Contact Information</h6>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Phone Number</label>
                            <p class="tx-info mg-b-15">${proileData.phone}</p>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">EmailAddress</label>
                            <p class="tx-inverse mg-b-15">${proileData.email}</p>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Home Address</label>
                            <p class="tx-inverse mg-b-15">${proileData.address1}</p>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">OfficeAddress</label>
                            <p class="tx-inverse mg-b-50">${proileData.address2}</p>
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-20">Other Information</h6>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Degree</label>
                            <p class="tx-inverse mg-b-15">${proileData.degree} in ${proileData.course_study}</p>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Graduation Grade</label>
                            <p class="tx-inverse mg-b-15">${proileData.grad_grade}</p>
                            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Years of Experience</label>
                            <p class="tx-inverse mg-b-50">${proileData.experience} years</p>
                            <button class="btn btn-primary mg-b-20" onclick="openInterviewModal('${proileData.job_id}','${proileData.applicant_id}','${proileData.applicant_step}')">INTERVIEW NOTE</button>
                            <button class="btn btn-info mg-b-20" onclick="showDocument('${proileData.job_id}','${proileData.applicant_id}','${proileData.id}')">VIEW CV / DOCUMENTS</button>
                            <button class="btn btn-success mg-b-20" onclick="showApplication('${proileData.job_id}','${proileData.applicant_id}')">VIEW APPLICATION</button>
                            <button class="btn btn-warning" onclick="showGrade('${proileData.job_id}','${proileData.applicant_id}','${proileData.applicant_step}','${proileData.id}')">GRADE STEP</button>
                        </div>`);
      });
    }

    function openInterviewModal(jobid, appid, step) {
      if (!interviewProfile || !stepQuestions || stepQuestions.length === 0) {
        alert('Interview profile or questions are not available.');
        return;
      }

      document.getElementById("interviewTitle").innerText = interviewProfile[0].template_name;
      document.getElementById("interviewDescription").innerText = interviewProfile[0].template_desc;
      document.getElementById("job_interview_id").value = jobid;
      document.getElementById("job_applicant_id").value = appid;
      document.getElementById("job_step").value = step;

      var questionsContainer = document.getElementById("interviewQuestions");
      questionsContainer.innerHTML = "";

      stepQuestions.forEach((q, index) => {
        var questionId = `question${index}`;
        var inputField = q.response_type === "Rating" ?
          `<select class='form-control' name='rate[]'><option value="">Select Rating</option>${Array.from({ length: 10 }, (_, i) => ` < option value = "${i + 1}" > $ {
            i + 1
          } < /option>`).join('')}</select > ` :
          ` < textarea class = 'form-control'
        placeholder = 'Enter review here'
        name = 'rate[]' > < /textarea>`;

        var questionHtml = `
                <div class="card mg-b-10">
                    <div class="card-header bg-info text-white" id="heading${index}">
                      <a href="javascript:;" data-toggle="collapse" data-target="#${questionId}" aria-expanded="true" class"text-white">
                        <h5 class="mb-0 text-white">
                          ${q.question_name}
                        </h5>
                      </a>
                    </div>
                    <div id="${questionId}" class="collapse" data-parent="#interviewQuestions">
                        <div class="card-body">
                          <div class="row mg-t-20">
                          <input type="hidden" name="questions[]" value="${q.id}">
                            <div class="col-8">${q.description}</div>
                            <div class="col-4">${inputField}</div>
                          </div>
                        </div>
                    </div>
                </div>`;

        questionsContainer.innerHTML += questionHtml;
      });

      $('#interviewModal').modal('show');
    }

    function showDocument(jobid, applicantid, rowid) {
      var type = 'id';
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("filediv").innerHTML = this.responseText;
          $('#documentsModal').modal('show');
        }
      };
      xmlhttp.open("GET", "get_application_docs.php?job_id=" + rowid + "&type=" + type, true);
      xmlhttp.send();
    }

    function showApplication(jobid, applicantid) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicationDetails").innerHTML = this.responseText;
          $('#viewApplicationModal').modal('show');
        }
      };
      //xmlhttp.open("GET", "test4.php?job_id=" + jobId + "&type=" + type, true);
      xmlhttp.open("GET", "job_application_details.php?jobid=" + jobid + "&applicantid=" + applicantid, true);
      xmlhttp.send();

      //$('#viewApplicationModal').modal('show');
    }

    function showGrade(jobid, applicantid, step, applicationid) {
      document.getElementById("job_interview_id2").value = jobid;
      document.getElementById("job_applicant_id2").value = applicantid;
      document.getElementById("job_step2").value = step;
      document.getElementById("applicationid2").value = applicationid;
      document.getElementById("job").value = jobrowid;

      $('#gradeModal2').modal('show');
    }

    function removeMember(jobId, member, rowid) {
      var text = "Are you sure you want to Remove this Team Member?";
      if (confirm(text) == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            showPage("job_details.php?jobid=" + rowid + "&game=team");
          }
        };
        xmlhttp.open("GET", "jobmanagementgo.php?deleteam=" + member + "&jobid=" + jobId, true);
        xmlhttp.send();
      }
    }

    function showteamChange(jobid) {
      document.getElementById("teamrowid").value = jobid;

      $('#newRequisitionModalTeam').modal('show');
    }
  </script>

  <script>
    function toggleTextColor(element) {
      var links = document.querySelectorAll('.nav-link');
      links.forEach(link => {
        link.classList.remove('text-dark');
        link.classList.add('text-white');
      });
      element.classList.remove('text-white');
      element.classList.add('text-dark');
    }

    function showTab(game) {
      var links = document.querySelectorAll('.tab-pane');
      var tabs = document.querySelectorAll('.jobnav');
      var myDiv = document.getElementById(game);
      var myDiv2 = document.getElementById(game + 'tab');

      links.forEach(link => {
        link.classList.remove('show', 'active');
      });

      tabs.forEach(tab => {
        tab.classList.remove('active');
      });

      myDiv.classList.add('show', 'active');
      myDiv2.classList.add('active');
    }
  </script>


</body>

</html>