<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM company WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $locationname = $bookpay["companyname"];

  $dtype = $bookpay["dtype"];
  $dvalue = $bookpay["dvalue"];
  $comstartdate1 = $bookpay["startdate"];
  $comenddate1 = $bookpay["enddate"];
  $comregdate1 = $bookpay["regdate"];
  $comaddress = $bookpay["comaddress"];
  $comephone = $bookpay["comephone"];
  $comemail = $bookpay["comemail"];
  $comref = $bookpay["compref"];
  $masterkpi1 = $bookpay["masterkpi"];
  $mastersalary1 = $bookpay["mastersalary"];
  $noemployee = $bookpay["noemployee"];
  $ctype = $bookpay["ctype"];
  $smsbal = $bookpay["smsbal"];
  $smson = $bookpay["smson"];
}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
  <div class="pd-20">
    <div class=" mg-b-20">
      <div class="form-group mg-b-20">
        <label>Company Name: <span class="tx-danger">*</span></label>
        <input type="text" name="companyname" class="form-control" placeholder="Company Name" value="<?php echo $locationname; ?>" disabled>
      </div><!-- form-group -->

      <div class="form-group mg-b-0-force">
        <label>No of SMS: <span class="tx-danger">*</span></label>
        <input type="number" id="noemployee" name="noemployee" class="form-control" min="10" placeholder="10" required>
      </div>

    </div>

  </div><!-- pd-20 -->
</div>