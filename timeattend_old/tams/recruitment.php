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

<body onload="showPage('recruitmentpage1.php');">

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
            onclick="showPage('recruitmentpage1.php')">Job Requisitions</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab"
            onclick="showPage('recruitmentpage2.php')">Published Jobs</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab"
            onclick="showPage('recruitmentpage3.php')">Applicant Pool</a></li>
      </ul>
    </div><!-- ht-65 -->
    <div class="br-pagetitle">
      <i class="icon ion-person-stalker"></i>
      <div>
        <h4>Recruitment</h4>
        <p class="mg-b-0">Recruitment Management Panel.</p>
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
                  <select class="form-control w-100" id="approval_steps" name="approval_steps[]" data-placeholder="Choose Approval Steps" style="width: 100%;" required multiple>
                    <option value="">-- Choose Steps --</option>
                    <?php $resultstep1 = $conn->query("SELECT * FROM job_steps WHERE step_status = '0' AND company='$companyMain' ORDER BY id Asc");
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
          url: 'recruitmentgo.php',
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
              showPage('recruitmentpage1.php');
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

      $("#requisitionPostForm").on('submit', function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
          type: 'POST',
          url: 'recruitmentgo.php',
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
              $("#postJobModal").modal('hide');
              alert(response.message);
              showPage('recruitmentpage1.php');
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

    //$('.approval_steps').select2({dropdownParent: $(".modal")});
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

</body>

</html>