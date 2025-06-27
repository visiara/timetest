<?php
include "" . __DIR__ . "/header.php";


if (isset($_GET['month'])) {
  $monthM = $_GET['month'];
} else {
  $monthM = date("F");
}

if (isset($_GET['year'])) {
  $yearM = $_GET['year'];
} else {
  $yearM = date("Y");
}

$date2 = date("F", strtotime($yearM . '-' . $monthM . '-01'));
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

  <title>HECKER PEOPLE - Salary Summary - <?php echo $bandate; ?></title>

  <!-- vendor css -->
  <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

  <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

  <link href="../lib/spinkit/css/spinkit.css" rel="stylesheet">

  <!-- export buttons -->
  <link href="buttons.dataTables.min.css" rel="stylesheet">

  <!-- export buttons end -->

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

  <script langauge="javascript">
    function reload(form) {
      var month_val = document.getElementById('monthchanget').value;
      var year_val = document.getElementById('yearchanget').value;
      self.location = 'salary8.php?month=' + month_val + '&year=' + year_val; // reload the page
    }
  </script>

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
      <i class="icon icon ion-briefcase"></i>
      <div>
        <h4>Payroll Management</h4>
        <p class="mg-b-0">User Payroll Management Panel - Salary Summary sheet.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <h4 class="mg-b-0">Salary Summary - <?php echo $bandate; ?></h4>

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
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">User ID</th>
                <th class="">Full name</th>
                <th class="">Grades</th>
                <?php
                $hu1 = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance WHERE company='$companyMain' AND status='Active' ORDER BY name asc");
                while ($hug1 = mysqli_fetch_array($hu1)) {
                  $allowlabels = $hug1["name"];
                ?>
                  <th class="wd-20p"><?php echo $allowlabels; ?></th>
                <?php } ?>
                <?php
                $hu1a = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance_other WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
                while ($hug1a = mysqli_fetch_array($hu1a)) {
                  $allowlabelsa = $hug1a["name"];
                ?>
                  <th class="wd-20p"><?php echo $allowlabelsa; ?></th>
                <?php } ?>
                <th class="">Monthly Gross</th>
                <th class="">Annual Gross</th>
                <th class="">User Monthly Pension</th>
                <th class="">Employer's Monthly Pension Contribution</th>
                <th class="">Total Pensions Contribution</th>
                <th class="">User Annual Pension</th>
                <th class="">CRA</th>
                <th class="">TOTAL RELIEF</th>
                <th class="">TAXABLE INCOME</th>
                <th class="">1st 300,000 @ 7%</th>
                <th class="">Next 300,000 @ 11%</th>
                <th class="">1st 500,000 @ 15%</th>
                <th class="">Next 500,000 @ 19%</th>
                <th class="">Next 1,600,000 @ 21%</th>
                <th class="">Above 3.2m @ 24%</th>
                <th class="">TOTAL PAYE</th>
                <th class="">MONTHLY PAYE</th>
                <?php
                /*
$hu1adM=mysqli_query($conn, "SELECT DISTINCT name FROM salary_deduction WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
while ($hug1adM = mysqli_fetch_array($hu1adM))
{
  $allowlabelsadM = $hug1adM["name"];
?>
  <th class="wd-20p"><?php echo $allowlabelsadM; ?></th>
<?php 
} 
*/
                ?>
                <?php
                $hu1ad = mysqli_query($conn, "SELECT DISTINCT name FROM salary_deduction_other WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
                while ($hug1ad = mysqli_fetch_array($hu1ad)) {
                  $allowlabelsad = $hug1ad["name"];
                ?>
                  <th class="wd-20p"><?php echo $allowlabelsad; ?></th>
                <?php
                }
                ?>
                <th class="">Total Deductions (Monthly)</th>
                <th class="">Monthly Net Pay</th>
                <th class="">Annual Net Pay</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
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
                $salaryscale4 = $huserb1d5["salaryscale"];
                $pword = $huserb1d5["pword"];
                $status = $huserb1d5["status"];
                $createdby = $huserb1d5["createdby"];
                $profilepic = $huserb1d5["profilepic"];

                $hu = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale4' AND company='$companyMain'");
                while ($hug = mysqli_fetch_array($hu)) {
                  $salaryname = $hug["nickname"];
                }

                $hu3y = mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttype'");
                while ($hug3y = mysqli_fetch_array($hu3y)) {
                  $employmenttypey = $hug3y["name"];
                }

                $nmonth = date("m");
                $nyear = date("Y");

                $bookpay1 = mysqli_query($conn, "SELECT * FROM salary_payroll WHERE mapid = '$mapid9' AND year='$yearM' AND month='$monthM' AND company='$companyMain'");
                $alld = mysqli_num_rows($bookpay1);

                if ($alld > 0) {
                  $statusd = "bg-success";
                  $btnactivate = "btn-danger";
                  $btnicon = "<i class='fa fa-check-circle tx-success'></i>";
                  $onoff = "InActive";
                } else {
                  $statusd = "bg-danger";
                  $btnactivate = "btn-success";
                  $btnicon = "";
                  $onoff = "Active";
                }

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                  <td><?php echo $salaryname; ?></td>
                  <?php
                  $doremi = 0;
                  $doremifull = 0;
                  $hu1 = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance WHERE company='$companyMain' AND status='Active' ORDER BY name asc");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    //$showsalaryscale = $hug1["salaryscale"];
                    $namey = $hug1["name"];

                    $huyaz = mysqli_query($conn, "SELECT * FROM salary_allowance WHERE name = '$namey' AND salaryscale = '$salaryscale4' AND company = '$companyMain'");
                    $totnum = mysqli_num_rows($huyaz);

                    if ($totnum > 0) {
                      while ($hugyaz = mysqli_fetch_array($huyaz)) {
                        $allowlabelsbz = $hugyaz["dvalue"];
                        $theprimary = $hugyaz["theprimary"];
                      }
                      if ($theprimary == "1") {
                        $doremi = ($doremi + $allowlabelsbz);
                      } else {
                        $doremi = ($doremi + 0);
                      }

                      $allowlabelsb  = $allowlabelsbz;
                    } else {
                      $allowlabelsb  = "0";
                      $doremi = ($doremi + 0);
                    }

                    $doremifull = ($doremifull + $allowlabelsb);
                  ?>
                    <td><?php echo number_format($allowlabelsb, 2); ?></td>
                  <?php
                  }

                  $doremia = 0;
                  $hu1a = mysqli_query($conn, "SELECT DISTINCT name FROM salary_allowance_other WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
                  while ($hug1a = mysqli_fetch_array($hu1a)) {
                    $nameya = $hug1a["name"];

                    $huyazA = mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE name = '$nameya' AND company='$companyMain' AND employeeid='$eid' AND year='$yearM' AND month='$monthM'");
                    $totnumA = mysqli_num_rows($huyazA);

                    if ($totnumA > 0) {
                      while ($hugyaza = mysqli_fetch_array($huyazA)) {
                        $allowlabelsbza = $hugyaza["dvalue"];
                        $doremia = ($doremia + $allowlabelsbza);
                      }
                      $allowlabelsba  = $allowlabelsbza;
                    } else {
                      $allowlabelsba  = "0";
                      $doremia = ($doremia + 0);
                    }
                  ?>
                    <td><?php echo number_format($allowlabelsba, 2); ?></td>
                  <?php
                  }

                  $doremifull = ($doremifull + $doremia);

                  $doremifullby12 = ($doremifull * 12);
                  $defbyeight = ($doremi * 0.08);
                  $defbyten = ($doremi * 0.1);
                  $sumlm = ($defbyeight + $defbyten);
                  $lbytwelve = ($defbyeight * 12);
                  $cra = ((($doremifullby12 - $lbytwelve) * 0.2) + 200000);
                  $totalreleif = ($lbytwelve + $cra);
                  $taxableincome = ($doremifullby12 - $totalreleif);

                  if ($taxableincome >= 300000) {
                    $aby1 = (300000 * 0.07);
                  } else {
                    $aby1 = ($taxableincome * 0.07);
                  }

                  if ($taxableincome >= 600000) {
                    $aby2 = (300000 * 0.11);
                  } else {
                    if (($taxableincome - 300000) > 0) {
                      $aby2 = (($taxableincome - 300000) * 0.11);
                    } else {
                      $aby2 = "0";
                    }
                  }

                  if ($taxableincome >= 1100000) {
                    $aby3 = (500000 * 0.15);
                  } else {
                    if (($taxableincome - 600000) > 0) {
                      $aby3 = (($taxableincome - 600000) * 0.15);
                    } else {
                      $aby3 = "0";
                    }
                  }

                  if ($taxableincome >= 1600000) {
                    $aby4 = (500000 * 0.19);
                  } else {
                    if (($taxableincome - 1100000) > 0) {
                      $aby4 = (($taxableincome - 1100000) * 0.19);
                    } else {
                      $aby4 = "0";
                    }
                  }

                  if ($taxableincome >= 3200000) {
                    $aby5 = (1600000 * 0.21);
                  } else {
                    if (($taxableincome - 1600000) > 0) {
                      $aby5 = (($taxableincome - 1600000) * 0.21);
                    } else {
                      $aby5 = "0";
                    }
                  }

                  if ($taxableincome >= 4800000) {
                    //$aby6 = (1600000 * 0.24);
                    $aby6 = (($taxableincome - 3200000) * 0.24);
                  } else {
                    if (($taxableincome - 3200000) > 0) {
                      $aby6 = (($taxableincome - 3200000) * 0.24);
                    } else {
                      $aby6 = "0";
                    }
                  }

                  $totalpayee = ($aby1 + $aby2 + $aby3 + $aby4 + $aby5 + $aby6);
                  $monthlypayee = ($totalpayee / 12);
                  ?>
                  <td><?php echo number_format($doremifull, 2); ?></td>
                  <td><?php echo number_format($doremifullby12, 2); ?></td>
                  <td><?php echo number_format($defbyeight, 2); ?></td>
                  <td><?php echo number_format($defbyten, 2); ?></td>
                  <td><?php echo number_format($sumlm, 2); ?></td>
                  <td><?php echo number_format($lbytwelve, 2); ?></td>
                  <td><?php echo number_format($cra, 2); ?></td>
                  <td><?php echo number_format($totalreleif, 2); ?></td>
                  <td><?php echo number_format($taxableincome, 2); ?></td>
                  <td><?php echo number_format($aby1, 2); ?></td>
                  <td><?php echo number_format($aby2, 2); ?></td>
                  <td><?php echo number_format($aby3, 2); ?></td>
                  <td><?php echo number_format($aby4, 2); ?></td>
                  <td><?php echo number_format($aby5, 2); ?></td>
                  <td><?php echo number_format($aby6, 2); ?></td>
                  <td><?php echo number_format($totalpayee, 2); ?></td>
                  <td><?php echo number_format($monthlypayee, 2); ?></td>
                  <?php
                  /*
$doremiadMain = 0;
$hu1axMain = mysqli_query($conn, "SELECT DISTINCT name FROM salary_deduction WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
while ($hug1axMain = mysqli_fetch_array($hu1axMain))
{
  $nameyaxMain = $hug1axMain["name"];

  $huyazAxMain = mysqli_query($conn, "SELECT * FROM salary_deduction WHERE name = '$nameyaxMain' AND company='$companyMain' AND employeeid='$eid' AND year='$yearM' AND month='$monthM'");
  $totnumAxMain = mysqli_num_rows($huyazAxMain);

  if($totnumAxMain > 0){
    while ($hugyazaxMain = mysqli_fetch_array($huyazAxMain))
    {
      $allowlabelsbzaxMain = $hugyazaxMain["dvalue"];
      $doremiadMain = ($doremiadMain + $allowlabelsbzaxMain);
    }
    $allowlabelsbaxMain  = $allowlabelsbzaxMain;
  } else {
    $allowlabelsbaxMain  = "0";
    $doremiadMain = ($doremiadMain + 0);
  }
?>
  <td><?php echo number_format($allowlabelsbaxMain, 2); ?></td>
<?php 
}
*/
                  ?>

                  <?php
                  $doremiad = 0;
                  $hu1ax = mysqli_query($conn, "SELECT DISTINCT name FROM salary_deduction_other WHERE company='$companyMain' AND year='$yearM' AND month='$monthM' ORDER BY name asc");
                  while ($hug1ax = mysqli_fetch_array($hu1ax)) {
                    $nameyax = $hug1ax["name"];

                    $huyazAx = mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE name = '$nameyax' AND company='$companyMain' AND employeeid='$eid' AND year='$yearM' AND month='$monthM'");
                    $totnumAx = mysqli_num_rows($huyazAx);

                    if ($totnumAx > 0) {
                      while ($hugyazax = mysqli_fetch_array($huyazAx)) {
                        $allowlabelsbzax = $hugyazax["dvalue"];
                        $doremiad = ($doremiad + $allowlabelsbzax);
                      }
                      $allowlabelsbax  = $allowlabelsbzax;
                    } else {
                      $allowlabelsbax  = "0";
                      $doremiad = ($doremiad + 0);
                    }
                  ?>
                    <td><?php echo number_format($allowlabelsbax, 2); ?></td>
                  <?php
                  }
                  ?>

                  <?php

                  $totaldeductions = $defbyeight + $monthlypayee +
                    (isset($allowlabelsbaxMain) ? $allowlabelsbaxMain : 0) +
                    (isset($allowlabelsbax) ? $allowlabelsbax : 0);

                  $monthlynetpay = ($doremifull - $totaldeductions);
                  $annualNetPay = ($monthlynetpay * 12);
                  ?>
                  <td><?php echo number_format($totaldeductions, 2); ?></td>
                  <td><?php echo number_format($monthlynetpay, 2); ?></td>
                  <td><?php echo number_format($annualNetPay, 2); ?></td>
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

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <!-- export buttons -->
  <script src="../buttons/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.flash.min.js" type="text/javascript"></script>
  <script src="../buttons/jszip.min.js" type="text/javascript"></script>
  <script src="../buttons/pdfmake.min.js" type="text/javascript"></script>
  <script src="../buttons/vfs_fonts.js" type="text/javascript"></script>
  <script src="../buttons/buttons.html5.min.js" type="text/javascript"></script>
  <script src="../buttons/buttons.print.min.js" type="text/javascript"></script>
  <!-- export buttons end -->

  <script>
    function EditPay(str) {
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
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        dom: 'lBfrtip',
        buttons: [
          'csv', 'excel'
        ],
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ ',
          //lengthMenu: '_MENU_ items/page  ',
        }
      });

      // Input Masks
      $('#dateMask').mask('9999-99-99');
      $('#phoneMask').mask('(999) 999-9999');

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

      $("#progress-bar").width('40%');

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

    function printPageArea(areaID) {
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