<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$ddate = $_GET['d'];
$companyMain = $_GET['com'];

//$huz=mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$employeeid' AND company='$companyMain'");
$huz = mysqli_query($conn, "SELECT * FROM attendance WHERE id = '$q'");
$huyz = mysqli_num_rows($huz);
while ($hugz = mysqli_fetch_array($huz)) {
  $etimeInseconds = $hugz["expectedTimin"];
  $dtimeInseconds = $hugz["timeInseconds"];
  $etimeOutseconds = $hugz["expectedTimeOut"];
  $dtimeOutseconds = $hugz["timeOutseconds"];
  $timeOutsecondsMain = $hugz["timeOutseconds"];
  $aover = $hugz["aover"];

  $date1p = $hugz["date"];
  $employeeidp = $hugz["employeeid"];
  $companyMainp = $hugz["company"];
}

$huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE employeeid = '$employeeidp' AND company='$companyMainp'");
while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
  $fname = $huserb1d5["fname"];
  $mname = $huserb1d5["mname"];
  $lname = $huserb1d5["lname"];
}

$compo1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$companyMainp'");
while ($compo12 = mysqli_fetch_array($compo1)) {
  $compo = $compo12["deducttime"];
  $comtype = $compo12["comtype"];
}

if ($dtimeOutseconds == "0" && $dtimeInseconds != "0") {
  if ($aover == "1") {
    $dtimeOutseconds = ($etimeOutseconds);
  } else {
    $daytimeOut = date('Y-m-d H:i:s', $etimeOutseconds);
    $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " - $compo hours"));
    $dtimeOutseconds = (strtotime($newExpectedTimeOut) * 1000);

    if ($dtimeOutseconds <= $dtimeInseconds) {
      $daytimeOut = date('Y-m-d H:i:s', ($dtimeInseconds / 1000));
      $newExpectedTimeOut = date('Y-m-d H:i:s', strtotime($daytimeOut . " + 1 hours"));
      $dtimeOutseconds = (strtotime($newExpectedTimeOut) * 1000);
    }
  }
}

$timeind = round(abs($etimeInseconds - ($dtimeInseconds / 1000)) / 60, 2);
$timeoutd = round(abs($etimeOutseconds - ($dtimeOutseconds / 1000)) / 60, 2);

$timeIn = date("Y-m-d h:i A", ($dtimeInseconds / 1000));
$timeOut = date("Y-m-d h:i A", ($dtimeOutseconds / 1000));
$etimeIn = date("Y-m-d h:i A", $etimeInseconds);
$etimeOut = date("Y-m-d h:i A", $etimeOutseconds);

// late OR oNTIME resumption
if (($dtimeInseconds / 1000) > $etimeInseconds) {
  $come = "Late";
  $dicon = "<i class='fa fa-ban tx-danger tx-20'> Late</i>";
} elseif (($dtimeInseconds / 1000) == $etimeInseconds) {
  $come = "On-time";
  $dicon = "<i class='far fa-check-circle tx-info tx-20'> On-time</i>";
} else {
  $come = "Early";
  $dicon = "<i class='far fa-check-circle tx-success tx-20'> Early</i>";
}

// late OR oNTIME closing
if (($dtimeOutseconds / 1000) > $etimeOutseconds) {
  $come1 = "Late";
  $dicon1 = "<i class='far fa-check-circle tx-success tx-20'> Late</i>";
} elseif (($dtimeOutseconds / 1000) == $etimeOutseconds) {
  $come1 = "On-time";
  $dicon1 = "<i class='far fa-check-circle tx-info tx-20'> On-time</i>";
} else {
  $come1 = "Early";
  $dicon1 = "<i class='fa fa-ban tx-danger tx-20'> Early</i>";
}

//hr diffrence
$hup = mysqli_query($conn, "SELECT * FROM attendance2 WHERE date = '$date1p' AND employeeid = '$employeeidp' AND company='$companyMainp'");
$hourdiff = 0;
while ($hugp = mysqli_fetch_array($hup)) {
  $timeInsecondsp = $hugp["timeInseconds"];
  $timeOutsecondsp = ($hugp["timeOutseconds"] == "0") ? $etimeOutseconds : $hugp["timeOutseconds"];

  $hourdiffp += ($hugp["timeOutseconds"] == "0") ? (abs(($timeInsecondsp / 1000) - ($timeOutsecondsp)) / 60) : (abs(($timeInsecondsp / 1000) - ($timeOutsecondsp / 1000)) / 60);
}
$hourdiffp = round($hourdiffp, 2);

?>

<div class="col-12 bg-white">
  <div class="pd-20">
    <div class="card bd-0">
      <div class="card-header bg-info text-white">
        <h3><?php echo "$fname $mname $lname"; ?></h3>
        <h5><?php echo date("l, d F Y", strtotime("$date1p")); ?> <?php echo ($timeOutsecondsMain == "0" && $dtimeInseconds != "0") ? "<i class='fa fa-clock tx-danger tx-20'></i>" : ""; ?></h5>
      </div><!-- card-header -->
    </div>
  </div>
</div>

<div class="col-6 bg-white">
  <div class="pd-20">
    <div class="card bd-0">
      <div class="card-header bg-primary text-white">
        Resumption Details
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom">

        <div class="list-group">
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Expected Time-In</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <h6 class="tx-inverse"><?php echo $etimeIn; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Punched Time-In</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10 ">
                <h6 class="tx-inverse"><?php echo $timeIn; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Time Difference</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <h6 class="tx-inverse"><?php echo $timeind . " Minutes"; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Status:</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <?php echo $dicon; ?>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
        </div><!-- list-group -->

      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- pd-20 -->
