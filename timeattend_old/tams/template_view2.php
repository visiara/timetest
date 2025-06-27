<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];

$result = $conn->query("SELECT * FROM job_template_interview WHERE id = '$job_id'");
while ($row = $result->fetch_assoc()) {
?>
  <input type="hidden" name="updatetemplate2" value="1">
  <input type="hidden" name="template_id" value="<?php echo $row['id']; ?>">
  <div class="form-group">
    <label>Template Name <span class="tx-danger">*</span></label>
    <input type="text" class="form-control" name="template_name" value="<?php echo $row['template_name']; ?>" required>
  </div>

  <div class="form-group">
    <label>Description<span class="tx-danger">*</span></label>
    <textarea class="form-control" name="template_desc" required><?php echo $row['template_desc']; ?></textarea>
  </div>

<?php
}
?>