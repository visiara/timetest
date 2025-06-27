<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/header.php");
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/stats.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="HECKER PEOPLE Project.">
    <meta name="author" content="Visiara Ltd">

    <!-- Meta -->
    <meta name="description" content="HECKER PEOPLE Project - TAMS">
    <meta name="author" content="ThemePixels">

    <title>HECKER PEOPLE</title>

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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/atten.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>

</style>
  </head>

  <body>
    <!-- ########## START: HEAD PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/head_panel-copy.php");
?>
    <!-- ########## END: HEAD PANEL ########## -->
    <!-- ########## START: LEFT PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/left_panel-copy.php");
?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/biodata/right_panel.php");
?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="col-lg-10 col-md-10 col-10 dept-col ">
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
  <script>
function showOnly(idToShow) {
  $('.content-section').hide(); // Hide all content sections
  $('#' + idToShow).show();     // Show the selected section
}

function activateButton(buttonId) {
  $('.nav-button').removeClass('active-btn');  // Remove active from all buttons
  $('#' + buttonId).addClass('active-btn');    // Add active to clicked button
}

$('#loadpers').click(function () {
  $('#pers-details').load('pro_form.php', function () {
    showOnly('pers-details');
    activateButton('loadpers');
  });
});

$('#loadorga').click(function () {
  $('#orga-details').load('organisation-details.php', function () {
    showOnly('orga-details');
    activateButton('loadorga');
  });
});

$('#loadsalary').click(function () {
  $('#salary-details').load('salary-details.php', function () {
    showOnly('salary-details');
    activateButton('loadsalary');
  });
});

$('#loadking').click(function () {
  $('#next-of-king').load('next_of_king.php', function () {
    showOnly('next-of-king');
    activateButton('loadking');
  });
});

$('#loademe').click(function () {
  $('#emergency').load('emergency.php', function () {
    showOnly('emergency');
    activateButton('loademe');
  });
});

$('#loaddependence').click(function () {
  $('#dependence').load('dependence.php', function () {
    showOnly('dependence');
    activateButton('loaddependence');
  });
});

$('#loadpre').click(function () {
  $('#pre').load('previous_em.php', function () {
    showOnly('pre');
    activateButton('loadpre');
  });
});



  //For SideBar
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
      //e.preventDefault(); // Prevent actual navigation (optional)

      // Add the 'clicked' class
      this.classList.add('clicked');

      // Remove it after 200ms to simulate a quick flash
      setTimeout(() => {
        this.classList.remove('clicked');
      }, 200);
    });
  });

  
  //For Filter
let ascending = true;

  document.getElementById('sortBtn').addEventListener('click', function () {
    const table = document.getElementById('employeeTable').getElementsByTagName('tbody')[0];
    const rows = Array.from(table.rows);

    rows.sort((a, b) => {
      const snA = parseInt(a.cells[0].textContent.trim());
      const snB = parseInt(b.cells[0].textContent.trim());
      return ascending ? snA - snB : snB - snA;
    });

    rows.forEach(row => table.appendChild(row));

    ascending = !ascending;
    // this.textContent = ` ${ascending ? '↑' : '↓'}`;
  });

  //For Pagination
  document.addEventListener('DOMContentLoaded', function() {
  const table = document.getElementById('employeeTable');
  const tbody = document.getElementById('tableBody');
  const rows = Array.from(tbody.querySelectorAll('tr:not(:last-child)')); // Exclude the pagination row
  const pagination = document.getElementById('pagination');
  
  // Remove the last row (pagination controls) from the rows array
  const itemsPerPage =4;
  let currentPage = 1;
  
  // Function to show rows for a specific page
  function showPage(page) {
    currentPage = page;
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    // Hide all rows
    rows.forEach(row => {
      row.style.display = 'none';
    });
    
    // Show only rows for current page
    const pageRows = rows.slice(startIndex, endIndex);
    pageRows.forEach(row => {
      row.style.display = '';
    });
    
    updatePagination();
  }
  
  // Function to update pagination controls
  function updatePagination() {
    const totalPages = Math.ceil(rows.length / itemsPerPage);
    pagination.innerHTML = '';
    
    // Previous button
    const prevLi = document.createElement('li');
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `<a class="text-muted page-link" style="border: none;" href="#" aria-label="Previous"><img src="images/Icon.png" alt="User" class="me-2" /><span aria-hidden="true">Previous</span></a>`;
    prevLi.addEventListener('click', (e) => {
      e.preventDefault();
      if (currentPage > 1) showPage(currentPage - 1);
    });
    pagination.appendChild(prevLi);
    
    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
      const li = document.createElement('li');
      li.className = `page-item ${i === currentPage ? 'active' : ''}`;
      li.innerHTML = `<a class="text-muted page-link" style="border: none;" href="#">${i}</a>`;
      li.addEventListener('click', (e) => {
        e.preventDefault();
        showPage(i);
      });
      pagination.appendChild(li);
    }
    
    // Next button
    const nextLi = document.createElement('li');
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `<a class="text-muted page-link " style="border: none;" href="#" aria-label="Next"><span class="me-2" aria-hidden="true">Next</span> <img src="images/Icon (1).png" alt="User" /></a>`;
    nextLi.addEventListener('click', (e) => {
      e.preventDefault();
      if (currentPage < totalPages) showPage(currentPage + 1);
    });
    pagination.appendChild(nextLi);
  }
  
  // Initialize
  showPage(1);
});

  //For Search
    document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      row.style.display = rowText.includes(query) ? '' : 'none';
    });
  });

  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>