<?php
session_start(); // Démarrer la session

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('config.php');
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

$MAIL_PASSWORD = $_ENV['MAIL_PASSWORD'];
$MAIL_USERNAME = $_ENV['MAIL_USERNAME'];
$MAIL_HOST = $_ENV['MAIL_HOST'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                           // Set mailer to use SMTP
    $mail->Host       = $MAIL_HOST;      // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                  // Enable SMTP authentication
    $mail->Username   = $MAIL_USERNAME;        // SMTP username
    $mail->Password   = $MAIL_PASSWORD;        // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
    $mail->Port       = 587;                   // TCP port to connect to

    //Recipients
    $mail->setFrom('machkourfatimazahra364@gmail.com', 'FatimaZahra');
    $mail->addAddress('machkourfatimazahra364@gmail.com', 'FatimaZahra');    // Add a recipient
    $mail->addReplyTo('machkourfatimazahra364@gmail.com', 'FatimaZahra');
    $mail->addCC('machkourfatimazahra364@gmail.com');
    $mail->addBCC('machkourfatimazahra364@gmail.com');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Envoi du mail
    if ($mail->send()) {
        $_SESSION['success'] = 'Message envoyé avec succès';
    } else {
        $_SESSION['err'] = "Échec, veuillez réessayer plus tard";        
    }
} catch (Exception $e) {
    $_SESSION['err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Redirection après l'envoi du message
header('Location: index.php');
exit;
