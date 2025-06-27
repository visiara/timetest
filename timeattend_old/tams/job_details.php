<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";

$jobid = $_GET['jobid'];

$result = $conn->query("SELECT * FROM jobs_details_settings WHERE id = '$jobid'");
while ($row = $result->fetch_assoc()) {
    $job_id = $row['job_id'];
    $job_title = $row['job_title'];
    $job_level = $row['job_level'];
    $employment_type = $row['employment_type'];
    $country = $row['country'];
    $location = $row['location'];
    $workstyle = $row['workstyle'];
    $min_pay = $row['min_pay'];
    $max_pay = $row['max_pay'];
    $show_pay = $row['show_pay'];
    $job_description = $row['job_description'];
    $job_responsibilities = $row['job_responsibilities'];
    $job_requirements = $row['job_requirements'];
    $date_created = $row['date_created'];
    $job_status = $row['job_status'];

    $result1 = $conn->query("SELECT * FROM jobs_settings WHERE job_id = '$job_id'");
    while ($row1 = $result1->fetch_assoc()) {
        $job_expiry_date = $row1['job_expiry_date'];
        $job_visibility = $row1['job_visibility'];
        $is_private = $row1['is_private'];
        $specialization = $row1['specialization'];
        $job_team = $row1['job_team'];
        $job_team_members = $row1['job_team_members'];
        $application_workflow = $row1['application_workflow'];
        //$application_workflow = empty($row1['application_workflow']) ? [] : explode(",", $row1['application_workflow']);
    }

    $createddate = date("Y-m-d", strtotime("$date_created"));
    $expiredate = date("Y-m-d", strtotime("$job_expiry_date"));

    /*
    $result12 = $conn->query("SELECT * FROM jobs_details_settings WHERE job_id = '$job_id'");
    while ($row12 = $result12->fetch_assoc()) {
        $job_id = $row12['job_id'];
        $job_title = $row12['job_title'];
        $job_level = $row12['job_level'];
        $employment_type = $row12['employment_type'];
        $country = $row12['country'];
        $location = $row12['location'];
        $workstyle = $row12['workstyle'];
    }

    $result123 = $conn->query("SELECT * FROM jobs_details_settings WHERE job_id = '$job_id'");
    while ($row123 = $result123->fetch_assoc()) {
        $job_id = $row123['job_id'];
        $job_title = $row123['job_title'];
        $job_level = $row123['job_level'];
        $employment_type = $row123['employment_type'];
        $country = $row123['country'];
        $location = $row123['location'];
        $workstyle = $row123['workstyle'];
    }

    $result1234 = $conn->query("SELECT * FROM jobs_details_settings WHERE job_id = '$job_id'");
    while ($row1234 = $result1234->fetch_assoc()) {
        $job_id = $row1234['job_id'];
        $job_title = $row1234['job_title'];
        $job_level = $row1234['job_level'];
        $employment_type = $row1234['employment_type'];
        $country = $row1234['country'];
        $location = $row1234['location'];
        $workstyle = $row1234['workstyle'];
    }

    $result12345 = $conn->query("SELECT * FROM jobs_details_settings WHERE job_id = '$job_id'");
    while ($row12345 = $result12345->fetch_assoc()) {
        $job_id = $row12345['job_id'];
        $job_title = $row12345['job_title'];
        $job_level = $row12345['job_level'];
        $employment_type = $row12345['employment_type'];
        $country = $row12345['country'];
        $location = $row12345['location'];
        $workstyle = $row12345['workstyle'];
    }

    */
}
?>
<style>
    .collectedData {
        background: #f8f9fa;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        font-family: Arial, sans-serif;
    }

    .collectedData h3 {
        text-align: center;
        font-size: 22px;
        color: #333;
        margin-bottom: 15px;
    }

    .collectedData h4 {
        font-size: 18px;
        color: #007bff;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
        margin-top: 15px;
    }

    .collectedData ul {
        list-style: none;
        padding: 0;
    }

    .collectedData li {
        background: white;
        padding: 8px;
        margin-bottom: 5px;
        border-radius: 4px;
        border-left: 4px solid #007bff;
        font-size: 16px;
    }

    .collectedData li strong {
        color: #333;
    }

    #chart-container {
        width: 220px;
        height: 220px;
        margin-right: auto;
        padding: 20px;

    }

    .filter-box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .filter-box label {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
    }

    .filter-category {
        margin-bottom: 15px;
        padding: 10px;
        background: #f9f9f9;
        border-radius: 5px;
    }

    .filter-category h4 {
        margin: 0 0 10px 0;
        font-size: 16px;
        color: #555;
    }

    .filter-item {
        display: flex;
        align-items: center;
        padding: 5px 0;
        font-size: 14px;
    }

    .filter-item input {
        margin-right: 10px;
    }
