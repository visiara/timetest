<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$huserbd5 = mysqli_query($conn, "SELECT * FROM kpi_list WHERE id='$q'");
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
  $weight = $huserb1d5["kweight"];
  $fstatus = $huserb1d5["fstatus"];
  $weightg = $huserb1d5["kweight"];
  $achieveg = $huserb1d5["kachieve"];
  $innitialscore = $huserb1d5["innitialscore"];

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

  if ($fstatus == "2") {
    $btnicon3 = "<i class='fa fa-exclamation-circle fa-2x tx-danger'></i>";
  } elseif ($fstatus == "3") {
    $btnicon3 = "<i class='fa fa-exclamation-circle fa-2x tx-success'></i>";
  } else {
    $btnicon3 = "";
  }
}

?>

<div class="col-lg-6 bg-dark">
  <div class="pd-40">
    <h3 class="tx-white mg-b-20"><?php echo $regName; ?> <br><span>[</span> <?php echo $RegNo; ?> <span>]</span></h3>

    <div>
      <h4 class="tx-white mg-b-20"><?php echo date("F", strtotime($endyear . '-' . $endmonth)) . ", $endyear"; ?></h4>
    </div>
    <div>
      <p class="tx-white ">
        <span class="tx-uppercase tx-medium d-block mg-b-5">Title:</span>
        <span class="op-7"><?php echo $name; ?></span>
      </p>
    </div>
    <div>
      <p class="tx-white ">
        <span class="tx-uppercase tx-medium d-block mg-b-5">Start Comments:</span>
        <span class="op-7"><?php echo $startinfo; ?></span>
      </p>
    </div>
    <?php if (!empty($endinfo)) { ?>
      <p class="tx-white">
        <span class="tx-uppercase tx-medium d-block mg-b-15">Report:</span>
        <span class="op-7"><?php echo $endinfo; ?></span>
      </p>
    <?php } ?>
  </div>
</div><!-- col-6 -->

<div class="col-lg-6 bg-white">
  <div class="pd-30">
    <form action="" method="POST">
      <input type="hidden" name="theid" value="<?php echo $q; ?>">
      <input type="hidden" name="score" value="1">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="pd-x-30 pd-y-10">
        <h3 class="tx-inverse  mg-b-5">KPI Score Card! <?php echo $btnicon3; ?></h3>
        <p>Drop your report and percentage score for this KPI.</p>
        <br>
        <?php if ($dpoll > "0") {

          if ($fstatus == "2") {
            echo "<h3 class='tx-inverse  mg-b-5'>KPI score is $dpoll%</h3>";
        ?>
            <div class="form-group">
              <textarea name="rep" rows="3" class="form-control pd-y-12" placeholder="Report" required><?php echo $endinfo; ?></textarea>
            </div><!-- form-group -->

            <div class="input-group mg-b-20">
              <input type="number" name="achievement" id="achievementk" class="form-control pd-y-12" placeholder="0" value="<?php echo $achieveg; ?>" oninput="docalculation()" onchange="docalculation(1)" required>
              <div class="input-group-append">
                <span class="input-group-text">Achievement</span>
              </div>
            </div><!-- input-group -->

            <div class="input-group mg-b-20">
              <input type="number" name="weight" id="weightk" class="form-control pd-y-12" placeholder="0" value="<?php echo $weightg; ?>" readonly>
              <div class="input-group-append">
                <span class="input-group-text">Weight</span>
              </div>
            </div><!-- input-group -->

            <div class="input-group mg-b-20">
              <input type="number" name="grade" id="gradek" class="form-control pd-y-12" placeholder="0" value="<?php echo $dpoll; ?>" readonly>
              <div class="input-group-append">
                <span class="input-group-text">Grade / Score</span>
              </div>
            </div><!-- input-group -->

            <input type="hidden" name="innitialscore" value="<?php echo $innitialscore; ?>">

            <button type="submit" class="btn btn-success pd-y-12 btn-block">Update KPI</button>
          <?php } else {
            echo "<h3 class='tx-inverse  mg-b-5'>KPI has already been graded!.</h3>";
            echo "<h3 class='tx-inverse  mg-b-5'>KPI score is $dpoll%</h3>";
          }
        } else { ?>
          <div class="form-group">
            <textarea name="rep" rows="3" class="form-control pd-y-12" placeholder="Report" required></textarea>
          </div><!-- form-group -->

          <div class="input-group mg-b-20">
            <input type="number" name="achievement" id="achievementk" class="form-control pd-y-12" placeholder="0" oninput="docalculation(1)" onchange="docalculation(1)" required>
            <div class="input-group-append">
              <span class="input-group-text">Achievement</span>
            </div>
          </div><!-- input-group -->

          <div class="input-group mg-b-20">
            <input type="number" name="weight" id="weightk" class="form-control pd-y-12" placeholder="0" value="<?php echo $weight; ?>" readonly>
            <div class="input-group-append">
              <span class="input-group-text">Weight</span>
            </div>
          </div><!-- input-group -->

          <div class="input-group mg-b-20">
            <input type="number" name="grade" id="gradek" class="form-control pd-y-12" placeholder="0" readonly>
            <div class="input-group-append">
              <span class="input-group-text">Grade / Score</span>
            </div>
          </div><!-- input-group -->

          <input type="hidden" name="innitialscore" value="none">

          <button type="submit" class="btn btn-success pd-y-12 btn-block">Grade KPI</button>
        <?php } ?>
      </div>
    </form>
  </div><!-- pd-20 -->
</div><!-- col-6 -->