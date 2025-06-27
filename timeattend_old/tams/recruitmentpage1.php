<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>


<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Job Requisitions</h5>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRequisitionModal">New
          Requisition</button>
      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="wd-100p rounded-bottom">
          <table id="mainTableClass" class="table table-bordered display responsive mainTableClass">
            <thead class="thead-colored thead-dark">
              <tr>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Requestor</th>
                <th>Reason for Request</th>
                <th>Request Type</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $result = $conn->query("SELECT * FROM job_requisitions WHERE company='$companyMain'");
              while ($row = $result->fetch_assoc()) {

                $requestorid = $row['requestor'];
                $resulty = $conn->query("SELECT * FROM admins WHERE id = '$requestorid'");
                while ($rowy = $resulty->fetch_assoc()) {
                  $requestor = $rowy['fname'] . ' ' . $rowy['mname'] . ' ' . $rowy['lname'];
                }

                echo "<tr>
                        <td>{$row['job_id']}</td>
                        <td>{$row['job_title']}</td>
                        <td>{$requestor}</td>
                        <td>{$row['reason']}</td>
                        <td>{$row['request_type']}</td>
                        <td>{$row['job_status']}</td>
                        <td>
                            <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#newRequisitionModalView' onclick='viewJobRequest({$row['id']})'>View Job Request</button>
                            <button class='btn btn-success btn-sm' data-toggle='modal' data-target='#postJobModal' onclick='postJob({$row['id']})'>Post Job</button>
                        </td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- widget-2 -->
</div><!-- col-12 -->