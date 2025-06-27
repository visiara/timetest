<?php
include "" . __DIR__ . "/header.php";


if (!empty($_GET['activate'])) {
  $h = $_GET['activate'];
  $id = $_GET['id'];
  $notec13 = mysqli_query($conn, "UPDATE admins SET status = '$h' WHERE id = '$id'");

  //log event
  log_audit_event($uid, "UPDATE", "Updated record: $id", "Administrator Status", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Status Successfully Updated</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_GET['delid'])) {
  $h3 = $_GET['delid'];

  //$notec1=mysqli_query($conn, "UPDATE admins SET dele = '1', deleby = '$uid' WHERE id = '$h3'");
  $notec1 = mysqli_query($conn, "DELETE FROM employee_fingerprints WHERE applicant_id = '$h3' AND company='$companyMain'");
  $notec12 = mysqli_query($conn, "DELETE FROM photos WHERE applicant_id = '$h3' AND company='$companyMain'");

  //log event
  log_audit_event($uid, "DELETE", "Updated record: $h3", "Employee Biometrics", "success", '', '', $_SESSION['logged']);

  $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Biometric Data Successfully Deleted.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
}

if (!empty($_POST['editp'])) {

  $theid = $_POST['theid'];
  $fname4 = $_POST['fname'];
  $mname4 = $_POST['mname'];
  $lname4 = $_POST['lname'];
  $email4 = $_POST['email'];
  $plevel4 = $_POST['plevel'];
  $gender4 = $_POST['gender'];
  $phone4 = $_POST['phone'];

  if (isset($_POST['main'])) {
    $mainadmin4 = $_POST['main'];
  } else {
    $mainadmin4 = "0";
  }
  if (isset($_POST['edms'])) {
    $edms4 = $_POST['edms'];
  } else {
    $edms4 = "0";
  }
  if (isset($_POST['tams'])) {
    $tams4 = $_POST['tams'];
  } else {
    $tams4 = "0";
  }
  if (isset($_POST['dcapture'])) {
    $datacapture4 = $_POST['dcapture'];
  } else {
    $datacapture4 = "0";
  }
  if (isset($_POST['payroll'])) {
    $payroll4 = $_POST['payroll'];
  } else {
    $payroll4 = "0";
  }

  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];
  $status4 = $_POST['status'];

  $path = "../images/employee/";
  $oldimage = $_POST['oldpic'];

  if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

    //READING THE MAGES:::::::::::::::::::::

    $picname1 = $_FILES['filename']['name'];
    $size1 = $_FILES['filename']['size'];
    $type1 = $_FILES['filename']['type'];
    $error1 = $_FILES['filename']['type'];
    $get_extension1 = explode(".", $_FILES['filename']['name']);
    $extension1 = $get_extension1[1];
    $word1 = date("mdYgisa");
    $img_name1 = (date("mdyHis") + 1);
    $newimage = "$img_name1.$extension1";

    copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
    $profilepic4 = $newimage;
  } else {
    $profilepic4 = $oldimage;
  }

  $saveinsert1 = "UPDATE admins SET fname='$fname4', mname='$mname4', lname='$lname4', email='$email4', plevel='$plevel4', gender='$gender4', edms='$edms4', payroll='$payroll4', phone='$phone4', datacapture='$datacapture4', tams='$tams4', mainadmin='$mainadmin4', uname='$uname4', updaby='$uid', profilepic='$profilepic4' WHERE id='$theid'";
  if (mysqli_query($conn, $saveinsert1)) {;
    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Updated.</span>
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
    <span><strong>Opps!</strong> Error Updating Administrator Details.</span>
  </div><!-- d-flex -->
</div><!-- alert -->
';
  }
}