</div><!-- col-6 -->

<div class="col-6 bg-white">
  <div class="pd-20">
    <div class="card bd-0">
      <div class="card-header bg-warning text-white">
        Closing Details
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom">
        <div class="list-group">
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Expeted Time-Out</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <h6 class="tx-inverse"><?php echo $etimeOut; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Punched Time-Out</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10 ">
                <h6 class="tx-inverse"><?php echo $timeOut; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Time Difference</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <h6 class="tx-inverse"><?php echo $timeoutd . " Minutes"; ?></h6>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
          <div class="list-group-item pd-y-10 rounded-bottom-0">
            <div class="media">
              <div class="media-body">
                <h6 class="tx-inverse">Status</h6>
              </div><!-- media-body -->
              <div class="d-flex mg-l-10">
                <?php echo ($timeOutsecondsMain == "0" && $dtimeInseconds != "0") ? "<i class='fa fa-clock tx-danger tx-20'> </i>" : ""; ?> <?php echo $dicon1; ?>
              </div><!-- d-flex -->
            </div><!-- media -->
          </div><!-- list-group-item -->
        </div><!-- list-group -->
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- pd-20 -->
</div><!-- col-6 -->


<?php
// check if multiclock dangote type
if ($comtype == "1") {
?>
  <div class="col-12 bg-white">
    <div class="pd-20">
      <div class="card bd-0">
        <div class="card-header bg-success text-white">
          Clocking Details
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0 rounded-bottom">
          <table id="datatable1" class="table table-bordered display responsive ">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Clocked Time</th>
                <th class="">Device ID</th>
                <th class="">Location</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $hupx = mysqli_query($conn, "SELECT * FROM attendancedangote WHERE date = '$date1p' AND employeeid = '$employeeidp' AND company='$companyMainp'");
              while ($hugpx = mysqli_fetch_array($hupx)) {
                $timeInsecondspx = $hugpx["timeInseconds"];
                $timeOutsecondspx = $hugpx["timeOutseconds"];
                $deviceidx = $hugpx["deviceid"];
                $locationx = $hugpx["location"];

                if ($timeInsecondspx != "0") {
                  $timeInxUse = date("Y-m-d h:i:s A", ($timeInsecondspx / 1000));
                } elseif ($timeOutsecondspx != "0") {
                  $timeInxUse = date("Y-m-d h:i:s A", ($timeOutsecondspx / 1000));
                } else {
                  $timeInxUse = "0";
                }

                $hupxloc = mysqli_query($conn, "SELECT * FROM location WHERE id = '$locationx'");
                while ($hugpxloc = mysqli_fetch_array($hupxloc)) {
                  $locationxname = $hugpxloc["locationname"];
                }

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $timeInxUse; ?></td>
                  <td><?php echo $deviceidx; ?></td>
                  <td><?php echo $locationxname; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- pd-20 -->
  </div><!-- col-6 -->
<?php
  // normal type clockin
} else {
?>
  <div class="col-12 bg-white">
    <div class="pd-20">
      <div class="card bd-0">
        <div class="card-header bg-success text-white">
          Break Details
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0 rounded-bottom">
          <div class="list-group">
            <div class="list-group-item pd-y-10 rounded-bottom-0">
              <div class="media">
                <div class="media-body">
                  <h6 class="tx-inverse">Total Break Time</h6>
                </div><!-- media-body -->
                <div class="d-flex mg-l-10">
                  <h6 class="tx-inverse"><?php echo $hourdiffp . " Minutes"; ?></h6>
                </div><!-- d-flex -->
              </div><!-- media -->
            </div><!-- list-group-item -->
          </div><!-- list-group -->
          <table id="datatable1" class="table table-bordered display responsive ">
            <thead class="thead-colored thead-dark">
              <tr>
                <th class="">ID</th>
                <th class="">Time Out</th>
                <th class="">Time In</th>
                <th class="">Duration (Minutes)</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x = '0';
              $hupx = mysqli_query($conn, "SELECT * FROM attendance2 WHERE date = '$date1p' AND employeeid = '$employeeidp' AND company='$companyMainp'");
              while ($hugpx = mysqli_fetch_array($hupx)) {
                $timeInsecondspx = $hugpx["timeInseconds"];
                //$timeOutsecondspx = $hugpx["timeOutseconds"];
                $timeOutsecondspx = ($hugpx["timeOutseconds"] == "0") ? $etimeOutseconds : $hugpx["timeOutseconds"];

                $timeInx = date("Y-m-d h:i:s A", ($timeInsecondspx / 1000));
                $timeOutx = ($hugpx["timeOutseconds"] == "0") ? date("Y-m-d h:i:s A", ($timeOutsecondspx)) : date("Y-m-d h:i:s A", ($timeOutsecondspx / 1000));

                //$hourdiffpx = round((abs(($timeOutsecondspx / 1000) - ($timeInsecondspx / 1000)) / 3600) / 60, 2);
                $hourdiffpx = ($hugpx["timeOutseconds"] == "0") ? round(abs(($timeOutsecondspx) - ($timeInsecondspx / 1000)) / 60, 2) : round(abs(($timeOutsecondspx / 1000) - ($timeInsecondspx / 1000)) / 60, 2);

                $x = $x + '1';
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $timeInx; ?></td>
                  <td><?php echo $timeOutx; ?></td>
                  <td><?php echo $hourdiffpx; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- pd-20 -->
  </div><!-- col-6 -->
<?php
}
?>