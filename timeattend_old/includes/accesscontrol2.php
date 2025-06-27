<?php // accesscontrol.php
$pin1 = "2";
include __DIR__ . "/../includes/config.php"; // go one level up


@session_start();

if (isset($_POST['uid'])) {
	$uid = $_POST['uid'];
	$uid = strtolower($uid);
} elseif (isset($_SESSION['uid'])) {
	$uid = $_SESSION['uid'];
	$uid = strtolower($uid);
} else {
}

if (isset($_POST['pwd'])) {
	$pwd = $_POST['pwd'];
} elseif (isset($_SESSION['pwd'])) {
	$pwd = $_SESSION['pwd'];
} else {
}

if (!isset($uid) || !isset($pwd) || empty($uid) || empty($pwd)) {
?>
	<!DOCTYPE HTML PUBLIC �-//W3C//DTD HTML 4.0 Strict//EN�>
	<html>

	<head>
		<meta http-equiv="Content-Language" content="en-us">
		<link rel="stylesheet" href="../style1.css" />
		<link type="image/x-icon" rel="Shortcut Icon" href="../images/favicon.ico" />
		<title> Please Log In for Access </title>
	</head>

	<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
		<div align="center">

			<div align="center">
				<table cellpadding="0" cellspacing="0" background="../skoollinks/images/aw.jpg" width="1261" height="165" id="table5">
					<!-- MSTableType="layout" -->
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td height="13"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td align="right">
							<img border="0" src="../images/logo-template.png" width="112" height="111">
						</td>
						<td>&nbsp;</td>
						<td align="center" valign="bottom">
							<img border="0" src="../images/Untitled-1.jpg" width="503" height="110">
						</td>
						<td valign="top" rowspan="2" width="220">
						</td>
						<td height="149">&nbsp;</td>
					</tr>
					<tr>
						<td width="131"></td>
						<td width="206"></td>
						<td width="21"></td>
						<td width="543"></td>
						<td height="3" width="140"></td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" background="../images/preface-wrapper-bg.png" width="100%" height="63">
					<!-- MSTableType="layout" -->
					<tr>
						<td></td>
						<td></td>
						<td height="15"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td align="center" valign="top">
						</td>
						<td height="35">&nbsp;</td>
					</tr>
					<tr>
						<td width="128"></td>
						<td width="100%"></td>
						<td height="13" width="125"></td>
					</tr>
					<tr>
						<td><img alt="" width="128" height="1" src="../MsSpacer.gif"></td>
						<td></td>
						<td><img alt="" width="125" height="1" src="../MsSpacer.gif"></td>
					</tr>
				</table>
			</div>
			<table cellpadding="0" cellspacing="0" width="782" height="342">
				<!-- MSTableType="layout" -->
				<tr>
					<td></td>
					<td></td>
					<td height="21"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td height="27">&nbsp;</td>
					<td valign="top" style="padding-left:15px; padding-right:15px; padding-top:10px; padding-bottom:10px" background="back.jpg" rowspan="5" width="254">
						<div class="invit">
							<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
							<script Language="JavaScript" Type="text/javascript">
								<!--
								function FrontPage_Form1_Validator(theForm) {

									if (theForm.uid.value == "") {
										alert("Please enter a value for the \"uid\" field.");
										theForm.uid.focus();
										return (false);
									}

									if (theForm.uid.value.length < 3) {
										alert("Please enter at least 3 characters in the \"uid\" field.");
										theForm.uid.focus();
										return (false);
									}

									if (theForm.pwd.value == "") {
										alert("Please enter a value for the \"pwd\" field.");
										theForm.pwd.focus();
										return (false);
									}

									if (theForm.pwd.value.length < 4) {
										alert("Please enter at least 4 characters in the \"pwd\" field.");
										theForm.pwd.focus();
										return (false);
									}
									return (true);
								}
								//
								-->
							</script><!--webbot BOT="GeneratedScript" endspan -->
							<form action="<?= $_SERVER['PHP_SELF'] ?>" method=POST onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table1">
									<tr>
										<td align="center">
											<b>
												<font face="Agency FB" size="4">ADMINISTRATIVE AREA</font>
											</b>
										</td>
									</tr>
									<tr>
										<td>
											<hr size="1" width="95%">
										</td>
									</tr>
									<tr>
										<td><b>
												<font size="4" face="Tahoma">Already
													Have a ID?</font>
											</b></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td align="left">
											<b>
												<font size="2" face="Tahoma">User
													Name :</font>
											</b>
											<font face="Tahoma">&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-minimum-length="3" --><input type="text" name="uid" size="20" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></font>
										</td>
									</tr>
									<tr>
										<td align="left" style="padding-top: 5px">
											<b>
												<font size="2" face="Tahoma">Password :</font>
											</b>
											<font face="Tahoma">&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-minimum-length="4" --><input type="password" name="pwd" size="20" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></font>
										</td>
									</tr>
								</table>
								<p align="center">
									<input type="submit" value="Log-In" name="B1" style="float: left; color:#FFFFFF; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px; background-color:#EE3124">
								</p>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background-image: url('../images/accounting-clip-arts.jpg'); background-repeat: no-repeat; background-position: right bottom">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">
							<tr>
								<td align="left">
									<font face="Brush Script MT" style="font-size: 30pt">
										Welcome to Lead Account Manager</font>
								</td>
							</tr>
							<tr>
								<td align="left"><b>
										<font size="4" face="Times New Roman">Enjoy All The
											Benefits....</font>
									</b></td>
							</tr>
							<tr>
								<td align="left">
									<ul>
										<li>
											<font face="Tahoma" size="2">Manage Accounts</font>
										</li>
										<li>
											<font face="Tahoma" size="2">Manage Admin And Sales
												Reps</font>
										</li>
										<li>
											<font face="Tahoma" size="2">Manage Stock and
												Purchases</font>
										</li>
										<li>
											<font face="Tahoma" size="2">Barcode Printing</font>
										</li>
										<li>
											<font face="Tahoma" size="2">Barcode Scanning</font>
										</li>
										<li>
											<font face="Tahoma" size="2">Print Receipts</font>
										</li>
										<li>
											<font face="Tahoma" size="2">And Many More...</font>
										</li>
									</ul>
								</td>
							</tr>
						</table>
					</td>
					<td height="192">&nbsp;</td>
				</tr>
				<tr>
					<td valign="top">
						<hr size="1">
					</td>
					<td height="15"></td>
				</tr>
				<tr>
					<td valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table3">
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="left"><b>
										<font size="4">Get all the best......</font>
									</b></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
					</td>
					<td height="58">&nbsp;</td>
				</tr>
				<tr>
					<td width="487">&nbsp;</td>
					<td height="29" width="11">&nbsp;</td>
				</tr>
			</table>
			<div align="center">
				<table cellpadding="0" cellspacing="0" background="../images/preface-wrapper-bg.png" width="100%" height="68" id="table7">
					<!-- MSTableType="layout" -->
					<tr>
						<td width="205">&nbsp;</td>
						<td align="center" width="100%">
							<div id="pubFooter">
								<div class="pubContent">
									<font face="Verdana" size="2" color="#FFFFFF">
										<a href="http://www.leadmarksystems.com" style="text-decoration: none">
											<font color="#FFFFFF">About Us</font>
										</a> |
										<a href="http://www.leadmarksystems.com" style="text-decoration: none">
											<font color="#FFFFFF">Contact Us </font>
										</a>|
										<a href="http://www.leadmarksystems.com" style="text-decoration: none">
											<font color="#FFFFFF">What We Do</font>
										</a> |
										<a href="http://www.leadmarksystems.com" style="text-decoration: none">
											<font color="#FFFFFF">Customer Service</font>
										</a>
									</font>
									<div class="font10 padTop10 gray9">
										<font color="#FFFFFF">
											<font face="Verdana"><span class="font10 gray6">
													<font size="2">Copyright � 2009 Leadmark Systems. All
														Right Reserved Leadmark Systems</font>
												</span></font>&nbsp;
										</font>
									</div>
								</div>
							</div>
						</td>
						<td height="68" width="194">&nbsp;</td>
					</tr>
					<tr>
						<td><img alt="" width="205" height="1" src="../MsSpacer.gif"></td>
						<td></td>
						<td><img alt="" width="194" height="1" src="../MsSpacer.gif"></td>
					</tr>
				</table>
			</div>

		</div>
	</body>

	</html>
<?php
	exit;
}
//Clean the input submitted to mysql
$uid = addslashes($uid);
$pwd = addslashes($pwd);

//this puts the variable into the session

$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

$sql = "SELECT * FROM users WHERE user= '$uid' AND pass = '$pwd' AND admin < '$pin1' ";

$result = mysql_query($sql);

if (!$result) {
	echo "A database error occurred while checking your login details";
}
//if bad user/pass combo access denied
if (mysql_num_rows($result) == 0) {

	unset($_SESSION['uid']);
	unset($_SESSION['pwd']);
?>
	<html>

	<head>
		<title> Access Denied </title>
	</head>

	<body>
		<h1> Access Denied </h1>
		<p>There are several reasons this may be happening:<BR>
		<UL>
			<LI>Your username or password is incorrect</LI>
			<LI>You Are Not a<b> Admin User</b></LI>
			<LI>You have forgotten your login information. <a href="../lostpwd.php">Lost Password</a></LI>
		</UL>
		To return to our login page, <a href="../admin/index.php">click here</a>.</p>
	</body>

	</html>
<?php
	exit;
}

?>