<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";

//$jobid = $_GET['jobid'];

// Fetch current settings
$settingsQuery = "SELECT * FROM company WHERE id = '$companyMain'";
$settings = $conn->query($settingsQuery)->fetch_assoc();
?>

<div class="col-lg-12">
    <div class="widget-2">

        <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                <li class="nav-item"><a class="nav-link jobnav active" data-toggle="tab" id="activitiestab"
                        href="#activities" role="tab">Embed Settings</a></li>
                <li class="nav-item"><a class="nav-link jobnav" data-toggle="tab" id="applicantstab" href="#applicants"
                        role="tab">Admin Settings</a></li>
            </ul>
        </div>

        <div class="tab-content br-profile-body">

            <div class="tab-pane fade active show" id="activities">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="media-list bg-white rounded shadow-base">
                            <div class="card bd-0 shadow-base mg-t-30">
                                <div class="card-header bg-light">
                                    Social Media Settings
                                </div><!-- card-header -->
                                <div class="card-body bd bd-t-0 rounded-bottom">

                                    <form id="setsave" method="POST" action="">
                                        <div class="form-group">
                                            <label>LinkedIn Access Token</label>
                                            <input type="text" class="form-control" name="linkedin_access_token"
                                                value="<?= isset($settings['linkedin_access_token']) ? $settings['linkedin_access_token'] : ''; ?>"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>LinkedIn Company ID</label>
                                            <input type="text" class="form-control" name="linkedin_company_id"
                                                value="<?= isset($settings['linkedin_company_id']) ? $settings['linkedin_company_id'] : ''; ?>"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Facebook Access Token</label>
                                            <input type="text" class="form-control" name="facebook_access_token"
                                                value="<?= isset($settings['facebook_access_token']) ? $settings['facebook_access_token'] : ''; ?>"
                                                required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </form>
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="media-list bg-white rounded shadow-base">
                            <div class="card bd-0 shadow-base mg-t-30">
                                <div class="card-header bg-light">
                                    Current Settings
                                </div><!-- card-header -->
                                <div class="card-body bd bd-t-0 rounded-bottom">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>LinkedIn Access Token</th>
                                            <td><?= isset($settings['linkedin_access_token']) ? $settings['linkedin_access_token'] : 'Not Set'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>LinkedIn Company ID</th>
                                            <td><?= isset($settings['linkedin_company_id']) ? $settings['linkedin_company_id'] : 'Not Set'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Facebook Access Token</th>
                                            <td><?= isset($settings['facebook_access_token']) ? $settings['facebook_access_token'] : 'Not Set'; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div>
                    </div>

                </div><!-- row -->
            </div><!-- tab-pane -->

            <div class="tab-pane fade " id="applicants">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30 collectedData" id="collectedData">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-20">WorkFlow Steps</h6>

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

                    </div><!-- col-lg-12 -->
                </div><!-- row -->
            </div><!-- tab-pane -->

        </div><!--  -->

    </div><!-- widget-2 -->
</div><!-- col-12 -->