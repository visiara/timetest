<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];
$type = $_GET['type'];

$result = $conn->query("SELECT * FROM job_applications WHERE company = '$companyMain' AND $type = '$job_id'");
while ($row = $result->fetch_assoc()) {
?>
    <style>
        .fa-file-word:before {
            content: "\f1c2"
        }
    </style>
    <div class="card bd-0 mb-2">
        <div class="card-header bg-dark text-white">
            <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ( ' . $row['job_id'] . ' )'; ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0 rounded-bottom">
            <!-- <span><?php echo $row['phone']; ?></span>-->
            <!-- <span><?php echo $row['email']; ?></span>-->

            <ul class="list-group list-group-striped">
                <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-center">
                    <p class="mg-b-0">CV (CURRICULLUM VITAE)</p>
                </li>
                <?php
                if (!empty($row['cv_file'])) {
                ?>
                    <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between mg-b-20">
                        <p class="mg-b-0">

                            <?php
                            if ($row['cv_file_type'] == 'application/pdf') {
                                echo '<i class="far fa-file-pdf tx-22 tx-danger lh-0 valign-middle"></i>';
                            } else {
                                echo '<i class="far fa-file-word tx-22 tx-danger lh-0 valign-middle"></i>';
                            }
                            ?>
                            <strong class="tx-inverse tx-medium mg-l-10"><?php echo $row['cv_file']; ?></strong>
                            <small class="d-block tx-10 mt-2">Applicant CV</small>
                        </p>
                        <a href="../uploads/<?php echo $row['cv_file']; ?>" class="text-muted" download>Download</a>
                    </li>
                <?php } else { ?>
                    <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-center mg-b-20">
                        <p class="mg-b-0">No Uploaded CV (Curricullum Vitae) yet.</p>
                    </li>
                <?php } ?>
                <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-center">
                    <p class="mg-b-0">OTHER DOCUMENTS</p>
                </li>

                <?php
                $resulty = $conn->query("SELECT * FROM applicant_documents WHERE applicant_id = '$job_id'");
                while ($rowy = $resulty->fetch_assoc()) {
                ?>
                    <li class="list-group-item rounded-top-0 d-flex align-items-center justify-content-between">
                        <p class="mg-b-0">

                            <?php
                            if ($rowy['file_type'] == 'application/pdf') {
                                echo '<i class="far fa-file-pdf tx-22 tx-danger lh-0 valign-middle"></i>';
                            } else {
                                echo '<i class="far fa-file-word tx-22 tx-danger lh-0 valign-middle"></i>';
                            }
                            ?>
                            <strong class="tx-inverse tx-medium mg-l-10"><?php echo $rowy['file_name']; ?></strong>
                            <small class="d-block tx-10 mt-2"><?php echo $rowy['uploaded_at']; ?></small>
                        </p>
                        <a href="../uploads/<?php echo $rowy['file_path']; ?>" class="text-muted" download>Download</a>
                    </li>
                <?php } ?>
                <!-- add more here -->
            </ul>

        </div><!-- card-body -->
    </div><!-- card -->
<?php
}
?>