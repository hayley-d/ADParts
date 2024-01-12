<?php
//phpMailer namespace at the top of the page
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//require the path to the phpMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//require the config file for all the constans
require 'config.php';





function sendMail($subject,$message,$email = 'adparts2002@gmail.com')
    {
        //$email where the email is sent
        //$subject is the subject of the email
        //$message is the message of the mail

        //create new PHPMailer object
        $mail = new PHPMailer(true);

        //using SMTP protocol to send the email
        $mail->isSMTP();

        //set the SMTP auth property to true so that we can use the gmail login details to send the email
        $mail->SMTPAuth = true;

        //set the Host property to the MAILHOST value in the config
        $mail->Host = MAILHOST;

        //set the username property to the constant
        $mail->Username = USERNAME;

        //set the password
        $mail->Password = PASSWORD;

        //set the SMTPSecure to PHPMailer::ENCRYPTION_STARTTLS to use the STARTTLS encryption method
        //this ensuders communication is encrrypted
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;

        $mail->setFrom(SEND_FROM,SEND_FROM_NAME);

        $mail->addAddress($email);

        $mail->addReplyTo(REPLY_TO,REPLY_TO_NAME);

        $mail->isHTML(true);

        $mail->Subject = $subject;

        $mail->Body = $message;

        $mail->AltBody = $message;

        if(!$mail->send()){
            return "Email not sent";
        }
        else{
            return "success";
        }
    }






