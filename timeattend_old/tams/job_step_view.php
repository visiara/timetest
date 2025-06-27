<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];

$result = $conn->query("SELECT * FROM job_workflow WHERE id = '$job_id'");
while ($row = $result->fetch_assoc()) {
  $workflow_steps = empty($row['workflow_steps']) ? array() : explode(",", $row['workflow_steps']);
}

foreach ($workflow_steps as $key => $stepid) {
  $resulty = $conn->query("SELECT * FROM job_steps WHERE id = '$stepid'");
  while ($rowy = $resulty->fetch_assoc()) {
    $steps_name = $rowy['steps_name'];
    $steps_type = $rowy['steps_type'];
    $step_description = $rowy['step_description'];
    $step_template_interview = $rowy['step_template_interview'];
    $step_template_email = $rowy['step_template_email'];
    $step_check = $rowy['step_check'];

    $resulty1 = $conn->query("SELECT * FROM job_template_interview WHERE id = '$step_template_interview'");
    while ($rowy1 = $resulty1->fetch_assoc()) {
      $step_template_interviewName = $rowy1['template_name'];
    }

    $resulty12 = $conn->query("SELECT * FROM job_template_email WHERE id = '$step_template_email'");
    while ($rowy12 = $resulty12->fetch_assoc()) {
      $step_template_emailName = $rowy12['template_name'];
    }
  }
?>
  <div class="card bd-0 mg-b-20">
    <div class="card-header bg-teal tx-white">
      <span><?php echo $steps_name; ?></span>
      <button type="button" class="btn btn-sm btn-warning float-right" onclick="editStep('<?php echo $stepid; ?>')"><i class="fa fa-pencil"></i> Edit</button>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 rounded-bottom">
      <ul class="list-group list-group-striped">
        <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between">
          <p class="mg-b-0">
            <strong class="tx-inverse tx-medium"><?php echo $steps_type; ?></strong>
            <small class="d-block tx-10 mt-1">Step Type</small>
          </p>
        </li>

        <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between">
          <p class="mg-b-0">
            <strong class="tx-inverse tx-medium"><?php echo $step_description; ?></strong>
            <small class="d-block tx-10 mt-1">Step Description</small>
          </p>
        </li>

        <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between">
          <p class="mg-b-0">
            <strong class="tx-inverse tx-medium"><?php echo $step_template_emailName ?? '--'; ?></strong>
            <small class="d-block tx-10 mt-1">Step Email Template</small>
          </p>
        </li>

        <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between">
          <p class="mg-b-0">
            <strong class="tx-inverse tx-medium"><?php echo $step_template_interviewName ?? '--'; ?></strong>
            <small class="d-block tx-10 mt-1">Step Interview Template</small>
          </p>
        </li>

      </ul>
    </div><!-- card-body -->
  </div><!-- card -->

<?php
}
?>