<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");

if (isset($_POST['submit'])) {
  $msg = addslashes(strip_tags($_POST['msg']));
  $rid2 = addslashes(strip_tags($_POST['rid2']));

  $sqlsdd = "UPDATE smstemplates SET login='$msg' WHERE id ='$rid2'";

  if (mysqli_query($conn, $sqlsdd)) {
    $status = "<div class='alert alert-success mb-2' role='alert'>
    <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'> Message Template Saved Successfully
    </div>";
  } else {
    $status = "<div class='alert alert-warning mb-2' role='alert'>
    <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Message Template NOT Saved , try again.
    </div>";
  }
}

if (isset($_POST['submit2'])) {
  $msg = addslashes(strip_tags($_POST['msg']));
  $rid2 = addslashes(strip_tags($_POST['rid2']));

  $sqlsdd = "UPDATE smstemplates SET logout='$msg' WHERE id ='$rid2'";

  if (mysqli_query($conn, $sqlsdd)) {
    $status = "<div class='alert alert-success mb-2' role='alert'>
    <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'> Message Template Saved Successfully
    </div>";
  } else {
    $status = "<div class='alert alert-warning mb-2' role='alert'>
    <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Message Template NOT Saved , try again.
    </div>";
  }
}

$TRecord = mysqli_query($conn, "SELECT * FROM smsservers");
while ($row = mysqli_fetch_array($TRecord, MYSQLI_NUM)) {
  $thesender = $row[23];
}

$TRecord3 = mysqli_query($conn, "SELECT * FROM smstemplates WHERE companyid='$companyMain'");
while ($row3 = mysqli_fetch_array($TRecord3, MYSQLI_NUM)) {
  $rid1 = $row3[0];
  $thein = $row3[1];
  $theout = $row3[2];
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

      <div class="row">

        <div class="col-md-6">
          <div class="card bd-0">
            <div class="card-header bg-dark ">
              <h4 class="card-title text-white">Login Message to User(s)</h4>
            </div><!-- card-header -->
            <?php include("" . __DIR__ . "/resqu.php"); ?>
            <div class="card-body bd bd-t-0 rounded-bottom">
              <div class="form-body">
                <form name="myform" class="form" action="sms4.php" method="POST">
                  <div class="form-group">
                    <label for="sendername">Sender Name (Max 11 Xters)</label>
                    <input type="text" class="form-control" name="sendername" placeholder="Sender Name" value="<?php echo $thesender; ?>" required>
                    <input type="hidden" name="rid2" value="<?php echo $rid1; ?>">
                  </div>

                  <div class="form-group">
                    <label for="text">Text Message To send (Max 140 Xters)</label>
                    <textarea name="msg" id="textbox1" class="form-control" rows="5" maxlength="140" onFocus="countChars('textbox1','char_count1',140)" onKeyDown="countChars('textbox1','char_count1',140)" onKeyUp="countChars('textbox1','char_count1',140)" required> <?php echo $thein; ?></textarea>
                    <p>Characters left: <b><span id="char_count1"></span></b></p>
                  </div>

                  <div class="form-actions center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">
                      <i class="icon-check2"></i> Save Message
                    </button>
                  </div>
                </form>

              </div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col 6 -->

        <div class="col-md-6">
          <div class="card bd-0">
            <div class="card-header bg-dark ">
              <h4 class="card-title text-white">LogOut Message to User(s)</h4>
            </div><!-- card-header -->
            <?php include("" . __DIR__ . "/resqu.php"); ?>
            <div class="card-body bd bd-t-0 rounded-bottom">
              <div class="form-body">
                <form name="myform1" class="form" action="sms4.php" method="POST">
                  <div class="form-group">
                    <label for="sendername">Sender Name (Max 11 Xters)</label>
                    <input type="text" class="form-control" name="sendername" placeholder="Sender Name" value="<?php echo $thesender; ?>" required>
                    <input type="hidden" name="rid2" value="<?php echo $rid1; ?>">
                  </div>

                  <div class="form-group">
                    <label for="text">Text Message To send (Max 140 Xters)</label>
                    <textarea name="msg" id="textbox" class="form-control" rows="5" maxlength="140" onFocus="countChars('textbox','char_count',140)" onKeyDown="countChars('textbox','char_count',140)" onKeyUp="countChars('textbox','char_count',140)" required><?php echo $theout; ?></textarea>
                    <p>Characters left: <b><span id="char_count"></span></b></p>
                  </div>

                  <div class="form-actions center">
                    <button type="submit" name="submit2" class="btn btn-primary btn-lg">
                      <i class="icon-check2"></i> Save Message
                    </button>
                  </div>
                </form>

              </div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col 6 -->

      </div><!-- row -->

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
      var inputs = document.getElementsByTagName("input");
      var checked = 0;
      for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        if ('checkbox' == inputs[i].type && inputs[i].checked)
          checked++;
      }

      if (checked > 0) {
        return true;
      } else {
        alert("Please Select at Least ONE Customer to send message to");
        return false;
      }
    }
  </script>


</body>

</html>