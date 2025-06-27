<?php
include "" . __DIR__ . "/header.php";



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
      <i class="icon icon ion-pie-graph"></i>
      <div>
        <h4>KPI Management</h4>
        <p class="mg-b-0">KPI management - Company wide Indicators.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>

        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">RegNo</th>
                <th class="">Designation</th>
                <th class="">Name</th>
                <th class="">Quantity</th>
                <th class="">End Date</th>
                <th></th>
                <!--
                  <th class="">Weight</th>
                  <th class="">Achievement</th>
                  <th class="">Score</th>
-->
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';

              //if($user_role == "3"){
              if ($user_role < "4") {
                $huserbd5 = mysqli_query($conn, "SELECT COUNT(id) AS dcount, SUM(kweight) AS kweight, SUM(kachieve) AS kachieve, SUM(dpoll) AS dpoll, employeeid, kpitype, endmonth, endyear FROM kpi_list WHERE status = 'Active' AND company='$companyMain' AND kdepartment = '$loggeddepartment' AND kpitype = 'Individual' AND dpoll = '0' GROUP BY employeeid, endyear, endmonth");
              } else {
                $huserbd5 = mysqli_query($conn, "SELECT COUNT(id) AS dcount, SUM(kweight) AS kweight, SUM(kachieve) AS kachieve, SUM(dpoll) AS dpoll, employeeid, kpitype, endmonth, endyear FROM kpi_list WHERE status = 'Active' AND company='$companyMain' AND kpitype = 'Individual' AND dpoll = '0' GROUP BY employeeid, endyear, endmonth");
              }

              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $employeeid2 = $huserb1d5["employeeid"];
                $kpitype = $huserb1d5["kpitype"];
                $dcount = $huserb1d5["dcount"];
                //$createdate = $huserb1d5["createdate"];
                $endmonth = $huserb1d5["endmonth"];
                $endyear = $huserb1d5["endyear"];
                //$name = $huserb1d5["name"];
                $dpoll = $huserb1d5["dpoll"];
                //$startinfo = $huserb1d5["startinfo"];
                //$endinfo = $huserb1d5["endinfo"];
                //$status = $huserb1d5["status"];
                $weightg = $huserb1d5["kweight"];
                $achieveg = $huserb1d5["kachieve"];
                //$fstatus = $huserb1d5["fstatus"];

                if ($kpitype == 'Individual') {
                  $hu1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid2'");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    $employeeid = $hug1["employeeid"];
                    $fname = $hug1["fname"];
                    $mname = $hug1["mname"];
                    $lname = $hug1["lname"];
                    $designation = $hug1["designation"];
                  }
                  $RegNo = $employeeid;
                  $regName = "$fname $mname $lname";
                } else {
                  $hu1 = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$employeeid2'");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    $department = $hug1["departmentname"];
                  }
                  $RegNo = $employeeid2;
                  $regName = $department;
                }

                $sa = strtotime(date("Y-m-d"));
                $last = date("Y-m-t", strtotime($endyear . "-" . $endmonth . '-01'));
                $sa2 = strtotime(date($endyear . "-" . $endmonth . "-" . $last));

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $RegNo; ?></td>
                  <td><?php echo $designation; ?></td>
                  <td><?php echo $regName; ?></td>
                  <td><?php echo $dcount; ?></td>
                  <td><?php echo date("F", strtotime($endyear . '-' . $endmonth)) . ", $endyear"; ?></td>
                  <td><a href="kpi7.php?et=<?php echo $employeeid2; ?>&y=<?php echo $endyear; ?>&m=<?php echo $endmonth; ?>" class="btn btn-dark tx-11 tx-uppercase pd-y-10 pd-x-15 tx-mont tx-medium">View</a></td>
                  <!--
                  <td><?php echo "$weightg%"; ?></td>
                  <td><?php echo "$achieveg%"; ?></td>
                  <td><?php echo "$dpoll%"; ?></td>
-->
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
  <script src="../lib/select2/js/select2.min.js"></script>
  <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>
  <script src="../lib/timepicker/jquery.timepicker.min.js"></script>
  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script>
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });

    $('#tpBasic1').datepicker();
    $('#tpBasic2').datepicker();
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
        xmlhttp.open("GET", "kpi1a.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function show() {
      var str2 = "<?php echo $companyMain; ?>";
      var monthchange = document.getElementById("type");
      var str = monthchange.options[monthchange.selectedIndex].value;
      var dept = "<?php echo $loggeddepartment; ?>";

      if (str.length == 0) {
        document.getElementById("show").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "kpi1b.php?q=" + str + "&com=" + str2 + "&dept=" + dept, true);
        xmlhttp.send();
      }
    }

    function show2(str) {
      var str2 = "<?php echo $companyMain; ?>";

      if (str.length == 0) {
        document.getElementById("show2").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show2").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "kpi1c.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function docalculation(str) {
      var a = document.getElementById("achievementk").value;
      var w = document.getElementById("weightk").value;

      if (isNaN(a)) {
        alert("Only Numbers allowed for Achievement");
      } else {
        var fvalue = ((+a * +w) / 100);
        document.getElementById("gradek").value = fvalue;
      }

    }
  </script>

  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: false,
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