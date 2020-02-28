
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/PHPMailer/src/SMTP.php';

// $email and $message are the data that is being
// posted to this page from our html contact form
$name = $_REQUEST['name'] ;
$phone = $_REQUEST['phone'] ;
 $service = $_REQUEST['service'] ;
 $city = $_REQUEST['city'] ;
 $gift = $_REQUEST['gift'] ;
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
// require 'lib/PHPMailer.php';
 
$mail = new PHPMailer();

 try {
    //Server settings
    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'robotlina1@gmail.com';                     // SMTP username
    $mail->Password   = '0906848483';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('robotlina1@gmail.com', 'Mailer');
    $mail->addAddress('phungvanhuu90@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('phungvanhuu90@gmail.com');               // Name is optional
    $mail->addReplyTo('phungvanhuu90@gmail.com', 'Information');


    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "[EVENT 8/3]". $name;
    $mail->Body    = "<ul><li>Họ và tên:". " ".$name. "</li><li>SĐT: ".$phone. "</li><li> Dịch vụ quan tâm: ".  $service. "</li><li>Thành phố:" .$city."</li><li>".$gift."</li></ul>";
    $mail->AltBody = '';

    $mail->send();
    echo 'Thông tin đã được gửi: cảm ơn bạn!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>