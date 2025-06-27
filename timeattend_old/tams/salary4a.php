<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];
$year = date("Y");
$month = date("m");
$month22 = date("F");
$type = "2";

$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $employeeidy = $bookpay["employeeid"];
  $fnamey = $bookpay["fname"];
  $mnamey = $bookpay["mname"];
  $lnamey = $bookpay["lname"];
  $salaryscale2 = $bookpay["salaryscale"];
  $grade = $bookpay["salaryscale"];

  $huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
  while ($hugya = mysqli_fetch_array($huya)) {
    $salaryscale3 = $hugya["nickname"];
  }
}
?>

<input type="hidden" name="employeeid" id="employeeid" value="<?php echo $employeeidy; ?>">
<input type="hidden" name="mapid" id="mapid" value="<?php echo $eidy; ?>">
<input type="hidden" name="salarygrade" id="salarygrade" value="<?php echo $grade; ?>">

<div class="col-lg-12 ">
  <div class="pd-20">
    <div class="d-xs-flex align-items-center justify-content-between">
      <div>
        <h4 class="tx-uppercase tx-inverse tx-bold"><?php echo "$fnamey $mnamey $lnamey"; ?></h4>
        <p class="mg-b-0"><span id="monthp"><?php echo $month22; ?></span><span id="yearp"><?php echo ", " . $year; ?></span><?php echo " ( " . $salaryscale3 . " )"; ?></p>
      </div>
      <div>
        <select id="monthchange" name="monthchange" placeholder="Change Month" onchange="changemonth(<?php echo $salaryscale2; ?>,<?php echo $eidy; ?>)" onkeyup="changemonth(<?php echo $salaryscale2; ?>,<?php echo $eidy; ?>)">
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

        <select id="yearchange" name="yearchange" placeholder="Change Year" onchange="changeyear(<?php echo $salaryscale2; ?>,<?php echo $eidy; ?>)" onkeyup="changeyear(<?php echo $salaryscale2; ?>,<?php echo $eidy; ?>)">
          <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
          <option name="<?php echo date('Y') - 1; ?>" value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
          <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
          <option name="<?php echo date('Y') + 1; ?>" value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
          <option name="<?php echo date('Y') + 2; ?>" value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
        </select>
      </div>
    </div>
    <div class="card bd-0 mb-4 mt-4">
      <div class="card-header bg-info bd-0 d-flex align-items-center justify-content-between pd-y-15">
        <h6 class="mg-b-0 tx-14 tx-white tx-normal">Allowances</h6>
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom-0" id="allowances">
        <?php include("" . $_SERVER['DOCUMENT_ROOT'] . "/tams/salary_allowances.php"); ?>
      </div><!-- card-body -->
      <div class="card-footer bd bd-t-0 d-flex justify-content-between">
        <div class="input-group">
          <select class="form-control select2" data-placeholder="Choose Label" name="name" id="name">
            <option value="">Choose Label</option>
            <?php
            $huyav = mysqli_query($conn, "SELECT * FROM salary_allowance_labels WHERE company='$companyMain'");
            while ($hugyav = mysqli_fetch_array($huyav)) {
              $nameid = $hugyav["id"];
              $namelabel = $hugyav["name"];
            ?>
              <option value="<?php echo $namelabel; ?>"><?php echo $namelabel; ?></option>
            <?php
            }
            ?>
          </select>
          <input type="number" class="form-control" placeholder="Amount" min="0" name="amount" id="amount">
          <input type="number" class="form-control" placeholder="Months" min="1" name="month" id="month">
          <div class="input-group-append">
            <button type="button" class="btn btn-primary" onclick="doallow(<?php echo $salaryscale2; ?>,1,<?php echo $eidy; ?>);">Add Allowance</button>
          </div>
        </div>
      </div>
    </div><!-- card -->

    <div class="card bd-0 ">
      <div class="card-header bg-warning bd-0 d-flex align-items-center justify-content-between pd-y-15">
        <h6 class="mg-b-0 tx-14 tx-white tx-normal">Deductions</h6>
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom-0" id="deductions">
        <?php include("" . $_SERVER['DOCUMENT_ROOT'] . "/tams/salary_deductions.php"); ?>
      </div><!-- card-body -->
    </div><!-- card -->
    <div class="card-footer bd bd-t-0 d-flex justify-content-between">
      <div class="input-group">
        <select class="form-control select2" data-placeholder="Choose Label" name="name2" id="name2">
          <option value="">Choose Label</option>
          <?php
          $huyav = mysqli_query($conn, "SELECT * FROM salary_deduction_labels WHERE company='$companyMain'");
          while ($hugyav = mysqli_fetch_array($huyav)) {
            $nameid = $hugyav["id"];
            $namelabel = $hugyav["name"];
          ?>
            <option value="<?php echo $namelabel; ?>"><?php echo $namelabel; ?></option>
          <?php
          }
          ?>
        </select>
        <input type="number" class="form-control" placeholder="Amount" min="0" name="amount2" id="amount2">
        <input type="number" class="form-control" placeholder="Months" min="1" name="month2" id="month2">
        <div class="input-group-append">
          <button type="button" class="btn btn-primary" onclick="doded(<?php echo $salaryscale2; ?>,1,<?php echo $eidy; ?>);">Add Deduction</button>
        </div>
      </div>
    </div>

  </div><!-- pd-20 -->
</div><!-- col-12 -->

<script>

</script>