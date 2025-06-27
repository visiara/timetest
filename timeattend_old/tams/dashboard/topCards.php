<div class="row row-sm mg-t-20">

    <div class="col-sm-6 col-lg-3 mb-2">
        <div class="card shadow bd-0">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0 ">Absent Today</h6>
                <!--<span class="tx-12 tx-uppercase"><?php echo date("F m, Y"); ?></span>-->
            </div><!-- card-header -->
            <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato fs-1 tx-bold"><?php echo $abs; ?></h4>
                <p class="mg-b-0 tx-sm"><!--<span class="tx-success"><i class="fa fa-arrow-up"></i> 34.32%</span>--> total absent</p>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-0 mb-2">
        <div class="card shadow bd-0">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Authorised Absentee</h6>
                <!--<span class="tx-12 tx-uppercase"><?php echo date("F m, Y"); ?></span>-->
            </div><!-- card-header -->
            <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato fs-1 tx-bold"><?php echo $absautho; ?></h4>
                <p class="mg-b-0 tx-sm"><!--<span class="tx-danger"><i class="fa fa-arrow-down"></i> 0.92%</span>--> with Exception</p>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-lg-t-0">
        <div class="card shadow bd-0">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Un-Authorised Absentee</h6>
                <!--<span class="tx-12 tx-uppercase"><?php echo date("F m, Y"); ?></span>-->
            </div><!-- card-header -->
            <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato fs-1 tx-bold"><?php echo $absUn; ?></h4>
                <p class="mg-b-0 tx-sm"><!--<span class="tx-success"><i class="fa fa-arrow-up"></i> 16.34%</span>--> without Exception</p>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-lg-t-0">
        <div class="card shadow bd-0">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">SMS Balance</h6>
                <!--<span class="tx-12 tx-uppercase"><?php echo date("F m, Y"); ?></span>-->
            </div><!-- card-header -->
            <div class="card-body d-xs-flex justify-content-between align-items-center">
                <h4 class="mg-b-0 tx-inverse tx-lato fs-1 tx-bold"><?php echo number_format($comsmsbal); ?></h4>
                <p class="mg-b-0 tx-sm"><!--<span class="tx-success"><i class="fa fa-arrow-up"></i> 16.34%</span>--> balance Useable</p>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->

</div><!-- row -->