<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host       = 'ssl0.ovh.net';
$mail->SMTPAuth   = true;
$mail->Username   = 'contact@doit4vendee.fr';
$mail->Password   = 'lsdlsdlsd';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
$mail->setFrom('contact@doit4vendee.fr', 'Léo - Do it 4 Vendée');
$mail->isHTML(true);
?>