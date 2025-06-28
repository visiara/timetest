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
    <link rel="stylesheet" href="css/profile.css">
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

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="col-lg-10 col-md-10 col-10 dept-col ">
      <section class="bg-white rounded-top-4 dept-title border">
        <h5 class="my-dept-title p-4" style="color:#000000;"><strong>Profile</strong></h5> 
      </section>
      <section class="banner-container">
              <div class="banner-section">
                You are almost all set, complete your profile now! &nbsp; • &nbsp; <strong>87% Complete</strong>
              </div>
      </section>
      <section class="bg-white center-dept border">   
          <div class="row p-4">
                <!-- Navigation Tabs -->
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item nav-button active-btn" id="loadpers"><a class="nav-link" href="#">Personal Details</a></li>
                <li class="nav-item nav-button" id="loadorga" ><a class="nav-link" href="#">Organization Details</a></li>
                <li class="nav-item nav-button" id="loadsalary"><a class="nav-link" href="#">Salary details</a></li>
                <li class="nav-item nav-button" id="loadking"><a class="nav-link" href="#">Next of Kin</a></li>
                <li class="nav-item nav-button" id="loademe"><a class="nav-link" href="#">Emergency Contact</a></li>
                <li class="nav-item nav-button" id="loaddependence"><a class="nav-link" href="#">Dependents</a></li>
                <li class="nav-item nav-button" id="loadpre"><a class="nav-link" href="#">Previous Employers</a></li>
            </ul>
            <div class="content-section" id="pers-details">
                                <!-- Form Starts -->
              <h5 class="mb-3">Personal Details</h5>

              <form>
                  <div class="row g-3 mb-4">
                  <div class="col-md-4">
                      <label class="form-label">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="Turi" />
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Middle Name</label>
                      <input type="text" class="form-control" placeholder="Enter middle name" />
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="Ogeferé" />
                  </div>
                  </div>

                  <h6 class="mt-4 mb-3">Contact Information</h6>
                  <div class="row g-3 mb-4">
                  <div class="col-md-6">
                      <label class="form-label">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="+234 9070001234" />
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" value="turi@example.com" />
                  </div>
                  <div class="col-12">
                      <label class="form-label">Residential Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="12 Adebayo Street, Surulere, Lagos, Nigeria" />
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Country <span class="text-danger">*</span></label>
                      <select class="form-select"><option selected>Nigeria</option></select>
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">State <span class="text-danger">*</span></label>
                      <select class="form-select"><option selected>Lagos</option></select>
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Local Government Area <span class="text-danger">*</span></label>
                      <select class="form-select"><option selected>Eti-Osa</option></select>
                  </div>
                  </div>

                  <h6 class="mb-3">Others</h6>
                  <div class="row g-3 mb-4">
                  <div class="col-md-3">
                      <label class="form-label">Date Of Birth <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" value="2005-01-01" />
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Gender <span class="text-danger">*</span></label>
                      <select class="form-select"><option selected>Male</option></select>
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                      <select class="form-select"><option selected>Single</option></select>
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Religion</label>
                      <input type="text" class="form-control" value="Christian" />
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Date Joined</label>
                      <input type="date" class="form-control" value="2024-12-10" />
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Nationality <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="Nigerian" />
                  </div>
                  </div>

                  <button type="submit" class="btn btn-save">Save Changes</button>
              </form>
            </div>
            <div id="orga-details" class="content-section"></div>
            <div id="salary-details" class="content-section"></div>
            <div id="next-of-king" class="content-section"></div>
            <div id="emergency" class="content-section"></div>
            <div id="dependence" class="content-section"></div>
            <div id="pre" class="content-section"></div>
          </div>
      </section>
    </div>
</section>
    <!-- ########## START: Footer ########## -->
<?php
include ("footer/footer.php");
?>
    <!-- ########## END: Footer ########## -->