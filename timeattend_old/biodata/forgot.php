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
    <link rel="stylesheet" href="../css/bracket.css">
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
    body {
      background-color: #f8f9fa;
    }
    .forgot-password-container {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 10px;
      text-align: center;
    }
    .forgot-password-container img {
      width: 150px;
      margin-bottom: 20px;
    }
    .btn-back {
      position: absolute;
      top: 20px;
      left: 20px;
    }
    .btn-continue {
      background: linear-gradient(to right, #00c6ff, #0072ff);
      color: #fff;
      border: none;
    }
    .btn-continue:hover {
      opacity: 0.9;
    }
</style>
  </head>

  <body>

    <div class="row no-gutters flex-row-reverse ht-100v">
      <div class="col-md-12 bg-gray-200 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
<form action="" method="POST">
          <p><img class="center img-responsive" border="0" src="../images/delta-state-logo.png" width="90" height="82"></p>
          <h4 class="tx-inverse tx-center">Forgot Password?</h4>
          <p class="tx-center mg-b-30">Please fill the password reset form below.</p>
<?php
if (isset($_GET['2']) && ($_GET['2'] == "2") ){
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
                  <!-- <div class="form-group"> -->
                    <!-- <input type="text" class="form-control" placeholder="Enter your email"  id="email"> -->
          <div class="mb-3 text-start">
              <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" style="border-radius:20px;">
                    <!-- <div id="reportdiv"></div> -->
                    <!-- </div>form-group -->
                    <!-- <button type="button" onclick="Edit()" class="btn btn-info btn-block">Reset Password</button> -->
          </div>
            <button type="submit" onclick="Edit()"  class="btn btn-continue w-100 rounded-pill py-2" style="margin-top:70px; border-radius:20px;">Continue</button>
          <div class="mg-t-30 tx-center">Already a member? <a href="index.php" class="tx-info">Sign In</a></div>
   </form>
  </div>
        </div><!-- login-wrapper -->
      </div><!-- col -->
          
          <p class="mg-t-30 mg-b-2">Copyright &copy; <?php echo date("Y"); ?>. Heckerbella Limited. All Rights Reserved.</p>
        </div><!-- wd-500 -->

    </div><!-- row -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
function Edit(){
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
