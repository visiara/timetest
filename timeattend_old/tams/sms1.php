<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

if (isset($_POST['submit'])) {
  $from = addslashes(strip_tags($_POST['sendername']));
  $msg = addslashes(strip_tags($_POST['msg']));

  $pasms = mysqli_query($conn, "SELECT * FROM smsservers WHERE pdefault = 'Yes'");
  while ($pasms1 = mysqli_fetch_array($pasms)) {
    $theid = $pasms1["id"];
    $apiaddress = $pasms1["apiaddress"];
    $pa1 = $pasms1["pa1"];
    $pa2 = $pasms1["pa2"];
    $pa3 = $pasms1["pa3"];
    $pa4 = $pasms1["pa4"];
    $pa4v = $pasms1["pa4v"];
    $pa5 = $pasms1["pa5"];
    $pa5v = $pasms1["pa5v"];
    $pa6 = $pasms1["pa6"];
    $pa6v = $pasms1["pa6v"];
    $pa7 = $pasms1["pa7"];
    $pa7v = $pasms1["pa7v"];
    $pa8 = $pasms1["pa8"];
    $pa8v = $pasms1["pa8v"];
    $pa9 = $pasms1["pa9"];
    $pa9v = $pasms1["pa9v"];
    $pa10 = $pasms1["pa10"];
    $pa10v = $pasms1["pa10v"];
  }

  $sender = rawurlencode($from);
  $SMSText = rawurlencode(stripcslashes(stripcslashes(stripcslashes(stripcslashes($msg)))));

  if (!empty($_POST['chk'])) {
    $checked_count = count($_POST['chk']);

    foreach ($_POST['chk'] as $selected) {

      //echo $selected."</br>";

      $GSM = $selected;

      $GSM = preg_replace("/[^0-9,]/", "", $GSM);

      // build HTTP URL and query
      $request =  "$pa1=" . $sender .
        "&$pa2=" . $GSM .
        "&$pa3=" . $SMSText .
        "&$pa4=" . $pa4v .
        "&$pa5=" . $pa5v .
        "&$pa6=" . $pa6v .
        "&$pa7=" . $pa7v .
        "&$pa8=" . $pa8v .
        "&$pa9=" . $pa9v .
        "&$pa10=" . $pa10v;

      $url = $apiaddress . "?" . $request;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($ch);
      curl_close($ch);

      $saveinsert1 = "UPDATE company SET smsbal = smsbal - '1' WHERE id='$companyid'";
      mysqli_query($conn, $saveinsert1);
    }

    $status = "<div class='alert alert-success mb-2' role='alert'>
    <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'><br> Message Sent To <b>($checked_count)</b> User(s)
    </div>";
  } else {
    $status = "<div class='alert alert-danger mb-2' role='alert'>
    <strong>Error!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'><br> Message Sent To not sent <b>ERROR FOUND</b>
    </div>";
  }
}

$TRecord = mysqli_query($conn, "SELECT * FROM smsservers");
while ($row = mysqli_fetch_array($TRecord, MYSQLI_NUM)) {
  $thesender = $row[23];
}

