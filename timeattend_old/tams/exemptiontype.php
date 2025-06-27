<?php
include "" . __DIR__ . "/header.php";


function getlevel($conn, $lid)
{
  $plevelg = 'None';

  if ($lid != 'None') {
    $hu = mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$lid'");
    while ($hug = mysqli_fetch_array($hu)) {
      $plevelg = $hug["levelnick"];
    }
  }

  return $plevelg;
}

if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE exemptiontype SET status = '$h' WHERE id = '$id'");

  //log event
  log_audit_event($uid, "UPDATE", "Updated record: $id", "Exemption Type", "success", '', '', $_SESSION['logged']);
  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Exemption Type Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['did'])) {
  $h3 = $_GET['did'];
  $notec1 = mysqli_query($conn, "UPDATE exemptiontype SET dele = '1', deleby = '$uid' WHERE id = '$h3'");

  //log event
  log_audit_event($uid, "DELETE", "Deleted record: $h3", "Exemption Type", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Exemption Type Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];
  $name4 = $_POST['name'];
  $days4 = $_POST['days'];
  //$plevel4 = $_POST['plevel'];

  $totolevel = count($_POST['plevel']);
  $alllevels = $_POST['plevel'];
  if ($totolevel == 4) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = $alllevels[2];
    $level4 = $alllevels[3];
  } elseif ($totolevel == 3) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = $alllevels[2];
    $level4 = 'None';
  } elseif ($totolevel == 2) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = 'None';
    $level4 = 'None';
  } elseif ($totolevel == 1) {
    $level1 = $alllevels[0];
    $level2 = 'None';
    $level3 = 'None';
    $level4 = 'None';
  } else {
  }

  $saveinsert1 = "UPDATE exemptiontype SET name ='$name4', days='$days4', plevel='$level1', plevel2='$level2', plevel3='$level3', plevel4='$level4', createdby='$uid', levels = '$totolevel' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    log_audit_event($uid, "UPDATE", "Updated record: $theid", "Exemption Type", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Exemption Type Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating User Exemption Type.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $name4 = $_POST['name'];
  $days4 = $_POST['days'];
  //$plevel4 = $_POST['plevel'];

  $totolevel = count($_POST['plevel']);
  $alllevels = $_POST['plevel'];
  if ($totolevel == 4) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = $alllevels[2];
    $level4 = $alllevels[3];
  } elseif ($totolevel == 3) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = $alllevels[2];
    $level4 = 'None';
  } elseif ($totolevel == 2) {
    $level1 = $alllevels[0];
    $level2 = $alllevels[1];
    $level3 = 'None';
    $level4 = 'None';
  } elseif ($totolevel == 1) {
    $level1 = $alllevels[0];
    $level2 = 'None';
    $level3 = 'None';
    $level4 = 'None';
  } else {
  }

  $saveinsert1 = "INSERT INTO exemptiontype (`name`, `days`, `plevel`, `plevel2`, `plevel3`, `plevel4`, `createdby`, `company`, levels) VALUES ('$name4', '$days4', '$plevel1', '$level2', '$level3', '$level4', '$uid', '$companyMain', '$totolevel')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Exemption Type", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> User Exemption Type Successfully Inserted.</span>
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
    <span><strong>Opps!</strong> Error Inserting User Exemption Type.</span>
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
      <i class="icon icon ion-ios-contact-outline"></i>
      <div>
        <h4>User Exemption Type</h4>
        <p class="mg-b-0">Exemption Management Panel - Exemption Type.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus mg-r-10"></i> Add Exemption Type</button>

        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Exemption Name</th>
                <th class="">No Days</th>
                <th class="">1st Approval</th>
                <th class="">2nd Approval</th>
                <th class="">3rd Approval</th>
                <th class="">4th Approval</th>
                <th class="">Status</th>
                <th class="">Created By</th>
                <th class=""></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM exemptiontype WHERE dele = '0' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $name = $huserb1d5["name"];
                $days = $huserb1d5["days"];
                $plevely = $huserb1d5["plevel"];
                $plevely2 = $huserb1d5["plevel2"];
                $plevely3 = $huserb1d5["plevel3"];
                $plevely4 = $huserb1d5["plevel4"];
                $status = $huserb1d5["status"];
                $createdby = $huserb1d5["createdby"];

                $plevelname1 = getlevel($conn, $plevely);
                $plevelname2 = getlevel($conn, $plevely2);
                $plevelname3 = getlevel($conn, $plevely3);
                $plevelname4 = getlevel($conn, $plevely4);

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
                  <td><?php echo $name; ?></td>
                  <td><?php echo $days; ?></td>
                  <td><?php echo $plevelname1; ?></td>
                  <td><?php echo $plevelname2; ?></td>
                  <td><?php echo $plevelname3; ?></td>
                  <td><?php echo $plevelname4; ?></td>
                  <td>
                    <div class="progress ht-30">
                      <div class="progress-bar <?php echo $statusd; ?> wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?></div>
                    </div>
                  </td>
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
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Exemption Type</h6>
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
                        <h3 class="tx-inverse mg-b-25">Exemption Information!</h3>

                        <div class="mg-b-20">
                          <div class="form-group mg-b-0">
                            <label>Exemption Name: <span class="tx-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Exemption Name" required>
                          </div><!-- form-group -->
                        </div>

                        <div class="d-flex justify-content-end">
                          <button class="btn btn-info btn-sm" onclick="createInput();">Add Approval Level</button>
                        </div>

                        <!-- start -->
                        <div id="applevel">

                          <div class="form-group mg-b-20-force levelclass">
                            <label>Approval Level 1: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
                              <option value="">Choose Approval Level</option>
                              <?php
                              $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
                              while ($intload1a = mysqli_fetch_array($intload1)) {
                                $inid1 = $intload1a["id"];
                                $iname1 = $intload1a["levelnick"];
                              ?>
                                <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>

                        </div>
                        <!-- end -->

                        <div class=" mg-b-20">
                          <div class="form-group mg-b-0-force">
                            <label>No of Days: <span class="tx-danger">*</span></label>
                            <input type="number" name="days" class="form-control" placeholder="0" min="1" required>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit User Information</h6>
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

  <script src="../js/bracket.js"></script>
  <script src="../js/map.shiftworker.js"></script>
  <script src="../js/ResizeSensor.js"></script>
  <script src="../js/dashboard.js"></script>

  <script>
    function createInput() {
      //var $input = $('<input type="button" value="new button" />');
      //$input.appendTo($("#applevel"));

      var elements = document.querySelectorAll('.levelclass').length;
      var str = elements + 1;

      if (str <= 4) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("pasteedit").innerHTML = this.responseText;
            var input = this.responseText;
            $("#applevel").append(this.responseText);
          }
        };
        xmlhttp.open("GET", "leaveforms.php?qid=" + str, true);
        xmlhttp.send();
      } else {
        alert("Maximum level is 4");
      }

    }

    function createInput2() {
      //var $input = $('<input type="button" value="new button" />');
      //$input.appendTo($("#applevel"));

      var elements2 = document.querySelectorAll('.levelclass2').length;
      var str2 = elements2 + 1;

      if (str2 <= 4) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("pasteedit").innerHTML = this.responseText;
            var input = this.responseText;
            $("#applevel2").append(this.responseText);
          }
        };
        xmlhttp.open("GET", "leaveforms2.php?qid=" + str2, true);
        xmlhttp.send();
      } else {
        alert("Maximum level is 4");
      }

    }
  </script>

  <script type="text/javascript">
    $("body").on("click", "#DeleteRow", function() {
      $(this).parents("#row").remove();
    });

    $("body").on("click", "#DeleteRow2", function() {
      $(this).parents("#row2").remove();
    });
  </script>

  <script>
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>

  <script>
    function Edit(str) {
      var str2 = "<?php echo $companyMain; ?>";
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
        xmlhttp.open("GET", "exemptiontype2.php?q=" + str + "&com=" + str2, true);
        xmlhttp.send();
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