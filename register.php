<?php
    require_once('db.php');
   
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .mainContainer{
            display:table;
            margin:100px auto 0;
            padding:10px;
            border:1px solid #ddd;
            width:100%;
            max-width:500px;
        }
    </style>
  </head>
  <body>
    <div class="mainContainer">
        <form action=""  method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Register user</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>