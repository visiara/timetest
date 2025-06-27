<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">All Jobs</h5>

        <div class="d-flex justify-content-end">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" onclick="showPage('jobmanagement2.php')"
              class="btn btn-secondary pd-x-30 active">All</button>
            <button type="button" onclick="showPage('job2.php')" class="btn btn-secondary pd-x-30">Active</button>
            <button type="button" onclick="showPage('job3.php')" class="btn btn-secondary pd-x-30">Drafts</button>
            <button type="button" onclick="showPage('job4.php')" class="btn btn-secondary pd-x-30">Private</button>
            <button type="button" onclick="showPage('job5.php')" class="btn btn-secondary pd-x-30">Suspended</button>
            <button type="button" onclick="showPage('job6.php')" class="btn btn-secondary pd-x-30">Expired</button>
          </div>
        </div>

      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">

          <table id="mainTableClass" class="table table-bordered display responsive mainTableClass">
            <thead class="thead-colored thead-dark">
              <tr>
                <th>ID</th>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Employment Style</th>
                <th>Work Style</th>
                <th>Application Date</th>
                <th>Job Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $x = 0;
              $result = $conn->query("SELECT * FROM jobs_details_settings WHERE company='$companyMain' ORDER BY id desc");
              while ($row = $result->fetch_assoc()) {
                $x = $x + 1;
                $dobid = $row['id'];
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $row['job_id']; ?></td>
                  <td><?php echo $row['job_title']; ?></td>
                  <td><?php echo $row['employment_type']; ?></td>
                  <td><?php echo $row['workstyle']; ?></td>
                  <td><?php echo $row['date_created']; ?></td>
                  <td><?php echo $row['job_status']; ?></td>
                  <td>
                    <div class="dropdown">
                      <a href="" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                        <div class="ht-25 pd-x-20 bd d-flex align-items-center justify-content-center">
                          <span class="tx-13 tx-medium">Actions</span>
                          <i class="fa fa-angle-down mg-l-10"></i>
                        </div>
                      </a>
                      <div class="dropdown-menu pd-10 wd-200">
                        <nav class="nav nav-style-2 flex-column">
                          <a href="#" class="nav-link" onclick='showPage("job_details.php?jobid=<?php echo $dobid; ?>")'>View Jobs</a>
                          <a href="#" class="nav-link" onclick='doJobs("<?php echo $dobid; ?>",1,"jobmanagement2.php")'>Suspend Job</a>
                          <a href="#" class="nav-link" onclick='doJobs("<?php echo $dobid; ?>",2,"jobmanagement2.php")'>Add to Drafts</a>
                          <a href="#" class="nav-link" onclick='doJobs("<?php echo $dobid; ?>",6,"jobmanagement2.php")'>Make Private</a>
                          <a href="#" class="nav-link" onclick='doJobs("<?php echo $dobid; ?>",3,"jobmanagement2.php")'>Delete Job</a>
                        </nav>
                      </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
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