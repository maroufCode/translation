<?Php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;

$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'Contact@spacelevels.online';
$mail->Password = '4BlZisWgsT';
$mail->setFrom('Contact@spacelevels.online', 'Space Levels');
$mail->addReplyTo('Contact@spacelevels.online', 'Space levels');
$mail->addAddress('ahmed.codze@gmail.com', 'Gold Glanz');
$mail->Subject = 'New Contact Message';
// $mail->msgHTML(file_get_contents('message.html'), __DIR__);
// $mail->AddEmbeddedImage('./assets/img/products/bfff476065d7a7cd86474ebc2004c2c0db576274.jpg', 'bfff476065d7a7cd86474ebc2004c2c0db576274.jpg');

$mail->Body = '
<html>
<head>
  <title>New Contact Message</title>
</head>
<body>
  <p>New Message :</p>
  <table>
    <tr>
      <th>name</th>
      <th>phone</th>
      <th>email</th>
    </tr>
    <tr>
      <td>' . filter_var($_POST['name'], FILTER_SANITIZE_STRING) . '</td>
      <td>' . filter_var($_POST['phone'], FILTER_SANITIZE_STRING) . '</td>
      <td>' . filter_var($_POST['email'], FILTER_SANITIZE_STRING) . '</td>
    </tr>
  </table>
  <br>
  <center><strong>' . filter_var($_POST['subject'], FILTER_SANITIZE_STRING) . '</strong></center>
  <br>
  <br>
  <p>' . filter_var($_POST['message'], FILTER_SANITIZE_STRING) . '</p>
</body>
</html>
';
$mail->IsHTML(true);
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'We have recievede your message, Thank you!';
    header('location: http://reinigung-goldglanz.de');
}
