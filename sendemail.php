<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';



require 'vendor/autoload.php';


if(isset($_POST['submit'])){
    $name= $_POST['email'];
    
   



$sender = 'support@ogadweb.com';
$senderName = 'OgadTec Limited';
$recipient = $name;
$usernameSmtp = 'support@ogadweb.com';
$passwordSmtp = 'computer8344#';
$host = 'ssl://ogadweb.com';
$port = 465;
$subject = 'New Appointment';
$bodyText =  "Appointment Booking\r\nThis email was sent through the
    goddaycleaners.com get a qoute.";
$bodyHtml = "<h1>Appointment</h1>


<p> Thank you signing up</p>";


    $mail = new PHPMailer(true);

    try {
        // Specify the SMTP settings.
        $mail->isSMTP();
        $mail->setFrom($sender, $senderName);
        $mail->Username   = $usernameSmtp;
        $mail->Password   = $passwordSmtp;
        $mail->Host       = $host;
        $mail->Port       = $port;
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'SSL/TLS';
        $mail->addCustomHeader('X-SES-CONFIGURATION-SET');
    
        // Specify the message recipients.
        $mail->addAddress($recipient);
        // You can also add CC, BCC, and additional To recipients here.
    
        // Specify the content of the message.
        $mail->isHTML(true);
        $mail->Subject    = $subject;
        $mail->Body       = $bodyHtml;
        $mail->AltBody    = $bodyText;
        $mail->Send();
        echo "<script>alert('email sent');</script>";
        echo "<script>location.href= 'index.html'</script>";
    } catch (Exception $e) {
        echo "<script>alert('An error occurred');</script>";
        echo "<script>location.href= 'index.html'</script>";
       
    } catch (Exception $e) {
        echo "<script>alert('Email not sent.');</script>";
        echo "<script>location.href= 'index.html'</script>";
       
    }
}
?>