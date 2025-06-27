<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Upload CV (Curriculum Vitae)</h5>
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="requisitions-table">
              <?php
              $x = 0;
              $result = $conn->query("SELECT id, applicant_id, fname, mname, lname, MAX(id) AS latest_id FROM job_applications WHERE company='$companyMain' GROUP BY applicant_id, fname, mname, lname, id ORDER BY latest_id DESC");
              while ($row = $result->fetch_assoc()) {
                $x = $x + 1;
                $dobid = $row['id'];
              ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo $row['applicant_id']; ?></td>
                  <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?></td>
                  <td>
                    <button class='btn btn-info btn-sm' onclick='viewApplicantDoc("<?php echo $dobid; ?>","id")'>View Documents</button>
                    <button class='btn btn-primary btn-sm' onclick='uploadApplicantsDocs("<?php echo $dobid; ?>")'>Add CV / Documents</button>
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