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
  </style>
</head>

<body onload="showPage('settings1.php');">

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
        <li class="nav-item"><a class="nav-link active" href="settings.php">Recruitment settings</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Template Management</a></li>
        <li class="nav-item"><a class="nav-link" href="jobmanagement.php">Job Management</a></li>
        <li class="nav-item"><a class="nav-link" href="recruitment.php">Recruitment Management</a></li>
      </ul>
    </div><!-- ht-65 -->
    <div class="br-pagetitle">
      <i class="icon ion-settings"></i>
      <div>
        <h4>Settings</h4>
        <p class="mg-b-0">Recruitment Settings Panel.</p>
      </div>
    </div>

    <div class="">
      <?php echo $status; ?>

      <div class="row row-sm mg-t-20" id="pageDiv">

      </div><!-- row -->

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

  <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

  <script src="../js/bracket.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/widgets.js"></script>

  <script>
    function showPage(page) {
      //showLoading();
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("pageDiv").innerHTML = this.responseText;
          doTable();

        }

        //hideLoading();
      };
      xmlhttp.open("GET", page, true);
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

      $("#setsave").on('submit', function(e) {
        e.preventDefault();
        //showLoading();

        $.ajax({
          type: 'POST',
          url: 'jobmanagementgo.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(response) {
            if (response.status == 1) {
              alert(response.message);
              showPage('settings1.php');
            } else {
              alert(response.message);
            }
            //hideLoading();
          }
        });
      });



    });
  </script>

</body>

</html>