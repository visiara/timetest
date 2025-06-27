<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE kpi_list SET status = '$h' WHERE id = '$id'");

  //log event
  log_audit_event($uid, "UPDATE", "Updated record: $id", "KPI Status", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> KPI Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE kpi_list SET dele = '1', deleby = '$uid' WHERE id = '$h3'");

  //log event
  log_audit_event($uid, "DELETE", "Deleted record: $h3", "KPI Data", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> KPI Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];

  $endmonth = $_POST["month"];
  $endyear = $_POST["year"];
  $name = $_POST["title"];
  $startinfo = $_POST["com"];
  $pweight = $_POST["weight"];

  $saveinsert1 = "UPDATE kpi_list SET endmonth='$endmonth', endyear='$endyear', name='$name', startinfo='$startinfo', kweight='$pweight' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    log_audit_event($uid, "UPDATE", "Updated record: $theid", "KPI Data", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> KPI Successfully Updated.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  } else {
    $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Updating KPI.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['score'])) {

  $theid = $_POST['theid'];

  $rep = $_POST["rep"];
  $grade = $_POST["grade"];
  $achievement = $_POST["achievement"];

  $saveinsert1 = "UPDATE kpi_list SET dpoll='$grade', endinfo='$rep', kachieve='$achievement', fstatus = fstatus + '1', whoadmin='$loggedid' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    log_audit_event($uid, "UPDATE", "Updated record: $theid", "Graded KPI", "success", '', '', $_SESSION['logged']);

    $status = '
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Success!</strong> KPI Successfully Updated.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';

    $hu1fmy = mysqli_query($conn, "SELECT * FROM kpi_list WHERE id = '$theid'");
    while ($hug1fmy = mysqli_fetch_array($hu1fmy)) {
      $empidm = $hug1fmy["employeeid"];
    }

    $hu1fm = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$empidm'");
    while ($hug1fm = mysqli_fetch_array($hu1fm)) {
      $fnamefm = $hug1fm["fname"];
      $mnamefm = $hug1fm["mname"];
      $lnamefm = $hug1fm["lname"];
      $email_to = $hug1fm["email"];
    }
    $whoName = "$fnamefm $mnamefm $lnamefm";

    $whoMailTo = "staff";
    include "" . __DIR__ . "/sendemail.php";
  } else {
    $status = '
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-times alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Opps!</strong> Error Updating KPI.</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  ';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $endmonth = $_POST["month"];
  $endyear = $_POST["year"];
  $kpitype = $_POST["type"];
  $name = $_POST["title"];
  $startinfo = $_POST["com"];
  $employeeid = $_POST["who"];
  $pweight = $_POST["weight"];

  $createdate = date("Y-m-d");

  $saveinsert1 = "INSERT INTO kpi_list (`company`, `createdate`, `employeeid`, `endmonth`, `endyear`, `kpitype`, `name`, `startinfo`) VALUES ('$companyMain', '$createdate', '$employeeid', '$endmonth', '$endyear', '$kpitype', '$name', '$startinfo')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Created KPI", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> KPI Successfully Inserted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  } else {
    $status = '
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Opps!</strong> Error Inserting KPI.</span>
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
        <p class="mg-b-0">KPI management - Departmental KPI Indicators.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <h4 class="mg-b-20">Departmental KPI</h4>

        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
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

                <th class="">Weight</th>
                <th class="">Achievement</th>
                <th class="">Score</th>


              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';

              //if($user_role == "3"){
              if ($user_role < "4") {
                $huserbd5 = mysqli_query($conn, "SELECT * FROM kpi_list WHERE status = 'Active' AND company='$companyMain' AND kpitype='Departmental' AND employeeid='$loggeddepartment'");
              } else {
                $huserbd5 = mysqli_query($conn, "SELECT * FROM kpi_list WHERE status = 'Active' AND company='$companyMain' AND kpitype='Departmental'");
              }

              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
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
                $weightg = $huserb1d5["kweight"];
                $achieveg = $huserb1d5["kachieve"];
                $fstatus = $huserb1d5["fstatus"];

                if ($kpitype == 'Individual') {
                  $hu1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$employeeid2'");
                  while ($hug1 = mysqli_fetch_array($hu1)) {
                    $employeeid = $hug1["employeeid"];
                    $fname = $hug1["fname"];
                    $mname = $hug1["mname"];
                    $lname = $hug1["lname"];
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
                if ($status == "Active") {
                  $statusd = "bg-success";
                  $btnactivate = "btn-danger";
                  $btnicon = "fa-lock";
                  $onoff = "InActive";
                } else {
                  $statusd = "bg-danger";
                  $btnactivate = "btn-success";
                  $btnicon = "fa-lock-open";
                  $onoff = "Active";
                }

                if ($dpoll > 0) {
                  $btnicon2 = "<i class='fa fa-check-circle tx-success'></i>";
                } else {
                  $btnicon2 = "";
                }

                if ($fstatus == "2") {
                  $btnicon3 = "<i class='fa fa-exclamation-circle tx-danger'></i>";
                } elseif ($fstatus == "3") {
                  $btnicon3 = "<i class='fa fa-exclamation-circle tx-success'></i>";
                } else {
                  $btnicon3 = "";
                }

                $sa = strtotime(date("Y-m-d"));
                $last = date("Y-m-t", strtotime($endyear . "-" . $endmonth . '-01'));
                $sa2 = strtotime(date($endyear . "-" . $endmonth . "-" . $last));

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $RegNo . " " . $btnicon2 . " " . $btnicon3; ?></td>
                  <td><?php echo $regName; ?></td>
                  <td><?php echo $kpitype; ?></td>
                  <td><?php echo $createdate; ?></td>
                  <td><?php echo date("F", strtotime($endyear . '-' . $endmonth)) . ", $endyear"; ?></td>
                  <!--<td>
<div class="progress ht-30">
  <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
</div>
                  </td>-->
                  <td><a href="" class="btn btn-dark tx-11 tx-uppercase pd-y-10 pd-x-15 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo6" onclick="show2(<?php echo $eid; ?>);">View</a></td>
                  <td><?php echo "$weightg%"; ?></td>
                  <td><?php echo "$achieveg%"; ?></td>
                  <td><?php echo "$dpoll%"; ?></td>
                  <td>
                    <a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" class="btn <?php echo $btnactivate; ?> btn-icon" id="<?php echo $onoff; ?>" onclick="return confirmActivation(this.id);">
                      <div><i class="fa <?php echo $btnicon; ?>"></i></div>
                    </a>
                    <?php if (($dpoll == "0") || ($sa2 > $sa)) { ?>
                      <a href="javascript:;" class="btn btn-dark btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">
                        <div><i class="fa fa-edit"></i></div>
                      </a>
                    <?php } ?>
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
              <form id="addemployee2" action="" method="POST">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add KPI Information</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">

                  <input type="hidden" name="addp" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">

                        <div class="d-flex align-items-center justify-content-between mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label for="month">End Month: <span class="tx-danger">*</span></label>
                            <select id="month" name="month" class="form-control select2" required>
                              <option value="">Choose End Month</option>
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
                          </div><!-- form-group -->
                          <div class="form-group mg-l-10 mg-b-0-force">
                            <label for="year">End Year: <span class="tx-danger">*</span></label>
                            <select id="year" name="year" class="form-control select2" required>
                              <option value="">Choose End Year</option>
                              <option name="<?php echo date('Y') - 1; ?>" value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                              <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
                              <option name="<?php echo date('Y') + 1; ?>" value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                              <option name="<?php echo date('Y') + 2; ?>" value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                            </select>
                          </div><!-- form-group -->
                          <div class="form-group mg-l-10 mg-b-0-force">
                            <label>KPI Type: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " id="type" name="type" data-placeholder="Choose KPI" onchange="show();" onselect="show();" required>
                              <option value="">Choose KPI</option>
                              <option value="Individual">Individual</option>
                              <option value="Departmental">Departmental</option>
                            </select>
                          </div><!-- form-group -->
                        </div>

                        <div class=" mg-b-20" id="show">

                        </div>

                        <div class=" mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>Title: <span class="tx-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                          </div><!-- form-group -->
                        </div>

                        <div class=" mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>Comments: </label>
                            <textarea name="com" rows="3" class="form-control" placeholder="Comments"></textarea>
                          </div><!-- form-group -->
                        </div>

                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success tx-size-xs">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Edit employee -->
        <div id="editemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit KPI Information</h6>
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
                <button type="submit" class="btn btn-success tx-size-xs" form="editemployee2">Save changes</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- MODAL GRID -->
        <div id="modaldemo6" class="modal fade">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
              <div class="modal-body pd-0">
                <div class="row no-gutters" id="show2">

                </div><!-- row -->

              </div><!-- modal-body -->
            </div><!-- modal-content -->
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
        xmlhttp.open("GET", "kpi1b.php?q=" + str + "&com=" + str2, true);
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