<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Explore Applicant Pool</h5>
        <div class="d-flex justify-content-end">
          <a href="#" class="btn btn-primary mb-3" onclick="showPage('dash1.php')">Create Job</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash2.php')">Upload CV (Curriculum Vitae)</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash3.php')">Explore Applicant Pool</a>
        </div>
      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">
          <table id="mainTableClass" class="table table-bordered display responsive mainTableClass">
            <thead class="thead-colored thead-dark">
              <tr>
                <th>ID</th>
                <th>Applicant ID</th>
                <th>Applicant Name</th>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Employment Style</th>
                <th>Work Style</th>
                <th>Application Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $x = 0;
              $result = $conn->query("SELECT * FROM job_applications WHERE company='$companyMain' ORDER BY id desc");
              while ($row = $result->fetch_assoc()) {
                $x = $x + 1;
                $dobid = $row['id'];

                $job_idy = $row['job_id'];
                $resulty = $conn->query("SELECT * FROM published_jobs WHERE job_id = '$job_idy'");
                while ($rowy = $resulty->fetch_assoc()) {
                  $job_title = $rowy['job_title'];
                }

              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $row['applicant_id']; ?></td>
                  <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?></td>
                  <td><?php echo $row['job_id']; ?></td>
                  <td><?php echo $job_title; ?></td>
                  <td><?php echo $row['employment_style']; ?></td>
                  <td><?php echo $row['workstyle']; ?></td>
                  <td><?php echo $row['date_created']; ?></td>
                  <td>
                    <button class='btn btn-info btn-sm' onclick='viewApplicants("<?php echo $dobid; ?>","id")'>View Details</button>
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