<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 require '../vendor/autoload.php';

class Mail
{

    public function verifyMail($recipient_mail, $recipient_name)
{
   

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mimikhainglin70@gmail.com';
        $mail->Password   = 'kazi rpzl mrod njbc';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('mimikhainglin70@gmail.com', 'Library');  
        $mail->addAddress($recipient_mail, $recipient_name);

        $mail->isHTML(true);
        $mail->Subject = 'Verify Mail';
        $mail->Body    = "<b><a href='$' target='_blank'>Click here</a></b> to verify your registration.";
        $mail->AltBody = 'Visit this link to verify your registration: ';

        return $mail->send(); // ✅ THIS RETURNS TRUE ON SUCCESS
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false; // ✅ RETURN FALSE ON FAILURE
    }
}

    public function sendotp($email, $otp)
{
   

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mimikhainglin70@gmail.com';
        $mail->Password   = 'kazi rpzl mrod njbc';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('mimikhainglin70@gmail.com', 'Library');  
        $mail->addAddress($email, $otp);

        $mail->isHTML(true);
        $mail->Subject = 'Verify Mail';
        $mail->Body    = "<b>".$otp.'Click here</a></b> to verify your registration.';
        $mail->AltBody = 'Visit this link to verify your registration: ' . $otp;

        return $mail->send(); // ✅ THIS RETURNS TRUE ON SUCCESS
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false; // ✅ RETURN FALSE ON FAILURE
    }
}

}




?>