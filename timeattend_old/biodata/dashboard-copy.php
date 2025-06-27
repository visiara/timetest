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
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
    body{
      background-color: #F5F5F5;
     font-family: 'Inter', sans-serif;
    }
    .sidebar {
      height: 90%;
      /* background-color: #f8f9fa; */
      padding: 1rem;
      /* border-right: 1px solid #ddd; */
      /* border-radius: 0px 0px 20px 20px; */
    }
    .sidebar .profile {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .sidebar .profile img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }
    .sidebar .nav-link {
      color: #333;
      font-weight: 500;
    }
   @media (min-width: 993px) {
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #E6F8FD ;
      color: #0592BA  ;
      border-radius: 5px;
    }
  }
    .sidebar .footer {
      position: absolute;
      bottom: 10px;
      font-size: 0.8rem;
      color: #888;
    }
    .logo{
      /* height: 10%; */
      border-bottom: 2px solid #f5f5f5;
      border-color: #E7E5E4;
      /* border-radius: 20px 20px 0px 0px; */
    }
    @media (min-width: 993px) {
      .nav-link.clicked {
      background-color: #0483a6  !important; /* Example blue background */
      color: #fff !important;               /* White text */
      }
    }
    .profile{
    border: 1px solid #E7E5E4;
    border-radius: 20px;
    }
    .profile button{
    border: none;
    }
    .text-align{
      text-align: right;
    }
    .img-small{
      height: 25px !important;
      width: 25px !important;
    }
    .table-avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 8px;
    }
    .status-badge {
      background-color: #d1fadf;
      color: #1e824c;
      padding: 0.25rem 0.5rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
    }
    .status-badge::before {
      content: '';
      width: 8px;
      height: 8px;
      background-color: #1e824c;
      border-radius: 50%;
      display: inline-block;
      margin-right: 5px;
    }
    .filter-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }
    .pagination {
      justify-content: center;
    }
    .my-dept-title{
      height: 70px;
      font-size: 30px;
      text-align:justify;
    }
    .dept-col{
      display: flex;
      flex-direction: column;
    }
    .dept-title{
      height: 150px;
      border-bottom: 2px solid #f5f5f5;
      border-radius: 20px 20px 0px 0px;
    }
    .center-dept{
      height: 100%;
      border-radius: 0px 0px 20px 20px;
    }
    .thead-lightblue {
      background-color: #E6F8FD !important;
    }
    #pagination .page-item.active .page-link {
      background-color: #0592BA;
      border-color: #0592BA;
      color: white !important;
      border-radius: 7px;
    }
    #pagination .page-item .page-link:hover {
    background-color: #E6F8FD; 
    }
    .filter .btn:hover{
    background-color: #E6F8FD; 
    color: #0592BA  ;
    }
    .filter .btn{
      border-color: #f5f5f5;
    }

    @media only screen and (max-width:993px) {
      .nav-bar{
        height: 100%;
        border-radius: 20px;
      }
      .navSidebar{
      position: relative;
      }
      .navSidebar .nav-link span{
      display: none;
      }
      .navSidebar .nav-link:hover span{
      display: inline-block;
      position: absolute;
      }
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      color: #007bff;
      border-radius: 5px;
    }
    }
    .banner-section {
    background: linear-gradient(90deg, #ffb300, #ff8f00);
    padding: 0.75rem 1.5rem;
    text-align: center;
    color: #fff;
    font-weight: 500;
    width: auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }
  .banner-container {
    background: url('') center/cover no-repeat;
  }
    /* center dashboard css */
        .section-title {
      color: #8e8e9c;
      font-size: 1.1rem;
      margin-bottom: 0.25rem;
    }
    .card-kpi, .card-salary {
      border-radius: 1rem;
      background-color: #ffffff;
      color: #000000;
    }
    .kpi-title {
      font-size: 0.9rem;
      font-weight: 600;
    }
    .kpi-details {
      font-size: 0.85rem;
      color: #555;
    }
    .btn-pay {
      font-size: 0.8rem;
      border-radius: 50px;
    }
    .badge-paid {
      background-color: #28a745;
    }
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
  <script>
  //For SideBar
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent actual navigation (optional)

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