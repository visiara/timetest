<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];
$type = $_GET['type'];

$result = $conn->query("SELECT * FROM job_applications WHERE $type = '$job_id'");
while ($row = $result->fetch_assoc()) {
?>
  <div class="card bd-0 mb-2">
    <div class="card-header bg-dark text-white">
      <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ( ' . $row['job_id'] . ' )'; ?>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom d-flex align-items-center justify-content-between">
      <span><?php echo $row['phone']; ?></span>
      <span><?php echo $row['email']; ?></span>
    </div><!-- card-body -->
  </div><!-- card -->
<?php
}
?>