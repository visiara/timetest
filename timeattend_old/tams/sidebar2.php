<div class="app-wrapper flex-column flex-row-fluid " id="kt_app_wrapper">

    <div style="border: 1px solid #DDDDDD" id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="300px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


        <!--begin::Header-->
        <div class="app-sidebar-header flex-column mx-10 pt-8" id="kt_app_sidebar_header">
            <!--begin::Brand-->
            <div class="d-flex flex-stack d-none d-lg-flex mb-13">
                <!--begin::Logo-->
                <a href="<?= $adminDashboardUrl ?>" class="app-sidebar-logo">
                    <img alt="Logo" src="<?php echo $localAdminUrl; ?>assets/media/images/logo.png" class="h-25px app-sidebar-logo-default" />
                </a>
                <!--end::Logo-->

                <!--begin::Chat-->
                <div class="d-flex align-items-center ">
                    <!--begin::Menu wrapper-->

                    <!-- <div class="btn btn-icon w-15px h-15px w-lg-20px h-lg-20px btn-color-success position-relative" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                        <i class="ki-duotone ki-notification-status fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle ms-7 mb-3 animation-blink">
                        </span>

                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('/open-html-pro/assets/media/misc/menu-header-bg.jpg')">
                                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                    Notifications <span class="fs-8 opacity-75 ps-3"> <?php if ($noticount > 0) { ?>
                                            <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                                        <?php } ?></span>
                                </h3>

                                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Alerts</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2" aria-selected="true" role="tab">Updates</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3" aria-selected="false" tabindex="-1" role="tab">Logs</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                                    <div class="scroll-y mh-325px my-5 px-8">
                                        <?php
                                        //$huyac=mysqli_query($conn, "SELECT * FROM notifications WHERE user = '$uid' AND company='$companyMain' AND hasread='0'");
                                        if ($user_role == "3") {
                                            $huyac = mysqli_query($conn, "SELECT * FROM notifications WHERE department = '$loggeddepartment' AND company='$companyMain' AND hasread='0' AND admin='1'");
                                        } else {
                                            $huyac = mysqli_query($conn, "SELECT * FROM notifications WHERE company='$companyMain' AND hasread='0' AND admin='1'");
                                        }
                                        while ($hugyac = mysqli_fetch_array($huyac)) {
                                            $dtype1 = $hugyac["dtype1"];
                                            $dtype2 = $hugyac["dtype2"];
                                            $dtype3 = $hugyac["dtype3"];
                                            $fullname = $hugyac["fullname"];
                                            $story = $hugyac["story"];
                                            $theddate = $hugyac["ddate"];
                                            $department = $hugyac["department"];
                                            $hasread = $hugyac["hasread"];
                                            $noteprofilepic = $hugyac["noteprofilepic"];

                                            if ($hasread == '1') {
                                                $read = "";
                                            } else {
                                                $read = "fw-bold";
                                            }

                                            if ($dtype1 == '1') {
                                                $thelink = "leaves.php";
                                            } else {
                                                $thelink = "exemptions.php";
                                            }
                                        ?>
                                            <div class="d-flex flex-stack py-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-35px me-4">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="ki-duotone ki-abstract-28 fs-2 text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="mb-0 me-2">
                                                        <a href="<?php echo $thelink; ?>" class="fs-6 text-gray-800 text-hover-primary  <?php echo $read; ?>"><?php echo $fullname; ?> </a>
                                                        <div class="text-gray-400 fs-7"><?php echo $story; ?></div>
                                                    </div>
                                                </div>
                                                <span class="badge badge-light fs-8"><?php echo date("F j, Y, g:ia", $theddate); ?>< /span>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div class="py-3 text-center border-top">
                                        <a href="allnotifications.php" class="btn btn-color-gray-600 btn-active-color-primary">Show All Notifications
                                            <i class="ki-duotone ki-arrow-right fs-5">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <!--begin::User-->
            <div class="d-flex btn btn-outline bg-white p-5 btn-custom align-items-center w-200 mb-2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <!--begin::User-->
                <div class="cursor-pointer symbol symbol-35px symbol-lg-40px me-3 ms-n2">
                    <img class="" src="../images/profilepics/<?php echo $loggedprofilepic; ?>" alt="user">
                </div>
                <!--end::User-->



                <!--begin:Info-->
                <div class="d-flex flex-column align-items-start flex-grow-1">
                    <h3 href="#" class="btn-title fs-6 fw-bold"><?php echo $loggedinname; ?></h3>

                    <p href="#" class="btn-desc fs-7 fw-normal fw-black d-block"><?php echo 'Role here'; ?></p>
                </div>
                <!--end:Info-->

                <i class="ki-duotone ki-down fs-2 me-n4"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
            </div>


            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true" style="">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="../images/profilepics/<?php echo $loggedprofilepic; ?>">
                        </div>
                        <!--end::Avatar-->

                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">
                                <?php echo $loggedinname; ?>
                            </div>

                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                <?php echo $loggedemail; ?> </a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <div class="menu-item px-5">
                    <a data-bs-toggle="modal" data-bs-target="#editModal" class="menu-link px-5">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-profile-user fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        Edit Profile</a>
                </div>


                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a data-bs-toggle="modal" data-bs-target="#pictureModal" class="menu-link px-5">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-picture fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        Change Profile Picture</a>
                </div>
                <!--end::Menu item-->

                <div class="separator my-2"></div>
                <div class="menu-item px-5">
                    <a href="logout.php" class="menu-link px-5">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-exit-left fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        Sign Out</a>
                </div>

            </div>
            <!--end::User account menu-->
            <!--end::User-->
        </div>
        <!--end::Header-->
        <?php include_once('./sideNavigation.php'); ?>

    </div>
    <div class="app-main flex-column flex-row-fluid container" style="margin-top: 35px; overflow-x: hidden;" id="kt_app_main">