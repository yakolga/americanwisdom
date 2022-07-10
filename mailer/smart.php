<?php 

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$email = $_POST['email'];


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output


$mail->addAddress('ok.supergirl@ukr.net');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
$mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Фамилия: ' . $surname . '<br>
	Номер телефона: ' . $phone . ' <br>
	E-mail: ' . $email . ' <br>
    Сообщение: ' . $question . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>