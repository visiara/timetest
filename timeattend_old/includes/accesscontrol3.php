<?php // accesscontrol.php
$value = "1";
include __DIR__ . "/../includes/config.php"; // go one level up

include("" . $_SERVER['DOCUMENT_ROOT'] . "/classes/imageClass.php");

$dare = mysql_query("SELECT * FROM company");
while ($row = mysql_fetch_array($dare)) {
  $company = $row["name"];
  $branch = $row["branch"];
  $addy = $row["addy"];
  $phoo = $row["phone"];
  $vat = $row["vat"];
  $regno = $row["rcno"];
}

if (isset($_POST['submitREG'])) {
  $c = addslashes(strip_tags($_POST['c']));
  $b = addslashes(strip_tags($_POST['b']));
  $a = addslashes(strip_tags($_POST['a']));
  $p = addslashes(strip_tags($_POST['p']));
  $vat = addslashes(strip_tags($_POST['vat']));
  $regno1 = addslashes(strip_tags($_POST['regno']));

  $imager = new Imager;

  //Process1 uploaded picture if available		
  if (isset($_FILES['picture1']['name'])  && strlen($_FILES['picture1']['name']) > 0) {
    //READING THE MAGES:::::::::::::::::::::
    $tmp_name1 = $_FILES['picture1']['tmp_name'];
    $picname1 = $_FILES['picture1']['name'];
    $size1 = $_FILES['picture1']['size'];
    $type1 = $_FILES['picture1']['type'];
    $error1 = $_FILES['picture1']['type'];
    $get_extension1 = explode(".", $_FILES['picture1']['name']);
    $extension1 = $get_extension1[1];
    $word1 = date("mdYgisa");
    $img_name1 = date("mdyHis");
    $picture1 = "$img_name1.$extension1";
    //:::::::END OF PROCESS:::::::::::::::::
    $post_date = date("Y-m-d");
    //::::::::::::::::::
    //$path = "picsblock/$picture";
    //$thumbPath = "picsblock/thumbs/$picture";
    //$thumbWidth = 117;
    //$thumbHeight = 124;
    //$thumbSource = $tmp_name;
    //::::Main image data::::::
    $mainPath1 = "images/$picture1";
    $mainWidth1 = 200;
    $mainHeight1 = 128;
    $mainSource1 = $tmp_name1;
    //:::::::::::::::::::::::::

    $createMainimage = $imager->resampimagejpg($mainWidth1, $mainHeight1, $mainSource1, $mainPath1);

    //			$sql1 = "UPDATE profile SET image = '$picture1' WHERE uname = '$uid'";
    //            $result51 = mysql_query($sql1);

    $j++;
  }

  $sql2 = "UPDATE company SET name='$c', branch='$b', addy='$a', phone='$p', vat='$vat', rcno='$regno1', image='$picture1' WHERE id = '$value'";
  $result = mysql_query($sql2);

  $dare2 = mysql_query("SELECT * FROM company");
  while ($row = mysql_fetch_array($dare2)) {
    $company = $row["name"];
    $branch = $row["branch"];
    $addy = $row["addy"];
    $phoo = $row["phone"];
    $vat = $row["vat"];
    $regno = $row["rcno"];
  }
}

