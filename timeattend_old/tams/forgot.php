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
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="./assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/admin.css?rand=<?php echo rand(); ?>">
  <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/styles.css?rand=<?php echo rand(); ?>">

  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>

  <div class="row no-gutters flex-row-reverse ht-100v">
    <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
      <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
        <form action="" method="POST">
          <p><img class="center img-responsive" border="0" src="../images/delta-state-logo.png" width="90" height="82"></p>
          <h4 class="tx-inverse tx-center">Forgot Password?</h4>
          <p class="tx-center mg-b-30">Please fill the password reset form below.</p>
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
          <?
          }
          ?>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your email" name="email" id="email">
            <div id="reportdiv"></div>
          </div><!-- form-group -->
          <button type="button" onclick="Edit()" class="btn btn-info btn-block">Reset Password</button>
          <div class="mg-t-30 tx-center">Already a member? <a href="index.php" class="tx-info">Sign In</a></div>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- col -->
    <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
      <div class="wd-250 wd-xl-450 mg-y-30">
        <p><img class="center img-responsive" border="0" src="forgot.png" width="600"></p>

        <p class="mg-t-30 mg-b-2">Copyright &copy; <?php echo date("Y"); ?>. Heckerbella Limited. All Rights Reserved.</p>
      </div><!-- wd-500 -->
    </div>
  </div><!-- row -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    function Edit() {
      var str2 = document.getElementById("email").value;
      if (str2.length == 0) {
        document.getElementById("reportdiv").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("reportdiv").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "forgot2.php?email=" + str2, true);
        xmlhttp.send();
      }
    }
  </script>

</body>

</html>