$com1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($com1p = mysqli_fetch_array($com1)) {
  $companyid = $com1p["id"];
  $comName = $com1p["companyname"];
  $comStatus = $com1p["status"];
  $comStart1 = $com1p["startdate"];
  $comEnd1 = $com1p["enddate"];
  $comReg1 = $com1p["regdate"];
  $comAddy = $com1p["comaddress"];
  $comPhone = $com1p["comephone"];
  $comMail = $com1p["comemail"];
  $companyref = $com1p["compref"];
  $breakoption = $com1p["breakoption"];

  $masterkpi = $com1p["masterkpi"];
  $mastersalary = $com1p["mastersalary"];
  $kpion = $com1p["kpion"];
  $kpidata = $com1p["kpidata"];
  $salaryon = $com1p["salaryon"];
  $salarydata = $com1p["salarydata"];
  $atcomp = $com1p["atcomp"];
  $comsmsbal = $com1p["smsbal"];
  $comsmson = $com1p["smson"];
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

      <form name="myform" class="form" action="sms1.php" method="POST" onsubmit="return CountCheck();">
        <div class="row">

          <div class="col-md-4">
            <div class="card bd-0">
              <div class="card-header bg-primary ">
                <h4 class="card-title text-white">SMS Balance: (<?php echo number_format($comsmsbal); ?>)</h4>
              </div><!-- card-header -->
              <div class="card-header bg-dark ">
                <h4 class="card-title text-white">Send SMS to User(s)</h4>
              </div><!-- card-header -->
              <?php include("" . __DIR__ . "/resqu.php"); ?>
              <div class="card-body bd bd-t-0 rounded-bottom">
                <div class="form-body">

                  <div class="form-group">
                    <label for="sendername">Sender Name (Max 11 Xters)</label>
                    <input type="text" id="sendername" class="form-control" name="sendername" placeholder="Sender Name" value="<?php echo $thesender; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="text">Text Message To send (Max 140 Xters)</label>
                    <textarea name="msg" id="textbox" class="form-control" rows="5" maxlength="140" onFocus="countChars('textbox','char_count',140)" onKeyDown="countChars('textbox','char_count',140)" onKeyUp="countChars('textbox','char_count',140)" required></textarea>
                    <p>Characters left: <b><span id="char_count"></span></b></p>
                  </div>

                  <div class="form-actions center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">
                      <i class="icon-check2"></i> Send Message
                    </button>
                  </div>

                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
          <div class="col-md-8">

            <div>
              <div class="table-wrapper mg-t-10">
                <table id="datatable1" class="table table-bordered display responsive ">
                  <thead class="thead-colored thead-dark">
                    <tr>
                      <th class="">ID</th>
                      <th class=""><input type="checkbox" id="chk_new" onclick="checkAll('chk');" /></th>
                      <th class="">Unique ID</th>
                      <th class="">User ID</th>
                      <th class="">Full name</th>
                      <th class="">Phone No</th>
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
                      $uniqid = $huserb1d5["uniqid"];
                      $employeeid = $huserb1d5["employeeid"];
                      $fname = $huserb1d5["fname"];
                      $mname = $huserb1d5["mname"];
                      $lname = $huserb1d5["lname"];
                      $phone = $huserb1d5["phone"];

                      $x = $x + '1';
                    ?>
                      <tr>
                        <td><?php echo $x; ?></td>
                        <td><input type='checkbox' name="chk[]" value="<?php echo $phone; ?>" id="<?php echo $eid; ?>" /></td>
                        <td><?php echo $uniqid; ?></td>
                        <td><?php echo $employeeid; ?></td>
                        <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                        <td><?php echo $phone; ?></td>
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
  <script type="text/javascript">
    function checkAll(checkId) {
      var inputs = document.getElementsByTagName("input");
      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "checkbox") {
          if (inputs[i].checked == true) {
            inputs[i].checked = false;
          } else if (inputs[i].checked == false) {
            inputs[i].checked = true;
          }
        }
      }
    }

    function countChars(textbox, counter, max) {
      var count = max - document.getElementById(textbox).value.length;
      if (count < 10) {
        document.getElementById(counter).innerHTML = "<span style=\"color: red;\">" + count + "</span>";
      } else {
        document.getElementById(counter).innerHTML = count;
      }
    }
  </script>

  <script language="JavaScript" type="text/javascript">
    function CountCheck() {
      var sms = "<?php echo $comsmsbal; ?>";
      var inputs = document.getElementsByTagName("input");
      var checked = 0;
      for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        if ('checkbox' == inputs[i].type && inputs[i].checked)
          checked++;
      }

      if (checked > 0) {

        if (checked > sms) {

          alert("You do not have enough SMS to send Message. Please reduce the number of recipient.");
          return false;
        } else {
          return true;
        }

      } else {
        alert("Please Select at Least ONE Customer to send message to");
        return false;
      }
    }
  </script>


</body>

</html>