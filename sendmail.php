<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->SMTPDebug = 0;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailteamfabd@gmail.com';                  //SMTP username
    $mail->Password   = 'FABD@2021';                    //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set 'tls' above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('teamfabd@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(false);                                  //Set email format to plain text
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Thank you for your message!';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>
