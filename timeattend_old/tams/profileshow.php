<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$companyMain = $_GET['com'];

$bookpay1 = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$q' AND company='$companyMain'");
while ($bookpay = mysqli_fetch_array($bookpay1)) {
  $eidy = $bookpay["id"];
  $employeeidy = $bookpay["employeeid"];
  $fnamey = $bookpay["fname"];
  $mnamey = $bookpay["mname"];
  $lnamey = $bookpay["lname"];
  $emaily = $bookpay["email"];
  $addressy = $bookpay["address"];
  $countryy = $bookpay["country"];
  $statey = $bookpay["state"];
  $gendery = $bookpay["gender"];
  $phoney = $bookpay["phone"];
  $nextofkiny = $bookpay["nextofkin"];
  $dofby = $bookpay["dofb"];
  $employmenttypey1 = $bookpay["employmenttype"];
  $location1y = $bookpay["location"];
  $department1y = $bookpay["department"];
  $workshift1y = $bookpay["workshift"];
  $unamey = $bookpay["uname"];
  $pwordy = $bookpay["pword"];
  $profilepicy = $bookpay["profilepic"];
  $salaryscale2 = $bookpay["salaryscale"];
  $gphone = $bookpay["gphone"];
  $gemail = $bookpay["gemail"];

  $huya = mysqli_query($conn, "SELECT * FROM salaryscale WHERE id = '$salaryscale2' AND company='$companyMain'");
  while ($hugya = mysqli_fetch_array($huya)) {
    $salaryscale3 = $hugya["nickname"];
  }

  $huy = mysqli_query($conn, "SELECT * FROM location WHERE id = '$location1y' AND company='$companyMain'");
  while ($hugy = mysqli_fetch_array($huy)) {
    $locationy = $hugy["locationname"];
  }

  $hu1y = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$department1y' AND company='$companyMain'");
  while ($hug1y = mysqli_fetch_array($hu1y)) {
    $departmenty = $hug1y["departmentname"];
  }

  $hu2y = mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift1y' AND company='$companyMain'");
  while ($hug2y = mysqli_fetch_array($hu2y)) {
    $workshifty = $hug2y["shiftname"];
  }

  $hu3y = mysqli_query($conn, "SELECT * FROM employmenttype WHERE id = '$employmenttypey1'");
  while ($hug3y = mysqli_fetch_array($hu3y)) {
    $employmenttypey = $hug3y["name"];
  }

  $hu2yc = mysqli_query($conn, "SELECT * FROM country WHERE id = '$countryy'");
  while ($hug2yc = mysqli_fetch_array($hu2yc)) {
    $countryyname = $hug2yc["name"];
  }

  $hu3ys = mysqli_query($conn, "SELECT * FROM states WHERE id = '$statey'");
  while ($hug3ys = mysqli_fetch_array($hu3ys)) {
    $stateyname = $hug3ys["name"];
  }
}

?>

<div id="accordion2" class="accordion accordion-head-colored accordion-primary" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="heading1">
      <h6 class="mg-b-0">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
          Personal Information
        </a>
      </h6>
    </div><!-- card-header -->

    <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
      <div class="card-block pd-20">
        sample1
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading2">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
          Salary Information
        </a>
      </h6>
    </div>
    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
      <div class="card-block pd-20">
        sample2
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading3">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
          Next of Kin details
        </a>
      </h6>
    </div>
    <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3">
      <div class="card-block pd-20">
        sample3
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading4">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
          Emergency Contact details
        </a>
      </h6>
    </div>
    <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4">
      <div class="card-block pd-20">
        sample4
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading5">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
          Dependents (Spouse & Children)
        </a>
      </h6>
    </div>
    <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5">
      <div class="card-block pd-20">
        sample5
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading6">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
          Previous Employers
        </a>
      </h6>
    </div>
    <div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6">
      <div class="card-block pd-20">
        sample6
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading7">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
          References
        </a>
      </h6>
    </div>
    <div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="heading7">
      <div class="card-block pd-20">
        sample7
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading8">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
          Educational Qualification
        </a>
      </h6>
    </div>
    <div id="collapse8" class="collapse" role="tabpanel" aria-labelledby="heading8">
      <div class="card-block pd-20">
        sample8
      </div>
    </div><!-- collapse -->
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading9">
      <h6 class="mg-b-0">
        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
          Brief Medical Information
        </a>
      </h6>
    </div>
    <div id="collapse9" class="collapse" role="tabpanel" aria-labelledby="heading9">
      <div class="card-block pd-20">
        sample9
      </div>
    </div><!-- collapse -->
  </div>
  <!-- card -->
</div><!-- accordion -->