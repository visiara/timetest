<?php

require "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = false;
$mailer = new PHPMailer($developmentMode);
$from = "do-not-reply@timatend.com";
$fromname = "Timatend";

include __DIR__ . "/../includes/config.php"; // go one level up


if (isset($_GET["email"]) && (!empty($_GET["email"]))) {

    $error = "0";
    $email = $_GET["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $error = "<span class='tx-danger tx-12 d-block mg-t-10'>Invalid email address please type a valid email address!</span>";
    } else {
        $sel_query = "SELECT * FROM `admins` WHERE email='" . $email . "'";
        $results = mysqli_query($conn, $sel_query);
        $row = mysqli_num_rows($results);

        if ($row == "") {
            $error = "<span class='tx-danger tx-12 d-block mg-t-10'>No user is registered with this email address!</span>";
        } else {

            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
            $expDate = date("Y-m-d H:i:s", $expFormat);
            //$key = md5(2418*2+$email);
            $key = md5(2418 * 2) . $email;
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;
            // Insert Temp Table
            mysqli_query($conn, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");

            $output = '<p>Dear user,</p>';
            $output .= '<p>Please click on the following link to reset your password.</p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= "<p><a href=$websiteMain/tams/password_reset.php?key=$key&email=$email&action=reset target=_blank>$websiteMain/tams/password_reset.php?key=$key&email=$email&action=reset</a></p>";
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
            $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>' . $siteName . ' Team</p>';
            $body = $output;
            $subject = "Password Recovery - $siteName";

            $email_to = $email;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= "From: <$websiteMainMail>" . "\r\n";

            /*
if(mail($email_to,$subject,$body,$headers)){
    $error = "<span class='tx-info tx-12 d-block mg-t-10'><p>An email has been sent to you with instructions on how to reset your password.</p></span>";
} else {
    $error = "<span class='tx-danger tx-12 d-block mg-t-10'><p>Error!. Mail not sent.</p></span>";
}
*/

            try {
                //$mailer->SMTPDebug = 2;
                $mailer->isSMTP();
                if ($developmentMode) {
                    $mailer->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        ]
                    ];
                }
                $mailer->Host = 'mail.timatend.com';
                $mailer->SMTPAuth = true;
                $mailer->Username = "$from";
                $mailer->Password = 'Admin123@@guy2';
                $mailer->SMTPSecure = 'ssl';
                $mailer->Port = 465;
                $mailer->setFrom("$from", "$fromname");
                $mailer->addAddress("$email_to", "$email_to");
                $mailer->isHTML(true);
                $mailer->Subject = "$subject";
                $mailer->Body = "$body";
                $mailer->send();
                $mailer->ClearAllRecipients();
                $error = "<span class='tx-info tx-12 d-block mg-t-10'><p>An email has been sent to you with instructions on how to reset your password.</p></span>";
            } catch (Exception $e) {
                $error = "<span class='tx-danger tx-12 d-block mg-t-10'><p>Error!. Mail not sent.</p></span>";
            }
        }
    }

    echo $error;
}
