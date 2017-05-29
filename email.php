<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug =  2;                             // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jackblossby@gmail.com';                 // SMTP username
$mail->Password = 'jyf115xdk422';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('contactMessage@jackblossby.com', 'Mailer');
$mail->addAddress('jackblossby@gmail.com', 'User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

   // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->Subject = $email;
$mail->Body    = $name . " sent you this message through www.jackblossby.com: " . $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
  http_response_code(500);
  echo "Message failed to send!";
  exit;
} else {
  http_response_code(200);
  echo "Message was sent!";
  exit;
}
?>
