<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE workshift SET status = '$h' WHERE id = '$id'");
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Workshift Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE workshift SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Workshift Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];

  $shiftname = $_POST["shiftname"];
  $shifttype = $_POST["shifttype"];
  $timein = $_POST["timein"];
  $timeout = $_POST["timeout"];
  $hours = $_POST["hours"];
  $saturday = $_POST["saturday"];
  $sunday = $_POST["sunday"];
  $status = $_POST["status"];
  $holiday = $_POST["holiday"];

  if (isset($_POST['saturday'])) {
    $saturday = $_POST['saturday'];
  } else {
    $saturday = "0";
  }
  if (isset($_POST['sunday'])) {
    $sunday = $_POST['sunday'];
  } else {
    $sunday = "0";
  }
  if (isset($_POST['holiday'])) {
    $holiday = $_POST['holiday'];
  } else {
    $holiday = "0";
  }

  //
  if (isset($_POST['monday'])) {
    $monday = $_POST['monday'];
  } else {
    $monday = "0";
  }

  if (isset($_POST['tuesday'])) {
    $tuesday = $_POST['tuesday'];
  } else {
    $tuesday = "0";
  }

  if (isset($_POST['wednesday'])) {
    $wednesday = $_POST['wednesday'];
  } else {
    $wednesday = "0";
  }

  if (isset($_POST['thursday'])) {
    $thursday = $_POST['thursday'];
  } else {
    $thursday = "0";
  }

  if (isset($_POST['friday'])) {
    $friday = $_POST['friday'];
  } else {
    $friday = "0";
  }
  //        

  $saveinsert1 = "UPDATE workshift SET shiftname='$shiftname', shifttype='$shifttype', timein='$timein', timeout='$timeout', hours='$hours', saturday='$saturday', sunday='$sunday', holiday='$holiday', createdby='$uid', monday='$monday', tuesday='$tuesday', wednesday='$wednesday', thursday='$thursday', friday='$friday' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {;
    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Workshift Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Workshift.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $shiftname = $_POST["shiftname"];
  $shifttype = $_POST["shifttype"];
  $timein = $_POST["timein"];
  $timeout = $_POST["timeout"];
  $hours = $_POST["hours"];
  $saturday = $_POST["saturday"];
  $sunday = $_POST["sunday"];
  $status = $_POST["status"];
  $holiday = $_POST["holiday"];

  if (isset($_POST['saturday'])) {
    $saturday = $_POST['saturday'];
  } else {
    $saturday = "0";
  }
  if (isset($_POST['sunday'])) {
    $sunday = $_POST['sunday'];
  } else {
    $sunday = "0";
  }
  if (isset($_POST['holiday'])) {
    $holiday = $_POST['holiday'];
  } else {
    $holiday = "0";
  }

  //
  if (isset($_POST['monday'])) {
    $monday = $_POST['monday'];
  } else {
    $monday = "0";
  }

  if (isset($_POST['tuesday'])) {
    $tuesday = $_POST['tuesday'];
  } else {
    $tuesday = "0";
  }

  if (isset($_POST['wednesday'])) {
    $wednesday = $_POST['wednesday'];
  } else {
    $wednesday = "0";
  }

  if (isset($_POST['thursday'])) {
    $thursday = $_POST['thursday'];
  } else {
    $thursday = "0";
  }

  if (isset($_POST['friday'])) {
    $friday = $_POST['friday'];
  } else {
    $friday = "0";
  }
  // 

  $saveinsert1 = "INSERT INTO workshift (`shiftname`, `shifttype`, `timein`, `timeout`, `hours`, `saturday`, `sunday`, `holiday`, `createdby`, `company`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES ('$shiftname', '$shifttype', '$timein', '$timeout', '$hours', '$saturday', '$sunday', '$holiday', '$uid', '$companyMain', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Workshift", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Workshift Successfully Inserted.</span>
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
    <span><strong>Opps!</strong> Error Inserting Workshift.</span>
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
      <i class="icon icon ion-ios-time-outline"></i>
      <div>
        <h4>Shift Management</h4>
        <p class="mg-b-0">User workshift management - All employee.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus mg-r-10"></i> Add Work Shift</button>

        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Shift Name</th>
                <th class="">Shift Type</th>
                <th class="">Time In</th>
                <th class="">Time Out</th>
                <th class="wd-10p">Status</th>
                <th class="">Hours</th>

                <th class="">Monday</th>
                <th class="">Tuesday</th>
                <th class="">Wednesday</th>
                <th class="">Thursday</th>
                <th class="">Friday</th>

                <th class="">Saturday</th>
                <th class="">Sunday</th>
                <th class="">Holiday</th>
                <th class="">Created By</th>
                <th class=""></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM workshift WHERE dele = '0' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $shiftname = $huserb1d5["shiftname"];
                $shifttype = $huserb1d5["shifttype"];
                $timein = $huserb1d5["timein"];
                $timeout = $huserb1d5["timeout"];
                $hours = $huserb1d5["hours"];
                $saturday = $huserb1d5["saturday"];
                $sunday = $huserb1d5["sunday"];
                $status = $huserb1d5["status"];
                $holiday = $huserb1d5["holiday"];
                $dele = $huserb1d5["dele"];
                $deleby = $huserb1d5["deleby"];
                $createdby = $huserb1d5["createdby"];

                $monday = $huserb1d5["monday"];
                $tuesday = $huserb1d5["tuesday"];
                $wednesday = $huserb1d5["wednesday"];
                $thursday = $huserb1d5["thursday"];
                $friday = $huserb1d5["friday"];

                if ($saturday == "1") {
                  $saturday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $saturday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($sunday == "1") {
                  $sunday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $sunday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($holiday == "1") {
                  $holiday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $holiday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                /*
$hu1=mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1'");
while ($hug1= mysqli_fetch_array($hu1))
{
  $department = $hug1["departmentname"];
}
*/

                if ($monday == "1") {
                  $monday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $monday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($tuesday == "1") {
                  $tuesday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $tuesday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($wednesday == "1") {
                  $wednesday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $wednesday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($thursday == "1") {
                  $thursday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $thursday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
                }

                if ($friday == "1") {
                  $friday = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>';
                } else {
                  $friday = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';
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

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $shiftname; ?></td>
                  <td><?php echo $shifttype; ?></td>
                  <td><?php echo $timein; ?></td>
                  <td><?php echo $timeout; ?></td>
                  <td>
                    <div class="progress ht-30">
                      <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
                    </div>
                  </td>
                  <td><?php echo $hours; ?></td>

                  <td><?php echo $monday; ?></td>
                  <td><?php echo $tuesday; ?></td>
                  <td><?php echo $wednesday; ?></td>
                  <td><?php echo $thursday; ?></td>
                  <td><?php echo $friday; ?></td>

                  <td><?php echo $saturday; ?></td>
                  <td><?php echo $sunday; ?></td>
                  <td><?php echo $holiday; ?></td>
                  <td><?php echo $createdby; ?></td>
                  <td>
                    <a href="?activate=<?php echo $onoff; ?>&id=<?php echo $eid; ?>" class="btn <?php echo $btnactivate; ?> btn-icon" id="<?php echo $onoff; ?>" onclick="return confirmActivation(this.id);">
                      <div><i class="fa <?php echo $btnicon; ?>"></i></div>
                    </a>
                    <a href="javascript:;" class="btn btn-primary btn-icon" onclick="Edit(<?php echo $eid; ?>);" data-toggle="modal" data-target="#editemployee">
                      <div><i class="fa fa-edit"></i></div>
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
              <form id="addemployee2" action="" method="POST">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Shift Information</h6>
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
                        <div class=" mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>Shift Name: <span class="tx-danger">*</span></label>
                            <input type="text" name="shiftname" class="form-control" placeholder="Shift Name" required>
                          </div><!-- form-group -->
                        </div>

                        <div class=" mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>Shift Type: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " name="shifttype" data-placeholder="Choose Shift" required>
                              <option value="">Choose Shift</option>
                              <option value="Regular">Regular Schedule</option>
                              <option value="Shift">Shift Schedule</option>
                              <option value="Off">Off Schedule</option>
                            </select>
                          </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>Time In: <span class="tx-danger">*</span></label>
                            <input id="tpBasic1" type="text" name="timein" class="form-control" placeholder="Time In" onchange="caltime()" required>
                          </div><!-- form-group -->
                          <div class="form-group mg-l-10 mg-b-0-force">
                            <label>Time Out: <span class="tx-danger">*</span></label>
                            <input id="tpBasic2" type="text" name="timeout" class="form-control" placeholder="Time Out" onchange="caltime()" required>
                          </div><!-- form-group -->
                          <div class="form-group mg-l-10 mg-b-0-force">
                            <label>Hours: <span class="tx-danger">*</span></label>
                            <input id="tpBasic3" type="text" name="hours" class="form-control" min="1" max="24" step="0.0" placeholder="Hours" required>
                          </div><!-- form-group -->
                        </div>

                        <div class="d-flex mg-b-20">

                          <div class="">
                            <p class="mg-b-10">Choose Work days</p>
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="monday" value="1">
                                <span>Work Monday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="tuesday" value="1">
                                <span>Work Tuesday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="wednesday" value="1">
                                <span>Work Wednesday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="thursday" value="1">
                                <span>Work Thursday</span>
                              </label>
                            </div><!-- form-group -->
                          </div>

                          <div class="mg-l-35">
                            <p class="mg-b-10">.</p>
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="friday" value="1">
                                <span>Work Friday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="saturday" value="1">
                                <span>Work Saturday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="sunday" value="1">
                                <span>Work Sunday</span>
                              </label>
                            </div><!-- form-group -->
                            <div class="d-flex form-group mg-b-0">
                              <label class="ckbox">
                                <input type="checkbox" name="holiday" value="1">
                                <span>Work Holiday</span>
                              </label>
                            </div><!-- form-group -->
                          </div>

                        </div>

                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs">Save changes</button>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Shift Information</h6>
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

    $('#tpBasic1').timepicker();
    $('#tpBasic2').timepicker();
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
            $('#tpBasic11').timepicker();
            $('#tpBasic22').timepicker();
          }
        };
        xmlhttp.open("GET", "workshift2.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function parseTime(cTime) {
      if (cTime == '') return null;
      var d = new Date();
      var time = cTime.match(/(\d+)(:(\d\d))?\s*(p?)/);
      d.setHours(parseInt(time[1]) + ((parseInt(time[1]) < 12 && time[4]) ? 12 : 0));
      d.setMinutes(parseInt(time[3]) || 0);
      d.setSeconds(0, 0);
      return d;
    }

    function caltime() {
      var a = document.getElementById("tpBasic1").value;
      var b = document.getElementById("tpBasic2").value;
      var c = document.getElementById("tpBasic3").value;

      if (a === "") {
        alert("Please Choose Start Time first.");
      } else if (b === "") {
        alert("Please Choose End Time first.");
      } else {
        var startTime = moment(a, "HH:mm:ss a");
        var endTime = moment(b, "HH:mm:ss a");
        var duration = moment.duration(endTime.diff(startTime));
        var hours = parseInt(duration.asHours());
        var minutes = parseInt(duration.asMinutes()) % 60;
        var d = (minutes / 60);
        var final = +hours + +d;

        //if((hours < 1) && (minutes < 30)){
        if (duration < 1) {
          alert("Start Time is before End time, kindly check and correct");
          document.getElementById("tpBasic3").value = "";
        } else {
          document.getElementById("tpBasic3").value = final;
        }

      };

    }

    function caltime2() {
      var a = document.getElementById("tpBasic11").value;
      var b = document.getElementById("tpBasic22").value;
      var c = document.getElementById("tpBasic33").value;

      if (a === "") {
        alert("Please Choose Start Time first.");
      } else if (b === "") {
        alert("Please Choose End Time first.");
      } else {
        var startTime = moment(a, "HH:mm:ss a");
        var endTime = moment(b, "HH:mm:ss a");
        var duration = moment.duration(endTime.diff(startTime));
        var hours = parseInt(duration.asHours());
        var minutes = parseInt(duration.asMinutes()) % 60;
        var d = (minutes / 60);
        var final = +hours + +d;

        //if(hours < 1){
        if (duration < 1) {
          alert("Start Time is before End time, kindly check and correct");
          document.getElementById("tpBasic33").value = "";
        } else {
          document.getElementById("tpBasic33").value = final;
        }

      };

    }

    $(document).on("focusin", "#tpBasic3", function() {
      $(this).prop('readonly', true);
    });

    $(document).on("focusout", "#tpBasic3", function() {
      $(this).prop('readonly', false);
    });

    $(document).on("focusin", "#tpBasic33", function() {
      $(this).prop('readonly', true);
    });

    $(document).on("focusout", "#tpBasic33", function() {
      $(this).prop('readonly', false);
    });
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