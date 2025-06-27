<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

if (isset($_POST['submit'])) {
  // Prevent undefined variable warning on first page load
  $sendername = $_POST['sendername'] ?? '';
  $accountname = $_POST['accountname'] ?? '';
  $apiaddress = $_POST['apiaddress'] ?? '';
  $pa1 = $_POST['pa1'] ?? '';
  $pa2 = $_POST['pa2'] ?? '';
  $pa3 = $_POST['pa3'] ?? '';
  $pa4 = $_POST['pa4'] ?? '';
  $pa4v = $_POST['pa4v'] ?? '';
  $pa5 = $_POST['pa5'] ?? '';
  $pa5v = $_POST['pa5v'] ?? '';
  $pa6 = $_POST['pa6'] ?? '';
  $pa6v = $_POST['pa6v'] ?? '';
  $pa7 = $_POST['pa7'] ?? '';
  $pa7v = $_POST['pa7v'] ?? '';
  $pa8 = $_POST['pa8'] ?? '';
  $pa8v = $_POST['pa8v'] ?? '';
  $pa9 = $_POST['pa9'] ?? '';
  $pa9v = $_POST['pa9v'] ?? '';
  $pa10 = $_POST['pa10'] ?? '';
  $pa10v = $_POST['pa10v'] ?? '';


  $sqlsdd = "INSERT INTO smsservers (companyid, storeid, apiaddress, pa1, pa2, pa3, pa4, pa4v, pa5, pa5v, pa6, pa6v, pa7, pa7v, pa8, pa8v, pa9, pa9v, pa10, pa10v, pdefault, accountname, sendername) VALUES ('$companyid', '$storeid', '$apiaddress', '$pa1', '$pa2', '$pa3', '$pa4', '$pa4v', '$pa5', '$pa5v', '$pa6', '$pa6v', '$pa7', '$pa7v', '$pa8', '$pa8v', '$pa9', '$pa9v', '$pa10', '$pa10v', 'No', '$accountname', '$sendername')";

  if (mysqli_query($conn, $sqlsdd)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "SMS Server", "success", '', '', $_SESSION['logged']);

    $status = "<div class='alert alert-success mb-2' role='alert'>
    <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'> Gateway Inserted Successfully
    </div>";
  } else {
    $status = "<div class='alert alert-warning mb-2' role='alert'>
    <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Gateway NOT Inserted, try again.
    </div>";
  }
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

    .ui-datepicker {
      z-index: 99999 !important;
    }
  </style>

  <script langauge="javascript">
    function reload(form) {
      var month_val = document.getElementById('dateMask').value; // collect month value    // collect year value
      self.location = 'attendance.php?date=' + month_val; // reload the page
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
      <i class="icon icon ion-ios-compose-outline"></i>
      <div>
        <h4>SMS Management</h4>
        <p class="mg-b-0">User List - Send SMS.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">

      <?php echo $status; ?>

      <form name="myform" class="form" action="sms2.php" method="POST" onsubmit="return CountCheck();">
        <div class="row">

          <div class="col-md-4">
            <div class="card bd-0">
              <div class="card-header bg-dark ">
                <h4 class="card-title text-white">Add SMS Configuration</h4>
              </div><!-- card-header -->
              <?php include("" . __DIR__ . "/resqu.php"); ?>
              <div class="card-body bd bd-t-0 rounded-bottom">
                <div class="form-body">

                  <div class="form-group">
                    <label for="accountname"><strong>Account Name</strong></label>
                    <input type="text" id="accountname" name="accountname" class="form-control" placeholder="Account Name" required>

                  </div>

                  <div class="form-group">
                    <label for="sendername"><strong>Sender Name</strong></label>
                    <input type="text" id="sendername" name="sendername" class="form-control" placeholder="Sender Name" value="<?php echo @$sendername; ?>" required>

                  </div>

                  <div class="form-group">
                    <label for="apiaddress"><strong>API Address</strong></label>
                    <input type="text" id="apiaddress" name="apiaddress" class="form-control" placeholder="API Address Here" required>

                  </div>

                  <div class="form-group">
                    <label for="pa1"><strong>Sender Parameteer</strong></label>
                    <input type="text" id="pa1" name="pa1" class="form-control" placeholder="Sender Parameteer" required>

                  </div>

                  <div class="form-group">
                    <label for="pa2"><strong>Recipient Parameter</strong></label>
                    <input type="text" id="pa2" name="pa2" class="form-control" placeholder="Recipient Parameter" required>

                  </div>

                  <div class="form-group">
                    <label for="pa3"><strong>Message Parameter</strong></label>
                    <input type="text" id="pa3" name="pa3" class="form-control" placeholder="Message Parameter" required>

                  </div>
                  ======
                  <div class="form-group">
                    <input type="text" name="pa4" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa4v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa5" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa5v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa6" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa6v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa7" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa7v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa8" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa8v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa9" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa9v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-group">
                    <input type="text" name="pa410" class="form-control" placeholder="Extra Parameter Here">
                    <input type="text" name="pa10v" class="form-control" placeholder="Extra Value Here">

                  </div>

                  <div class="form-actions center">
                    <button type="submit" name="submit" class="btn btn-primary">
                      <i class="icon-check2"></i> Add SMS Configuration
                    </button>
                  </div>

                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
          <div class="col-md-8">

            <div>

              <h3>Gateway Configuration List</h3>

              <div class="table-wrapper mg-t-30">
                <table id="datatable1" class="table table-bordered display responsive ">
                  <thead class="thead-colored thead-dark">
                    <tr>
                      <th>Account Name</th>
                      <th>API Address</th>
                      <th>Default</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $TRecord = mysqli_query($conn, "SELECT * FROM smsservers");
                    $i = 1;
                    while ($row = mysqli_fetch_array($TRecord, MYSQLI_NUM)) {
                    ?>
                      <tr>
                        <td><?php echo $row[22]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[21]; ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->

          </div><!-- col 8 -->

        </div><!-- row -->
      </form>

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
  <script src="dataTables.buttons.min.js"></script>
  <script src="jszip.min.js"></script>
  <script src="pdfmake.min.js"></script>
  <script src="vfs_fonts.js"></script>
  <script src="buttons.html5.min.js"></script>
  <script src="buttons.print.min.js"></script>
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