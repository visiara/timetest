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
    <div class="col-lg-10 col-md-10 col-10 dept-col ">
      <section class="bg-white rounded-top-4 dept-title border">
        <h5 class="my-dept-title p-4" style="color:#000000;"><strong>Dashboard</strong></h5> 
      </section>
      <section class="banner-container">
              <div class="banner-section">
                You are almost all set, complete your profile now! &nbsp; • &nbsp; <strong>87% Complete</strong>
              </div>
      </section>
      <section class="bg-white center-dept border">   
          <div class="row p-4">
           <!-- KPI Section -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <div>
                    <h6 class="section-title" style="color:#000000;">KPI Management</h6>
                    <small>You have 4 KPIs to deliver this month.</small>
                  </div>
                  <a href="#" class="text-decoration-none text-muted">Show All (12) <img src="mike.png"/></a>
                </div>
                <div class="row g-3 mb-4">
                  <div class="col-md-3">
                    <div class="card card-kpi p-3 shadow">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <img src="images/Groupa.png" alt="icon" />
                        <button class="btn btn-sm btn-outline-secondary" style="border:0px;">View Details<img src="mike.png"/></button>
                      </div>
                      <div class="kpi-title">User Research & Discovery For HeckerPeople</div>
                      <div class="kpi-details"><img class="img-fluid" src="mike.png"/>Complete HeckerPeople HI-FI d...<br/>+ 3 others</div>
                      <div class="mt-2">Achievement – <strong>0%</strong></div>
                    </div>
                  </div>
                  <!-- Repeat similar KPI cards -->
                  <div class="col-md-3">
                    <div class="card card-kpi p-3 shadow">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <img src="images/Groupa.png" alt="icon" />
                        <button class="btn btn-sm btn-outline-secondary" style="border:0px;">View Details <img src="mike.png"/></button>
                      </div>
                      <div class="kpi-title">Wireframing & Prototyping - Heckerpeople System</div>
                      <div class="kpi-details"><img class="img-fluid" src="mike.png"/>Complete HeckerPeople HI-FI d...<br/>+ 3 others</div>
                      <div class="mt-2">Achievement – <strong>0%</strong></div>
                    </div>
                  </div>
                  <!-- Add more cards similarly -->
                  <div class="col-md-3">
                    <div class="card card-kpi p-3 shadow">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <img src="images/Groupa.png" alt="icon" />
                        <button class="btn btn-sm btn-outline-secondary" style="border:0px;">View Details <img src="mike.png"/></button>
                      </div>
                      <div class="kpi-title">Wireframing & Prototyping - Heckerpeople System</div>
                      <div class="kpi-details"><img class="img-fluid" src="mike.png"/>Complete HeckerPeople HI-FI d...<br/>+ 3 others</div>
                      <div class="mt-2">Achievement – <strong>0%</strong></div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card card-kpi p-3 shadow">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <img src="images/Groupa.png" alt="icon" />
                        <button class="btn btn-sm btn-outline-secondary" style="border:0px;">View Details <img src="mike.png"/></button>
                      </div>
                      <div class="kpi-title">Wireframing & Prototyping - Heckerpeople System</div>
                      <div class="kpi-details"><img class="img-fluid" src="mike.png"/>Complete HeckerPeople HI-FI d...<br/>+ 3 others</div>
                      <div class="mt-2">Achievement – <strong>0%</strong></div>
                    </div>
                  </div>
                </div>

                <!-- Attendance & Application Status -->
                <div class="row g-4 mb-4">
                  <div class="col-md-4" style="border-right-style: solid; border-color:#F1F0F0; border-top-style: solid;">
                    <div>
                      <h6 class="section-title py-4">Attendance</h6>
                      <small>You have clocked in 3/5 working days this week</small>
                      <div class="mt-3">
                        <div class="d-flex ">
                          <div>Tue, 22 Apr</div>
                          <div><span class="bg-success text-white ms-4 px-2 py-1 rounded-pill">Clock out</span> 5:23pm</div>
                        </div>
                        <hr class="my-2" />
                        <div class="d-flex  text-info">
                          <div><strong>Wed, 23 Apr</strong></div>
                          <div style=""><span class=" text-white px-2 py-1 rounded-pill ms-4" style="background-color:#E7F7EA;">Clock in</span> 9:23am</div>
                        </div>
                        <hr class="my-2" />
                        <div>Thur, 24 Apr  <em class="ms-4">Every morning is a new opportunity to rise, grind, and shine ✨</em></div>
                         <hr class="my-2" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8" style="border-color:#F1F0F0; border-top-style: solid;">
                    <div>
                      <div style="display:flex; justify-content:space-between;">
                      <h6 class="section-title py-4">Application status</h6>
                      <a href="#" class="text-decoration-none text-muted py-4">Show All (12) <img src="mike.png"/></a>
                      </div>
                      <ul class="list-unstyled mt-3">
                        <li class="mb-2" style="border-left-style: dotted; border-color:#E2B5CC;">
                          <div class="row">
                            <div class="col-md-10">
                              <strong>Leave</strong> • Submitted 12 July <br/>
                              <small>Duration – July 10, 2025 to August 05, 2025 (20 days)</small><br/>
                            </div>
                            <div class="col-md-2">
                              <span class="" style="color:#C49E5A;">Pending</span></br>
                              <small class="text-muted">22 Oct, 2020</small>
                           </div>
                          </div>
                        </li>
                        <hr class="my-2" />
                        <li class="mb-2" style="border-left-style: dotted; border-color:#CBC4FD;">
                          <div class="row">
                          <div class="col-md-10">
                            <strong>Exemption</strong> • Submitted 12 July<br/>
                            <small>Duration – July 10, 2025 to August 05, 2025 (20 days)</small><br/>
                          </div>
                          <div class="col-md-2">
                          <span class="" style="color:#5BC973;">Approved</span><br/> <small class="text-muted">22 Oct, 2020</small>
                        </div>
                        </div>
                        </li>
                        <hr class="my-2" />
                        <li style="border-left-style: dotted; border-color:#E2B5CC;;">
                          <div class="row">
                          <div class="col-md-10">
                          <strong>Leave</strong> • Submitted 12 July<br/>
                          <small>Duration – July 10, 2025 to August 05, 2025 (20 days)</small><br/>
                          </div>
                          <div class="col-md-2">
                          <span class="" style="color:#CD6174;">Declined</span> <br/><small class="text-muted">22 Oct, 2020</small>
                          </div>
                          </div>
                        </li>
                        <hr class="my-2" />
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Salary History -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="section-title" style="color:#000000;">Salary history</h6>
                  <a href="#" class="text-decoration-none text-muted">Show All (12) <img src="mike.png"/></a>
                </div>
                <div class="row g-3">
                  <div class="col-md-3">
                    <div class="card card-salary p-2 shadow">
                      <small>LV-2025-0710-0012</small>
                      <div><strong>April 28, 2025(March 28 2025 to April 28, 2025)</strong></div>
                      <p>Total paid (Net income) – ₦300,015.64</p>
                      <div class="row">
                        <div class="col-md-4">
                          <span class="badge badge-paid p-2 rounded-4 " style="background-color:#E7F7EA; color:#3EC05A;"><img src="mike.png" class="px-2">Paid</span><br/>
                          <div class="text-muted"><small>22 Oct, 2020</small></div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                          <a href="#" class="btn btn-primary btn-pay btn-sm" >Download Payslip </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card card-salary p-2 shadow">
                      <small>LV-2025-0710-0012</small>
                      <div><strong>April 28, 2025(March 28 2025 to April 28, 2025)</strong></div>
                      <p>Total paid (Net income) – ₦300,015.64</p>
                      <div class="row">
                        <div class="col-md-4">
                          <span class="badge badge-paid p-2 rounded-4 " style="background-color:#E7F7EA; color:#3EC05A;"><img src="mike.png" class="px-2">Paid</span><br/>
                          <div class="text-muted"><small>22 Oct, 2020</small></div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                          <a href="#" class="btn btn-primary btn-pay btn-sm" >Download Payslip </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card card-salary p-2 shadow">
                      <small>LV-2025-0710-0012</small>
                      <div><strong>April 28, 2025(March 28 2025 to April 28, 2025)</strong></div>
                      <p>Total paid (Net income) – ₦300,015.64</p>
                      <div class="row">
                        <div class="col-md-4">
                          <span class="badge badge-paid p-2 rounded-4 " style="background-color:#E7F7EA; color:#3EC05A;"><img src="mike.png" class="px-2">Paid</span><br/>
                          <div class="text-muted"><small>22 Oct, 2020</small></div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                          <a href="#" class="btn btn-primary btn-pay btn-sm" >Download Payslip </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card card-salary p-2 shadow">
                      <small>LV-2025-0710-0012</small>
                      <div><strong>April 28, 2025(March 28 2025 to April 28, 2025)</strong></div>
                      <p>Total paid (Net income) – ₦300,015.64</p>
                      <div class="row">
                        <div class="col-md-4">
                          <span class="badge badge-paid p-2 rounded-4 " style="background-color:#E7F7EA; color:#3EC05A;"><img src="mike.png" class="px-2">Paid</span><br/>
                          <div class="text-muted"><small>22 Oct, 2020</small></div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                          <a href="#" class="btn btn-primary btn-pay btn-sm" >Download Payslip </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Repeat more salary cards -->
                </div>           
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