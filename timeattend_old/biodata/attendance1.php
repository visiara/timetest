<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");
date_default_timezone_set("Africa/Lagos");

$date = isset($_GET['date']) ? $_GET['date'] : '';
$ddate = empty($date) ? date("Y-m-d") : $date;
$bandate = empty($date) ? "Today - ".date("l, d F Y") : "Date - ".date("l, d F Y", strtotime("$ddate"));
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

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.ui-datepicker{
  z-index: 99999 !important;
}
</style>

<script langauge="javascript">
function reload(form){
var month_val=document.getElementById('dateMask').value; // collect month value    // collect year value
self.location='attendance1.php?date=' + month_val ; // reload the page
}
</script>

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
    <!-- br-mainpanel -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-contact-outline"></i>
        <div>
          <h4>Employee Management</h4>
          <p class="mg-b-0">Employee Management Panel - Employee Attendance.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        
        <?php echo $status; ?>
        <h4 class="mg-b-0"><?php echo $bandate; ?></h4>
          <div class="table-wrapper mg-t-15">
            <table id="datatable1" class="table table-bordered display responsive ">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th colspan=8>
                    <input onchange="reload(this.form)" class="form-control fc-datepicker" type="text" id="dateMask" name="date" placeholder="YYYY-MM-DD" value="<?php echo $ddate; ?>">
                  </th>
                </tr>
                <tr>
                  <th class="">ID</th>
                  <th class="">Employee ID</th>
                  <th class="">Full name</th>
                  <th class="">Status</th>
                  <th class="">Time-In</th>
                  <th class="">Time Out</th>
                  <th class="">Total Time</th>
                  <th class=""></th>
                </tr>
              </thead>
              <tbody>
<?php
$compo1=mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMain'");
while ($compo12= mysqli_fetch_array($compo1))
{
$compo = $compo12["deducttime"];
}

$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$employeeid = $huserb1d5["employeeid"];
$fname = $huserb1d5["fname"];
$mname = $huserb1d5["mname"];
$lname = $huserb1d5["lname"];

$hu=mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain' AND attendancereport = 'Active'");
$huy = mysqli_num_rows($hu);
while ($hug= mysqli_fetch_array($hu))
{
  $did = $hug["id"];
  $timeInseconds = $hug["timeInseconds"];
  $timeOutseconds = $hug["timeOutseconds"];
  $timeOutsecondsMain = $hug["timeOutseconds"];
  $timeStatus2 = $hug["attendance"];
  $timeStatus3 = $hug["attendance"];
  $etimeOut = $hug["expectedTimeOut"];
  $aover = $hug["aover"];

  $attendance = $hug["attendance"];
  $attendancereport = $hug["attendancereport"];

  $btimeInseconds = $hug["expectedTimin"];
  $btimeOutseconds = $hug["expectedTimeOut"];


if($timeOutseconds == "0" && $timeInseconds != "0"){
  if($aover == "1"){
    $timeOutseconds = ($etimeOut * 1000);
  } else {
    $daytimeOut = date('Y-m-d H:i:s', $etimeOut);
    $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut. " - $compo hours"));
    $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);

    if($timeOutseconds <= $timeInseconds){
      $daytimeOut = date('Y-m-d H:i:s', ($timeInseconds / 1000));
      $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut. " + 1 hours"));
      $timeOutseconds = (strtotime($newExpectedTimeOut) * 1000);
    }
  }
}

$timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

if($timeStatus2 == "on"){
  $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
} else {
  $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
}

if($huy > 0){
  $timeInseconds2 = ($timeInseconds / 1000);
  $timeOutseconds2 = $timeOutseconds == '0' ? time() : ($timeOutseconds / 1000);

  $timeIn = $timeInseconds=='0' ? '0' : date("Y-m-d h:i:s A", $timeInseconds2);
  $timeOut = $timeOutseconds=='0' ? '0' : date("Y-m-d h:i:s A", $timeOutseconds2);
  $hourdiff = $timeOutseconds=='0' ? '0' : round(($timeOutseconds2 - $timeInseconds2)/3600, 1);

  //$timeStatus2 = ($timeInseconds2 > $btimeInseconds) ? "<i class='fa fa-ban tx-danger tx-20'></i>" : "<i class='far fa-check-circle tx-info tx-20'></i>";
  //$timeStatus2 = ($timeInseconds2 = "0") ? "" : $timeStatus2;

  if($timeInseconds2 > $btimeInseconds){
    $timeStatus2 = "<i class='fa fa-ban tx-danger tx-20'></i>";
  } elseif($timeInseconds2 == 0){
    $timeStatus2 = "";
  } else {
    $timeStatus2 = "<i class='far fa-check-circle tx-info tx-20'></i>";
  }
} else {
  $timeInseconds2 = 0;
  $timeOutseconds2 = 0;

  $timeIn = 0;
  $timeOut = 0;
  $hourdiff = 0;

  $timeStatus2 = "";
}

//if($attendancereport == 'Active' && $attendance == 'off'){

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname." ".$mname." ".$fname; ?></td>
                  <td><?php echo $ego." ".$timeStatus; ?></td>
                  <td><?php echo $timeIn." ".$timeStatus2; ?></td>
                  <td><?php echo $timeOut; ?> <?php echo ($timeOutsecondsMain == "0" && $timeInseconds != "0") ? "<i class='fa fa-clock tx-danger tx-20'></i>" : ""; ?></td>
                  <td><?php echo $hourdiff.' Hours'; ?></td>
                  <td>
                    <?php if($timeStatus3 == "on"){ ?>
                    <button class="btn btn-primary btn-sm" onclick="post_value(<?php echo $did; ?>)" data-toggle="modal" data-target="#editemployee">Details</button>
                    <?php } ?>
                  </td>
                </tr>
<?php
//}

}

}
?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
 

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
      <footer class="br-footer">
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/footer_panel.php");
?>
      </footer>
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
    
    <script>
      $(function(){
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
        $('#dateMask').mask('9999-99-99');
        //$('#phoneMask').mask('(999) 999-9999');

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          dateFormat: 'yy-mm-dd',
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
function post_value(d){
    //opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
    // cheange the above line for different date format
    // self.close();
    var str2 = "<?php echo $companyMain; ?>";
    //var str=document.getElementById('employeeid').value;
    //var d = yy + "-" + mm + "-" + dt;
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
        //xmlhttp.open("GET", "viewattendance1.php?q=" + str + "&d=" + d + "&com=" + str2, true);
        xmlhttp.open("GET", "viewattendance1.php?q=" + d, true);
        xmlhttp.send();
    }
}
    </script>

<!-- Edit employee -->
<div id="editemployee" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">View Employee Attendance Information</h6>
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
