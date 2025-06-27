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
          <a href="mydepartment.php" class="br-menu-link <?php echo $where14; ?>">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">My Department</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
<?php if($user_role == "4"){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where2; ?>">
            <i class="fa fa-users tx-16"></i>
            <span class="menu-item-label">User Enrollment</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="employeelist.php" class="sub-link <?php echo $where2a; ?>">All Users</a></li>
            <li class="sub-item"><a href="employeelista.php" class="sub-link <?php echo $where2b; ?>">Active Users</a></li>
            <li class="sub-item"><a href="employeelisti.php" class="sub-link <?php echo $where2c; ?>">InActive Users</a></li>
            <li class="sub-item"><a href="employeelistd.php" class="sub-link <?php echo $where2d; ?>">Deleted Users</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

<?php if(($user_role == "1") || ($user_role == "3") || ($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where3; ?>">
            <i class="fa fa-list tx-18"></i>
            <span class="menu-item-label">Attendance</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="applyleave.php" class="sub-link <?php echo $where3a; ?>">Apply Leave/Exemption</a></li>
            <li class="sub-item"><a href="applyworkshift.php" class="sub-link <?php echo $where3d; ?>">Apply Workshift</a></li>
            <li class="sub-item"><a href="leaves.php" class="sub-link <?php echo $where3b; ?>">Leave Request</a></li>
            <li class="sub-item"><a href="exemptions.php" class="sub-link <?php echo $where3c; ?>">Exemption Request</a></li>
<?php if($loggedplevel >= "2"){ ?>
            <li class="sub-item"><a href="attendance_overrule.php" class="sub-link <?php echo $where3e; ?>">Attendance Override</a></li>
<?php } ?>
            <li class="sub-item"><a href="leaves_history.php" class="sub-link <?php echo $where3f; ?>">Leave History</a></li>
            <li class="sub-item"><a href="exemptions_history.php" class="sub-link <?php echo $where3g; ?>">Exemption History</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

<?php if(($user_role == "1") || ($user_role == "3") || ($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where9; ?>">
            <i class="fa fa-chart-line tx-20"></i>
            <span class="menu-item-label">Report</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="attendance.php" class="sub-link <?php echo $where9e; ?>">Attendance</a></li>
            <li class="sub-item"><a href="attendance1.php" class="sub-link <?php echo $where9a; ?>">Daily Attendance</a></li>
            <li class="sub-item"><a href="attendance3.php" class="sub-link <?php echo $where9c; ?>">Monthly Attendance</a></li>
            <li class="sub-item"><a href="attendance2.php" class="sub-link <?php echo $where9b; ?>">Reports</a></li>
            <li class="sub-item"><a href="attendance4.php" class="sub-link <?php echo $where9d; ?>">Audit Logs</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

<?php if(($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where4; ?>">
            <i class="fa fa-user tx-18"></i>
            <span class="menu-item-label">Administrators</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="adminusers.php" class="sub-link <?php echo $where4a; ?>">Admin Users</a></li>
            <li class="sub-item"><a href="deviceadmins.php" class="sub-link <?php echo $where4b; ?>">Device Admins</a></li>
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

<?php if(($user_role == "1") || ($user_role == "4")){ ?>        
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where5; ?>">
            <i class="fa fa-sitemap tx-16"></i>
            <span class="menu-item-label">Organization</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="approvallevel.php" class="sub-link <?php echo $where5a; ?>">Approval Levels</a></li>
            <li class="sub-item"><a href="leavetype.php" class="sub-link <?php echo $where5b; ?>">Leave Types</a></li>
            <li class="sub-item"><a href="holidays.php" class="sub-link <?php echo $where5c; ?>">Holidays</a></li>
            <li class="sub-item"><a href="exemptiontype.php" class="sub-link <?php echo $where5d; ?>">Exemption Type</a></li>
            <li class="sub-item"><a href="workshift.php" class="sub-link <?php echo $where5e; ?>">Work Shift Type</a></li>
            <!--<li class="sub-item"><a href="salary.php" class="sub-link <?php echo $where5f; ?>">Salary Scale</a></li>-->
          </ul>
        </li><!-- br-menu-item -->
<?php } ?>

<?php if($mastersalary == "1"){ ?>
  <?php if(($user_role == "2") || ($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where12; ?>">
            <i class="fa fa-suitcase tx-18"></i>
            <span class="menu-item-label">Payroll Management</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <!--<li class="sub-item"><a href="salary.php" class="sub-link <?php echo $where12a; ?>">Salary Dashboard</a></li>-->
            <li class="sub-item"><a href="salary1.php" class="sub-link <?php echo $where12b; ?>">Salary Scale</a></li>
            <li class="sub-item"><a href="salary2.php" class="sub-link <?php echo $where12c; ?>">Allowances</a></li>
            <li class="sub-item"><a href="salary6.php" class="sub-link <?php echo $where12g; ?>">Allowance Other Labels</a></li>
            <li class="sub-item"><a href="salary3.php" class="sub-link <?php echo $where12d; ?>">Deductions</a></li>
            <li class="sub-item"><a href="salary7.php" class="sub-link <?php echo $where12h; ?>">Deduction Other Labels</a></li>
            <li class="sub-item"><a href="salary4.php" class="sub-link <?php echo $where12e; ?>">Pay Slip</a></li>
            <li class="sub-item"><a href="salary5.php" class="sub-link <?php echo $where12f; ?>">Pay History</a></li>
            <li class="sub-item"><a href="salary8.php" class="sub-link <?php echo $where12i; ?>">Payroll Summary sheet</a></li>
          </ul>
        </li><!-- br-menu-item -->
  <?php } ?>
<?php } ?>


<?php if($masterkpi == "1"){ ?>
  <?php //if(($user_role == "3") || ($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where13; ?>">
            <i class="fa fa-tasks tx-18"></i>
            <span class="menu-item-label">KPI Management</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <!--<li class="sub-item"><a href="kpi.php" class="sub-link <?php echo $where13a; ?>">KPI Dashboard</a></li>-->
            <li class="sub-item"><a href="kpi1.php" class="sub-link <?php echo $where13b; ?>">Create KPI</a></li>
            <li class="sub-item"><a href="kpi6.php" class="sub-link <?php echo $where13g; ?>">User KPI Report</a></li>
            <li class="sub-item"><a href="kpi3.php" class="sub-link <?php echo $where13d; ?>">Department KPI Report</a></li>
            <li class="sub-item"><a href="kpi2.php" class="sub-link <?php echo $where13c; ?>">User KPI History</a></li>
<!--
            <li class="sub-item"><a href="kpi4.php" class="sub-link <?php echo $where13e; ?>">Work Shift Type</a></li>
            <li class="sub-item"><a href="kpi5.php" class="sub-link <?php echo $where13f; ?>">Salary Scale</a></li>
-->
          </ul>
        </li><!-- br-menu-item -->
  <?php //} ?>
<?php } ?>


<?php if(($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="biometrics.php" class="br-menu-link <?php echo $where8; ?>">
            <i class="menu-item-icon icon ion-aperture tx-24"></i>
            <span class="menu-item-label">Biometrics Data</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
<?php } ?>

<?php if(($user_role == "4")){ ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where6; ?>">
            <i class="fa fa-cog tx-20"></i>
            <span class="menu-item-label">Settings</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub nav flex-column">
            <li class="sub-item"><a id="btnRightMenu" href="" class="sub-link">Options</a></li>
            <li class="sub-item"><a href="devices.php" class="sub-link <?php echo $where6a; ?>">Devices</a></li>
            <li class="sub-item"><a href="locations.php" class="sub-link <?php echo $where6b; ?>">Locations</a></li>
            <li class="sub-item"><a href="departments.php" class="sub-link <?php echo $where6c; ?>">Departments</a></li>
            <?php
            if($loggedplevel == '5'){ ?>
            <li class="sub-item"><a href="company.php" class="sub-link <?php echo $where6d; ?>">Company</a></li>
            <?php } ?>

            <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where7; ?>">
            <i class="fa fa-envelope tx-20"></i>
            <span class="menu-item-label">SMS Configuration</span>
          </a>
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="sms1.php" class="sub-link <?php echo $where7a; ?>">Send SMS</a></li>
            <li class="sub-item"><a href="sms4.php" class="sub-link <?php echo $where7d; ?>">Message Templates</a></li>
            <?php if($loggedplevel == '5'){ ?>
            <li class="sub-item"><a href="sms2.php" class="sub-link <?php echo $where7b; ?>">Add New Gateway</a></li>
            <li class="sub-item"><a href="sms3.php" class="sub-link <?php echo $where7c; ?>">Manage Gateways</a></li>
            <li class="sub-item"><a href="sms5.php" class="sub-link <?php echo $where7e; ?>">Manage SMS</a></li>
            <?php } ?>
          </ul>
        </li>

            <li class="br-menu-item">
              <a href="logout.php" class="br-menu-link">
                <i class="fa fa-sign-out-alt tx-20"></i>
                <span class="menu-item-label">Sign Out</span>
              </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->


          </ul>

          <li class="br-menu-item">
          <a href="logout.php" class="br-menu-link">
            <i class="fa fa-sign-out-alt tx-20"></i>
            <span class="menu-item-label">Sign Out</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        </li><!-- br-menu-item -->
<?php } ?>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php echo $where7; ?>">
            <i class="fa fa-envelope tx-20"></i>
            <span class="menu-item-label">SMS Configuration</span>
          </a>
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="sms1.php" class="sub-link <?php echo $where7a; ?>">Send SMS</a></li>
            <li class="sub-item"><a href="sms4.php" class="sub-link <?php echo $where7d; ?>">Message Templates</a></li>
            <?php if($loggedplevel == '5'){ ?>
            <li class="sub-item"><a href="sms2.php" class="sub-link <?php echo $where7b; ?>">Add New Gateway</a></li>
            <li class="sub-item"><a href="sms3.php" class="sub-link <?php echo $where7c; ?>">Manage Gateways</a></li>
            <li class="sub-item"><a href="sms5.php" class="sub-link <?php echo $where7e; ?>">Manage SMS</a></li>
            <?php } ?>
          </ul>
        </li>
      
      </ul><!-- br-sideleft-menu -->

      <!-- info-list -->

      <br>
    </div><!-- br-sideleft -->
