<!--begin::Navs-->
<div class="app-sidebar-navs flex-column-fluid pb-6" id="kt_app_sidebar_navs">
    <div id="kt_app_sidebar_navs_wrappers" class="hover-scroll-y my-2 mx-4" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_header" data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="5px" style="height: 1443px;">

        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="menu menu-column menu-rounded menu-sub-indention menu-active-bg mb-7">

            <!-- Dashboard -->
            <div class="menu-item">

                <a class="menu-link <?php echo $where1; ?>" href="dashboard.php">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-element-11 fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>

            </div>

            <!-- Department -->
            <div class="menu-item">

                <a class="menu-link <?php echo $where14; ?>" href="mydepartment.php">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-profile-user fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </span>
                    <span class="menu-title">My Department</span>
                </a>

            </div>
            <!-- Employee -->

            <?php if ($user_role == "4") { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where2; ?>">

                    <span class="menu-link <?php echo $where2; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Employees</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where2a; ?>" href="employeelist.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">All Users</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where2b; ?>" href="employeelista.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Active Users</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where2c; ?>" href="employeelisti.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">InActive Users</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where2d; ?>" href="employeelistd.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Deleted Users</span>
                            </a>

                        </div>


                    </div>

                </div>
            <?php } ?>
            <!-- Attendance -->

            <?php if (($user_role == "1") || ($user_role == "3") || ($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where3; ?>">

                    <span class="menu-link <?php echo $where3; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-calendar-tick fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Attendance</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where3a; ?>" href="applyleave.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Apply Leave/Exemption</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where3d; ?>" href="applyworkshift.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Apply Workshift</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where3b; ?>" href="leaves.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Leave Request</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where3c; ?>" href="exemptions.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Exemption Request</span>
                            </a>

                        </div>
                        <?php if ($loggedplevel >= "2") { ?>

                            <div class="menu-item">

                                <a class="menu-link <?php echo $where3e; ?>" href="attendance_overrule.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Attendance Override</span>
                                </a>

                            </div>

                        <?php } ?>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where3f; ?>" href="leaves_history.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Leave History</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link <?php echo $where3g; ?>" href="exemptions_history.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Exemption History</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Reports -->
            <?php if (($user_role == "1") || ($user_role == "3") || ($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where9; ?>">

                    <span class="menu-link <?php echo $where9; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-chart-pie-simple fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Reports</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where9e; ?>" href="attendance.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Attendance</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where9a; ?>" href="attendance1.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Daily Attendance</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where9c; ?>" href="attendance2.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Monthly Attendance</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where9b; ?>" href="attendance3.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reports</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where9d; ?>" href="attendance4.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Audit Logs</span>
                            </a>

                        </div>



                    </div>

                </div>
            <?php } ?>

            <!-- Admins -->
            <?php if ($user_role == "4") { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($thepagename == 'adminusers.php' || $thepagename == 'deviceadmins.php') {
                                                                                        echo $where4a;
                                                                                    } ?>">

                    <a href="adminusers.php" class="menu-link  <?php if ($thepagename == 'adminusers.php' || $thepagename == 'deviceadmins.php') {
                                                                    echo $where4a . $where4b;
                                                                } ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-user-tick fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title"><span class="menu-title">Administrators</span></span>
                    </a>

                    <!-- <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where4a; ?>" href="adminusers.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Admin Users</span>
                            </a>

                        </div>

                        <div class="menu-item">

                            <a class="menu-link <?php echo $where4b; ?>" href="deviceadmins.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Device Admins</span>
                            </a>

                        </div>


                    </div> -->

                </div>
            <?php } ?>

            <!-- Organization -->

            <?php if (($user_role == "1") || ($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where5; ?>">

                    <span class="menu-link <?php echo $where5; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-26 fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Organization</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where5a; ?>" href="approvallevel.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Approval Levels</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where5b; ?>" href="leavetype.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Leave Types</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where5c; ?>" href="holidays.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Holidays</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where5d; ?>" href="exemptiontype.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Exemption Type</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where5e; ?>" href="workshift.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Work Shift Type</span>
                            </a>
                        </div>
                        <!--
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where5f; ?>" href="salary.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Salary Scale</span>
                        </a>
                    </div>
                    -->

                    </div>

                </div>
            <?php } ?>

            <!-- Pay roll -->
            <?php if ($mastersalary == "1") { ?>
                <?php if (($user_role == "2") || ($user_role == "4")) { ?>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where12; ?>">

                        <span class="menu-link <?php echo $where12; ?>">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-bill fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            </span>
                            <span class="menu-title">Payroll Management</span><span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">

                            <!--
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where12a; ?>" href="salary.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Salary Dashboard</span>
                        </a>
                    </div>
                        -->
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12b; ?>" href="salary1.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Salary Scale</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12c; ?>" href="salary2.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Allowances</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12g; ?>" href="salary6.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Allowance Other Labels</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12d; ?>" href="salary3.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Deductions</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12h; ?>" href="salary7.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Deduction Other Labels</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12e; ?>" href="salary4.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Pay Slip</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12f; ?>" href="salary5.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Pay History</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where12i; ?>" href="salary8.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Payroll Summary sheet</span>
                                </a>
                            </div>


                        </div>

                    </div>
                <?php } ?>
            <?php } ?>


            <!-- Kpi -->
            <?php if ($masterkpi == "1") { ?>
                <?php //if(($user_role == "3") || ($user_role == "4")){ 
                ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where13; ?>">

                    <span class="menu-link <?php echo $where13; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-chart fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">KPI Management</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">

                        <!--
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where13a; ?>" href="kpi.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">KPI Dashboard</span>
                        </a>
                    </div>
                    -->
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13b; ?>" href="kpi1.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Create KPI</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13g; ?>" href="kpi6.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">User KPI Report</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13d; ?>" href="kpi3.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Department KPI Report</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13c; ?>" href="kpi2.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">User KPI History</span>
                            </a>
                        </div>
                        <!--
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13e; ?>" href="kpi4.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Work Shift Type</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where13f; ?>" href="kpi5.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Salary Scale</span>
                            </a>
                        </div>
                        -->
                    </div>

                </div>
                <?php //} 
                ?>
            <?php } ?>


            <!-- Recruitment -->
            <?php //if($masterkpi == "1"){ 
            ?>
            <?php //if(($user_role == "3") || ($user_role == "4")){ 
            ?>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where15; ?>">

                <span class="menu-link <?php echo $where15; ?>">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </span>
                    <span class="menu-title">Recruitment</span><span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link <?php echo $where15a; ?>" href="recruitment.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Recruitment Management</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where15b; ?>" href="jobmanagement.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Job Management</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where15c; ?>" href="templates.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Template Management</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link <?php echo $where15d; ?>" href="settings.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Recruitment settings</span>
                        </a>
                    </div>
                    <!--
                <div class="menu-item">
                    <a class="menu-link <?php echo $where13e; ?>" href="kpi4.php">
                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                        <span class="menu-title">Work Shift Type</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link <?php echo $where13f; ?>" href="kpi5.php">
                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                        <span class="menu-title">Salary Scale</span>
                    </a>
                </div>
                -->


                </div>

            </div>
            <?php //} 
            ?>
            <?php //} 
            ?>

            <!-- HRDA -->

            <?php //if($masterkpi == "1"){ 
            ?>
            <?php //if(($user_role == "3") || ($user_role == "4")){ 
            ?>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where16; ?>">

                <span class="menu-link <?php echo $where16; ?>">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-folder fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </span>
                    <span class="menu-title">File Manager</span><span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link <?php echo $where16a; ?>" href="assetmanagement.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Document Archive</span>
                        </a>
                    </div>
                    <!--
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where16b; ?>" href="jobmanagement.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Job Management</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where16c; ?>" href="templates.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Template Management</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where16d; ?>" href="settings.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Recruitment settings</span>
                            </a>
                        </div>
                        -->


                </div>

            </div>
            <?php //} 
            ?>
            <?php //} 
            ?>

            <!-- Biometrics -->
            <?php if (($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where8; ?>">

                    <span class="menu-link <?php echo $where8; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-faceid fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Biometrics Data</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <!-- <div class="menu-item">
                        <a class="menu-link <?php echo $where16a; ?>" href="assetmanagement.php">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Document Archive</span>
                        </a>
                    </div> -->

                    </div>

                </div>
            <?php } ?>

            <!-- Settings -->
            <?php if (($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where6; ?>">

                    <span class="menu-link <?php echo $where6; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-2 fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">Settings</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a id="kt_explore_toggle"
                                class="menu-link engage-explore-toggle engage-btn fs-6 px-4 rounded-top-0"
                                title="Options"
                                data-bs-custom-class="tooltip-inverse"
                                data-bs-toggle="tooltip"
                                data-bs-placement="left"
                                data-bs-dismiss="click"
                                data-bs-trigger="hover"
                                href="#">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span id="kt_explore_toggle_label" class="menu-title">Options</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <a class="menu-link <?php echo $where6a; ?>" href="devices.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Devices</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where6b; ?>" href="locations.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Locations</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where6c; ?>" href="departments.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Departments</span>
                            </a>
                        </div>

                        <?php if ($loggedplevel == '5') { ?>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where6d; ?>" href="company.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Company</span>
                                </a>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            <?php } ?>

            <!-- Sms Config -->
            <?php if (($user_role == "4")) { ?>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo $where7; ?>">

                    <span class="menu-link <?php echo $where7; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-sms fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        </span>
                        <span class="menu-title">SMS Configuration</span><span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where7a; ?>" href="sms1.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Send SMS</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link <?php echo $where7d; ?>" href="sms4.php">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Message Templates</span>
                            </a>
                        </div>

                        <?php if ($loggedplevel == '5') { ?>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where7b; ?>" href="sms2.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Add New Gateway</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where7c; ?>" href="sms3.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Manage Gateways</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?php echo $where7e; ?>" href="sms5.php">
                                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                    <span class="menu-title">Manage SMS</span>
                                </a>
                            </div>
                        <?php } ?>


                    </div>

                </div>
            <?php } ?>

            <div class="menu-item">

                <a class="menu-link" href="logout.php">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-exit-left fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </span>
                    <span class="menu-title">Logout</span>
                </a>

            </div>

        </div>
    </div>
</div>
<!--end::Navs-->