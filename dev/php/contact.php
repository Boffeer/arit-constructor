<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Переменные
if (htmlspecialchars($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
}
if (htmlspecialchars($_POST['tel'])) {
    $tel = htmlspecialchars($_POST["tel"]);
}
if (htmlspecialchars($_POST['formname'])) {
    $formname = htmlspecialchars($_POST["formname"]);
}


$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->Host = 'HOST';
$mail->Port = 465;
$mail->Username = 'mail@mail.com';
$mail->Password = 'Q@8612241142';

// От кого
$mail->setFrom('from@mail.com', 'Name');

// Кому
$mail->addAddress('to@gmail.com', 'Принмающий лиды');

// Тема письма
$mail->Subject = 'Заявка с формы'.$formname;

// Тело письма

$body =
"<br>Имя: ".$name.
"<br>Телефон: " .$tel;

$mail->msgHTML($body);

// Приложение
// $mail->addAttachment(__DIR__ . '/image.jpg');



$mail->send();

?>
