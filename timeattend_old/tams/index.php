<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>HECKER PEOPLE</title>
    <?php include('../auth/auth_header.php'); ?>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bg-white">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root rounded" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">

            <!--begin::Aside-->
            <div class="rounded d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center bg-primary order-1 order-lg-1" style="">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">

                    <div class="text-left">

                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-start mb-7">Administrator Access</h1>

                        <!--end::Logo-->
                        <div class="d-none d-lg-block text-white fs-base text-start"> HECKER PEOPLE (Time and Attendance Management) is a user-friendly and intuitive system that provides smoothly integrated essential time and attendance functionality, employee management, leave management, scheduling, time tracking, time management solution and more.
                        </div>
                    </div>

                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="./assets/media/images/auth_bg.png" alt="" />
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-2">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" action="dashboard.php" method="POST">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <div class="mb-5">
                                    <img src="./assets/media/images/logo.png">
                                </div>

                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Welcome back Admin! Please sign in</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-7">Sign into your administrator account using valid credentials..</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Login options-->


                            <!--end::Login options-->
                            <!--begin::Separator-->

                            <!--end::Separator-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Enter your username" name="uid" autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3 position-relative">
                                <!--begin::Password-->
                                <input type="password" placeholder="Enter your password" name="pwd" id="password" autocomplete="off" class="form-control bg-transparent pe-5" />
                                <!-- Icon -->
                                <i class="fa-solid fa-eye toggle-password"
                                    style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></i>
                                <!--end::Password-->
                            </div>

                            <?php
                            if (isset($_GET['2']) && $_GET['2'] == "2") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="icon ion-close-circle tx-20 mr-2"></i>
                                        <span><strong>You have entered an incorrect user name or password</strong></span>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>

                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-13 mt-20 ">
                                <!-- <div></div> -->
                                <!--begin::Link-->
                                <a href="forgot.php" class="link-primary text-start">Forgot Password ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->

                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
                <!--begin::Footer-->

            </div>
            <!--end::Body-->

        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <?php include('../auth/auth_footer.php'); ?>
</body>
<!--end::Body-->

</html>