<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];

$bookpay1=mysqli_query($conn, "SELECT * FROM holidays WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$name = $bookpay["name"];
$date = $bookpay["date"];
$date2 = $bookpay["date2"];
$month = $bookpay["month"];
$year = $bookpay["year"];

}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Holiday Information!</h3>
                          
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Date: <span class="tx-danger">*</span></label>
        <input type="text" name="date" id="datepickerNoOfMonths3" class="form-control fc-datepickers" placeholder="YYYY-MM-DD" value="<?php echo $date; ?>" required>
      </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Date: <span class="tx-danger">*</span></label>
        <input type="text" name="date2" id="datepickerNoOfMonths4" class="form-control fc-datepickers" placeholder="YYYY-MM-DD" value="<?php echo $date2; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class="mg-b-20">
      <div class="form-group mg-b-0">
        <label>Holiday Name: <span class="tx-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Holiday Name" value="<?php echo $name; ?>" required>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div>