</style>
<div class="col-lg-12">
    <div class="widget-2">

        <div class="card shadow-base bd-0 rounded-0 widget-4">
            <div class="card-header ht-75">
                <h3 class="tx-normal tx-roboto tx-dark">APPLICANTS TRACKING SYSTEM (ATS) </h3>
                <!--<div class="hidden-xs-down">
                    <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
                    <a href=""><span class="tx-medium">498</span> Following</a>
                </div>
                <div class="tx-24 hidden-xs-down">
                    <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                    <a href=""><i class="icon ion-more"></i></a>
                </div>-->
            </div><!-- card-header -->
            <div class="card-body bg-dark">
                <h2 class="tx-normal tx-roboto tx-white">Job Title: <?php echo $job_title; ?></h2>
                <p class="mg-b-25">Date Posted: <?php echo $createddate; ?> | Expiry Date: <?php echo $expiredate; ?>
                </p>

                <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25"><?php echo $job_description; ?></p>

                <p class="mg-b-0 tx-20">
                    Visibility: <?php echo $job_visibility; ?> |
                    <?php echo $is_private == '0' ? 'Public' : 'Private'; ?>
                </p>
            </div><!-- card-body -->
        </div><!-- card -->

        <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                <li class="nav-item"><a class="nav-link jobnav active" data-toggle="tab" id="activitiestab"
                        href="#activities" role="tab">Activities</a></li>
                <li class="nav-item"><a class="nav-link jobnav" data-toggle="tab" id="applicantstab" href="#applicants"
                        role="tab">Applicants</a></li>
                <li class="nav-item"><a class="nav-link jobnav" data-toggle="tab" id="teamtab" href="#team"
                        role="tab">Job Team</a></li>
            </ul>
        </div>

        <div class="tab-content br-profile-body">

            <div class="tab-pane fade active show" id="activities">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="media-list bg-white rounded shadow-base">

                            <div class="card bd-0 shadow-base mg-t-30">
                                <div class="d-md-flex justify-content-between pd-25">
                                    <div>
                                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">APPLICANTS
                                            PER DAY</h6>
                                        <!--<p>Past 30 Days — Last Updated Oct 14, 2017</p>-->
                                    </div>
                                    <div class="d-sm-flex">
                                        <div>
                                            <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Total Applications
                                            </p>
                                            <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="total_applications">23.32%
                                            </h4>
                                            <span class="tx-12 tx-dark tx-roboto" id="total_unprocessed">2.7%
                                                Unprocessed</span>
                                        </div>
                                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                            <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Total Passed</p>
                                            <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="total_passed">38.20%</h4>
                                            <span class="tx-12 tx-success tx-roboto" id="percentage_passed">4.65%
                                                Passed</span>
                                        </div>
                                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                            <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Total Failed
                                            </p>
                                            <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="total_failed">12:30</h4>
                                            <span class="tx-12 tx-danger tx-roboto" id="percentage_failed">1.22%
                                                Failed</span>
                                        </div>
                                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                            <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Total Repeat
                                            </p>
                                            <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="total_repeat">12:30</h4>
                                            <span class="tx-12 tx-warning tx-roboto" id="percentage_repeat">1.22%
                                                Repeat</span>
                                        </div>
                                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                            <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Total Employed
                                            </p>
                                            <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="total_employed">12:30</h4>
                                            <span class="tx-12 tx-success tx-roboto" id="percentage_employed">1.22%
                                                Employed</span>
                                        </div>
                                    </div><!-- d-flex -->
                                </div><!-- d-flex -->

                                <div class="pd-l-25 pd-r-15 pd-b-25">
                                    <div id="ch5" class="ht-250 ht-sm-300"></div>
                                </div>
                            </div><!-- card -->

                        </div><!-- card -->
                    </div><!-- col-lg-8 -->
                    <div class="col-lg-4 mg-t-30 mg-lg-t-0">

                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30 collectedData" id="collectedData">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">JOB ACTIVITIES</h6>

                            <ul>
                                <?php
                                $result1z = $conn->query("SELECT * FROM job_workflow WHERE id = '$application_workflow'");
                                while ($row1z = $result1z->fetch_assoc()) {
                                    //$workflow_steps = $row1z['workflow_steps'];
                                    $workflow_steps = empty($row1z['workflow_steps']) ? [] : explode(",", $row1z['workflow_steps']);
                                }

                                foreach ($workflow_steps as $value) {
                                    $result1zx = $conn->query("SELECT * FROM job_steps WHERE id = '$value'");
                                    while ($row1zx = $result1zx->fetch_assoc()) {
                                        $step_name = $row1zx['steps_name'];

                                        $resultzxd = $conn->query("SELECT COUNT(id) AS total_applications FROM job_applications WHERE job_id='$job_id' AND applicant_step = '$value'");
                                        while ($rowzxd = $resultzxd->fetch_assoc()) {
                                            $total_appy = $rowzxd['total_applications'];
                                        }
                                    }

                                ?>
                                    <li>
                                        <div class="d-flex alig-items-center justify-content-between">
                                            <h6 class="tx-inverse tx-14 mg-b-0"><?php echo $step_name; ?></h6>
                                            <span class="tx-14"><?php echo $total_appy; ?> Applications</span>
                                        </div><!-- d-flex -->
                                    </li>
                                <?php } ?>

                            </ul>
                        </div><!-- card -->

                        <div class="card card-body rounded-0 mg-t-10">
                            <h6 class="tx-inverse tx-14 mg-b-5">Employment Rate</h6>

                            <div class="d-flex justify-content-between">

                                <div id="chart-container" class="tx-center">
                                    <canvas id="doughnutCanvas" width="200" height="200"></canvas>
                                </div>

                                <div>

                                    <p class="tx-10 tx-uppercase tx-medium mg-b-0 tx-spacing-1">Total Application</p>
                                    <h2 class="tx-inverse tx-bold tx-lato">
                                        <span id="total_app">28</span>
                                    </h2>
                                    <div class="mg-b-20 mg-t-20">
                                        <span class="square-10 bg-info mg-r-5"></span> Total needed
                                        <h5 class="mg-b-0 mg-t-5 tx-bold tx-inverse tx-lato" id="staff_needed">45%</h5>
                                    </div>
                                    <div>
                                        <span class="square-10 bg-gray-300 mg-r-5"></span> Total Employed
                                        <h5 class="mg-b-0 mg-t-5 tx-bold tx-inverse tx-lato" id="total_employed2">65%
                                        </h5>
                                    </div>

                                </div>

                            </div>




                        </div><!-- card -->

                    </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- tab-pane -->

            <div class="tab-pane fade " id="applicants">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30 collectedData" id="collectedData">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-20">WorkFlow Steps</h6>

                            <ul>
                                <?php
                                $result1z = $conn->query("SELECT * FROM job_workflow WHERE id = '$application_workflow'");
                                while ($row1z = $result1z->fetch_assoc()) {
                                    //$workflow_steps = $row1z['workflow_steps'];
                                    $workflow_steps = empty($row1z['workflow_steps']) ? [] : explode(",", $row1z['workflow_steps']);
                                }

                                foreach ($workflow_steps as $value) {
                                    $result1zx = $conn->query("SELECT * FROM job_steps WHERE id = '$value'");
                                    while ($row1zx = $result1zx->fetch_assoc()) {
                                        $step_name = $row1zx['steps_name'];

                                        $resultzxd = $conn->query("SELECT COUNT(id) AS total_applications FROM job_applications WHERE job_id='$job_id' AND applicant_step = '$value'");
                                        while ($rowzxd = $resultzxd->fetch_assoc()) {
                                            $total_appy = $rowzxd['total_applications'];
                                        }
                                    }

                                ?>
                                    <li>
                                        <a href="javascript:;"
                                            onclick='filterApplicants("<?php echo $job_id; ?>","<?php echo $value; ?>")'>
                                            <div class="d-flex alig-items-center justify-content-between">
                                                <h6 class="tx-inverse tx-14 mg-b-0"><?php echo $step_name; ?></h6>
                                                <span class="tx-14"><?php echo $total_appy; ?> Applications</span>
                                            </div><!-- d-flex -->
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div><!-- card -->

                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-10">

                            <div class="row row-xs">

                                <div class="col-8 ">
                                    <h2 class="tx-gray-800 tx-uppercase tx-semibold tx-14 ">Applicants on Step</h2>

                                    <div class="media-list applicant-list collectedData">
                                        <ul id="applicantsdiv">

                                            <!--
                                        <?php
                                        $result1zxq = $conn->query("SELECT * FROM job_applications WHERE job_id = '$job_id' AND applicant_step = '$value'");
                                        while ($row1zxq = $result1zxq->fetch_assoc()) {
                                            $applicantid = $row1zxq['id'];
                                        ?>
                                            <li>
                                            <div class="d-flex alig-items-center justify-content-between">
                                                <div class="mg-x-15 mg-xs-x-20">
                                                    <h6 class="mg-b-2 tx-inverse tx-14">
                                                        <?php echo $row1zxq['fname'] . ' ' . $row1zxq['lname'] . ' ' . $row1zxq['mname']; ?>
                                                    </h6>
                                                    <p class="mg-b-0 tx-12"><?php echo $row1zxq['email']; ?></p>
                                                </div>
                                                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                                                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                                                </a>
                                            </div>
                                            </li>
                                        <?php } ?>
                                        -->

                                        </ul>
                                    </div><!-- media-list -->

                                </div>

                                <div class="col-4 pd-l-30">
                                    <h2 class="tx-gray-800 tx-uppercase tx-semibold tx-14 ">Filters</h2>
                                    <div id="filtersDiv" class="filters"></div>
                                </div>

                            </div><!-- row -->

                        </div><!-- card -->

                    </div><!-- col-lg-8 -->

                    <div class="col-lg-4 mg-t-30 mg-lg-t-0" id="profilediv">

                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30"></div>

                    </div><!-- col-lg-4 -->

                </div><!-- row -->
            </div><!-- tab-pane -->

            <div class="tab-pane fade" id="team">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card pd-25">

                            <div class="card-header bd-b-0">
                                <h5 class="tx-uppercase tx-inverse tx-bold">Job Team</h5>
                                <button class="btn btn-primary mb-3" onclick='showteamChange(<?php echo $jobid; ?>);'>Add Team Member</button>
                            </div><!-- card-header -->

                            <div class="card-body pd-0">
                                <div id="rickshaw1222" class="wd-100p rounded-bottom">

                                    <table id="mainTableClass"
                                        class="table table-bordered display responsive mainTableClass">
                                        <thead class="thead-colored thead-dark">
                                            <tr>
                                                <th class="">ID</th>
                                                <th class="">Full name</th>
                                                <th class="">Admin Level</th>
                                                <th class="">User Role</th>
                                                <th class="">Gender</th>
                                                <th class="">Phone No</th>
                                                <th class="">Email Address</th>
                                                <th class="">Profile Picture</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="requisitions-table">
                                            <?php
                                            $x = 0;
                                            //$job_team_array = explode(',', $job_team);
                                            //$job_team_list = "'" . implode("','", $job_team_array) . "'";
                                            //$huserbd5 = mysqli_query($conn, "SELECT * FROM admins WHERE company='$companyMain' AND user_role IN ($job_team_list) ORDER BY id desc");

                                            $job_team_array = explode(',', $job_team_members);
                                            $job_team_list = "'" . implode("','", $job_team_array) . "'";
                                            $huserbd5 = mysqli_query($conn, "SELECT * FROM admins WHERE company='$companyMain' AND id IN ($job_team_list) ORDER BY id desc");
                                            while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                                                $eid = $huserb1d5["id"];
                                                $fname = $huserb1d5["fname"];
                                                $mname = $huserb1d5["mname"];
                                                $lname = $huserb1d5["lname"];
                                                $email = $huserb1d5["email"];
                                                $phone = $huserb1d5["phone"];
                                                $gender = $huserb1d5["gender"];
                                                $plevel1 = $huserb1d5["plevel"];
                                                $status = $huserb1d5["status"];
                                                $uname = $huserb1d5["uname"];
                                                $pword = $huserb1d5["pword"];
                                                $edms = $huserb1d5["edms"];
                                                $payroll = $huserb1d5["payroll"];
                                                $datacapture = $huserb1d5["datacapture"];
                                                $tams = $huserb1d5["tams"];
                                                $mainadmin = $huserb1d5["mainadmin"];
                                                $department1 = $huserb1d5["department"];
                                                $profilepic = $huserb1d5["profilepic"];
                                                $createdby = $huserb1d5["createdby"];
                                                $llogin5 = $huserb1d5["llogin"];
                                                $user_roley = $huserb1d5["user_role"];
                                                //$llogin6 = ($llogin5 / 1000);
                                                $llogin = date("Y-m-d h:i:s", $llogin5);

                                                $hu = mysqli_query($conn, "SELECT * FROM approvallevels WHERE id = '$plevel1'");
                                                while ($hug = mysqli_fetch_array($hu)) {
                                                    $plevel = $hug["levelnick"];
                                                }

                                                $hu2 = mysqli_query($conn, "SELECT * FROM user_roles WHERE id = '$user_roley'");
                                                while ($hugu = mysqli_fetch_array($hu2)) {
                                                    $user_roley2 = $hugu["name"];
                                                }

                                                $x = $x + '1';
                                            ?>
                                                <tr>
                                                    <td><?php echo $x; ?></td>
                                                    <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                                                    <td><?php echo $plevel; ?></td>
                                                    <td><?php echo $user_roley2; ?></td>
                                                    <td><?php echo $gender; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><img src="../images/profilepics/<?php echo $profilepic; ?>"
                                                            class="wd-60 ht-60 rounded-circle"></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="" class="tx-gray-800 d-inline-block"
                                                                data-toggle="dropdown">
                                                                <div
                                                                    class="ht-25 pd-x-20 bd d-flex align-items-center justify-content-center">
                                                                    <span class="tx-13 tx-medium">Actions</span>
                                                                    <i class="fa fa-angle-down mg-l-10"></i>
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-menu pd-10 wd-200">
                                                                <nav class="nav nav-style-2 flex-column">
                                                                    <a href="#" class="nav-link"
                                                                        onclick='removeMember("<?php echo $job_id; ?>","<?php echo $eid; ?>","<?php echo $jobid; ?>")'>Remove Member</a>
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
                    </div><!-- col-12 -->

                </div><!-- row -->
            </div><!-- tab-pane -->

        </div><!--  -->

    </div><!-- widget-2 -->
</div><!-- col-12 -->