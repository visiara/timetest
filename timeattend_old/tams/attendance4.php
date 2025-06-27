<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

$dateMain = isset($_GET['date']) ? $_GET['date'] : '';
$dateInput = empty($dateMain) ? date("Y-m-d") : explode(" : ", $dateMain);
$date1x = empty($dateMain) ? date("Y-m-d", strtotime("-29 days")) : trim(strip_tags($dateInput[0]));
$date2x = empty($dateMain) ? date("Y-m-d") : trim(strip_tags($dateInput[1]));

$date1 = strtotime("$date1x 00:00:00");
$date2 = strtotime("$date2x 23:59:59");

$bandate = date("l, d F Y", strtotime("$date1x")) . " - " . date("l, d F Y", strtotime("$date2x"));
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
  <link href="../lib/timepicker/jquery.timepicker.css" rel="stylesheet">
  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <!-- export buttons -->
  <link href="buttons.dataTables.min.css" rel="stylesheet">
  <!-- export buttons end -->

  <!-- daterangepicker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- daterangepicker end -->

  <!-- Bracket CSS -->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href=".../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href=".../assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/admin.css?rand=<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/styles.css?rand=<?php echo rand(); ?>">

  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .ui-datepicker {
      z-index: 99999 !important;
    }
  </style>

  <script>
    function reload(form) {
      var month_val = document.getElementById('dateMask').value; // collect month value    // collect year value
      self.location = 'attendance4.php?date=' + month_val; // reload the page
    }
  </script>

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
      <i class="icon icon ion-clipboard"></i>
      <div>
        <h4>Audit Management</h4>
        <p class="mg-b-0">Audit Management Panel - audit log.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <h5 class="mg-b-0"><?php echo $bandate; ?></h5>
        <div class="table-wrapper mg-t-30">
          <table id="datatable1" class="table table-bordered display responsive ">
            <thead class="thead-colored thead-dark">
              <tr>
                <th colspan=9>
                  <div class="d-flex align-items-center justify-content-start">
                    <input class="form-control " type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD">
                    <button class="btn btn-primary pl-5 pr-5" onclick="reload(this.form)">Filter</button>
                  </div>
                </th>
              </tr>
              <tr>
                <th>ID</th>
                <th>Session ID</th>
                <th>User ID</th>
                <th>Event Type</th>
                <th>Action Performed</th>
                <th>Object Affected</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>Timestamp</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';

              $huserbd5 = mysqli_query($conn, "SELECT * FROM audit_log WHERE companyid='$companyMain' AND thetime >= '$date1' AND thetime <= '$date2' ORDER BY id DESC");

              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["user_id"];
                $event_type = $huserb1d5["event_type"];
                $action_performed = $huserb1d5["action_performed"];
                $object_affected = $huserb1d5["object_affected"];
                $statusx = ucfirst($huserb1d5["status"]);
                $ip_address = $huserb1d5["ip_address"];
                $timestamp = $huserb1d5["timestamp"];
                $thesses = $huserb1d5["sessid"];
                $savetime = $huserb1d5["thetime"];
                $daytimeOut = date('Y-m-d H:i:s', $savetime);

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $thesses; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $event_type; ?></td>
                  <td><?php echo $action_performed; ?></td>
                  <td><?php echo $object_affected; ?></td>
                  <td><?php echo $statusx; ?></td>
                  <td><?php echo $ip_address; ?></td>
                  <td><?php echo $daytimeOut; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->


      </div><!-- br-section-wrapper -->
    </div><!--  -->

    <?php

    // BE IN ALL PAGES
    include '../auth/admin_footer.php';

    ?>

  </div>
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../lib/moment/min/moment.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>
  <script src="../lib/highlightjs/highlight.pack.min.js"></script>
  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

  <!-- export buttons -->
  <script src="../buttons/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.flash.min.js" type="text/javascript"></script>
  <script src="../buttons/jszip.min.js" type="text/javascript"></script>
  <script src="../buttons/pdfmake.min.js" type="text/javascript"></script>
  <script src="../buttons/vfs_fonts.js" type="text/javascript"></script>
  <script src="../buttons/buttons.html5.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.print.min.js" type="text/javascript"></script>
  <!-- export buttons end -->

  <script src="jquery.maskedinput.js"></script>
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <!-- daterangepicker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- daterangepicker end -->

  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: false,
        dom: 'lBfrtip',
        buttons: [
          'csv', 'excel', 'pdf'
        ],
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ ',
          //lengthMenu: '_MENU_ items/page',
        }
      });

      // Input Masks
      //$('#dateMask').mask('9999-99-99');
      //$('#phoneMask').mask('(999) 999-9999');

      // Datepicker
      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'yy-mm-dd',
      });

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>

  <script type="text/javascript">
    $(function() {

      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end) {
        //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //$('#dateMask').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#dateMask').val(start.format('YYYY-MM-DD') + ' : ' + end.format('YYYY-MM-DD'));
      }

      $('#dateMask').daterangepicker({
        showDropdowns: true,
        startDate: start,
        endDate: end,
        linkedCalendars: false,
        locale: {
          format: 'YYYY-MM-DD',
          separator: " : ",
        },
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);

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