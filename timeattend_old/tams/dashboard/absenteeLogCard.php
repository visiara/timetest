<div class="row row-sm mg-t-20">
    <div class="col-lg-12">
        <div class="widget-2">
            <div class="card shadow overflow-hidden">
                <div class="card-header">
                    <h6 class="card-title">Absentee Log</h6>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <!--<a href="#" class="btn">This Week</a>
                    <a href="#" class="btn">This Month</a>-->
                    </div>
                </div><!-- card-header -->

                <div class="card-body pd-0 py-5">
                    <div id="rickshaw1222" class="wd-100p rounded-bottom table-responsive">
                        <table id="datatable1" class="table table-hover table-rounded table-striped border gy-7 gs-7">

                            <thead class="thead-colored thead-dark">
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th class="">ID</th>
                                    <th class="">User ID</th>
                                    <th class="">Full name</th>
                                    <th class="">Status</th>
                                    <th class="">Time In</th>
                                    <th class="">Time Out</th>
                                    <th class="">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = '0';
                                $cvdate = date("Y-m-d");
                                //$cvdate = "2022-07-08";
                                $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE dele = '0' AND status = 'Active' AND company='$companyMain'");
                                while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
                                    $eid = $huserb1d5["id"];
                                    $employeeid = $huserb1d5["employeeid"];
                                    $fname = $huserb1d5["fname"];
                                    $mname = $huserb1d5["mname"];
                                    $lname = $huserb1d5["lname"];

                                    $timeStatus2 = 'off';
                                    $attendancereport = 'InActive';

                                    $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$cvdate' AND employeeid = '$employeeid' AND company='$companyMain'");
                                    $huy = mysqli_num_rows($hu);
                                    while ($hug = mysqli_fetch_array($hu)) {
                                        $timeInseconds = $hug["timeInseconds"];
                                        $timeOutseconds = $hug["timeOutseconds"];
                                        $timeStatus2 = $hug["attendance"];
                                        $btimeInseconds = $hug["expectedTimin"];
                                        $btimeOutseconds = $hug["expectedTimeOut"];

                                        $attendance = $hug["attendance"];
                                        $attendancereport = $hug["attendancereport"];
                                    }

                                    $timeStatus = $timeStatus2 == 'off' ? 'Absent' : 'Present';

                                    if ($timeStatus2 == "on") {
                                        $ego = "<i class='icon ion-checkmark alert-icon tx-20 tx-success'></i>";
                                    } else {
                                        $ego = "<i class='icon ion-close alert-icon tx-24 tx-danger'></i>";
                                    }

                                    if ($huy > 0) {
                                        $timeInseconds2 = ($timeInseconds / 1000);
                                        $timeOutseconds2 = $timeOutseconds == '0' ? time() : ($timeOutseconds / 1000);

                                        $timeIn = $timeInseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeInseconds2);
                                        $timeOut = $timeOutseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeOutseconds2);
                                        $hourdiff = $timeOutseconds == '0' ? '0' :  round(($timeOutseconds2 - $timeInseconds2) / 3600, 1);

                                        //$timeStatus2 = ($timeInseconds2 > $btimeInseconds) ? "<i class='fa fa-ban tx-danger tx-20'></i>" : "<i class='far fa-check-circle tx-info tx-20'></i>";
                                        //$timeStatus2 = ($timeInseconds2 = "0") ? "" : $timeStatus2;

                                        if ($timeInseconds2 > $btimeInseconds) {
                                            $timeStatus2 = "<i class='fa fa-ban tx-danger tx-20'></i>";
                                        } elseif ($timeInseconds2 == 0) {
                                            $timeStatus2 = "";
                                        } else {
                                            $timeStatus2 = "<i class='far fa-check-circle tx-info tx-20'></i>";
                                        }
                                    } else {
                                        $timeInseconds2 = 0;
                                        $timeOutseconds2 = 0;

                                        $timeIn = 0;
                                        $timeOut = 0;
                                        $hourdiff = 0;

                                        $timeStatus2 = "";
                                    }

                                    if ($attendancereport == 'Active' && $attendance == 'off') {

                                        $x = $x + '1';
                                ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $employeeid; ?></td>
                                            <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
                                            <td><?php echo $ego . " " . $timeStatus; ?></td>
                                            <td><?php echo $timeIn . " " . $timeStatus2; ?></td>
                                            <td><?php echo $timeOut; ?></td>
                                            <td><?php echo $hourdiff . ' Hours'; ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- widget-2 -->
    </div><!-- col-6 -->


</div><!-- row -->