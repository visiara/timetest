<?php
/*
require "../../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$developmentMode = false;
$mailer = new PHPMailer($developmentMode);

$from = "do-not-reply@timatend.com";
$fromname = "Timatend";

function domail($email_to, $subject, $body)
{
    global $mailer;
    global $from;
    global $fromname;
    global $developmentMode;

    @session_start();
    $ip_address = $_SERVER['REMOTE_ADDR']; // Capture user's IP address
    $companyid  = $_SESSION['company'];
    $thetime = time();

    try {
        //$mailer->SMTPDebug = 2;
        $mailer->isSMTP();
        if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl'=> [
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
        //echo "MAIL HAS BEEN SENT SUCCESSFULLY";
    } catch (Exception $e) {
        //echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    }

}

*/
?>