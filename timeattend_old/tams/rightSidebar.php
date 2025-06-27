<div
    id="kt_explore"
    class="explore bg-body"
    data-kt-drawer="true"
    data-kt-drawer-name="explore"
    data-kt-drawer-activate="true"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'lg': '440px'}"
    data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_explore_toggle"
    data-kt-drawer-close="#kt_explore_close">
    <?php

    $breakoption2 = $breakoption == "0" ? "1" : "0";
    $breakoption3 = $breakoption == "0" ? "" : "checked";

    $breakoptionk = $kpion == "0" ? "" : "checked";
    $breakoptionk2 = $kpion == "0" ? "none" : "block";

    $breakoptionS2 = $salaryon == "0" ? "none" : "block";
    $breakoptionS = $salaryon == "0" ? "" : "checked";
    ?>

    <!--begin::Card-->
    <div class="card shadow-none rounded-0 w-100">
        <!--begin::Header-->
        <div class="card-header" id="kt_explore_header">
            <h5 class="card-title fw-semibold text-gray-600">
                Quick Settings</h5>

            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon explore-btn-dismiss me-n5" id="kt_explore_close">
                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i> </button>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body" id="kt_explore_body">
            <!--begin::Content-->
            <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header, #kt_explore_footer" data-kt-scroll-offset="5px" style="height: 1517px;">

                <!--begin::License-->
                <div class="rounded border border-dashed border-gray-300 py-6 px-8 mb-5">

                    <!--begin::Description-->
                    <div class="sidebar-settings-item">
                        <h6 class="tx-13 tx-normal">Break Option</h6>
                        <p class="op-5 tx-13">Allow devices to show Break-In & Break-Out options.</p>

                        <div id="switchbutton15" class="form-check form-switch">
                            <input type="hidden" id="switch_break" name="switch_break" value="<?php echo $breakoption2; ?>">
                            <input class="form-check-input" type="checkbox" id="fakeSwitch_break" <?php echo $breakoption3; ?> onchange="myFuncBreak()">
                            <span id="switchStatus_break" class="ms-2"><?php echo $breakoption3 === 'checked' ? 'ON' : 'OFF'; ?></span>
                        </div>

                        <!-- br-switchbutton -->
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <h6 class="tx-13 tx-normal">Incomplete Clock-Out</h6>
                            <p class="op-5 tx-13">Number in HOURS to deduct from incomplete clock-out.</p>
                            <div class="br-switchbutton333">
                                <input type="number" class="form-control w-100" name="icomp" id="icomp" value="<?php echo $deducttime; ?>" onchange="uppycomp()" onblur="uppycomp()">
                                <span></span>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <h6 class="tx-13 tx-normal">Salary ( % of Net Salary )</h6>

                            <div id="switchbutton333" class="">
                                <input type="number" class="form-control w-100" name="atcomp" id="atcomp" value="<?php echo $atcomp; ?>" onchange="atcomp()" onblur="atcomp()">
                            </div>

                        </div>
                    </div>

                    <?php if ($masterkpi == "1") { ?>
                        <div class="">
                            <!--<p class="op-5 tx-13">Enable KPI Module</p>-->

                            <h6 class="tx-13 tx-normal mt-3 mb-3">KPI Module ( % of Net Salary )</h6>

                            <div class="col-md-12">

                                <div id="switchbuttonK" class="form-check form-switch">
                                    <input type="hidden" id="switch_kpi" name="switch_kpi" value="<?php echo $kpion; ?>">
                                    <input class="form-check-input" type="checkbox" id="fakeSwitch_kpi" <?php echo $breakoptionk; ?> onchange="myFuncBreakKpi()">
                                    <span id="switchStatus_kpi" class="ms-2"><?php echo $kpion == "1" ? "ON" : "OFF"; ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-switch mt-2" id="switchbutton3334" style="display:<?php echo $breakoptionk2; ?>">
                                        <input type="number" class="form-control w-100" name="kpi" id="kpi" value="<?php echo $kpidata; ?>" onchange="myFuncBreakKpi2()" onblur="myFuncBreakKpi2()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($mastersalary == "1") { ?>
                        <div class="sidebar-settings-item">
                            <h6 class="tx-13 tx-normal">Attendance Module ( % of Net Salary )</h6>

                            <div class="col-md-12">

                                <div id="switchbuttonS" class="form-check form-switch">
                                    <input type="hidden" id="switch_salary" name="switch_salary" value="<?php echo $salaryon; ?>">
                                    <input class="form-check-input" type="checkbox" id="fakeSwitch_salary" <?php echo $breakoptionS; ?> onchange="myFuncBreakSala()">
                                    <span id="switchStatus_salary" class="ms-2"><?php echo $salaryon == "1" ? "ON" : "OFF"; ?></span>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-switch mt-2" id="switchbutton3335" style="display:<?php echo $breakoptionS2; ?>">
                                        <input type="number" class="form-control w-100" name="sala" id="sala" value="<?php echo $salarydata; ?>" onchange="myFuncBreakSala2()" onblur="myFuncBreakSala2()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // do something here ...
                                //document.getElementById(kpi).setAttribute("min", "40");
                            }, false);

                            document.addEventListener("DOMContentLoaded", function(event) {

                                var a = $("#kpi").val;
                                var b = $("#sala").val;


                                //do work
                                $("#kpi").attr({
                                    "max": 100 - b, // substitute your own
                                    "min": 0 // values (or variables) here
                                });

                                $("#sala").attr({
                                    "max": 100 - a, // substitute your own
                                    "min": 0 // values (or variables) here
                                });
                            });
                        </script>
                    <?php } ?>
                    <script>
                        function myFuncBreak() {
                            const checkbox = document.getElementById("fakeSwitch_break");
                            const hiddenInput = document.getElementById("switch_break");
                            const statusText = document.getElementById("switchStatus_break");

                            if (checkbox.checked) {
                                hiddenInput.value = "1";
                                statusText.textContent = "ON";
                                breakDo(1);
                            } else {
                                hiddenInput.value = "0";
                                statusText.textContent = "OFF";
                                breakDo(0);
                            }
                        }

                        function breakDo(val) {
                            const company = "<?php echo $companyMain; ?>";
                            const xhr = new XMLHttpRequest();
                            xhr.open("GET", `dosettings.php?q=${val}&com=${company}&type=1`, true);
                            xhr.send();
                        }

                        function uppycomp() {
                            var str2 = "<?php echo $companyMain; ?>";
                            var str = document.getElementById("icomp").value;
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {

                                }
                            };
                            xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=2", true);
                            xmlhttp.send();
                        }

                        function atcomp() {
                            var str2 = "<?php echo $companyMain; ?>";
                            var str = document.getElementById("atcomp").value;

                            var kpi = document.getElementById("kpi").value;
                            var sala = document.getElementById("sala").value;
                            var total = (+kpi + +sala + +str);
                            var tot2 = (100 - (+kpi + +sala));

                            if (total > 100) {
                                alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
                                document.getElementById("atcomp").value = tot2;
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                    }
                                };
                                xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=7", true);
                                xmlhttp.send();
                            }

                        }

                        function uppycomp2(a, b, c) {
                            var str2 = "<?php echo $companyMain; ?>";
                            var str = document.getElementById(b).value;
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {

                                }
                            };
                            xmlhttp.open("GET", "dosettings.php?q=" + a + "&com=" + str2 + "&type=" + c + "&value=" + str, true);
                            xmlhttp.send();
                        }



                        function myFuncBreakKpi() {
                            const checkbox = document.getElementById("fakeSwitch_kpi");
                            const hiddenInput = document.getElementById("switch_kpi");
                            const statusText = document.getElementById("switchStatus_kpi");
                            const inputWrapper = document.getElementById("switchbutton3334");

                            if (checkbox.checked) {
                                hiddenInput.value = "1";
                                statusText.textContent = "ON";
                                inputWrapper.style.display = "block";
                                uppycomp2(1, 'kpi', 3);
                            } else {
                                hiddenInput.value = "0";
                                statusText.textContent = "OFF";
                                inputWrapper.style.display = "none";
                                uppycomp2(0, 'kpi', 3);
                            }
                        }



                        function myFuncBreakSala() {
                            const checkbox = document.getElementById("fakeSwitch_salary");
                            const hiddenInput = document.getElementById("switch_salary");
                            const statusText = document.getElementById("switchStatus_salary");
                            const inputWrapper = document.getElementById("switchbutton3335");

                            if (checkbox.checked) {
                                hiddenInput.value = "1";
                                statusText.textContent = "ON";
                                inputWrapper.style.display = "block";
                                uppycomp2(1, 'sala', 4);
                            } else {
                                hiddenInput.value = "0";
                                statusText.textContent = "OFF";
                                inputWrapper.style.display = "none";
                                uppycomp2(0, 'sala', 4);
                            }
                        }

                        function myFuncBreakKpi2() {
                            var str2 = "<?php echo $companyMain; ?>";
                            var str = document.getElementById("kpi").value;

                            var atcomp = document.getElementById("atcomp").value;
                            var kpi = document.getElementById("kpi").value;
                            var sala = document.getElementById("sala").value;
                            var total = (+kpi + +sala + +atcomp);
                            var tot2 = (100 - (+sala + +atcomp));

                            if (total > 100) {
                                alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
                                document.getElementById("kpi").value = tot2;
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                    }
                                };
                                xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=5", true);
                                xmlhttp.send();
                            }
                        }

                        function myFuncBreakSala2() {
                            var str2 = "<?php echo $companyMain; ?>";
                            var str = document.getElementById("sala").value;

                            var atcomp = document.getElementById("atcomp").value;
                            var kpi = document.getElementById("kpi").value;
                            var sala = document.getElementById("sala").value;
                            var total = (+kpi + +sala + +atcomp);
                            var tot2 = (100 - (+kpi + +atcomp));

                            if (total > 100) {
                                alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
                                document.getElementById("sala").value = tot2;
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                    }
                                };
                                xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=6", true);
                                xmlhttp.send();
                            }
                        }
                    </script>



                    <!--begin::Payment info-->
                    <div class="d-flex flex-column flex-center mb-3">


                        <!--begin::Payment methods-->
                        <div class="mb-2 mt-5">

                            <div class="pd-y-10 pd-x-25">
                                <h6 class="tx-13 tx-normal tx-white mg-b-20">More Settings</h6>
                                <a href="devices.php" class="btn btn-block bg-gray-300 mb-2 w-100 tx-uppercase tx-11 tx-spacing-2">Device Settings</a>
                                <a href="locations.php" class="btn btn-block bg-gray-300 mb-2 w-100 tx-uppercase tx-11 tx-spacing-2">Location Settings</a>
                                <a href="departments.php" class="btn btn-block bg-gray-300 mb-2 w-100 tx-uppercase tx-11 tx-spacing-2">Department Settings</a>
                            </div>
                        </div>
                        <!--end::Payment methods-->

                    </div>
                    <!--end::Payment info-->
                </div>
                <!--end::Licenses-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->

    </div>
    <!--end::Card-->
</div>
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">

    <div class="container-xxl" id="kt_content_container">
        <div class="card card-flush">