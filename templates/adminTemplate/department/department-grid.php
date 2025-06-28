<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminUser</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    body {
            font-family: system-ui;
            background-color: #f5f5f5;
    }
    .sidebar {
      min-height: 100vh;
      border-right: 1px solid #e5e7eb;
    }

    .sidebar .nav-link {
      font-weight: bold;
      color: #52525b;
    }

    .sidebar .nav-link.active {
      background-color: #e6f8fd;
      color: #0592ba;
    }

    .sidebar .profile-box {
      border: 1px solid #e5e7eb;
      border-radius: 1rem;
      box-shadow: 0 1px 2px rgba(10, 12, 18, 0.05);
    }

    .sidebar img.icon {
      width: 20px;
      height: 20px;
      object-fit: contain;
    }

        .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .badge-status {
      font-size: 0.75rem;
      padding: 6px 12px;
      border-radius: 20px;
    }
    .badge-active {
      background-color: #e6f4ea;
      color: #198754;
    }
    .badge-inactive {
      background-color: #f8f9fa;
      color: #6c757d;
    }
    .avatar {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 50%;
      margin-top: -40px;
      border: 3px solid #fff;
    }
    .employee-info {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .location-icon {
      font-size: 0.9rem;
      margin-right: 5px;
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
    </style>
</head>

<body>
  <div class="row p-2"  style="height: 100%;">
      <!-- Sidebar -->
      <div class="col-md-2  d-md-block sidebar" style="border:0px; height: 100%;">
        <!-- Logo Section -->
        <div class="d-flex p-2 border" style="border-radius:20px 20px 0px 0px; background-color:#ffffff;">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/w709f7sp_expires_30_days.png"
                style="width: 204px; height: 40px; object-fit: fill;">
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/xonu2ngn_expires_30_days.png"
                style="width: 24px; height: 24px; object-fit: fill;">
        </div>
        <!-- Profile Box -->
        <div class="border" style="border-radius:0px 0px 20px 20px ; background-color:#ffffff; height: 100%;">
            <div class="profile-box d-flex align-items-center gap-3 m-2">
            <img src="https://storageclas.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/2dffn6ux_expires_30_days.png" class="rounded-circle" width="40" height="40">
            <div>
                <div class="fw-bold text-dark">Maria Afolabi</div>
                <div class="text-muted small">Unit Head</div>
            </div>
            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/1msiqpcx_expires_30_days.png" width="16" height="16">
            </div>

            <!-- Menu Items -->
            <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/pdgmes9e_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Dashboard</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/aqr9dqzt_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">My department</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/owfvdvfh_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Employees</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/zfrr91qg_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Attendance</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/kydp36om_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Report</a>
            </li>

            <!-- Input item -->
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/r7q1mwii_expires_30_days.png" class="icon">
                <input type="text" class="form-control form-control-sm border-0 ps-0" placeholder="Administrators" style="background: #e6f8fd; color: #0592ba; font-weight: bold;">
            </li>

            <!-- Remaining items -->
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/jxi24ypc_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Organization</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/kqi719iv_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Salary Management</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/yxlc4xh3_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">KPI Management</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/5xuckoh5_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Recruitment</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/7hf3rucx_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">File Manager</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/17qy328b_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Biometrics Data</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/h5bfhvuz_expires_30_days.png" class="icon">
                <a class="text-muted" href="#">Settings</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/9jwfxlri_expires_30_days.png" class="icon">
                <a class="text-muted text-dark" href="#">SMS Configuration</a>
            </li>
            <li class="nav-item d-flex align-items-center gap-2 p-2">
                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/htav8kxo_expires_30_days.png" class="icon">
                <a class="text-muted text-dark" href="#">Sign Out</a>
            </li>
            </ul>

            <!-- Footer -->
            <div class="mt-4 text-muted small">
            <div class="ms-2">HeckerPeople App V1.0.0</div>
            <div class="ms-2">© Heckerbella Ltd 2025</div>
            </div>
        </div>
      </div> 
      <!-- Main Content (Empty) -->
      <main class="col-md-10">
        <div class="bg-white rounded-4 border" style=" height: 100%;" >
          <div class="border p-4" style="border-radius: 20px 20px 0px 0px;">
            <div class="d-flex justify-content-between align-items-start mb-4">
            <h1 class="fw-bold text-dark" style="font-size: larger;">My Department</h1>
            </div>
          </div>
          <section class="bg-white">   
            <div class="row p-4">        
                <p class="text-muted col-md-6">
                Showing all employees in <strong>Design Department</strong>
                </p>
                    <!-- <div class="filter-section mb-3"> -->
                <div class="col-md-6">
                    <div class="row gap-2">
                        <div class="col-md-2 me-2" >
                        <div class="btn-group" style="width: 70px;" role="group" aria-label="Basic example">
                        <button type="button" style="border-radius: 10px 0px 0px 10px; border: 3px solid #F5F5F5;" class="btn btn-white btn-sm">
                            <img src="images/Widget.svg" class="" alt="User" />
                        </button>
                        <button type="button" style="border-radius: 0px 10px 10px 0px; border: 3px solid #F5F5F5; background-color: #F5F5F5; width: 40px;" class="btn  btn-sm">
                            <img src="images/Vector.png" class="" alt="User" />
                        </button>
                        </div>
                        </div>
                        <div class="dropdown ms-md-2 me-2 filter col-md-2">
                        <button class="btn btn-outline-secondary btn-sm d-flex justify-content-center rounded-4 nav-link p-1 text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="sortBtn">
                            <img src="images/Vector1.png" class="me-1 ms-1 my-1" alt="User" /> Filter
                            <img src="images/Dropdown Icon.svg" class="me-lg-1 ms-lg-1" alt="User" />
                        </button>
                        </div>
                        <div class="col-md-6 me-2 ms-md-2">
                            <input type="text" class="form-control form-control-sm rounded-4" placeholder="Search keyword" id="searchInput"/>
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                  <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                      <div class="card-body text-center">
                        <div class="" style="display:flex; flex-direction:column;">
                            <div class="d-flex justify-content-start">
                             <span class="status-badge badge bg-light text-success">
                                <span class="dot" style="font-size:30px"></span>Inactive
                              </span>
                            </div>
                            <img style="width:100px;" src="images/Avatar.png" alt="Profile" class="profile-img mx-auto d-block">
                              <p class="id-text" style="font-size:30px">ID: KPIO689</p>
                              <h6 class="fw-bold mb-1" style="font-size:30px">Omar D.</h6>
                              <p class="mb-1 text-muted" style="font-size:30px">Marketing Specialist</p>
                              <p class="text-muted location-icon mb-0" style="font-size:30px">Future Vision</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </section>
        </div>
      </main>
      <!--End Menu Items -->
  </div>
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
