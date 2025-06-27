
      <section class="sidebar d-flex flex-column position-relative side-nav-bar nav-bar">
<?php
$huyac=mysqli_query($conn, "SELECT * FROM notifications WHERE admin='2' AND user = '$uid' AND company='$companyMain' AND hasread='0' ORDER BY id desc");
while ($hugyac = mysqli_fetch_array($huyac))
{
  $dtype1 = $hugyac["dtype1"];
  $dtype2 = $hugyac["dtype2"];
  $dtype3 = $hugyac["dtype3"];
  $fullname = $hugyac["fullname"];
  $story = $hugyac["story"];
  $theddate = $hugyac["ddate"];
  $department = $hugyac["department"];
  $hasread = $hugyac["hasread"];
  $noteprofilepic = $hugyac["noteprofilepic"];

  if($hasread == '1'){
    $read = "read";
  } else {
    $read = "";
  }

  if($dtype1 == '1'){
    $thelink = "leaves.php";
  } else {
    $thelink = "exemptions.php";
  }
?>
<?php } ?>
      <div class="profile mb-3 shadow d-none d-lg-block">
          <div class="dropdown">
              <button class="btn btn-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="row">
                  <div class="col-md-2">
                  <img src="../images/profilepics/<?php echo $noteprofilepic; ?>" class="" alt="User" />
                  </div>
                  <div class="col-md-8">
                  <div class="mt-2 fw-bold text-align"><?php echo $fullname; ?></div>
                  <small class="text-muted text-align">Unit Head</small>
                  </div>
                  <div class="col-md-2 d-flex justify-content-center align-items-center">
                  <img src="images/Dropdown Icon.svg" class="me-lg-2 img-small" alt="User" />
                  </div>
              </div>
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-muted" href="#">Settings</a></li>
                  <li><a class="dropdown-item text-muted" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item text-muted" href="#">Edit</a></li>
              </ul>
          </div>
      </div>

        <nav class="navSidebar nav flex-column">
        <a href="dashboard.php" class="nav-link text-muted nav-sidebar" ><img src="images/Grid Four 01.svg" class="me-lg-2" alt="User" /><span class="">Dashboard</span></a>
        <a href="attendance.php" class="nav-link text-muted nav-sidebar"><img src="images/Groupicon.png" class="me-lg-2" alt="User" /><span class="">Attendance</span></a>
        <a href="#" class="nav-link text-muted nav-sidebar"><img src="images/Banknote 2.svg" class="me-lg-2" alt="User" /><span class="">Salary Management</span></a>
        <a href="#" class="nav-link text-muted nav-sidebar"><img src="images/Round Graph.svg" class="me-lg-2" alt="User" /><span class="">KPI Management</span></a>
        </nav>

      <div class="footer mt-auto text-center d-none d-lg-block">
      HeckerPeople App V1.0.0
      </div>
      </section>
    </div> 
