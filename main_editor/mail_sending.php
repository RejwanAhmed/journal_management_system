<?php 
// require 'phpmailer/PHPMailerAutoload.php';
// function send_mail($receiver, $subject, $body)
// {
//     // mail sending
    
//     $mail = new PHPMailer;
//     $sender_email = 'nazruljournal@gmail.com';
//     $sender_pass = 'nazruljournal@115';
    
//     // $receiver = $_SESSION['author_email'];
//     // $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
//     $mail->Host = 'smtp.gmail.com';
//     $mail->Port = 465;
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'tls';
    
//     $mail->Username = $sender_email; // Sender Email Id
//     $mail->Password = $sender_pass; // password of gmail
    
//     $mail->setFrom($sender_email,'JKKNIU');
    
//     $mail->addAddress($receiver); // Receiver Email Address
//     $mail->addReplyTo($sender_email);
    
//     $mail->isHTML(true);
//     $mail->Subject = $subject;
//     $mail->Body = $body;
//     if($mail->send())
//     {
//         $mail->ClearAddresses();
//         $mail->clearReplyTos();
//         // mail_sent = 1 kore dilam er mane mail sent hoyse. 
//     }
// }
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function send_mail($receiver, $subject, $body)
{
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);
    $sender_email = 'nazruljournal@gmail.com';
    $sender_pass = 'gmogxwmiwahagoin';

    $mail->SMTPDebug = 0;

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->Username = $sender_email;

    $mail->Password = $sender_pass;

    $mail->Port = 587;

    $mail->setFrom($sender_email, 'JKKNIU');

    $mail->addAddress($receiver);
    $mail->addReplyTo($sender_email);

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
    }
}
?>