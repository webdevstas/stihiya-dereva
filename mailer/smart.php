<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$place = $_POST['user_place'];
$date = $_POST['user_date'];
$service = $_POST['user_service'];
$topic = $_POST['user_topic'];
$email = $_POST['user_mail'];
$text = $_POST['user_text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zayavochkin.site@yandex.ru';                 // Наш логин
$mail->Password = 'S373739';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('zayavochkin.site@yandex.ru', 'Сайт Заявка');   // От кого письмо 
$mail->addAddress('stanislaw.spirin@yandex.ru');     // Add a recipient
//$mail->addAddress('zakaz@eco-a.ru');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка с сайта';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . '<br>
	Почта: ' . $email .'<br>
	Дата рождения: ' . $date .'<br>
	Место проживания: ' . $place .'<br>
	Услуга: ' . $service . '<br>
	Тема обращения:' .$topic . '<br>
	Текст обращения:' . $text . ' ';

$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Ошибка";
} else {
    echo "Спасибо за заявку, мы свяжемся с Вами в ближайшее время.";
}
?>

