<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$rid = $_GET['rid'];

$result = $conn->query("SELECT * FROM job_requisitions WHERE id = '$rid'");
while ($row = $result->fetch_assoc()) {
    $job_id = $row['job_id'];
    $job_title = $row['job_title'];
    $requestor = $row['requestor'];
    $reason = $row['reason'];
    $request_type = $row['request_type'];
    $job_description = $row['job_description'];
    $date_required = $row['date_required'];
    $staff_needed = $row['staff_needed'];
    //$approval_steps = $row['approval_steps'];
    $approval_steps = empty($row['approval_steps']) ? array() : explode(",", $row['approval_steps']);

    /*
    $result2 = $conn->query("SELECT * FROM job_steps WHERE id = '$approval_steps'");
    while ($row2 = $result2->fetch_assoc()) {
        $steps_name = empty($row2['steps_name']) ? array() : explode(",", $row2['steps_name']);
        $approval_steps = implode(",", $_POST['approval_steps']);
    }
    */
}
?>
<input type="hidden" name="post_job" value="1">
<input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
<input type="hidden" name="requestor" value="<?php echo $requestor; ?>">
<div class="form-group">
    <label>Job Title <span class="tx-danger">*</span></label>
    <input type="text" class="form-control" name="job_title" value="<?php echo $job_title; ?>" required>
</div>

<div class="form-group">
    <label>Approval Steps <span class="tx-danger">*</span></label>
    <select class="form-control w-100" id="approval_steps2" name="approval_steps[]" data-placeholder="Choose Approval Steps" style="width: 100%;" required multiple>
        <!--<option value="">-- Choose Steps --</option>-->
        <?php $resultstep1 = $conn->query("SELECT * FROM job_steps WHERE step_status = '0' AND company='$companyMain' ORDER BY id Asc");
        while ($rowstep1 = $resultstep1->fetch_assoc()) {
            if (in_array($rowstep1['id'], $approval_steps)) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $rowstep1['id']; ?>" <?php echo $selected; ?>><?php echo $rowstep1['steps_name']; ?></option>
        <?php } ?>
    </select>
</div>

<div class="form-group">
    <label>Reason for Request <span class="tx-danger">*</span></label>
    <textarea class="form-control" name="reason" required><?php echo $reason; ?></textarea>
</div>
<div class="form-group">
    <label>Request Type <span class="tx-danger">*</span></label>
    <select class="form-control" name="request_type" required>
        <option value="<?php echo $request_type; ?>"><?php echo $request_type; ?></option>
        <option value="Internal">Internal</option>
        <option value="External">External</option>
        <option value="Both">Both</option>
    </select>
</div>
<div class="form-group">
    <label>Job Description <span class="tx-danger">*</span></label>
    <textarea class="form-control" name="job_description" required><?php echo $job_description; ?></textarea>
</div>
<div class="form-group">
    <label>Number of Staff Needed <span class="tx-danger">*</span></label>
    <input type="number" class="form-control" name="number_needed" value="<?php echo $staff_needed; ?>" required>
</div>
<div class="form-group">
    <label>Date Required <span class="tx-danger">*</span></label>
    <input type="date" class="form-control" name="date_required" value="<?php echo $date_required; ?>" required>
</div>

<div class="form-group" id="links">
    <label>Post Links</label>
    <label class="ckbox">
        <input type="checkbox" name="website" value="1" checked>
        <span>Post to Website</span>
    </label>
    <label class="ckbox">
        <input type="checkbox" name="linkedin" value="1">
        <span>Post to LinkedIn</span>
    </label>
    <label class="ckbox">
        <input type="checkbox" name="facebook" value="1">
        <span>Post to Facebook</span>
    </label>
</div>