<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="TIMATEND Project.">
    <meta name="author" content="Visiara Ltd">

    <!-- Meta -->
    <meta name="description" content="TIMATEND Project - TAMS">
    <meta name="author" content="ThemePixels">

    <title>TIMATEND</title>

    <!-- vendor css -->
    <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
    <link rel="stylesheet" href="css/attendance.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>

</style>
  </head>

  <body>
    <!-- ########## START: HEAD PANEL ########## -->
<?php
include ("header/head_panel-copy.php");
?>
    <!-- ########## END: HEAD PANEL ########## -->
    <!-- ########## START: LEFT PANEL ########## -->
<?php
include ("sidebar/left_panel-copy.php");
?>
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="col-lg-10 col-md-10 dept-col ">
      <section class="bg-white rounded-top-4 dept-title border">
        <div class="" style="display:flex; justify-content:space-between">
          <div class="">
          <h5 class="my-dept-title p-4" style="color:#000000;"><strong>Attendance</strong></h5>
          </div>
          <div class=""  style="display:flex; align-items:center">
            <button type="button" class="btn btn-primary me-4" style="border-radius:50px;" data-bs-toggle="modal" data-bs-target="#leave">
              Apply For Leave/Exemption
            </button>
            <!-- Modal -->
            <div class="modal fade" id="leave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apply for leave/exemption</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="section-title">Choose leave type</div>

                      <div class="leave-option d-flex align-items-start">
                        <input class="form-check-input mt-1 me-3" type="radio" name="leaveType" id="leave1">
                        <label class="form-check-label w-100" for="leave1">
                          <h6 class="leave-title">Temporary Leave (4 days)</h6>
                          <div class="leave-desc">Short-term absence for personal matters (e.g., family events, short trips).</div>
                        </label>
                      </div>

                      <div class="leave-option d-flex align-items-start">
                        <input class="form-check-input mt-1 me-3" type="radio" name="leaveType" id="leave2" checked>
                        <label class="form-check-label w-100" for="leave2">
                          <div class="d-flex justify-content-between align-items-center">
                            <h6 class="leave-title mb-1">Annual Leave</h6>
                            <span class="leave-counter">0/20 days used</span>
                          </div>
                          <div class="leave-desc">Paid time off for vacations/personal rest.</div>
                        </label>
                      </div>

                      <div class="leave-option d-flex align-items-start">
                        <input class="form-check-input mt-1 me-3" type="radio" name="leaveType" id="leave3">
                        <label class="form-check-label w-100" for="leave3">
                          <h6 class="leave-title">Sick Leave</h6>
                          <div class="leave-desc">Paid leave for illness/injury (with doctor’s note if &gt;3 days)</div>
                        </label>
                      </div>

                      <div class="leave-option d-flex align-items-start">
                        <input class="form-check-input mt-1 me-3" type="radio" name="leaveType" id="leave4">
                        <label class="form-check-label w-100" for="leave4">
                          <h6 class="leave-title">Maternity/Paternity (Parental) Leave</h6>
                          <div class="leave-desc">Partially paid leave around the birth or adoption of a child.</div>
                        </label>
                      </div>

                      <div class="leave-option d-flex align-items-start">
                        <input class="form-check-input mt-1 me-3" type="radio" name="leaveType" id="leave5">
                        <label class="form-check-label w-100" for="leave5">
                          <h6 class="leave-title">Bereavement (Compassionate) Leave</h6>
                          <div class="leave-desc">A few days of paid leave following the death of an immediate family member.</div>
                        </label>
                      </div>
                    </div>
                    <div  style="display:flex; justify-content:space-between;">
                    <button type="button" class="btn btn-white" style="width:50%" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="width:50%"  class="btn btn-primary">Continue</button>
                    </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </section>
      <div class="menu-bar">
        <span class="month"><i class="bi bi-chevron-left"></i> April, 2025</span>
        <span class="active-filter">All</span>
        <span>Present</span>
        <span>Absent</span>
        <span>Leave</span>
        <span>Holiday - PTO</span>
        <span>Exemption</span>
        <span class="ms-auto">
          <!-- <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
            Work Week
          </span> -->
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Work Week
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Account Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                      <label class="form-check-label" for="radioDefault1">
                        Work Week
                        <small>Mon-Sun</small>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                      <label class="form-check-label" for="radioDefault2">
                        Full Week
                        <small>Mon-Sun</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </span>
      </div>
      <section class="bg-white center-dept border">   
          <div class="row p-4">
                    <!-- Weekday Labels -->
                    <div class="row fw-bold text-center">
                        <div class="col border py-2">Monday</div>
                        <div class="col border py-2">Tuesday</div>
                        <div class="col border py-2">Wednesday</div>
                        <div class="col border py-2">Thursday</div>
                        <div class="col border py-2">Friday</div>
                    </div>

                    <!-- Calendar Weeks -->
                    <div class="row text-center">
                        <div class="col calendar-day bg-white"></div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">1</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">2</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">3</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">8</div>
                          </div>
                          <div class="exemption" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #dc3545">
                              <small>🧑‍⚕️ Exemption<br>Approved exemption for medical reasons.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">9</div>
                          </div>
                          <div class="exemption" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #dc3545">
                              <small>🧑‍⚕️ Exemption<br>Approved exemption for medical reasons.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="clock-in" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #28a745;">
                              <small  style=" font-size:15px;"><strong>Clock in:</strong> 9:23am</small><br>
                              <small style=" font-size:15px;"><strong>Clock out:</strong> 5:31pm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="leave" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color:  #6f42c1">
                              <small>🧳 Leave - PTO<br>8 days off</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="leave" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color:  #6f42c1">
                              <small>🧳 Leave - PTO<br>8 days off</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="holiday" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color:#17a2b8">
                            <small>🌴 Public holiday<br><strong>Good Friday</strong> – Nigeria</small>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="holiday" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color:#17a2b8">
                            <small>🌴 Public holiday<br><strong>Good Friday</strong> – Nigeria</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="absent" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #ffc107">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="absent" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="border-left-style:dotted; border-color: #ffc107">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day">
                          <div style="display:flex; justify-content:end; font-size:30px;">
                            <div class="day-number">4</div>
                          </div>
                          <div class="" style="height:80px; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                            <div class="py-1 px-4 text-center" style="">
                            <small>❌ Absent<br>You did not clock in.</small>
                            </div>
                          </div>
                        </div>
                        <div class="col calendar-day bg-white"></div>
                        <div class="col calendar-day bg-white"></div>
                    </div>
          </div>
      </section>
    </div>
</section>
    <!-- ########## START: Footer ########## -->
<?php
include ("footer/footer.php");
?>
    <!-- ########## END: Footer ########## -->