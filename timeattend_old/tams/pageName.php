<div class="container mt-4">
    <div class="row align-items-center mb-4">
        <div class="col-12 col-md-6">
            <h2 class="fw-bold text-dark mb-3 mb-md-0"> <?= $therealpagename; ?></h2>
        </div>

        <?php if ($noemployeeMain > $allEmployee && $therealpagename == 'Employees') { ?>

            <div class="col-12 col-md-6">
                <div class="d-flex flex-wrap justify-content-md-end gap-3">
                    <!-- Deleted accounts button -->
                    <button type="button" class="btn btn-outline-secondary rounded-pill shadow-sm" onclick="alert('Pressed!')">
                        <span class="fw-bold text-dark">Deleted accounts</span>
                    </button>

                    <!-- Import button -->
                    <button type="button" class="btn btn-outline-secondary rounded-pill shadow-sm d-flex align-items-center gap-2" data-toggle="modal" data-target="#modaldemo6">
                        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/3hsglddc_expires_30_days.png" class="rounded-circle" style="width: 20px; height: 20px;" />
                        <span class="fw-bold text-dark">Import</span>
                    </button>

                    <!-- Add employee button -->
                    <a href="employedata.php" type="" class="btn btn-primary text-white rounded-pill d-flex align-items-center gap-2">
                        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/vhef5o09_expires_30_days.png" class="rounded-circle" style="width: 20px; height: 20px;" />
                        <span class="fw-bold">Add employee</span>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php if ($noemployeeMain > $allEmployee && $therealpagename == 'Employees') { ?>

    <!-- On Needed Pages -->

    <div class="d-flex align-items-center mb-4 mx-3 flex-wrap">
        <span class="text-black fw-bold small me-auto mb-2 mb-md-0" style="min-width: 200px;">
            Showing all <?= number_format($allEmployee) ?> employees
        </span>

        <div class="d-flex align-items-center gap-3 flex-wrap">
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">Items per page</span>
                <button
                    type="button"
                    class="btn btn-white border rounded d-flex align-items-center gap-2 px-3 py-2"
                    style="box-shadow: 0px 1px 2px #0A0C120D;"
                    onclick="alert('Pressed!')">
                    <span class="text-dark small">10</span>
                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/qb4opxu3_expires_30_days.png" alt="arrow" width="18" height="18" />
                </button>
            </div>

            <button
                type="button"
                class="btn btn-white border rounded-pill px-4 py-2 fw-bold"
                style="box-shadow: 0px 1px 2px #0A0C120D;"
                data-toggle="modal" data-target="#assemployeemodal">
                Group assign
            </button>

            <button
                type="button"
                class="btn btn-white border rounded-pill d-flex align-items-center gap-2 px-4 py-2 fw-bold"
                style="box-shadow: 0px 1px 2px #0A0C120D;"
                onclick="alert('Pressed!')">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/doq96tmu_expires_30_days.png" alt="filter" class="rounded-circle" width="20" height="20" />
                <span>Filters</span>
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/x56hsznv_expires_30_days.png" alt="dropdown" class="rounded-circle" width="20" height="20" />
            </button>

            <div
                class="d-flex align-items-center bg-white border rounded-3 px-3 py-2 gap-2"
                style="box-shadow: 0px 1px 2px #0A0C120D;">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/7m76636r_expires_30_days.png" alt="search icon" width="18" height="18" />
                <input
                    id="customTableSearch"
                    type="text"
                    placeholder="Search keyword"
                    class="form-control border-0 p-0 text-black small"
                    style="min-width: 200px; background: transparent;" />
            </div>
        </div>
    </div>

<?php } ?>