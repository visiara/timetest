<?php
include "" . __DIR__ . "/header.php";

date_default_timezone_set("Africa/Lagos");


if (isset($_GET['pid'])) {
  $pid = $_GET['pid'];

  $sqlsdd56 = "UPDATE smsservers SET pdefault='No'";
  //mysqli_query($conn, $sqlsdd56);

  $sqlsdd5 = "UPDATE smsservers SET pdefault='Yes' WHERE id ='$pid'";
  //mysqli_query($conn, $sqlsdd5);

  if (mysqli_query($conn, $sqlsdd56)) {
    if (mysqli_query($conn, $sqlsdd5)) {
      $status = "<div class='alert alert-success mb-2' role='alert'>
            <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'> Gateway Updated Successfully
            </div>";
    } else {
      $status = "<div class='alert alert-warning mb-2' role='alert'>
            <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Gateway NOT Updated , try again.
            </div>";
    }
  } else {
    $status = "<div class='alert alert-warning mb-2' role='alert'>
        <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Gateway NOT Updated , try again.
        </div>";
  }
}

if (isset($_POST['rid2'])) {
  $rid2 = $_POST['rid2'];
  $rid = $_POST['rid2'];

  $pa1 = $_POST['pa1'];
  $pa2 = $_POST['pa2'];
  $pa3 = $_POST['pa3'];
  $pa4 = $_POST['pa4'];
  $pa4v = $_POST['pa4v'];
  $pa5 = $_POST['pa5'];
  $pa5v = $_POST['pa5v'];
  $pa6 = $_POST['pa6'];
  $pa6v = $_POST['pa6v'];
  $pa7 = $_POST['pa7'];
  $pa7v = $_POST['pa7v'];
  $pa8 = $_POST['pa8'];
  $pa8v = $_POST['pa8v'];
  $pa9 = $_POST['pa9'];
  $pa9v = $_POST['pa9v'];
  $pa10 = $_POST['pa10'];
  $pa10v = $_POST['pa10v'];
  $apiaddress = $_POST['apiaddress'];
  $accountname = $_POST['accountname'];
  $sendername = $_POST['sendername'];

  $sqlsdd = "UPDATE smsservers SET apiaddress='$apiaddress', pa1='$pa1', pa2='$pa2', pa3='$pa3', pa4='$pa4', pa4v='$pa4v', pa5='$pa5', pa5v='$pa5v', pa6='$pa6', pa6v='$pa6v', pa7='$pa7', pa7v='$pa7v', pa8='$pa8', pa8v='$pa8v', pa9='$pa9', pa9v='$pa9v', pa10='$pa10', pa10v='$pa10v', accountname='$accountname', sendername='$sendername' WHERE id ='$rid2'";

  if (mysqli_query($conn, $sqlsdd)) {
    $status = "<div class='alert alert-success mb-2' role='alert'>
    <strong>Success!</strong><img border='0' src='images/bullet-listing.gif' width='20' height='20'> Gateway Updated Successfully
    </div>";
  } else {
    $status = "<div class='alert alert-warning mb-2' role='alert'>
    <strong>Error!!</strong><img border='0' src='images/cross.png' width='20' height='20'> Gateway NOT Updated , try again.
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

          <div class="col-12">

            <div>

              <h3>Gateway Configuration List</h3>

              <div class="table-wrapper mg-t-30">
                <table id="datatable1" class="table table-bordered display responsive ">
                  <thead class="thead-colored thead-dark">
                    <tr>
                      <th>Account Name</th>
                      <th>API Address</th>
                      <th>Default</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $TRecord = mysqli_query($conn, "SELECT * FROM smsservers");
                    $i = 1;
                    while ($row = mysqli_fetch_array($TRecord, MYSQLI_NUM)) {
                    ?>
                      <tr>
                        <td class="text-truncate"><?php echo $row[22]; ?></td>
                        <td class="text-truncate"><?php echo $row[3]; ?></td>
                        <td class="text-truncate"><?php echo $row[21]; ?></td>
                        <td class="text-truncate"><a href="sms3.php?pid=<?php echo $row[0]; ?>" class="onshowbtn btn btn-success">Make Deafult</a></td>
                        <td class="text-truncate"><a href="javascript:;" onclick="editr(<?php echo $row[0]; ?>);" data-toggle="modal" class="onshowbtn btn btn-info" data-target="#onshow2" data-backdrop="false">Edit</a></td>
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


  <div class="modal fade text-xs-left" id="onshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" style="z-index: 999999;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="txtHintImage">
            hello
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade text-xs-left" id="onshow2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21m" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel21m">Edit Gateway Details</h4>
        </div>
        <div class="modal-body">
          <div id="mrme">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade text-xs-left" id="onshow23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21mv" aria-hidden="true" style="z-index: 999999;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel21mv">Pay Dept Owed</h4>
        </div>
        <div class="modal-body">
          <div id="mrme1">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

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
    function editr(str1) {

      if (str1.length == 0) {
        document.getElementById("mrme").innerHTML = "";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("mrme").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "upsms.php?a=" + str1, true);
      xmlhttp.send();
    }
  </script>

</body>

</html>