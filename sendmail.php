<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $to = 'teamfabd@gmail.com';
  $body = "Name: $name\nEmail: $email\nSubject: $subject\n\n$message";
  $headers = "From: $email\r\nReply-To: $email\r\n";
  mail($to, $subject, $body, $headers);
  echo 'Thank you for your message!';
}
?>