<?php // accesscontrol.php

include __DIR__ . "/../includes/config.php"; // go one level up


if (isset($_POST['uid'])) {
  $uid = $_POST['uid'];
} else {
  $uid = $_SESSION['uid'];
}
if (isset($_POST['pwd'])) {
  $pwd = $_POST['pwd'];
} else {
  $pwd = $_SESSION['pwd'];
}


if (!isset($uid) || !isset($pwd)) {
?>
  <table align=center width=253 border=0 cellspacing=0 cellpadding=0 bgcolor="#2f4f4f">
    <tr>
      <td>
        <table border=0 width=100% cellspacing=1 cellpadding=1>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method=POST>
            <tr>
              <td BGCOLOR="#fffff0">
                <table width="88%" border=0 cellspacing=0 cellpadding=0>
                  <tr>
                    <td>
                      <FONT SIZE="-1" FACE="Verdana,Tahoma,Arial,Helvetica,sans-serif">User Name:
                    </td>
                    <td><input type=text name="uid" size="17" value=""></td>
                  </tr>
                  <tr>
                    <td>
                      <FONT SIZE="-1" FACE="Verdana,Tahoma,Arial,Helvetica,sans-serif">Password:
                    </td>
                    <td><input type=password name="pwd" size="17"></td>
                  </tr>
                  <tr>
                    <td colspan=2 align=center>
                      <input type=submit name="Login" value="Login">
                    </td>
                  </tr>
          </form>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table6">
          <tr>
            <td bgcolor="#3D6EB0">
              <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table7">
                <tr>
                  <td bgcolor="#FFFFFF"><?php
                                        include("" . $_SERVER['DOCUMENT_ROOT'] . "/includes/login2.php");
                                        ?></td>
                </tr>
              </table>
              <font color="#FFFFFF"><strong>Register
                  Now! </strong></font>
            </td>
          </tr>
          <tr>
            <td bgcolor="#3D6EB0"><strong>
                <font color="#FFFFFF">Click
                  Here &gt;&gt;&gt;&gt;&gt;&gt; </font>
              </strong>
              <font color="#0000FF"><span style="text-decoration: none">
                  <strong><a style="color: #FF0000" href="../register.php">Register</a></strong></span></font>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
<?php
  exit;
}
//Clean the input submitted to mysql
$uid = addslashes($uid);
$pwd = addslashes($pwd);

//this puts the variable into the session

$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

$sql = "SELECT * FROM users WHERE uname = '$uid' AND pword = '$pwd' ";

$result = mysql_query($sql);

if (!$result) {
  echo "A database error occurred while checking your login details";
}
//if bad user/pass combo access denied
if (mysql_num_rows($result) == 0) {

  unset($_SESSION['uid']);
  unset($_SESSION['pwd']);
?>
<?php
  exit;
}

?>