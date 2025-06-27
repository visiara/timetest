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
</head>

<body onload="showPage('template2.php');">

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
            onclick="showPage('template2.php')">Email Templates</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab"
            onclick="showPage('template3.php')">Interview Templates Jobs</a></li>
      </ul>
    </div><!-- ht-65 -->
    <div class="br-pagetitle">
      <i class="icon ion-outlet"></i>
      <div>
        <h4>Templates</h4>
        <p class="mg-b-0">Template Management Panel.</p>
      </div>
    </div>

    <div class="">
      <?php echo $status; ?>

      <div id="loading-overlay"><span>Loading...</span></div>

      <div class="row row-sm mg-t-20" id="pageDiv">

      </div><!-- row -->

      <!-- modals -->

      <!-- New email Modal -->
      <div class="modal fade" id="newRequisitionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Template</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="requisitionForm" action="" method="POST">
                <input type="hidden" name="create_requisition" value="1">
                <div class="form-group">
                  <label>Template Name <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="template_name" required>
                </div>

                <div class="form-group">
                  <label>Description<span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="template_desc" required></textarea>
                </div>

                <div class="form-group">
                  <label>Body <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="template_body" required></textarea>
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
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Template</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="requisitionForm2" action="" method="POST">
                <input type="hidden" name="create_requisition2" value="1">
                <div class="form-group">
                  <label>Template Name <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="template_name" required>
                </div>

                <div class="form-group">
                  <label>Description<span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="template_desc" required></textarea>
                </div>

                <div id="questionsContainer" class="questionsContainer"></div>
                <button type="button" class="btn btn-success btn-sm mt-3 addQuestion" id="addQuestion">Add Question</button>

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

      <!-- add questions Modal -->
      <div class="modal fade" id="addquestionsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Questions</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="addQuestionForm" action="" method="POST">
                <input type="hidden" id="add_question" name="add_question" required>

                <div class="questionsContainer"></div>
                <button type="button" class="btn btn-success btn-sm mt-3 addQuestion">Add Question</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="addQuestionForm">Save changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- edit questions Modal -->
      <div class="modal fade" id="editquestionsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content pillo">
            <div class="modal-header">
              <h5 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Questions</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="editQuestionForm" action="" method="POST">
                <input type="hidden" id="edit_question" name="edit_question" required>
                <div id="editQuestionDiv"></div>
                <!--<div class="questionsContainer"></div>
                <button type="button" class="btn btn-success btn-sm mt-3 addQuestion">Add Question</button>-->
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs submitBtn" form="editQuestionForm">Save changes</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- View template Modal -->
      <div class="modal fade" id="viewTemplateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="requisitionForm3" action="" method="POST">
              <div class="modal-header">
                <h5 class="modal-title">Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="applicantList">
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
                <h5 class="modal-title">Template</h5>
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

  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/widgets.js"></script>

  <script>
    $(document).ready(function() {
      //$('#requisitionForm').submit(function (event) {
      $("#requisitionForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'templatego.php',
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
              $("#newRequisitionModal").modal('hide');
              alert(response.message);
              showPage('template2.php');
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

      $("#requisitionForm2").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'templatego.php',
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
              showPage('template3.php');
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

      $("#requisitionForm3").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'templatego.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(response) {
            if (response.status == 1) {
              $("#viewTemplateModal").modal('hide');
              alert(response.message);
              showPage('template2.php');
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
          url: 'templatego.php',
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
              showPage('template3.php');
            } else {
              alert(response.message);
              //$('#messagedetail1').html(response.message);
            }
            hideLoading();
          }
        });
      });

      $("#addQuestionForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'templatego.php',
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
              $("#addquestionsModal").modal('hide');
              alert(response.message);
              showPage('template3.php');
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

      $("#editQuestionForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'templatego.php',
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
              $("#editquestionsModal").modal('hide');
              alert(response.message);
              showPage('template3.php');
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

    });

    function showPage(page) {
      showLoading();
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("pageDiv").innerHTML = this.responseText;
          doTable();
        }

        hideLoading();
      };
      xmlhttp.open("GET", page, true);
      xmlhttp.send();
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

    function viewTemplate(jobId) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("applicantList").innerHTML = this.responseText;
          $('#viewTemplateModal').modal('show');
        }
      };
      xmlhttp.open("GET", "template_view.php?job_id=" + jobId, true);
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
      xmlhttp.open("GET", "template_view2.php?job_id=" + jobId, true);
      xmlhttp.send();
    }

    function deleteTemplate(jobId) {
      var text = "Are you sure you want to DELETE this record?";
      if (confirm(text) == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            showPage('template2.php');
          }
        };
        xmlhttp.open("GET", "templatego.php?dele=" + jobId, true);
        xmlhttp.send();
      }
    }

    function deleteTemplate2(jobId) {
      var text = "Are you sure you want to DELETE this record?";
      if (confirm(text) == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            showPage('template3.php');
          }
        };
        xmlhttp.open("GET", "templatego.php?dele2=" + jobId, true);
        xmlhttp.send();
      }
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

    function addQuestions(jobId) {
      document.getElementById("add_question").value = jobId;
      $(".questionsContainer").html("");
      $('#addquestionsModal').modal('show');
    }

    function editQuestions(jobId) {
      document.getElementById("edit_question").value = jobId;
      document.getElementById("editQuestionDiv").innerHTML = "";

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("editQuestionDiv").innerHTML = this.responseText;
          $('#editquestionsModal').modal('show');
        }
      };
      xmlhttp.open("GET", "template_qupdate.php?job_id=" + jobId, true);
      xmlhttp.send();
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
      'use strict';

      $('#datatable1').DataTable({
        responsive: false,
        dom: 'Brtip',
        paging: true,
        ordering: true,
        info: false,
        search: false,
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
      var questionCount = 0;

      $(document).on("change", ".response-type", function() {
        const parent = $(this).closest(".question-box");
        if ($(this).val() === "Rating") {
          parent.find(".rating-scale").show();
        } else {
          parent.find(".rating-scale").hide();
        }
      });

      $(".addQuestion").click(function() {
        questionCount++;
        var questionHtml = `
                    <div class="question-box border p-3 mb-2">
                        <div class="form-group">
                            <label>Name of Question</label>
                            <input type="text" class="form-control" name="qname[]" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="qdescription[]" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Type of Response</label>
                            <select class="form-control response-type" name="qresponse_type[]" required>
                                <option value="Text">Text</option>
                                <option value="Rating">Rating</option>
                            </select>
                        </div>
                        <div class="form-group rating-scale" style="display: none;">
                            <label>Rating Scale (1 - 100)</label>
                            <input type="number" class="form-control" min="1" max="100" value="10" name="qrating_scale[]">
                        </div>
                        <button type="button" class="btn btn-danger btn-sm remove-question">Delete Question</button>
                    </div>`;

        $(".questionsContainer").append(questionHtml);
      });

      $(document).on("click", ".remove-question", function() {
        $(this).closest(".question-box").remove();
      });
    });
  </script>

</body>

</html>