if (($company == "o") || ($company == "")) {
?>
  <!DOCTYPE HTML PUBLIC �-//W3C//DTD HTML 4.0 Strict//EN�>
  <html>

  <head>
    <meta http-equiv="Content-Language" content="en-us">
    <link rel="stylesheet" href="style1.css" />
    <title> Please Log In for Access </title>
  </head>

  <body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
    <div align="center">

      <div align="center">
        &nbsp;<p>
          <img border="0" src="../images/logo-template.png" width="112" height="111"><b>
            <font face="Agency FB" size="6">&nbsp; Enter Registration
              Details</font>
          </b>
        </p>
        <hr color="#EA0000" size="1">
      </div>
      <table cellpadding="0" cellspacing="0" width="541" height="369">
        <!-- MSTableType="layout" -->
        <tr>
          <td height="16"></td>
        </tr>
        <tr>
          <td valign="top" height="353" width="541">
            <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
            <script Language="JavaScript" Type="text/javascript">
              <!--
              function FrontPage_Form1_Validator(theForm) {

                if (theForm.c.value == "") {
                  alert("Please enter a value for the \"Company Name\" field.");
                  theForm.c.focus();
                  return (false);
                }

                if (theForm.c.value.length < 3) {
                  alert("Please enter at least 3 characters in the \"Company Name\" field.");
                  theForm.c.focus();
                  return (false);
                }

                if (theForm.a.value == "") {
                  alert("Please enter a value for the \"Address\" field.");
                  theForm.a.focus();
                  return (false);
                }

                if (theForm.a.value.length < 5) {
                  alert("Please enter at least 5 characters in the \"Address\" field.");
                  theForm.a.focus();
                  return (false);
                }

                if (theForm.p.value == "") {
                  alert("Please enter a value for the \"Phone Number\" field.");
                  theForm.p.focus();
                  return (false);
                }

                if (theForm.p.value.length < 5) {
                  alert("Please enter at least 5 characters in the \"Phone Number\" field.");
                  theForm.p.focus();
                  return (false);
                }

                var checkOK = "0123456789-,";
                var checkStr = theForm.p.value;
                var allValid = true;
                var validGroups = true;
                for (i = 0; i < checkStr.length; i++) {
                  ch = checkStr.charAt(i);
                  for (j = 0; j < checkOK.length; j++)
                    if (ch == checkOK.charAt(j))
                      break;
                  if (j == checkOK.length) {
                    allValid = false;
                    break;
                  }
                }
                if (!allValid) {
                  alert("Please enter only digit and \",\" characters in the \"Phone Number\" field.");
                  theForm.p.focus();
                  return (false);
                }

                if (theForm.regno.value == "") {
                  alert("Please enter a value for the \"Company Registration Number\" field.");
                  theForm.regno.focus();
                  return (false);
                }

                if (theForm.regno.value.length < 3) {
                  alert("Please enter at least 3 characters in the \"Company Registration Number\" field.");
                  theForm.regno.focus();
                  return (false);
                }

                if (theForm.vat.value == "") {
                  alert("Please enter a value for the \"V.A.T Tax %\" field.");
                  theForm.vat.focus();
                  return (false);
                }

                if (theForm.vat.value.length < 1) {
                  alert("Please enter at least 1 characters in the \"V.A.T Tax %\" field.");
                  theForm.vat.focus();
                  return (false);
                }

                var checkOK = "0123456789-";
                var checkStr = theForm.vat.value;
                var allValid = true;
                var validGroups = true;
                var decPoints = 0;
                var allNum = "";
                for (i = 0; i < checkStr.length; i++) {
                  ch = checkStr.charAt(i);
                  for (j = 0; j < checkOK.length; j++)
                    if (ch == checkOK.charAt(j))
                      break;
                  if (j == checkOK.length) {
                    allValid = false;
                    break;
                  }
                  allNum += ch;
                }
                if (!allValid) {
                  alert("Please enter only digit characters in the \"V.A.T Tax %\" field.");
                  theForm.vat.focus();
                  return (false);
                }
                return (true);
              }
              //
              -->
            </script><!--webbot BOT="GeneratedScript" endspan -->
            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
              <table border="0" cellpadding="3" cellspacing="3" width="100%" id="table1">
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <font face="Agency FB" size="4"><b>Company Name :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    &nbsp;<!--webbot bot="Validation" s-display-name="Company Name" b-value-required="TRUE" i-minimum-length="3" --><input type="text" name="c" size="45" value="<?php echo $company; ?>" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <font face="Agency FB" size="4"><b>Address :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    &nbsp;<!--webbot bot="Validation" s-display-name="Address" b-value-required="TRUE" i-minimum-length="5" --><textarea rows="6" name="a" cols="36" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"><?php echo $addy; ?></textarea></td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <font face="Agency FB" size="4"><b>Phone Number :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    &nbsp;<!--webbot bot="Validation" s-display-name="Phone Number" s-data-type="String" b-allow-digits="TRUE" s-allow-other-chars="," b-value-required="TRUE" i-minimum-length="5" --><input type="text" name="p" size="45" value="<?php echo $phoo; ?>" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <b>
                      <font face="Agency FB" size="4">Reg Number</font>
                    </b>
                    <font face="Agency FB" size="4"><b> :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    &nbsp;<!--webbot bot="Validation" s-display-name="Company Registration Number" b-value-required="TRUE" i-minimum-length="3" --><input type="text" name="regno" size="45" value="<?php echo $regno; ?>" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <b>
                      <font face="Agency FB" size="4">V.A.T %</font>
                    </b>
                    <font face="Agency FB" size="4"><b> :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    &nbsp;<!--webbot bot="Validation" s-display-name="V.A.T Tax %" s-data-type="Integer" s-number-separators="x" b-value-required="TRUE" i-minimum-length="1" --><input type="text" name="vat" size="20" value="<?php echo $vat; ?>" style="padding-left: 10px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px"></td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:0" width="125" align="right">
                    <b>
                      <font face="Agency FB" size="4">Company Logo</font>
                    </b>
                    <font face="Agency FB" size="4"><b> :</b></font>
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:0" width="70%" colspan="2">
                    <font face="Calibri" size="2">
                      <input type="file" name="picture1" size="15" style="border-style: solid; border-width: 1px">
                    </font>
                  </td>
                </tr>
                <tr>
                  <td style="padding-left: 10px; padding-right: 10px; padding-top:0; padding-bottom:10px" width="125" align="right">
                    &nbsp;</td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:10px" width="35%">
                    <input type="submit" value="Submit" name="submitREG" style="color: #FFFFFF; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px; background-color: #EA0000">
                  </td>
                  <td style="padding-left: 0; padding-right: 10px; padding-top:0; padding-bottom:10px" width="35%">
                    &nbsp;</td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>

    </div>
    <hr color="#EA0000" size="1">
  </body>

  </html>
<?php
  exit;
}
?>