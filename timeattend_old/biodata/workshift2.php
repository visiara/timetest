<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];

$bookpay1=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$q'");
while ($bookpay = mysqli_fetch_array($bookpay1))
{
$eidy = $bookpay["id"];
$shiftnamey = $bookpay["shiftname"];
$shifttypey = $bookpay["shifttype"];
$timeiny = $bookpay["timein"];
$timeouty = $bookpay["timeout"];
$hoursy = $bookpay["hours"];
$saturday = $bookpay["saturday"];
$sunday = $bookpay["sunday"];
$holiday = $bookpay["holiday"];

$monday = $bookpay["monday"];
$tuesday = $bookpay["tuesday"];
$wednesday = $bookpay["wednesday"];
$thursday = $bookpay["thursday"];
$friday = $bookpay["friday"];

if($saturday=="1"){
  $saturdayy = 'checked';
}else{
  $saturdayy = '';
}

if($sunday=="1"){
  $sundayy = 'checked';
}else{
  $sundayy = '';
}

if($holiday=="1"){
  $holidayy = 'checked';
}else{
  $holidayy = '';
}

//
if($monday=="1"){
  $mondayy = 'checked';
}else{
  $mondayy = '';
}

if($tuesday=="1"){
  $tuesdayy = 'checked';
}else{
  $tuesdayy = '';
}

if($wednesday=="1"){
  $wednesdayy = 'checked';
}else{
  $wednesdayy = '';
}

if($thursday=="1"){
  $thursdayy = 'checked';
}else{
  $thursdayy = '';
}

if($friday=="1"){
  $fridayy = 'checked';
}else{
  $fridayy = '';
}
//

}

?>
<input type="hidden" name="theid" value="<?php echo $q; ?>">
<input type="hidden" name="editp" value="1">

<div class="col-lg-12 bg-white">
                      <div class="pd-20">
    <div class=" mg-b-20">
    <div class="form-group mg-b-0-force">
        <label>Shift Name: <span class="tx-danger">*</span></label>
        <input type="text" name="shiftname" class="form-control" placeholder="Shift Name" value="<?php echo $shiftnamey; ?>" required>
    </div><!-- form-group -->
    </div>

    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Shift Type: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="shifttype" data-placeholder="Choose Shift" required>
          <option value="<?php echo $shifttypey; ?>"><?php echo $shifttypey; ?></option>
          <option value="Regular">Regular Schedule</option>
          <option value="Shift">Shift Schedule</option>
          <option value="Off">Off Schedule</option>
        </select>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Time In: <span class="tx-danger">*</span></label>
        <input id="tpBasic11" type="text" name="timein" class="form-control" placeholder="Time In" value="<?php echo $timeiny; ?>" onchange="caltime2()" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Time Out: <span class="tx-danger">*</span></label>
        <input id="tpBasic22" type="text" name="timeout" class="form-control" placeholder="Time Out" value="<?php echo $timeouty; ?>" onchange="caltime2()" required>
      </div><!-- form-group -->
      <div class="form-group mg-l-10 mg-b-0-force">
        <label>Hours: <span class="tx-danger">*</span></label>
        <input id="tpBasic33" type="text" name="hours" class="form-control" min="1" max="24" step="0.0" placeholder="Hours" value="<?php echo $hoursy; ?>" required>
      </div><!-- form-group -->
    </div>
    
    <div class="d-flex mg-b-20">

    <div class="">
    <p class="mg-b-10">Choose Work days</p>
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="monday" value="1" <?php echo $mondayy; ?>>
           <span>Work Monday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="tuesday" value="1" <?php echo $tuesdayy; ?>>
           <span>Work Tuesday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="wednesday" value="1" <?php echo $wednesdayy; ?>>
           <span>Work Wednesday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="thursday" value="1" <?php echo $thursdayy; ?>>
           <span>Work Thursday</span>
        </label>
      </div><!-- form-group -->
    </div>

    <div class="mg-l-35">
    <p class="mg-b-10">.</p>
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="friday" value="1" <?php echo $fridayy; ?>>
           <span>Work Friday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="saturday" value="1" <?php echo $saturdayy; ?>>
           <span>Work Saturday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="sunday" value="1" <?php echo $sundayy; ?>>
           <span>Work Sunday</span>
        </label>
      </div><!-- form-group -->
      <div class="d-flex form-group mg-b-0">
        <label class="ckbox">
           <input type="checkbox" name="holiday" value="1" <?php echo $holidayy; ?>>
           <span>Work Holiday</span>
        </label>
      </div><!-- form-group -->
    </div>

    </div>
        
                      </div><!-- pd-20 -->
                    </div>
                    
                    