<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$q = $_GET['q'];
$company = $_GET['com'];

if($q == 'Individual'){
    $hu1=mysqli_query($conn, "SELECT * FROM employee WHERE company = '$company' AND status='Active'");
?>
<div class="form-group mg-b-0-force">
        <label>Employee: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="who" required>
          <option value="">Select Employee</option>
<?php
    while ($hug1= mysqli_fetch_array($hu1)){
        $eid = $hug1["id"];
        $employeeid = $hug1["employeeid"];
        $fname = $hug1["fname"];
        $mname = $hug1["mname"];
        $lname = $hug1["lname"];
?>
<option value="<?php echo $eid; ?>"><?php echo "$fname $mname $lname ( $employeeid )"; ?></option>
<?php } ?>
          
        </select>
</div><!-- form-group -->
<?php } else { 
    $hu1=mysqli_query($conn, "SELECT * FROM departments WHERE company = '$company' AND status='Active'");
?>
<div class="form-group mg-b-0-force">
        <label>Departments: <span class="tx-danger">*</span></label>
        <select class="form-control select2 " name="who" required>
          <option value="">Select Departments</option>
<?php
    while ($hug1= mysqli_fetch_array($hu1)){
        $eid = $hug1["id"];
        $department = $hug1["departmentname"];
?>
<option value="<?php echo $eid; ?>"><?php echo "$department"; ?></option>
<?php } ?>
          
        </select>
</div><!-- form-group -->
<?php 
}
?>                   