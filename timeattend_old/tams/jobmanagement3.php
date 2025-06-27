<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Manage workflows</h5>

        <div class="d-flex justify-content-end">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRequisitionModal2">New Workflow</button>
        </div>

      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">

          <table id="mainTableClass" class="table table-bordered display responsive mainTableClass">
            <thead class="thead-colored thead-dark">
              <tr>
                <th>ID</th>
                <th>Workflow Name</th>
                <th>Description</th>
                <th>No of Steps</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $x = 0;
              $result = $conn->query("SELECT * FROM job_workflow WHERE company='$companyMain' ORDER BY id desc");
              while ($row = $result->fetch_assoc()) {
                $x = $x + 1;
                $dobid = $row['id'];
                $totalsteps = empty($row['workflow_steps']) ? '0' : count(explode(",", $row['workflow_steps']));
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $row['workflow_name']; ?></td>
                  <td><?php echo $row['workflow_desc']; ?></td>
                  <td><?php echo $totalsteps . ' Step(s)'; ?></td>
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
                          <a href="#" class="nav-link" onclick='addStep("<?php echo $dobid; ?>")'>Add Steps</a>
                          <a href="#" class="nav-link" onclick='viewStep("<?php echo $dobid; ?>")'>View Steps</a>
                          <a href="#" class="nav-link" onclick='viewTemplate2("<?php echo $dobid; ?>")'>Edit Workflow</a>
                          <a href="#" class="nav-link" onclick='deleteTemplate("<?php echo $dobid; ?>")'>Delete Workflow</a>
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