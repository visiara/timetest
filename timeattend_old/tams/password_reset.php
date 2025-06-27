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
  <link href=".../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href=".../assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


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

        <p><img class="center img-responsive" border="0" src="../images/delta-state-logo.png" width="90" height="82"></p>
        <h4 class="tx-inverse tx-center">Reset Password?</h4>
        <p class="tx-center mg-b-30">Please fill the password reset form below.</p>

        <?php
        include __DIR__ . "/../includes/config.php"; // go one level up


        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset")) {
          $key = $_GET["key"];
          $email = $_GET["email"];
          $curDate = date("Y-m-d H:i:s");
          $query = mysqli_query($conn, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
          $row = mysqli_num_rows($query);
          if ($row == "") {
            $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="forgot.php">
Click here</a> to reset password.</p>';
          } else {
            $row = mysqli_fetch_assoc($query);
            $expDate = $row['expDate'];
            if ($expDate >= $curDate) {
        ?>
              <form method="post" action="password_reset.php" name="update" onsubmit="return validate(this);">
                <input type="hidden" name="action" value="update" />
                <br />
                <label><strong>Enter New Password:</strong></label><br />
                <input class="form-control" type="password" id="pass1" name="pass1" maxlength="15" required />
                <br />
                <label><strong>Re-Enter New Password:</strong></label><br />
                <input class="form-control" type="password" id="pass2" name="pass2" maxlength="15" onblur="edit()" required />
                <br />
                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                <input class="btn btn-info btn-block" type="submit" value="Reset Password" />
                <div class="mg-t-30 tx-center">Already a member? <a href="index.php" class="tx-info">Sign In</a></div>
              </form>
        <?php
            } else {
              $error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
          }
          if ($error != "") {
            echo "<div class='error'>" . $error . "</div><br />";
          }
        } // isset email key validate end


        if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
          $error = "";
          $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
          $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
          $email = $_POST["email"];
          $curDate = date("Y-m-d H:i:s");
          if ($pass1 != $pass2) {
            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
          }
          if ($error != "") {
            echo "<div class='error'>" . $error . "</div><br />";
          } else {
            $pass1 = $pass1; //md5($pass1)
            mysqli_query($conn, "UPDATE `admins` SET `pword`='" . $pass1 . "' WHERE `email`='" . $email . "';");
            mysqli_query($conn, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");

            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="index.php">
Click here</a> to Login.</p></div><br />';
          }
        }
        ?>




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
    function edit() {
      var str1 = document.getElementById("pass1").value;
      var str2 = document.getElementById("pass2").value;
      if (str1 == str2) {
        return true;
      } else {
        alert("Password do not match, both password should be same.");
        return false;
      }
    }

    function validate(form) {
      // validation code here ...
      var valid;
      var str1 = document.getElementById("pass1").value;
      var str2 = document.getElementById("pass2").value;

      if (str1 == str2) {
        valid = true;
      } else {
        valid = false;
      }

      if (!valid) {
        alert('Password do not match, both password should be same. Please correct the errors in the form!');
        return false;
      } else {
        return confirm('Do you really want to submit the form?');
      }
    }
  </script>

</body>

</html>