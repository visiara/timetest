<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

$dateMain = isset($_GET['date']) ? $_GET['date'] : '';
$dateInput = empty($dateMain) ? date("Y-m-d") : explode(" : ", $dateMain);
$date1 = empty($dateMain) ? date("Y-m-d", strtotime("-29 days")) : strip_tags($dateInput[0]);
$date2 = empty($dateMain) ? date("Y-m-d") : strip_tags($dateInput[1]);
$bandate = date("l, d F Y", strtotime("$date1")) . " - " . date("l, d F Y", strtotime("$date2"));
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
      <i class="icon icon ion-ios-contact-outline"></i>
      <div>
        <h4>User Management</h4>
        <p class="mg-b-0">User Management Panel - User Attendance.</p>
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
                <th class="">ID</th>
                <th class="">User ID</th>
                <th class="">Full name</th>
                <th class="">Active Hrs</th>
                <th class="">Present</th>
                <th class="">Absent</th>
                <th class="">Authorised</th>
                <th class="">Un-Authorised</th>
                <th class="">Total Attendance</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
              while ($compo12 = mysqli_fetch_array($compo1)) {
                $compo = $compo12["deducttime"];
              }

              $x = '0';

              if ($user_role == "3") {
                $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain' AND department='$loggeddepartment'");
              } else {
                $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
              }

              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];

                //hr diffrence
                $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active'");
                $huy = mysqli_num_rows($hu);

                $hourdiff = 0;
                while ($hug = mysqli_fetch_array($hu)) {
                  $timeInseconds = $hug["timeInseconds"];
                  $timeOutseconds = $hug["timeOutseconds"];
                  $timeStatus2 = $hug["attendance"];
                  $etimeOut = $hug["expectedTimeOut"];
                  $aover = $hug["aover"];

                  if ($timeOutseconds == "0" && $timeInseconds != "0") {
                    if ($aover == "1") {
                      $timeOutseconds = ($etimeOut * 1000);
                    } else {
                      $daytimeOut = date('Y-m-d H:i:s', $etimeOut);
                      $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " - $compo hours"));
                      $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);

                      if ($timeOutseconds <= $timeInseconds) {
                        $daytimeOut = date('Y-m-d H:i:s', ($timeInseconds / 1000));
                        $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " + 1 hours"));
                        $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);
                      }
                    }
                  }

                  $hourdiff += (abs(($timeInseconds / 1000) - ($timeOutseconds / 1000)) / 3600);
                }
                $hourdiff = round($hourdiff, 2);

                // total no of days present
                $thu = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='on'");
                $totaldaysP = mysqli_num_rows($thu);

                // total no of days absent
                $thu1 = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='off'");
                $totaldaysA = mysqli_num_rows($thu1);

                // total no of days absent authorised (holiday , leave and exemption)
                $thu12 = mysqli_query($conn, "SELECT * FROM attendance WHERE date >= '$date1' AND date <= '$date2' AND employeeid = '$employeeid' AND company='$companyMain' AND (attendancereport = 'Holiday' OR attendancereport = 'Leave' OR attendancereport = 'Exemption')");
                $totaldaysAT = mysqli_num_rows($thu12);

                // unathorised
                $totaldaysUA = ($totaldaysA - $totaldaysAT);

                // total present
                $totaldaysAll = ($totaldaysP + $totaldaysAT);

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                  <td><?php echo $hourdiff . ' Hours'; ?></td>
                  <td><?php echo $totaldaysP . ' Days'; ?></td>
                  <td><?php echo $totaldaysA . ' Days'; ?></td>
                  <td><?php echo $totaldaysAT . ' Days'; ?></td>
                  <td><?php echo $totaldaysUA . ' Days'; ?></td>
                  <td><?php echo $totaldaysAll . ' Days'; ?></td>
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