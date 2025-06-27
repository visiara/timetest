<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(!empty($_POST['editp'])){

$theid = $_POST['theid'];
$levelnick = $_POST['levelnick'];

$saveinsert1 = "UPDATE approvallevels SET levelnick='$levelnick' WHERE id='$theid'";

if(mysqli_query($conn, $saveinsert1)){;
$status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Approval Level Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Approval Level.</span>
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
        <i class="icon icon ion-android-bookmark"></i>
        <div>
          <h4>Approval Levels</h4>
          <p class="mg-b-0">App wide approval levels.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        
        <?php echo $status; ?>

          <div class="table-wrapper mg-t-15">
            <table class="table table-striped table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="wd-10p">ID</th>
                  <th class="">Level Status</th>
                  <th class="">Level Name</th>
                  <th class="">Level ID</th>
<?php if($loggedplevel == "4"){ ?>
                  <th class=""></th>
<?php } ?>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM approvallevels");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$levelname= $huserb1d5["levelname"];
$levelnick = $huserb1d5["levelnick"];
$level = $huserb1d5["level"];

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $levelname; ?></td>
                  <td><?php echo $levelnick; ?></td>
                  <td><?php echo $level; ?></td>
<?php if($loggedplevel == "4"){ ?>
                  <td>
<a href="javascript:;" class="btn btn-primary btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">
  <div><i class="fa fa-edit"></i></div>
</a>
                  </td>
<?php } ?>
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
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Device Administrator</h6>
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
        <label>Location: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="location" id="location" data-placeholder="Choose Location" onchange="showd();" required>
          <option value="">Choose Location</option>
<?php
$intload3=mysqli_query($conn, "SELECT * FROM location WHERE company='$companyMain' ORDER BY id asc");
while ($intload3a = mysqli_fetch_array($intload3))
{
$inid3 = $intload3a["id"];
$iname3 = $intload3a["locationname"];
?>
<option value="<?php echo $inid3; ?>"><?php echo $iname3; ?></option>
<?php
}
?>
        </select>
      </div><!-- form-group -->
    </div>
    
    <div class="" id="txt">

    </div>
    
    <h3 class="tx-inverse mg-b-15 mg-t-20">Access Information!</h3>
    
    <div class="d-flex mg-b-0">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="Username" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="text" name="pword" class="form-control" placeholder="Password" required>
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
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Administrator Information</h6>
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
        xmlhttp.open("GET", "approvallevel2.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showd(){

  var x = document.getElementById("location").selectedIndex;
  var y = document.getElementById("location").options;
  var str = y[x].value;

   if (str.length == 0) {
        document.getElementById("txt").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "deviceadmins2.php?q=" + str, true);
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
