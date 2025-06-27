<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(!empty($_GET['activate'])){
$h = $_GET['activate'];
$id = $_GET['id'];
   $notec13=mysqli_query($conn, "UPDATE holidays SET status = '$h' WHERE id = '$id'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Holiday Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_GET['did'])){
$h3 = $_GET['did'];
   $notec1=mysqli_query($conn, "UPDATE holidays SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Holiday Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_POST['editp'])){

$theid = $_POST['theid'];
$name4 = $_POST['name'];

$date4 = $_POST['date'];
$date24 = $_POST['date2'];
$month4 = $_POST['month'];
$year4 = $_POST['year'];

$timestamp = strtotime($date4);
$timestamp2 = strtotime($date24);

$saveinsert1 = "UPDATE holidays SET name ='$name4', date='$date4', date2='$date24', month='$month4', year='$year4', createdby='$uid', time1='$timestamp', time2='$timestamp2' WHERE id='$theid'";
if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Holiday Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}else{
$status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Updating Holiday.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

}

if(!empty($_POST['addp'])){
$h2 = $_POST['addp'];

$name4 = $_POST['name'];
$date4 = $_POST['date'];
$date24 = $_POST['date2'];
$timestamp = strtotime($date4);
$timestamp2 = strtotime($date24);
$month4 = date("m", $timestamp);
$year4 = date("Y", $timestamp);

/*
$month4 = DateTime::createFromFormat("y-m-d", $date4);
$month4 = $month4->format("m");
$year4 = DateTime::createFromFormat("y-m-d", $date4);
$year4 = $month4->format("Y");
*/

$saveinsert1 = "INSERT INTO holidays (`name`, `date`, `date2`, `month`, year, `createdby`, `company`, `time1`, `time2`) VALUES ('$name4', '$date4', '$date24', '$month4', '$year4', '$uid', '$companyMain', '$timestamp', '$timestamp2')";
if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Holiday Successfully Inserted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}else{
$status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting Holiday.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
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

.ui-datepicker{
  z-index: 99999 !important;
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
    <!-- br-mainpanel -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-calendar-outline"></i>
        <div>
          <h4>Holidays</h4>
          <p class="mg-b-0">Company wide holidays - General.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        
        <?php echo $status; ?>
          <div class="table-wrapper mg-t-15">
            <table id="datatable1" class="table table-bordered display responsive nowrap">
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
$todaysdate = strtotime(date("Y-m-d"));
$huserbd5=mysqli_query($conn, "SELECT * FROM holidays WHERE dele = '0' AND company='$companyMain'");
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
          </div><!-- table-wrapper -->

<!-- add employee -->
          <div id="addemployee" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Holiday</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="addemployee2" action="" method="POST" onsubmit="return validate(this);">
<input type="hidden" name="addp" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Holiday Information!</h3>
                          
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Date: <span class="tx-danger">*</span></label>
        <input type="text" name="date" id="datepickerNoOfMonths" class="form-control fc-datepickers" placeholder="YYYY-MM-DD" required>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Date: <span class="tx-danger">*</span></label>
        <input type="text" name="date2" id="datepickerNoOfMonths2" class="form-control fc-datepickers" placeholder="YYYY-MM-DD" required>
      </div><!-- form-group -->
    </div>
    
    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Holiday Name: <span class="tx-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Holiday Name" required>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="addemployee2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->

<!-- Edit employee -->
          <div id="editemployee" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Employee Information</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="editemployee2" action="" method="POST" onsubmit="return validate2(this);">
                  <div class="row no-gutters" id="pasteedit">
                    
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="editemployee2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->

 

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
    <script src="../lib/select2/js/select2.min.js"></script>
    <script src="../lib/jquery.maskedinput/jquery.maskedinput.js"></script>

    <script src="../js/bracket.js"></script>
    <script src="../js/map.shiftworker.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../js/dashboard.js"></script>
    
<script>
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    
$('.fc-datepickers').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
  numberOfMonths: 2
});
//datepickerNoOfMonths
//datepickerNoOfMonths2
$('#datepickerNoOfMonths2AAA').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
  numberOfMonths: 2
});

</script>

<script>
function Edit(str){
   if (str.length == 0) {
        document.getElementById("pasteedit").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pasteedit").innerHTML = this.responseText;

$('.fc-datepickers').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
  numberOfMonths: 2
});

            }
        };
        xmlhttp.open("GET", "holidays2.php?q=" + str, true);
        xmlhttp.send();
    }
}

function validate(form) {
  var valid = false;

  // validation code here ...
  var date1 = document.getElementById("datepickerNoOfMonths").value;
  var date2 = document.getElementById("datepickerNoOfMonths2").value;

  if(date2 >= date1){
    valid = true;
  }

  if(!valid) {
    alert('Error! End date is greater than Start date. Please correct the error and try again');
    return false;
  } else {
    return confirm('Do you really want to submit the form?');
  }
}

function validate2(form) {
  var valid = false;

  // validation code here ...
  var date1 = document.getElementById("datepickerNoOfMonths3").value;
  var date2 = document.getElementById("datepickerNoOfMonths4").value;

  if(date2 >= date1){
    valid = true;
  }

  if(!valid) {
    alert('Error! End date is greater than Start date. Please correct the error and try again');
    return false;
  } else {
    return confirm('Do you really want to submit the form?');
  }
}
</script>

    <script>
      $(function(){
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

        minimizeMenu();

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
  </body>
</html>
