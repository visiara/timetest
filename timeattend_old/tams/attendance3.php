<?php
include "" . __DIR__ . "/header.php";


$did = '';

//// Settings, change this to match your requirment //////
$start_year = 2020; // Starting year for dropdown list box
$end_year = date("Y");  // Ending year for dropdown list box
////// end of settings ///////////

if (isset($_GET['employeeid'])) {
  $employeeid5 = $_GET['employeeid'];
  $monthm = $_GET['month'];
  $yearm = $_GET['year'];

  if ($user_role == "3") {
    $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE employeeid = '$employeeid5' AND status = 'Active' AND company='$companyMain' AND department='$loggeddepartment'");
  } else {
    $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE employeeid = '$employeeid5' AND status = 'Active' AND company='$companyMain'");
  }

  while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
    $eid = $huserb1d5["id"];
    $employeeid = $huserb1d5["employeeid"];
    $fname = $huserb1d5["fname"];
    $mname = $huserb1d5["mname"];
    $lname = $huserb1d5["lname"];
  }
  $thename = " - " . $lname . " " . $mname . " " . $fname;
  $cod = strtotime("$yearm-$monthm-01");
  $dd = date("F Y", $cod);
} else {
  $thename = "";
  $dd = date("F Y");
}

$thestatus = $dd . $thename;

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
  </style>

  <script langauge="javascript">
    function reload(form) {
      var month_val = document.getElementById('month').value; // collect month value
      var year_val = document.getElementById('year').value;
      var employeeid = document.getElementById('employeeid').value; // collect year value
      self.location = 'attendance3.php?month=' + month_val + '&year=' + year_val + '&employeeid=' + employeeid; // reload the page
    }
  </script>
  <style type="text/css">
    table.main {
      width: 100%;
      border: 1px solid black;
      background-color: #9dffff;
    }

    table.main td {
      padding: 20px;
      font-family: verdana, arial, helvetica, sans-serif;
      font-size: 13px;
    }

    table.main th {
      border-width: 1px 1px 1px 1px;
      padding: 10px;
      background-color: #000000;
      color: #ffffff;
    }

    table.main a {
      TEXT-DECORATION: none;
    }

    table,
    td,
    th {
      border: 1px solid #ffffff
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
      <i class="icon icon ion-ios-contact-outline"></i>
      <div>
        <h4>User Management</h4>
        <p class="mg-b-0">User Management Panel - User Attendance.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <h4 class="mg-b-0"><?php echo $thestatus; ?></h4>
        <div class="table-wrapper mg-t-15">
          <?php
          @$month = $_GET['month'];
          @$year = $_GET['year'];
          @$employeeid = strip_tags($_GET['employeeid']);

          if (!($month < 13 and $month > 0)) {
            $month = date("m");  // Current month as default month
          }

          if (!($year <= $end_year and $year >= $start_year)) {
            $year = date("Y");  // Set current year as default year 
          }

          $d = 2; // To Finds today's date
          //$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
          $no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year); //calculate number of days in a month

          $j = date('w', mktime(0, 0, 0, $month, 1, $year)); // This will calculate the week day of the first day of the month
          //echo $j;
          $adj = str_repeat("<td bgcolor='#cfcfcfc'>*&nbsp;</td>", $j);  // Blank starting cells of the calendar 
          $blank_at_end = 42 - $j - $no_of_days; // Days left after the last day of the month
          if ($blank_at_end >= 7) {
            $blank_at_end = $blank_at_end - 7;
          }
          $adj2 = str_repeat("<td bgcolor='#cfcfcfc'>*&nbsp;</td>", $blank_at_end); // Blank ending cells of the calendar

          /// Starting of top line showing year and month to select ///////////////

          echo "<table class='main'><td colspan=2 >

<select name=month value='' onchange=\"reload(this.form)\" id=\"month\" class='form-control'>
<option value=''>Select Month</option>";
          for ($p = 1; $p <= 12; $p++) {

            $dateObject   = DateTime::createFromFormat('!m', $p);
            $monthName = $dateObject->format('F');
            if ($month == $p) {
              echo "<option value=$p selected>$monthName</option>";
            } else {
              echo "<option value=$p>$monthName</option>";
            }
          }
          echo "</select>";
          echo "";

          echo " </td>";
          echo "<td colspan=2>";
          echo "<select name=year value='' onchange=\"reload(this.form)\" id=\"year\" class='form-control'>Select Year</option>";
          for ($i = $start_year; $i <= $end_year; $i++) {
            if ($year == $i) {
              echo "<option value='$i' selected>$i</option>";
            } else {
              echo "<option value='$i'>$i</option>";
            }
          }
          echo "</select>";
          echo "</td>";
          echo "<td colspan=3>
<input class='form-control' type='text' name='employeeid' id='employeeid' placeholder='User Id' value=$employeeid>
</td>";
          echo "</tr><tr>";
          echo "<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";

          ////// End of the top line showing name of the days of the week//////////

          if ($month > 9) {
            $month = $month;
          } else {
            $month = "0" . $month;
          }

          //////// Starting of the days//////////
          for ($i = 1; $i <= $no_of_days; $i++) {

            if ($i > 9) {
              $i = $i;
            } else {
              $i = "0" . $i;
            }

            $pv = "'$month'" . "," . "'$i'" . "," . "'$year'";

            $ddatex = $year . "-" . $month . "-" . $i;
            $ddate = date("Y-m-d", strtotime($ddatex));

            if ($user_role == "3") {
              $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddatex' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='on' AND employeedept='$loggeddepartment'");
            } else {
              $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddatex' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active' AND attendance='on'");
            }

            $huy = mysqli_num_rows($hu);

            while ($hug = mysqli_fetch_array($hu)) {
              $did = $hug["id"];
            }

            if ($huy > 0) {
              $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success' style='margin-left: 45px;'></i>";
            } else {
              $ego = "<i class='icon ion-close alert-icon tx-25 tx-danger' style='margin-left: 45px;'></i>";
            }

            echo $adj . "<td><a href='#' onclick=\"post_value2($did);\" data-toggle=\"modal\" data-target=\"#editemployee\">$i</a>"; // This will display the date inside the calendar cell
            echo " $ego </td>";
            $adj = '';
            $j++;
            if ($j == 7) {
              echo "</tr><tr>"; // start a new row
              $j = 0;
            }
          }
          echo $adj2;   // Blank the balance cell of calendar at the end 

          echo "</tr></table>";

          ?>
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
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script>
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>

  <script>
    function Edit(str) {
      if (str.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "editemployee.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function post_value(mm, dt, yy) {
      //opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
      // cheange the above line for different date format
      // self.close();
      var str2 = "<?php echo $companyMain; ?>";
      var str = document.getElementById('employeeid').value;
      var d = yy + "-" + mm + "-" + dt;
      if (str.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "viewattendance.php?q=" + str + "&d=" + d + "&com=" + str2, true);
        xmlhttp.send();
      }
    }

    function post_value2(d) {
      var str2 = "<?php echo $companyMain; ?>";

      if (str2.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pasteedit").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "viewattendance1.php?q=" + d, true);
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
        },
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

  <!-- Edit employee -->
  <div id="editemployee" class="modal fade effect-newspaper">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">View User Attendance Information</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-0">
          <div class="row no-gutters" id="pasteedit">

          </div><!-- row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


</body>

</html>