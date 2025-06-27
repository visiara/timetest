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
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">

    <div class="d-flex align-items-center justify-content-between mg-b-20">
      <div class="form-group mg-b-0-force">
        <label for="month">End Month: <span class="tx-danger">*</span></label>
        <select id="month" name="month" class="form-control select2" required>
          <option value="<?php echo $endmonth; ?>"><?php echo date("F", strtotime($endyear . '-' . $endmonth)); ?></option>
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
          <option value="<?php echo $endyear; ?>"><?php echo $endyear; ?></option>
          <option name="<?php echo date('Y') - 1; ?>" value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
          <option name="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
          <option name="<?php echo date('Y') + 1; ?>" value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
          <option name="<?php echo date('Y') + 2; ?>" value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
        </select>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20" id="show">

    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Title: <span class="tx-danger">*</span></label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Weight: <span class="tx-danger">*</span></label>
        <input type="number" name="weight" min="1" max="100" class="form-control" placeholder="Weight" value="<?php echo $weight; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Comments: </label>
        <textarea name="com" rows="3" class="form-control" placeholder="Comments"><?php echo $startinfo; ?></textarea>
      </div><!-- form-group -->
    </div>

  </div><!-- pd-20 -->
</div><!-- col-6 -->