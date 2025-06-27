<?php
require "../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$developmentMode = false;
$mailer = new PHPMailer($developmentMode);

if($whoMailTo == "admin"){
    $output='<p>Dear Administrator,</p>';
$output.='<p>The KPI you graded is being contested.</p>';
$output.='<p>Please click on the following link to re-appraise.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.="<p><a href=$websiteMain/tams/dashboard.php target=_blank>$websiteMain/tams/dashboard.php</a></p>";		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser. The link will expire after 3 day for security reason.</p>';  	
} else {
    $output='<p>Dear '.$whoName.',</p>';
$output.='<p>Your KPI has been successfully graded.</p>';
$output.='<p>Please click on the following link to view and/or contest if needed.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.="<p><a href=$websiteMain/biodata/dashboard.php target=_blank>$websiteMain/tams/dashboard.php</a></p>";		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 3 day for security reason.</p>';
$output.='<p>If you did not want to contest this KPI grading, no action 
is needed.</p>'; 
}

$output.='<p>Thanks,</p>';
$output.='<p>'.$siteName.' Team</p>';
$body = $output; 
$subject = "KPI Update - $siteName";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: <$websiteMainMail>" . "\r\n";

//mail($email_to,$subject,$body,$headers);
//include ("".$_SERVER['DOCUMENT_ROOT']."/mainmailsend.php");

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