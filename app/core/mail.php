<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



Class Mail
{

    public static function sendEmailNotif($to, $subject, $body) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = HOST_SMTP;                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = FROM_SMTP;                     // SMTP username
            $mail->Password   = PASS_SMTP;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = PORT_SMTP;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            error_log(HOST_SMTP);
            error_log(FROM_SMTP);
            error_log(PASS_SMTP);
            error_log(PORT_SMTP);
            //Recipients
            $mail->setFrom(FROM_SMTP, 'Success Registration');
            $mail->addAddress($to);     // Add a recipient
           // $mail->addAddress('ellen@example.com');               // Name is optional
           // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addCC('cc@example.com');
           // $mail->addBCC('bcc@example.com');
        
            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = '';
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
        return false;
    }
}