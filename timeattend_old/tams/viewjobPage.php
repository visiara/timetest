<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$rid = $_GET['rid'];

$result = $conn->query("SELECT * FROM job_requisitions WHERE id = '$rid'");
while ($row = $result->fetch_assoc()) {
  $therequesterid = $row['requestor'];
  $result2 = $conn->query("SELECT * FROM admins WHERE id = '$therequesterid'");
  while ($row2 = $result2->fetch_assoc()) {
    $therequester = $row2['fname'] . ' ' . $row2['mname'] . ' ' . $row2['lname'];
  }

?>
  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Job ID
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['job_id']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Job Title
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['job_title']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Requestor
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $therequester; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Reason for request
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['reason']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Request Type
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['request_type']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Job Description
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['job_description']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Date Required
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['date_required']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      Number of staff Needed
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <?php echo $row['staff_needed']; ?>
    </div><!-- card-body -->
  </div><!-- card -->

<?php
}
?>