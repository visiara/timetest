<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];

$result = $conn->query("SELECT * FROM job_steps WHERE id = '$job_id'");
while ($row = $result->fetch_assoc()) {
  $step_template_interviewid = $row['step_template_interview'];
  $step_template_emailid = $row['step_template_email'];

  $resulty1 = $conn->query("SELECT * FROM job_template_interview WHERE id = '$step_template_interviewid'");
  while ($rowy1 = $resulty1->fetch_assoc()) {
    $step_template_interviewName = $rowy1['template_name'];
  }

  $resulty12 = $conn->query("SELECT * FROM job_template_email WHERE id = '$step_template_emailid'");
  while ($rowy12 = $resulty12->fetch_assoc()) {
    $step_template_emailName = $rowy12['template_name'];
  }

?>
  <input type="hidden" name="editstep" value="1">
  <input type="hidden" name="job_id" id="job_id" value="<?php echo $job_id; ?>" required>

  <div class="form-group">
    <label for="stepName">Name of Step</label>
    <input type="text" class="form-control" name="steps_name" value="<?php echo $row['steps_name']; ?>" required>
  </div>
  <div class="form-group">
    <label for="stepType">Type of Step</label>
    <select class="form-control" name="steps_type" required>
      <option value="<?php echo $row['steps_type']; ?>"><?php echo $row['steps_type']; ?></option>
      <option value="Screening">Screening</option>
      <option value="Interview">Interview</option>
      <option value="Assessment">Assessment</option>
      <option value="Final Decision">Final Decision</option>
    </select>
  </div>
  <div class="form-group">
    <label for="stepDescription">Description</label>
    <textarea class="form-control" name="step_description" rows="3" required><?php echo $row['step_description']; ?></textarea>
  </div>

  <div class="form-group mt-3" id="emailTemplateDiv">
    <label for="emailTemplate">Select Interview Template</label>
    <select class="form-control" id="emailTemplate" name="step_template_interview">
      <option value="<?php echo $row['step_template_interview'] ?? ''; ?>"><?php echo $step_template_interviewName ?? '--Select Interview Template--'; ?></option>
      <?php $resultx = $conn->query("SELECT * FROM job_template_interview WHERE company='$companyMain' ORDER BY id desc");
      while ($rowx = $resultx->fetch_assoc()) { ?>
        <option value="<?php echo $rowx['id']; ?>"><?php echo $rowx['template_name']; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group mt-3" id="emailTemplateDiv2">
    <label for="emailTemplate2">Select Email Template</label>
    <select class="form-control" id="emailTemplate2" name="step_template_email">
      <option value="<?php echo $row['step_template_email'] ?? ''; ?>"><?php echo $step_template_emailName ?? '--Select Email Template--'; ?></option>
      <?php $resultx1 = $conn->query("SELECT * FROM job_template_email WHERE company = '$companyMain' ORDER BY id desc");
      while ($rowx1 = $resultx1->fetch_assoc()) { ?>
        <option value="<?php echo $rowx1['id']; ?>"><?php echo $rowx1['template_name']; ?></option>
      <?php } ?>
    </select>
  </div>

<?php
}
?>