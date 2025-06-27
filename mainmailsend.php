<?php
require "../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$developmentMode = false;
$mailer = new PHPMailer($developmentMode);

$from = "do-not-reply@timatend.com";
$fromname = "Timatend";
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

?>