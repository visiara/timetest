<div class="row row-sm mg-t-20">
    <div class="col-lg-6">
        <div class="card shadow card-body pd-25 bd-0">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="card-title tx-uppercase tx-12">Attendance Today</h6>
                    <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato"><?php echo $apercent; ?>%</p>
                    <div class="progress mg-b-10">
                        <div class="progress-bar bg-primary progress-bar-xs wd-<?php echo $apercent; ?>p" role="progressbar" aria-valuenow="<?php echo $apercent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $apercent; ?>%;"></div>
                    </div><!-- progress -->
                    <p class="tx-12">Total percentage of present staff..</p>
                    <p class="tx-11 lh-3 mg-b-0">.</p>
                </div><!-- col-6 -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
                    <span class="peity-donut" data-peity='{ "fill": ["#0866C6", "#E9ECEF"],  "innerRadius": 60, "radius": 90 }'><?php echo $apercent; ?>/100</span>
                </div><!-- col-6 -->
            </div><!-- row -->
        </div><!-- card -->
    </div><!-- col-6 -->

    <div class="col-lg-6 mb-4">
        <div class="card shadow bd-0">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Biometric Enrollment Infomation</h6>
                <!--<span class="tx-12 tx-uppercase"><?php echo date("F Y"); ?></span>-->
            </div><!-- card-header -->
            <div class="card-body">
                <p class="tx-sm tx-inverse tx-medium mg-b-0">Total Enrollment Monitoring</p>
                <p class="tx-10">..........</p>
                <div class="row align-items-center">
                    <div class="col-3 tx-12">Total Staff </div><!-- col-3 -->
                    <div class="col-9">
                        <div class="progress rounded-0 mg-b-0">
                            <div class="progress-bar bg-info wd-<?php echo $allemployActive; ?>p lh-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><?php echo $allemployActive; ?> Users</div>
                        </div><!-- progress -->
                    </div><!-- col-9 -->
                </div><!-- row -->
                <div class="row align-items-center mg-t-5">
                    <div class="col-3 tx-12">Enrollment</div><!-- col-3 -->
                    <div class="col-9">
                        <div class="progress rounded-0 mg-b-0">
                            <div class="progress-bar bg-pink wd-<?php echo $enrolledP; ?>p lh-3" role="progressbar" aria-valuenow="<?php echo $enrolledP; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $enrolledP; ?>%;"><?php echo $enrolledP; ?>%</div>
                        </div><!-- progress -->
                    </div><!-- col-9 -->
                </div><!-- row -->
                <div class="row align-items-center mg-t-5">
                    <div class="col-3 tx-12">Not Enrolled</div><!-- col-3 -->
                    <div class="col-9">
                        <div class="progress rounded-0 mg-b-0">
                            <div class="progress-bar bg-primary wd-<?php echo $notenrolledP; ?>p lh-3" role="progressbar" aria-valuenow="<?php echo $notenrolledP; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $notenrolledP; ?>%;"><?php echo $notenrolledP; ?>%</div>
                        </div><!-- progress -->
                    </div><!-- col-9 -->
                </div><!-- row -->
                <p class="tx-11 mg-b-0 mg-t-15">Notice: includes profile picture .</p>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->

</div><!-- row -->