<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';



class emailme{

  
    

    public function __construct()
    {
        
    }



function enviaremail($name,$email,$subject,$comment){

        //mandar correo
        try {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        
            //DESACTIVA EL FIRAWALL DE WINDOWS
            //Chequea el correo para habilitar las aplicaiones inseguras
            //Funciona perfecto
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'jagreenlern@gmail.com';                 // SMTP username
            $mail->Password = '666JaG666';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->Encoding = '7bit';  // SMS uses 7-bit encoding 

            //Recipients
            $mail->setFrom($email, 'Mailer');
            $mail->addAddress($email, 'Mailer');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comment;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    
}//fun
}//class
 

?>
