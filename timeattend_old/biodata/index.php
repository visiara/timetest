t<!DOCTYPE html>
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
  <style>
    body {
      background-color: #F5F5F5;
     font-family: 'Inter', sans-serif;
      color: #fff;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card-custom {
      color: white;
      border-radius: 1rem;
      padding: 2rem;
      max-width: 500px;
      margin: auto;
      text-align: center;
    }
    .card-custom h2 {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .illustration {
      margin-top: 2rem;
      width: 100%;
      max-height: 300px;
      object-fit: contain;
    }
    .login-container {
      width: 100%;
      /* max-width: 400px; */
      text-align: center;
    }

    .logo-img {
      border-radius: 50%;
    }

    .logo-title {
      font-weight: bold;
    }

    .logo-title span:first-child {
      color: #fff;
    }

    .logo-title span:last-child {
      color: #ccc;
    }

    .welcome-text {
      color: #0f172a;
    }

    .subtitle {
      font-size: 0.9rem;
      color: #adb5bd;
    }

    .form-label {
      color: #adb5bd;
    }

    .forgot-password {
      font-size: 0.9rem;
      color: #0dcaf0;
      text-decoration: none;
    }

    .sign-in-btn {
      background-color: #0dcaf0;
      color: #fff;
      font-weight: bold;
      border-radius: 50px;
      padding: 0.5rem;
    }

    .sign-in-btn:hover {
      background-color: #0bb3d9;
    }

    .input-group-text {
      background-color: #fff;
      border-left: none;
    }
  </style>
  </head>

  <body>

<div class="login-container">
    <section class="row" style="height:100%;">
      <div class="col-md-5" style="height:100%; width:100%; display:flex; align-items:center; ">
        <!-- <div class="card-custom shadow" style="height:98%; width:98%; position:relative;"> -->
          <h2 style="position:absolute; top:10; margin:10px;" class="text-center">Vorem ipsum dolor sit amet,<br> consectetur adipiscing elit.</h2>
          <!-- Illustration image -->
          <img src="../images/admin/auth_bg.png" style="height:98%; width:98%; border-radius:20px;" class="">
        <!-- </div> -->
      </div>
        <!-- Logo -->
      <div class="col-md-7 " style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
        <div class="mb-4">
          <img src="../images/admin/logo.png" class="">
        </div>
            <!-- Welcome Text -->
        <h5 class="mb-1 welcome-text">Welcome back! Please sign in</h5>
        <p class="subtitle mb-4">Sign into your employee account using valid credentials.</p>
      <form method="POST" action="dashboard.php" style="display:flex; align-items:center; flex-direction:column; width:80%;" class="">
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
        <?php
        } 
        ?>
                <!-- Username -->
          <div class="mb-3 text-start" style="width:70%;">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" style="border-radius:20px"  id="username" placeholder="Enter your username" name="uid">
          </div>
                    <!-- Password -->
           <div class="mb-2 text-start" style="width:70%;">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" style="border-radius:20px 0px 0px 20px" id="password" name="pwd" placeholder="Enter your password">
              <span class="input-group-text" style="border-radius:0px 20px 20px 0px" ><i class="bi bi-eye"></i> Show</span>
            </div>
          </div>

                <!-- Forgot Password -->
          <div class="text-start mb-4 py-4" style="width:70%;">
            <a href="forgot.php" class="forgot-password">Forgot Password?</a>
          </div>
              <!-- Sign In Button -->
          <div class="d-grid" style="width:70%; margin-top:50px;">
            <button type="submit" class="btn sign-in-btn">Sign In</button>
          </div>

          <div class="mg-t-30 tx-center"><!--Not yet a member? <a href="" class="tx-info">Sign Up</a>--></div>
        </form>
      </div>
    </section>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>
