<div class="d-flex flex-column position-sticky top-0 h-100 p-3 bg-white border rounded-4 shadow-sm">
    <!-- Logo Section -->
    <div class="d-flex align-items-center mb-4 gap-3 px-2">
        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/h7vfeudc_expires_30_days.png" class="img-fluid" style="width: 204px; height: 40px;" />
        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/hrc1prjx_expires_30_days.png" class="img-fluid" style="width: 24px; height: 24px;" />
    </div>

    <!-- User Info -->
    <div class="d-flex align-items-center justify-content-between border rounded-3 shadow-sm mb-4 px-3 py-2">
        <div class="d-flex align-items-center gap-3">
            <img src="../images/profilepics/<?php echo $loggedprofilepic; ?>" class="rounded-circle" width="40" height="40" />
            <div class="d-flex flex-column">
                <span class="fw-bold small text-dark"><?php echo $loggedinname; ?></span>
                <span class="text-muted small">Unit Head</span>
            </div>
        </div>
        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/o6i1sxse_expires_30_days.png" width="16" height="16" />
    </div>

    <!-- Navigation -->
    <nav class="nav flex-column">
        <a href="dashboard.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where1; ?>">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/stbmevp9_expires_30_days.png" width="20" height="20" />
            <span class="<?= !$where1 ? 'text-muted' : $activeTextClass ?> fw-bold small">Dashboard</span>
        </a>

        <a href="mydepartment.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where14; ?>">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/r9cvd6qo_expires_30_days.png" width="20" height="20" />
            <span class="<?= !$where14 ? 'text-muted' : $activeTextClass ?> fw-bold small">My Department</span>
        </a>

        <?php if ($user_role == "4") { ?>
            <a href="employeelist.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where2; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/3ft3ixce_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where2 ? 'text-muted' : $activeTextClass ?> fw-bold small">Employees</span>
            </a>
        <?php } ?>

        <?php if (in_array($user_role, ["1", "3", "4"])) { ?>
            <a href="attendance.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where3; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/46nq0hr2_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where3 ? 'text-muted' : $activeTextClass ?> fw-bold small">Attendance</span>
            </a>

            <a href="attendance3.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where9; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/pa4r10q6_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where9 ? 'text-muted' : $activeTextClass ?> fw-bold small">Report</span>
            </a>
        <?php } ?>

        <?php if ($user_role == "4") { ?>
            <a href="adminusers.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where4; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/1olel88p_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where4 ? 'text-muted' : $activeTextClass ?> fw-bold small">Administrators</span>
            </a>
        <?php } ?>

        <?php if (in_array($user_role, ["1", "4"])) { ?>
            <a href="approvallevel.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where5; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/910dccrb_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where5 ? 'text-muted' : $activeTextClass ?> fw-bold small">Organization</span>
            </a>
        <?php } ?>

        <?php if ($mastersalary == "1" && in_array($user_role, ["2", "4"])) { ?>
            <a href="salary1.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where12; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/eiwykiem_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where12 ? 'text-muted' : $activeTextClass ?> fw-bold small">Salary Management</span>
            </a>
        <?php } ?>

        <?php if ($masterkpi == "1") { ?>
            <a href="kpi1.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where13; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/z6p4wzvr_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where13 ? 'text-muted' : $activeTextClass ?> fw-bold small">KPI Management</span>
            </a>
        <?php } ?>

        <a href="recruitment.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where15; ?>">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/0vpho1o0_expires_30_days.png" width="20" height="20" />
            <span class="<?= !$where15 ? 'text-muted' : $activeTextClass ?> fw-bold small">Recruitment</span>
        </a>

        <a href="assetmanagement.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where16; ?>">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/dam0j8bp_expires_30_days.png" width="20" height="20" />
            <span class="<?= !$where16 ? 'text-muted' : $activeTextClass ?> fw-bold small">File Manager</span>
        </a>

        <?php if ($user_role == "4") { ?>
            <a href="biometrics.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where8; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/g3wfc0ey_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where8 ? 'text-muted' : $activeTextClass ?> fw-bold small">Biometrics</span>
            </a>

            <a href="devices.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where6; ?>">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/qoy8nuhk_expires_30_days.png" width="20" height="20" />
                <span class="<?= !$where6 ? 'text-muted' : $activeTextClass ?> fw-bold small">Settings</span>
            </a>
        <?php } ?>

        <a href="#" class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-1 rounded <?php echo $where7; ?>">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/deyzhzqn_expires_30_days.png" width="20" height="20" />
            <span class="<?= !$where7 ? 'text-muted' : $activeTextClass ?> fw-bold small">SMS Config</span>
        </a>

        <a href="logout.php" class="nav-link d-flex align-items-center gap-2 py-2 px-3 text-danger fw-bold small">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/77sfdxf8_expires_30_days.png" width="20" height="20" />
            Sign Out
        </a>
    </nav>

    <!-- Footer -->
    <div class="mt-4 text-center small text-muted">
        <?= $siteName . ' ' . $siteVersion ?><br />
        &copy; <?= $siteParentName . ' ' . date('Y') ?>
    </div>
</div>

<!-- Page content wrapper -->
<div class="flex-grow-1">
    <div class="p-4 bg-white border rounded-4 shadow-sm">
        <!-- Page Content Here -->
        <div class="overflow-auto" style="height: calc(100vh - 72px);">
            <div class="container py-4">