<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    // Collect form data
    $name = $_POST["name"];
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];

    $make = $_POST["make"];
    $serialNumber = $_POST["sNumber"];
    $model = $_POST["model"];
    $partDescription = $_POST["p-desc"];
    $partNumber = $_POST["pNumber"];
    $originalAfter = isset($_POST["original-after"]) ? $_POST["original-after"] : "";
    $description = $_POST["desc"];

    // Compose email message
    $to = "adparts2002@gmail.com";
    $subject = "New Quote Request";

    $message = "Customer Contact Information:\n\n";
    $message .= "Name: $name $lastName\n";
    $message .= "Phone Number: $phoneNumber\n";
    $message .= "Email: $email\n\n";

    $message .= "Machine Part Information:\n\n";
    $message .= "Machine Make: $make\n";
    $message .= "Serial Number: $serialNumber\n";
    $message .= "Model: $model\n";
    $message .= "Part Description: $partDescription\n";
    $message .= "Part Number: $partNumber\n";
    $message .= "Original/After Market: $originalAfter\n";
    $message .= "Description: $description\n";
    echo $message;
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp-relay.brevo.com'; // Sendinblue SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'spamforhayley@gmail.com'; // Your Sendinblue SMTP username
        $mail->Password   = 'FEQyt1aGfOmIC9VL'; // Your Sendinblue SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name.' '.$lastName);
        $mail->addAddress($to); // Add recipient

        //Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();

        // Redirect to a thank-you page or display a success message
        header("Location: submit.html");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



