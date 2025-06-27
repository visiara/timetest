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

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="../css/admin/admin.css?rand=<?= rand(); ?>">
  <link rel="stylesheet" href="../css/admin/auth.css?rand=<?= rand(); ?>">
  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .inputWithIcon {
      position: relative;
    }

    .inputWithIcon i {
      position: absolute;
      right: 0;
      top: 8px;
      padding: 9px 8px;
      color: #aaa;
      transition: 0.3s;
    }
  </style>
</head>

<body>

  <div class="row no-gutters flex-row-reverse ht-100v">
    <div class="col-md-5 bg-white d-flex align-items-center justify-content-center">
      <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
        <form action="dashboard.php" method="POST">
          <center>
            <img class="bg-white" border="0" src="../images/admin/logo.png">

          </center>
          <h4 class="tx-inverse tx-center">Welcome back Admin! Please sign in</h4>
          <p class="tx-center mg-b-30">Sign into your administrator account using valid credentials..</p>
          <?php
          if (isset($_GET['2']) && ($_GET['2'] == "2")) {
          ?>
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-close alert-icon tx-20 mg-t-5 mg-xs-t-0"></i>
                <span><strong>Oh snap!</strong> Username or Password Invalid.</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
          <?php
          }
          ?>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your username" name="uid">
          </div><!-- form-group -->
          <div class="form-group">
            <div class="inputWithIcon">
              <input type="password" class="form-control" placeholder="Enter your password" name="pwd" id="myInput">
              <i class="far fa-eye" id="togglePassword" style="cursor: pointer;" onclick="myFunction()"></i>
            </div>

            <a href="forgot.php" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block btn-rounded">Sign In</button>

          <div class="mg-t-30 tx-center"><!--Not yet a member? <a href="" class="tx-info">Sign Up</a>--></div>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- col -->
    <div class="col-md-6 bg-main d-flex align-items-center justify-content-center btn-rounded">
      <div class="wd-250 wd-xl-450 mt-5">
        <div class="signin-logo tx-28 tx-bold tx-white"><strong class="tx-normal">Administrator Access</strong></div>
        <div class="tx-white mg-b-20">
          Biometric Identification Payroll Automation Time and Attendance System</div>

        <p class='text-white'>
          HECKER PEOPLE (Time and Attendance Management) is a user-friendly and intuitive system that provides smoothly integrated essential time and attendance functionality, employee management, leave management, scheduling, time tracking, time management solution and more.
        </p>

        <!-- <h1><i class="fa fa-cog fa-5x mg-b-20"></i></h1> -->
        <img class="img-responsive" style='heigt: 600px; width: 500px;' border="0" src="../images/admin/auth_bg.png">


        <p class="mg-t-30 mg-b-2 text-white">Copyright &copy; <?php echo date("Y"); ?>. Heckerbella Limited. All Rights Reserved.</p>
      </div><!-- wd-500 -->
    </div>
  </div><!-- row -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

</body>

</html>