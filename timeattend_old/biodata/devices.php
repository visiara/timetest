<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(!empty($_GET['activate'])){
$h = $_GET['activate'];
$id = $_GET['id'];
   $notec13=mysqli_query($conn, "UPDATE devices SET status = '$h' WHERE id = '$id'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Device Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_GET['did'])){
$h3 = $_GET['did'];
   $notec1=mysqli_query($conn, "UPDATE devices SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Device Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if(!empty($_POST['editp'])){

$theid = $_POST['theid'];
$name4 = $_POST['name'];

$date4 = $_POST['date'];
$month4 = $_POST['month'];
$year4 = $_POST['year'];

$saveinsert1 = "UPDATE holidays SET name ='$name4', date='$date4', month='$month4', year='$year4', createdby='$uid' WHERE id='$theid'";
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
$timestamp = strtotime($date4);
$month4 = date("m", $timestamp);
$year4 = date("Y", $timestamp);

/*
$month4 = DateTime::createFromFormat("y-m-d", $date4);
$month4 = $month4->format("m");
$year4 = DateTime::createFromFormat("y-m-d", $date4);
$year4 = $month4->format("Y");
*/

$saveinsert1 = "INSERT INTO holidays (`name`, `date`, `month`, year, `createdby`, `company`) VALUES ('$name4', '$date4', '$month4', '$year4', '$uid', '$companyMain')";
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
        <i class="icon icon ion-android-phone-portrait"></i>
        <div>
          <h4>Devices</h4>
          <p class="mg-b-0">Clock-In / Clock-Out Devices - All locations.</p>
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
                  <th class="">Device Id</th>
                  <th class="">Device Name</th>
                  <th class="">Serial No</th>
                  <th class="">Location</th>
                  <th class="">Status</th>
                  <th class="">GPS Location</th>
                  <th class="">Created By</th>
                  <th class=""></th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM devices WHERE dele = '0' AND company='$companyMain'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$deviceid = $huserb1d5["deviceid"];
$devicename = $huserb1d5["devicename"];
$serialno = $huserb1d5["serialno"];
$location2 = $huserb1d5["location"];
$gpslocation = $huserb1d5["gpslocation"];
$status = $huserb1d5["status"];
$createdby = $huserb1d5["createdby"];

$hu=mysqli_query($conn, "SELECT * FROM location WHERE id = '$location2' AND company='$companyMain'");
while ($hug= mysqli_fetch_array($hu))
{
  $location = $hug["locationname"];
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

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $deviceid; ?></td>
                  <td><?php echo $devicename; ?></td>
                  <td><?php echo $serialno; ?></td>
                  <td><?php echo $location; ?></td>
                  <td>
<div class="progress ht-30">
  <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
</div>
                  </td>
                  <td><?php echo $gpslocation; ?></td>
                  <td><?php echo $createdby; ?></td>
                  <td>
<a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" class="btn <?php echo $btnactivate; ?> btn-icon" id="<?php echo $onoff; ?>" onclick="return confirmActivation(this.id);">
  <div><i class="fa <?php echo $btnicon; ?>"></i></div>
</a>
<a href="?did=<?php echo $eid; ?>" class="btn btn-danger btn-icon" onclick="return confirmDelete();">
  <div><i class="fa fa-trash"></i></div>
</a>
                  </td>
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
<form id="addemployee2" action="" method="POST">
<input type="hidden" name="addp" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Organisation Information!</h3>
                          
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Date: <span class="tx-danger">*</span></label>
        <input type="text" name="date" id="datepickerNoOfMonths" class="form-control fc-datepickers" placeholder="YYYY-MM-DD" required>
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
<form id="editemployee2" action="" method="POST">
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
    
$('#datepickerNoOfMonths').datepicker({
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
            }
        };
        xmlhttp.open("GET", "holidays2.php?q=" + str, true);
        xmlhttp.send();
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
