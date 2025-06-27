<?php
include "" . __DIR__ . "/mailfunction.php";
include "" . __DIR__ . "/header.php";


if (!empty($_POST['assp'])) {
  $ltype = $_POST['ltype'];
  $etype = $_POST['etype'];
  $atype = $_POST['atype'];
  $dates = isset($_POST['dates']) ?? $_POST['dates'];
  $dates1 = $_POST['dates1'];
  $dates2 = $_POST['dates2'];
  $thedate = date("Y-m-d");

  // capture date and split
  //$pieces = explode(" - ", $dates);
  //$startdate = trim($pieces[0]);
  //$enddate = trim($pieces[1]);

  $startdate = $dates1;
  $enddate = $dates2;

  // process dates
  $date1 = strtotime("$startdate");
  $date2 = strtotime("$enddate");
  $datediff = (($date2 + 86400) - $date1);
  $nodays = round($datediff / (60 * 60 * 24));

  // Check if any employee is selected 
  if (isset($_POST["employee"])) {
    // Retrieving each selected employee and process
    foreach ($_POST['employee'] as $employee) {

      // pick employee department            
      $hu1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employee' AND company='$companyMain'");
      while ($hug1 = mysqli_fetch_array($hu1)) {
        $department = $hug1["department"];
        $efname = $hug1["fname"];
        $emname = $hug1["mname"];
        $elname = $hug1["lname"];
      }

      // pick leave approval level 
      if ($atype == "1") {
        $hu1k = mysqli_query($conn, "SELECT * FROM leavetype WHERE id = '$ltype' AND company='$companyMain'");
      } else {
        $hu1k = mysqli_query($conn, "SELECT * FROM exemptiontype WHERE id = '$etype' AND company='$companyMain'");
      }
      while ($hug1k = mysqli_fetch_array($hu1k)) {
        $adays = $hug1k["days"];
        $aplevel = $hug1k["plevel"];
      }
      // Update leave and exemption table
      if ($atype == "1") {
        $saveinsert2 = "INSERT INTO leaves (`employeeid`, `department`, `date`, `leavetype`, `startdate`, `enddate`, `nodays`, `createdby`, `authorisedby`, `approvals`, `company`) VALUES ('$employee', '$department', '$thedate', '$ltype', '$startdate', '$enddate', '$nodays', '$uid', '$uid', '$aplevel', '$companyMain')";
        mysqli_query($conn, $saveinsert2);

        //log event
        $dinsert = mysqli_insert_id($conn);
        log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Leaves", "success", '', '', $_SESSION['logged']);

        $subject = "Leave Request Pending Approval";

        $output = '<p>Dear Administrator,</p>';
        $output .= '<p>' . $efname . ' ' . $emname . ' ' . $elname . ' has requested for leave.</p>';
        $output .= '<p>Start Date: ' . $dates1 . '</p>';
        $output .= '<p>End Date: ' . $dates2 . '</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please log on to the panel to review.</p>';
        $output .= "<p><a href=$websiteMain/tams/leaves.php target=_blank>$websiteMain/tams/leaves.php</a></p>";
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 3 day for security reason.</p>';

        $output .= '<p>Thanks,</p>';
        $output .= '<p>' . $siteName . ' Team</p>';

        $body = $output;
      } elseif ($atype == "2") {
        $saveinsert2 = "INSERT INTO exemption (`employeeid`, `department`, `date`, `leavetype`, `startdate`, `enddate`, `nodays`, `createdby`, `authorisedby`, `approvals`, `company`) VALUES ('$employee', '$department', '$thedate', '$etype', '$startdate', '$enddate', '$nodays', '$uid', '$uid', '$aplevel', '$companyMain')";
        mysqli_query($conn, $saveinsert2);

        //log event
        $dinsert = mysqli_insert_id($conn);
        log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Exemption", "success", '', '', $_SESSION['logged']);

        $subject = "Exemption Request Pending Approval";

        $output = '<p>Dear Administrator,</p>';
        $output .= '<p>' . $efname . ' ' . $emname . ' ' . $elname . ' has requested for Exemption.</p>';
        $output .= '<p>Start Date: ' . $dates1 . '</p>';
        $output .= '<p>End Date: ' . $dates2 . '</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please log on to the panel to review.</p>';
        $output .= "<p><a href=$websiteMain/tams/exemptions.php target=_blank>$websiteMain/tams/exemptions.php</a></p>";
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 3 day for security reason.</p>';

        $output .= '<p>Thanks,</p>';
        $output .= '<p>' . $siteName . ' Team</p>';

        $body = $output;
      }

      // send out emails:  $email_to, $subject, $body
      $huserbd5 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department' AND dele = '0' AND company='$companyMain'");
      while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
        $adminhead2 = $huserb1d5["adminhead"];

        $bookpay12 = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$adminhead2'");
        while ($bookpay2 = mysqli_fetch_array($bookpay12)) {
          $email_to = $bookpay2["email"];
        }

        domail($email_to, $subject, $body);
      }
    } //end employye post  
  }

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Leave Applied Successfully.</span>
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
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
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
      <i class="icon icon ion-ios-bookmarks-outline"></i>
      <div>
        <h4>Leave Management</h4>
        <p class="mg-b-0">User Leave Request and Approval Panel - All Users.</p>
      </div>
    </div><!-- d-flex -->

    <div class=" pd-x-20 pd-sm-x-30 mx-wd-1350">

      <div class="row row-sm mg-t-20">
        <div class="col-lg-12">
          <div class="card bd-0 shadow-base widget-14 ht-100p">
            <div class="card-body">
              <div class="card-title">Apply Leave / Exemption to User(s)</div>
              <p class="mg-b-40">Please note leave must be sumitted not later than <b>1 week</b> be start of leave period.</p>
              <?php echo $status; ?>
              <form id="assemployeeshow" action="" method="POST">
                <div class="row no-gutters">
                  <div class="col-lg-12 bg-white">
                    <div class="pd-0">
                      <div class=" mg-b-20">
                        <div class="form-group mg-b-0-force">
                          <label>Assignment Type: <span class="tx-danger">*</span></label>
                          <select class="form-control select2" id="atype" name="atype" data-placeholder="Choose what to assign" required>
                            <option value="">Choose what to assign</option>
                            <option value="1">Apply Leave</option>
                            <option value="2">Apply Exemption</option>
                          </select>
                        </div><!-- form-group -->
                      </div>

                      <div id="assedit">

                      </div>

                      <div class="row mg-b-10">
                        <div class="col-6">
                          <div class="form-group ">
                            <label>Start Date: <span class="tx-danger">*</span></label>
                            <!--<input type="text" id="dates" name="dates" class="form-control" placeholder="YYYY-MM-DD" readonly required>-->
                            <input type="hidden" id="dates3" name="dates3" class="form-control" value="0" required>
                            <input type="text" id="dates1" name="dates1" class="form-control fc-datepicker" placeholder="YYYY-MM-DD" readonly required>
                          </div><!-- form-group -->
                        </div>
                        <div class="col-6">
                          <div class="form-group ">
                            <label>End Date: <span class="tx-danger">*</span></label>
                            <input type="text" id="dates2" name="dates2" class="form-control" placeholder="YYYY-MM-DD" required>
                          </div><!-- form-group -->
                        </div>
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
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
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

  <script>
    function getNodAYS() {
      var monthchange = document.getElementById("thenodays");
      var days = monthchange.options[monthchange.selectedIndex].title;

      document.getElementById("dates3").value = days;
    }
  </script>

  <script type="text/javascript">
    $(function() {

      // Input Masks
      $('#dateMask').mask('9999-99-99');

      $(document).on("focusin", "#dates2", function() {
        $(this).prop('readonly', true);
      });

      $(document).on("focusout", "#dates2", function() {
        $(this).prop('readonly', false);
      });

      // Datepicker
      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'yy-mm-dd',
        onSelect: function(date, datepicker) {
          if (date != "") {
            // get the dates2
            var dates2 = document.getElementById("dates2");

            // get no of days to add to date dates3
            var days2 = document.getElementById("dates3").value;
            if (days2 == 0) {
              alert("Please select Leave or Exemption type first!");
            } else {
              //add the days to date
              var days = document.getElementById("dates3").value - 1;
              var date = new Date(date);
              date.setDate(date.getDate() + days);
              var ddate = moment(date).format("YYYY-MM-DD");

              // set value of dates2
              dates2.value = ddate;
            }

          }
        }
      });

      /*
      $('input[name="dates"]').daterangepicker({
          "maxSpan": {
            "days": days
          },
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
      */

    });
  </script>

  <script>
    function ass(str) {
      var str2 = "<?php echo $companyMain; ?>";
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
        xmlhttp.open("GET", "applyleave2.php?q=" + str + "&com=" + str2, true);
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