if (!empty($_POST['addp'])) {
  $h2 = $_POST['addp'];

  $fname4 = $_POST['fname'];
  $mname4 = $_POST['mname'];
  $lname4 = $_POST['lname'];
  $email4 = $_POST['email'];
  $plevel4 = $_POST['plevel'];
  $gender4 = $_POST['gender'];
  $phone4 = $_POST['phone'];

  if (isset($_POST['main'])) {
    $mainadmin4 = $_POST['main'];
  } else {
    $mainadmin4 = "0";
  }
  if (isset($_POST['edms'])) {
    $edms4 = $_POST['edms'];
  } else {
    $edms4 = "0";
  }
  if (isset($_POST['tams'])) {
    $tams4 = $_POST['tams'];
  } else {
    $tams4 = "0";
  }
  if (isset($_POST['dcapture'])) {
    $datacapture4 = $_POST['dcapture'];
  } else {
    $datacapture4 = "0";
  }
  if (isset($_POST['payroll'])) {
    $payroll4 = $_POST['payroll'];
  } else {
    $payroll4 = "0";
  }

  $uname4 = $_POST['uname'];
  $pword4 = $_POST['pword'];
  $status4 = $_POST['status'];

  $path = "../images/employee/";
  $oldimage = "avatar2.png";

  if (isset($_FILES['filename']['name']) && strlen($_FILES['filename']['name']) > 0) {

    //READING THE MAGES:::::::::::::::::::::

    $picname1 = $_FILES['filename']['name'];
    $size1 = $_FILES['filename']['size'];
    $type1 = $_FILES['filename']['type'];
    $error1 = $_FILES['filename']['type'];
    $get_extension1 = explode(".", $_FILES['filename']['name']);
    $extension1 = $get_extension1[1];
    $word1 = date("mdYgisa");
    $img_name1 = (date("mdyHis") + 1);
    $newimage = "$img_name1.$extension1";

    copy($_FILES["filename"]["tmp_name"], $path . $newimage) or die("<b>Unknown error!</b>");
    $profilepic4 = $newimage;
  } else {
    $profilepic4 = $oldimage;
  }

  $saveinsert1 = "INSERT INTO admins (`fname`, `mname`, `lname`, `email`, `phone`, `gender`, `plevel`, `uname`, `pword`, `edms`, `payroll`, `datacapture`, `tams`, `mainadmin`, `profilepic`, `createdby`, `company`) VALUES ('$fname4', '$mname4', '$lname4', '$email4', '$phone4', '$gender4', '$plevel4', '$uname4', '$pword4', '$edms4', '$payroll4', '$datacapture4', '$tams4', '$mainadmin4', '$profilepic4', '$uid', '$companyMain')";
  if (mysqli_query($conn, $saveinsert1)) {

    //log event
    $dinsert = mysqli_insert_id($conn);
    log_audit_event($uid, "INSERT", "Inserted record: $dinsert", "Biometrics", "success", '', '', $_SESSION['logged']);

    $status = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-checkmark alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Success!</strong> Administrator Detail Successfully Inserted.</span>
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
    <span><strong>Opps!</strong> Error Inserting Administrator Details.</span>
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
  <link href=".../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href=".../assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


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
      <i class="icon icon ion-aperture"></i>
      <div>
        <h4>Biometric Data</h4>
        <p class="mg-b-0">User Biometric Data - Pictures and all 10.</p>
      </div>
    </div><!-- d-flex -->

    <div class="">
      <div>

        <?php echo $status; ?>
        <!--
          <button class="btn btn-teal" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus mg-r-10"></i> Add Administrator</button>
-->
        <div class="table-wrapper mg-t-15">
          <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="datatable1">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Emp ID</th>
                <th class="">Full name</th>
                <th class="">P</th>
                <th class="">R1</th>
                <th class="">R2</th>
                <th class="">R3</th>
                <th class="">R4</th>
                <th class="">R5</th>
                <th class="">L1</th>
                <th class="">L2</th>
                <th class="">L3</th>
                <th class="">L4</th>
                <th class="">L5</th>
                <th class="">Gender</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND company='$companyMain'");
              while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                $eid = $huserb1d5["id"];
                $employeeid = $huserb1d5["employeeid"];
                $fname = $huserb1d5["fname"];
                $mname = $huserb1d5["mname"];
                $lname = $huserb1d5["lname"];

                $gender = $huserb1d5["gender"];
                $status = $huserb1d5["status"];
                $profilepic = $huserb1d5["profilepic"];

                $puq1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$employeeid' AND company='$companyMain' ");
                $pu1 = mysqli_num_rows($puq1);
                $pu1 > 0 ? $photo = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $photo = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq1 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '1' AND company='$companyMain'");
                $fu1 = mysqli_num_rows($fuq1);
                $fu1 > 0 ? $f1 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f1 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq2 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '2' AND company='$companyMain' ");
                $fu2 = mysqli_num_rows($fuq2);
                $fu2 > 0 ? $f2 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f2 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq3 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '3' AND company='$companyMain' ");
                $fu3 = mysqli_num_rows($fuq3);
                $fu3 > 0 ? $f3 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f3 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq4 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '4' AND company='$companyMain'");
                $fu4 = mysqli_num_rows($fuq4);
                $fu4 > 0 ? $f4 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f4 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq5 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '5' AND company='$companyMain' ");
                $fu5 = mysqli_num_rows($fuq5);
                $fu5 > 0 ? $f5 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f5 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq6 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '6' AND company='$companyMain' ");
                $fu6 = mysqli_num_rows($fuq6);
                $fu6 > 0 ? $f6 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f6 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq7 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '7' AND company='$companyMain' ");
                $fu7 = mysqli_num_rows($fuq7);
                $fu7 > 0 ? $f7 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f7 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq8 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '8' AND company='$companyMain' ");
                $fu8 = mysqli_num_rows($fuq8);
                $fu8 > 0 ? $f8 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f8 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq9 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '9' AND company='$companyMain' ");
                $fu9 = mysqli_num_rows($fuq9);
                $fu9 > 0 ? $f9 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f9 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

                $fuq10 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$employeeid' AND fingerid = '10' AND company='$companyMain' ");
                $fu10 = mysqli_num_rows($fuq10);
                $fu10 > 0 ? $f10 = '<i class="icon ion-checkmark alert-icon tx-15 tx-success"></i>' : $f10 = '<i class="icon ion-close alert-icon tx-15 tx-danger"></i>';

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
                  <td><?php echo $employeeid; ?></td>
                  <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                  <td><?php echo $photo; ?></td>
                  <td><?php echo $f1; ?></td>
                  <td><?php echo $f2; ?></td>
                  <td><?php echo $f3; ?></td>
                  <td><?php echo $f4; ?></td>
                  <td><?php echo $f5; ?></td>
                  <td><?php echo $f6; ?></td>
                  <td><?php echo $f7; ?></td>
                  <td><?php echo $f8; ?></td>
                  <td><?php echo $f9; ?></td>
                  <td><?php echo $f10; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td>
                    <a href="javascript:;" class="btn btn-primary btn-icon" onclick=Edit("<?php echo $employeeid; ?>",1); data-toggle="modal" data-target="#editemployee">
                      <div><i class="fa fa-camera"></i></div>
                    </a>
                    <a href="javascript:;" class="btn btn-primary btn-icon" onclick=Edit("<?php echo $employeeid; ?>",2); data-toggle="modal" data-target="#editemployee">
                      <div><i class="fa fa-paw"></i></div>
                    </a>

                    <a href="javascript:;" class="btn btn-danger btn-icon" onclick=myConfirm("<?php echo $employeeid; ?>");>
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

        <!-- Edit employee -->
        <div id="editemployee" class="modal fade effect-newspaper">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">User Biometric Data</h6>
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
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>

  <script>
    function Edit(str, str2) {
      var com = "<?php echo $companyMain; ?>";
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
        xmlhttp.open("GET", "bio.php?q=" + str + "&p=" + str2 + "&com=" + com, true);
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

  <script>
    function myConfirm(a) {
      var result = confirm("Are you really want to delete this item?");
      if (result) {
        window.location.href = "https://timatend.com/tams/biometrics.php?delid=" + a;
      }
    }
  </script>

</body>

</html>