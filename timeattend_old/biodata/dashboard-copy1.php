<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/stats.php");
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
    <link rel="stylesheet" href="../css/bracket.css">
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
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/left_panel.php");
?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/head_panel.php");
?>
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/right_panel.php");
?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-speedometer-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Time and Attendance Management Panel.</p>
        </div>
      </div>

      <div class="br-pagebody">
      <?php echo $status; ?>

        <div class="row row-sm mg-t-20">
          <div class="col-lg-12">
            <div class="widget-2">
              <div class="card shadow-base overflow-hidden">
                <div class="card-header">
                  <h6 class="card-title">Approved Holidays</h6>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <!--<a href="#" class="btn">This Week</a>
                    <a href="#" class="btn">This Month</a>-->
                  </div>
                </div><!-- card-header -->
                <div class="card-body pd-0 bd-color-gray-lighter">
                  <div class="row no-gutters tx-center">

                  <table id="datatable1hh" class="table table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class="">Name</th>
                  <th class="">Trom Date</th>
                  <th class="">To Date</th>
                  <th class="">Year</th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$dateyear = date("Y");
$todaysdate = strtotime(date("Y-m-d"));
$huserbd5=mysqli_query($conn, "SELECT * FROM holidays WHERE dele = '0' AND company='$companyMain' AND year='$dateyear'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$name = $huserb1d5["name"];
$date = $huserb1d5["date"];
$date2 = $huserb1d5["date2"];
$month = $huserb1d5["month"];
$year = $huserb1d5["year"];
$status = $huserb1d5["status"];
$createdby = $huserb1d5["createdby"];
$startdate = $huserb1d5["time1"];
$enddate = $huserb1d5["time2"];

if ($status == "Active"){
   $statusd = "bg-success";
   $btnactivate = "btn-danger";
   $btnicon = "fa-lock";
   $onoff = "InActive";
}else{
   $statusd = "bg-danger";
   $btnactivate = "btn-success";
   $btnicon = "fa-lock-open";
   $onoff = "Active";
}

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $date2; ?></td>
                  <td><?php echo $year; ?></td>
                </tr>
<?php
}
?>
              </tbody>
            </table>
                    
                  </div><!-- row -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- widget-2 -->
          </div><!-- col-6 -->
          </div><!-- row -->


          <div class="row row-sm mg-t-20">
          <div class="col-lg-12">
            <div class="widget-2">
              <div class="card shadow-base overflow-hidden">
                <div class="card-header">
                  <h6 class="card-title">Employee KPIs</h6>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <!--<a href="#" class="btn">This Week</a>
                    <a href="#" class="btn">This Month</a>-->
                  </div>
                </div><!-- card-header -->
                <div class="card-body pd-0 bd-color-gray-lighter">
                  <div class="row no-gutters tx-center">

                  <table id="datatable1zzz" class="table table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class="">RegNo</th>
                  <th class="">Name</th>
                  <th class="">KPI Type</th>
                  <th class="">Start Date</th>
                  <th class="">End Date</th>
                  <!--<th class="wd-10p">Status</th>-->
                  <th class="">Score</th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$dateyearM = date("m");
$dateyeary = date("Y");
$huserbd5=mysqli_query($conn, "SELECT * FROM kpi_list WHERE status = 'Active' AND company='$companyMain' AND endmonth='$dateyearM' AND endyear='$dateyeary' AND ((kpitype='Individual' AND employeeid='$loggedid') OR (kpitype='Departmental' AND employeeid='$loggeddepartment')) ORDER BY id desc");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$createdate = $huserb1d5["createdate"];
$employeeid2 = $huserb1d5["employeeid"];
$endmonth = $huserb1d5["endmonth"];
$endyear = $huserb1d5["endyear"];
$kpitype = $huserb1d5["kpitype"];
$name = $huserb1d5["name"];
$dpoll = $huserb1d5["dpoll"];
$startinfo = $huserb1d5["startinfo"];
$endinfo = $huserb1d5["endinfo"];
$status = $huserb1d5["status"];

if($dpoll > 0){
  $scoreboard = "$dpoll%";
} else {
  $scoreboard = "Not Graded";
}

if($kpitype == 'Individual'){
    $hu1=mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid2'");
    while ($hug1= mysqli_fetch_array($hu1)){
        $employeeid = $hug1["employeeid"];
        $fname = $hug1["fname"];
        $mname = $hug1["mname"];
        $lname = $hug1["lname"];
    }
    $RegNo = $employeeid;
    $regName = "$fname $mname $lname";
} else {
    $hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$employeeid2'");
    while ($hug1= mysqli_fetch_array($hu1)){
        $department = $hug1["departmentname"];
    }
    $RegNo = $employeeid2;
    $regName = $department;
}
if ($status == "Active"){
   $statusd = "bg-success";
   $btnactivate = "btn-danger";
   $btnicon = "fa-lock";
   $onoff = "InActive";
}else{
   $statusd = "bg-danger";
   $btnactivate = "btn-success";
   $btnicon = "fa-lock-open";
   $onoff = "Active";
}

if ($dpoll > 0){
  $btnicon2 = "<i class='fa fa-check-circle tx-success'></i>";
}else{
  $btnicon2 = "";
}

$sa = strtotime(date("Y-m-d"));
$last = date("Y-m-t", strtotime($endyear."-".$endmonth.'-01'));
$sa2 = strtotime(date($endyear."-".$endmonth."-".$last));

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $RegNo." ".$btnicon2; ?></td>
                  <td><?php echo $regName; ?></td>
                  <td><?php echo $kpitype; ?></td>
                  <td><?php echo $createdate; ?></td>
                  <td><?php echo date("F", strtotime($endyear.'-'.$endmonth)).", $endyear"; ?></td>
                  <td><?php echo $scoreboard; ?></td>
                </tr>
<?php
}
?>
              </tbody>
            </table>
                    
                  </div><!-- row -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- widget-2 -->
          </div><!-- col-6 -->
          </div><!-- row -->

      </div><!-- br-pagebody -->
      <footer class="br-footer">
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/footer_panel.php");
?>
      </footer>
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
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: false,
          dom: 'Brtip',
          paging: true,
        ordering: true,
        info: false,
        search: false,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ ',
            //lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        //minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

<script>
$(document).ready(function() {
    $("input").attr({
       "max" : 10,        // substitute your own
       "min" : 2          // values (or variables) here
    });
});

$(document).ready(function() {
    var a = "<?php echo $ison; ?>";
    if(a == '0'){
      //jQuery.noConflict(); 
      $('#editprofilef').modal({
        backdrop: 'static',
        keyboard: false
      }); 
    }
});
</script>

  </body>
</html>
