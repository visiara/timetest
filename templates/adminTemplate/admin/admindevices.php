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
                        <div class="bg-white rounded-4 border" style=" height: 100%;">
                            <div class="border p-4" style="border-radius: 20px 20px 0px 0px;">
                                <div class="d-flex justify-content-between align-items-start mb-4">
                                <h2 class="fw-bold text-dark" style="font-size: larger;">Administrator</h2>
                                </div>
                            </div>

                        <div class=" p-4" style="border-radius: 0px 0px 20px 20px;">
                            <div class="px-3">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span class="text-muted fw-bold">Admin User</span>
                                    <button class="btn btn-info text-white fw-bold py-1 px-3" onclick="alert('Pressed!')">Device User</button>
                                    <span class="text-muted fw-bold">Admin Settings</span>
                                </div>
                            </div>


                        <div class="d-flex justify-content-between align-items-center mb-4 px-3">
                        <span class="text-muted">Showing all Devices logged</span>
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-white border shadow-sm-custom rounded-pill-custom d-flex align-items-center px-3 py-2" onclick="alert('Pressed!')">
                            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/gl39y00q_expires_30_days.png" class="me-2" style="width: 20px; height: 20px;">
                            <span class="fw-bold text-dark me-2">Filters</span>
                            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/xb2wwl46_expires_30_days.png" style="width: 20px; height: 20px;">
                            </button>
                            <div class="input-group rounded shadow-sm-custom border">
                            <span class="input-group-text bg-white border-0">
                                <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/zqjqjmjv_expires_30_days.png" style="width: 18px; height: 18px;">
                            </span>
                            <input type="text" class="form-control border-0" placeholder="Search keyword">
                            </div>
                            <button class="btn btn-info text-white fw-bold rounded-pill-custom d-flex align-items-center px-3 py-2" onclick="alert('Pressed!')">
                            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/rskvkvtf_expires_30_days.png" class="me-2" style="width: 16px; height: 16px;">
                            Add Device Admin
                            </button>
                        </div>
                        </div>

                        <!-- Repeat this block for each admin device row -->
                        <div class="d-flex align-items-center justify-content-between border rounded-4 shadow-sm p-3 mb-3">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-success bg-opacity-25 text-success fw-bold py-1 px-3 me-3 rounded-pill" onclick="alert('Pressed!')">
                            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/qdavl4cx_expires_30_days.png" class="me-2" style="width: 10px; height: 10px;">
                            Active
                            </button>
                            <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/g45wc3a2_expires_30_days.png" class="me-3" style="width: 40px; height: 40px;">
                            <div class="me-4">
                            <div class="fw-bold text-dark">Adajero S. Tega</div>
                            <div class="text-muted">Supervisor</div>
                            </div>
                            <div class="me-4">
                            <div class="text-dark fw-bold small">Device ID</div>
                            <div class="text-muted">HB-HQ</div>
                            </div>
                                <div class="me-4">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/rKqiLQlii5/4ln5xzq9_expires_30_days.png" style="width: 24px; height: 24px;">
                                        <span class="text-muted">Heckerbella HQ</span>
                                    </div>
                                    <div class="text-muted">Created by Admin</div>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-white border shadow-sm-custom rounded-pill-custom px-4 fw-bold" onclick="alert('Pressed!')">Edit</button>
                                <button class="btn btn-white border shadow-sm-custom rounded-pill-custom px-3 fw-bold" onclick="alert('Pressed!')">Deactivate</button>
                            </div>
                            </div>
                            <!-- End Row -->
                            </div>
                            </div>
                            </main>
                        <!--End Menu Items -->
                        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
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
</body>
</html>