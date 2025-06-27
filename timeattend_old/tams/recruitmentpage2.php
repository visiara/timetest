<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>


<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Published Jobs</h5>
      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">
          <table id="mainTableClass" class="table table-bordered display responsive mainTableClass">
            <thead class="thead-colored thead-dark">
              <tr>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Request Type</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $result = $conn->query("SELECT * FROM published_jobs WHERE company = '$companyMain'");
              while ($row = $result->fetch_assoc()) {
                $buttonClass = $row['job_status'] == 'Active' ? 'btn-warning' : 'btn-success';
                $buttonText = $row['job_status'] == 'Active' ? 'Close Job' : 'Open Job';
                $dobid = $row['job_id'];
              ?>
                <tr id="job-<?php echo $row['job_id']; ?>">
                  <td><?php echo $row['job_id']; ?></td>
                  <td><?php echo $row['job_title']; ?></td>
                  <td><?php echo $row['request_type']; ?></td>
                  <td class='job-status'><?php echo $row['job_status']; ?></td>
                  <td>
                    <button class="btn btn-sm <?php echo $buttonClass; ?> toggle-btn" data-job-id="<?php echo $dobid; ?>" onclick='toggleJobStatus("<?php echo $dobid; ?>")'><?php echo $buttonText; ?></button>
                    <button class='btn btn-info btn-sm' onclick='viewApplicants("<?php echo $dobid; ?>","job_id")'>View Applicants</button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- widget-2 -->
</div><!-- col-12 -->