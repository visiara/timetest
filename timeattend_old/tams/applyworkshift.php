<?php
include "" . __DIR__ . "/header.php";


if (!empty($_POST['assp'])) {
  $workshift = $_POST['workshift'];
  $thedate = date("Y-m-d");

  // Check if any employee is selected 
  if (isset($_POST["employee"])) {
    // Retrieving each selected employee and process
    foreach ($_POST['employee'] as $employee) {

      // Update workshift in employEe table
      $saveinsert2 = "UPDATE employee SET workshift='$workshift' WHERE id='$employee'";
      mysqli_query($conn, $saveinsert2);

      //log event
      log_audit_event($uid, "UPDATE", "Updated record: $employee", "Employee Workshift", "success", '', '', $_SESSION['logged']);
    } //end employye post  
  }

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Workshift Applied Successfully.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

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

  <link rel="stylesheet" type="text/css" href="../multi.min.css" />
  <link rel="stylesheet" type="text/css" href="../daterangepicker.css" />

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
  </style>
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <?php
  include '../auth/admin_header.php';

  include "" . __DIR__ . "/adminHeader.php";
  include "" . __DIR__ . "/sidebar.php";
  ?>
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <?php

  ?>
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <?php
  include "" . __DIR__ . "/rightSidebar.php";
  ?>
  <!-- ########## END: RIGHT PANEL ########## --->

  <!-- ########## START: MAIN PANEL ########## -->
  <!-- br-mainpanel -->
  <div>
    <div class="br-pagetitle">
      <i class="icon icon ion-ios-time-outline"></i>
      <div>
        <h4>Workshift Management</h4>
        <p class="mg-b-0">User Work Schedule Management - All Users.</p>
      </div>
    </div><!-- d-flex -->

    <div class=" pd-x-20 pd-sm-x-30 mx-wd-1350">

      <div class="row row-sm mg-t-20">
        <div class="col-lg-12">
          <div class="card bd-0 shadow-base widget-14 ht-100p">
            <div class="card-body">
              <div class="card-title">User Work Schedule</div>
              <p class="mg-b-40">Please note Schedule must be sumitted not later than <b>1 day</b> before start of shift period.</p>
              <?php echo $status; ?>
              <form id="assemployeeshow" action="" method="POST">
                <div class="row no-gutters">
                  <div class="col-lg-12 bg-white">
                    <div class="pd-0">
                      <input name="assp" value="1" type="hidden">
                      <div class=" mg-b-20">
                        <div class="form-group mg-b-0-force">
                          <label>Work Schedule: <span class="tx-danger">*</span></label>
                          <select class="form-control select2 " name="workshift" data-placeholder="Choose Work Schedule" required>
                            <option value="">Choose Work Schedule</option>
                            <?php
                            $intload2 = mysqli_query($conn, "SELECT * FROM workshift WHERE company='$companyMain' ORDER BY id asc");
                            while ($intload2a = mysqli_fetch_array($intload2)) {
                              $inid2 = $intload2a["id"];
                              $iname2 = $intload2a["shiftname"];
                            ?>
                              <option value="<?php echo $inid2; ?>"><?php echo $iname2; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div class=" mg-b-0">
                        <div class="form-group mg-b-0-force">
                          <label>Select User: <span class="tx-danger">*</span></label>
                          <select class="form-control select2" id="fruit_select" name="employee[]" data-placeholder="Select User(s)" multiple required>
                            <?php
                            if ($user_role == "3") {
                              $intload3vb = mysqli_query($conn, "SELECT * FROM employee WHERE status='Active' AND dele='0' AND company='$companyMain' AND department='$loggeddepartment' ORDER BY lname asc");
                            } else {
                              $intload3vb = mysqli_query($conn, "SELECT * FROM employee WHERE status='Active' AND dele='0' AND company='$companyMain' ORDER BY lname asc");
                            }

                            while ($intload3avb = mysqli_fetch_array($intload3vb)) {
                              $inid3vb = $intload3avb["id"];
                              $lname3vb = $intload3avb["lname"];
                              $mname3vb = $intload3avb["mname"];
                              $fname3vb = $intload3avb["fname"];
                              $employeeid3vb = $intload3avb["employeeid"];
                            ?>
                              <option value="<?php echo $inid3vb; ?>"><?php echo $lname3vb . " " . $mname3vb . " " . $fname3vb . " ( $employeeid3vb )"; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div><!-- form-group -->
                      </div>
                    </div>
                  </div>
                </div><!-- row -->
              </form>

            </div><!-- card-body -->
            <div class="card-footer mg-t-auto">
              <button type="submit" class="btn btn-info btn-oblong bd-0 " form="assemployeeshow">Submit</button>
              <button type="reset" class="btn btn-secondary btn-oblong bd-0 bg-gray-400 mg-l-5" form="assemployeeshow">Reset</button>
            </div><!-- card-footer -->
          </div><!-- card -->
        </div><!-- col-12 -->
      </div>

    </div>

    <!--  -->

    <?php

    // BE IN ALL PAGES
    include '../auth/admin_footer.php';

    ?>

  </div>
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <!-- <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script> -->
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../lib/moment/min/moment.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>
  <script src="../lib/highlightjs/highlight.pack.min.js"></script>
  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>
  <script type="text/javascript" src="../daterangepicker.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script src="../multi.min.js"></script>

  <script>
    $('#atype').change(function() {
      var b = $(this).val()
      ass(b);
    });
  </script>
  <script>
    var select = document.getElementById("fruit_select");
    multi(select, {
      enable_search: true
    });
  </script>

  <script type="text/javascript">
    $(function() {

      $('input[name="dates"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Clear'
        }
      });

      $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
      });

      $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
      });

    });
  </script>

  <script>
    function ass(str) {
      if (str.length == 0) {
        document.getElementById("assedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("assedit").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "applyleave2.php?q=" + str, true);
        xmlhttp.send();
      }
    }
  </script>

  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Input Masks
      $('#dateMask').mask('9999-99-99');
      $('#phoneMask').mask('(999) 999-9999');

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

      minimizeMenu();

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
</body>

</html>