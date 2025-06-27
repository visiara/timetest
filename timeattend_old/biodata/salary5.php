<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");

if(isset($_GET['month'])){
  $monthM = $_GET['month'];
} else {
  $monthM = date("F");
}

if(isset($_GET['year'])){
  $yearM = $_GET['year'];
} else {
  $yearM = date("Y");
}

$date2 = date("F", strtotime($yearM.'-'.$monthM.'-01'));
$bandate = "$date2 $yearM";

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

    <link href="../lib/spinkit/css/spinkit.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

<script langauge="javascript">
function reload(form){
var month_val=document.getElementById('monthchanget').value;
var year_val=document.getElementById('yearchanget').value;
self.location='salary5.php?month=' + month_val + '&year=' + year_val; // reload the page
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
        <i class="icon icon ion-briefcase"></i>
        <div>
          <h4>Payroll Management</h4>
          <p class="mg-b-0">Employee Payroll Management Panel - Active Employee.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">

        <?php echo $status; ?>
        <h4 class="mg-b-0">Payroll History - <?php echo $bandate; ?></h4>

<div class="alert alert-info mg-t-20" role="alert">
  <div class="d-flex align-items-center justify-content-start">
<select id="monthchanget" name="monthchanget" class="form-control">
  <option name="<?php echo date('F'); ?>" value="<?php echo date('m'); ?>"><?php echo date('F'); ?></option>
  <option name="January" value="01">January</option>
  <option name="February" value="02">February</option>
  <option name="March" value="03">March</option>
  <option name="April" value="04">April</option>
	<option name="May" value="05">May</option>
  <option name="June" value="06">June</option>
  <option name="July" value="07">July</option>
  <option name="August" value="08">August</option>
	<option name="September" value="09">September</option>
  <option name="October" value="10">October</option>
  <option name="November" value="11">November</option>
  <option name="December" value="12">December</option>
</select>

<select id="yearchanget" name="yearchanget" class="form-control">
  <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
  <option name="<?php echo date('Y') - 1; ?>" value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
  <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
  <option name="<?php echo date('Y') + 1; ?>" value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
  <option name="<?php echo date('Y') + 2; ?>" value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
</select>

<button class="btn btn-primary pl-5 pr-5" onclick="reload(this.form)">Filter</button>

  </div><!-- d-flex -->
</div><!-- alert -->

          <div class="table-wrapper mg-t-15">
            <table id="datatable1" class="table table-bordered display responsive nowrap">
              <thead class="thead-colored thead-dark">
                <tr>
                  <th class="">ID</th>
                  <th class="wd-15p">Unique ID</th>
                  <th class="wd-15p">Employee ID</th>
                  <th class="">Full name</th>
                  <th class="wd-20p">Location</th>
                  <th class="wd-20p">Department</th>
                  <th class="">Work Schedule</th>
                  <th class="">Employment Type</th>
                  <th class=""></th>
                </tr>
              </thead>
              <tbody>
<?php
$x = '0';
$huserbd5=mysqli_query($conn, "SELECT * FROM employee WHERE uname = '$uid' AND company='$companyMain'");
while ($huserb1d5= mysqli_fetch_array($huserbd5))
{
$eid = $huserb1d5["id"];
$mapid9 = $huserb1d5["id"];
$empuniqid = $huserb1d5["uniqid"];
$employeeid = $huserb1d5["employeeid"];
$fname = $huserb1d5["fname"];
$mname = $huserb1d5["mname"];
$lname = $huserb1d5["lname"];
$email = $huserb1d5["email"];
$address = $huserb1d5["address"];
$country = $huserb1d5["country"];
$state = $huserb1d5["state"];
$gender = $huserb1d5["gender"];
$phone = $huserb1d5["phone"];
$nextofkin = $huserb1d5["nextofkin"];
$dofb = $huserb1d5["dofb"];
$employmenttype = $huserb1d5["employmenttype"];
$location1 = $huserb1d5["location"];
$department1 = $huserb1d5["department"];
$workshift1 = $huserb1d5["workshift"];
$uname = $huserb1d5["uname"];
$pword = $huserb1d5["pword"];
$status = $huserb1d5["status"];
$createdby = $huserb1d5["createdby"];
$profilepic = $huserb1d5["profilepic"];

$hu=mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1' AND company='$companyMain'");
while ($hug= mysqli_fetch_array($hu))
{
  $location = $hug["locationname"];
}

$hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1' AND company='$companyMain'");
while ($hug1= mysqli_fetch_array($hu1))
{
  $department = $hug1["departmentname"];
}

$hu2=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1' AND company='$companyMain'");
while ($hug2= mysqli_fetch_array($hu2))
{
  $workshift = $hug2["shiftname"];
}

$hu3y=mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttype'");
while ($hug3y= mysqli_fetch_array($hu3y))
{
  $employmenttypey = $hug3y["name"];
}

$nmonth = date("m");
$nyear = date("Y");

$bookpay1=mysqli_query($conn, "SELECT * FROM salary_payroll WHERE mapid = '$mapid9' AND year='$yearM' AND month='$monthM' AND company='$companyMain'");
$alld = mysqli_num_rows($bookpay1);

if ($alld > 0){
   $statusd = "bg-success";
   $btnactivate = "btn-danger";
   $btnicon = "<i class='fa fa-check-circle tx-success'></i>";
   $onoff = "InActive";
}else{
   $statusd = "bg-danger";
   $btnactivate = "btn-success";
   $btnicon = "";
   $onoff = "Active";
}

$x = $x + '1';
?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $empuniqid." ".$btnicon; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname." ".$mname." ".$fname; ?></td>
                  <td><?php echo $location; ?></td>
                  <td><?php echo $department; ?></td>
                  <td><?php echo $workshift; ?></td>
                  <td><?php echo $employmenttypey; ?></td>
                  <td>
<?php if ($alld > 0){ ?>
  <a href="javascript:;" class="btn btn-info btn-icon" onclick="EditPay(<?php echo $eid; ?>);" data-toggle="modal" data-target="#payslip" title="Print Payslip">
  <div><i class="fa fa-print"></i></div>
</a>
<?php } else { ?>

<?php } ?>
                  </td>
                </tr>
<?php
}
?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->

<!-- employee payslip -->
          <div id="payslip" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h2 class="tx-24 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="icon icon ion-briefcase"></i> Payslip</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
                  <div class="row no-gutters" id="pasteedit2">
                    
                  </div><!-- row -->
<div class="alert alert-info" role="alert">
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-ios-information alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Please Note!</strong> Select (<b>Print Hearders & Footers</b>) and (<b>Print Backgrounds</b>) in printer options for proper printing.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success tx-size-xs" onclick="printDiv();">Print Payslip</button>
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
function EditPay(str){
  var str2 = "<?php echo $companyMain; ?>";

    var monthchange = document.getElementById("monthchanget");
    var yearchange = document.getElementById("yearchanget");
    var smonth = monthchange.options[monthchange.selectedIndex].value;
    var syear = yearchange.options[yearchange.selectedIndex].value;

   if (str.length == 0) {
        document.getElementById("pasteedit2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pasteedit2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "payslip1.php?q=" + str + "&com=" + str2 + "&year=" + syear + "&month=" + smonth, true);
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

        $("#progress-bar").width('40%');

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
        function printDiv() {
            var divContents = document.getElementById("pasteedit2").innerHTML;
            var a = window.open('', '', 'height=800, width=1200');
            a.document.write('<!DOCTYPE html>');
            a.document.write('<html lang="en">');
            a.document.write('<head>');
            a.document.write('<link rel="stylesheet" href="../css/bracket.css">');
            a.document.write('</head>');
            a.document.write('<body>');
            a.document.write('<div class="row no-gutters">');
            a.document.write(divContents);
            a.document.write('</div>');
            a.document.write('<script src="../lib/jquery/jquery.min.js" />');
            a.document.write('<script src="../lib/bootstrap/js/bootstrap.bundle.min.js" />');
            a.document.write('<script src="../lib/moment/min/moment.min.js" />');
            a.document.write('<script src="../js/bracket.js" />');
            a.document.write('</body></html>');
            a.document.close();
            a.focus();
            a.print();
            a.close();

            //printDiv()
        }

function printdiv(printpage) {
  var headstr = "<html><head><title></title></head><body>";
  var footstr = "</body>";
  var newstr = document.all.item(printpage).innerHTML;
  var oldstr = document.body.innerHTML;
  document.body.innerHTML = headstr + newstr + footstr;
  window.print();
  document.body.innerHTML = oldstr;
  return true;

  //printdiv('pasteedit2') 
}

function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=700');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();

    //printPageArea('pasteedit2')
}

    </script>

  </body>
</html>