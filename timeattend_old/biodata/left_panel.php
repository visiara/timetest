    <div class="br-logo"><a href=""><span>[</span>TIM<i>ATEND</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3"></label>
      <p><img class="center img-responsive" border="0" src="../images/delta-state-logo2.png" width="90" height="82"></p>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="dashboard.php" class="br-menu-link <?php echo $where1; ?>">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="profile.php?q=<?php echo $loggedid; ?>" class="br-menu-link <?php echo $where14; ?>">
            <i class="menu-item-icon icon fa fa-user tx-18"></i>
            <span class="menu-item-label">My Profile</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where3; ?>">
            <i class="fa fa-list tx-18"></i>
            <span class="menu-item-label">Attendance</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="applyleave.php" class="sub-link <?php echo $where3a; ?>">Apply Leave/Exemption</a></li>
            <li class="sub-item"><a href="leaves_history.php" class="sub-link <?php echo $where3f; ?>">Leave History</a></li>
            <li class="sub-item"><a href="exemptions_history.php" class="sub-link <?php echo $where3g; ?>">Exemption History</a></li>
          </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where9; ?>">
            <i class="fa fa-chart-line tx-20"></i>
            <span class="menu-item-label">Report</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="attendance.php" class="sub-link <?php echo $where9e; ?>">Attendance Report</a></li>
            <li class="sub-item"><a href="attendance3.php" class="sub-link <?php echo $where9c; ?>">Monthly Attendance</a></li>
          </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where5; ?>">
            <i class="fa fa-sitemap tx-16"></i>
            <span class="menu-item-label">Organization</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="holidays.php" class="sub-link <?php echo $where5c; ?>">Holidays</a></li>
          </ul>
        </li><!-- br-menu-item -->

<?php if($mastersalary == "1"){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where12; ?>">
            <i class="fa fa-suitcase tx-18"></i>
            <span class="menu-item-label">Salary Management</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="salary5.php" class="sub-link <?php echo $where12f; ?>">Pay History</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>


<?php if($masterkpi == "1"){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where13; ?>">
            <i class="fa fa-tasks tx-18"></i>
            <span class="menu-item-label">KPI Management</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <!--<li class="sub-item"><a href="kpi.php" class="sub-link <?php echo $where13a; ?>">KPI Dashboard</a></li>-->
            <li class="sub-item"><a href="kpi2.php" class="sub-link <?php echo $where13c; ?>">Employee KPI Report</a></li>
            <li class="sub-item"><a href="kpi3.php" class="sub-link <?php echo $where13d; ?>">Department KPI Report</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

        <li class="br-menu-item">
          <a href="logout.php" class="br-menu-link">
            <i class="fa fa-sign-out-alt tx-20"></i>
            <span class="menu-item-label">Sign Out</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->

      <!-- info-list -->

      <br>
    </div><!-- br-sideleft -->
