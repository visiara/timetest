<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


?>
<div class="col-lg-12">
  <div class="widget-2">
    <div class="card pd-25">

      <div class="card-header bd-b-0">
        <h5 class="tx-uppercase tx-inverse tx-bold">Dashboard</h5>

        <div class="d-flex justify-content-end">
          <a href="#" class="btn btn-primary mb-3" onclick="showPage('dash1.php')">Create Job</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash2.php')">Upload CV (Curriculum Vitae)</a>

          <a href="#" class="btn btn-primary mb-3 ml-2" onclick="showPage('dash3.php')">Explore Applicant Pool</a>
        </div>

      </div><!-- card-header -->

      <div class="card-body pd-0">
        <div id="rickshaw1222" class="row wd-100p rounded-bottom">

          <div class="col-lg-12">
            <div class="widget-2">
              <div class="card shadow-base overflow-hidden">
                <div class="card-header">
                  <h6 class="card-title">Job Statistics : Year - <span id="yeardiv"></span></h6>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <select id="yearSelect" class="form-control" onchange="doRick(this.value);">
                      <?php
                      //echo each year as an option 
                      $Mainsatrtyear = date("Y");
                      for ($i = 0; $i <= 10; $i++) {
                        echo "<option value=" . ($Mainsatrtyear - $i) . ">Year - " . ($Mainsatrtyear - $i) . "</option>n";
                      }
                      ?>
                    </select>
                  </div>
                </div><!-- card-header -->
                <div class="card-body pd-0 bd-color-gray-lighter">
                  <div class="row no-gutters tx-center">
                    <div class="col-12 col-sm-4 pd-y-20 tx-left">
                      <p class="pd-l-20 tx-12 lh-8 mg-b-0">Note: Total Number of Applicants vs Total Number of Jobs
                        Created, Number of Employed Applicants.</p>
                    </div><!-- col-4 -->
                    <div class="col-6 col-sm-2 pd-y-20">
                      <div id="legend"></div>
                    </div><!-- col-2 -->
                    <div class="col-6 col-sm-2 pd-y-20 bd-l bd-color-gray-lighter">
                      <h5 class="tx-inverse tx-lato tx-bold mg-b-5">102</h5>
                      <p class="tx-12 mg-b-0">Employed</p>
                    </div><!-- col-2 -->
                    <div class="col-6 col-sm-2 pd-y-20 bd-l bd-color-gray-lighter">
                      <h5 class="tx-inverse tx-lato tx-bold mg-b-5" id="totalapp">343</h5>
                      <p class="tx-12 mg-b-0">Applicants</p>
                    </div><!-- col-2 -->
                    <div class="col-6 col-sm-2 pd-y-20 bd-l bd-color-gray-lighter">
                      <h5 class="tx-inverse tx-lato tx-bold mg-b-5" id="totaljobs">960</h5>
                      <p class="tx-12 mg-b-0">Jobs</p>
                    </div><!-- col-2 -->
                  </div><!-- row -->
                </div><!-- card-body -->
                <div class="card-body pd-20">
                  <div id="chart" class="wd-100p ht-400 rounded-bottom"></div>

                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- widget-2 -->
          </div><!-- col-6 -->

        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- widget-2 -->
</div><!-- col-12 -->