<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["name"];
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $machineMake = $_POST["make"];
    $model = $_POST["model"];
    $partDesc = $_POST["p-desc"];
    $partNumber = $_POST["pNumber"];
    $serialNumber = $_POST["sNumber"];
    $description = $_POST["desc"];
    $radioValue = isset($_POST["original"]) ? "Original" : "After Market";

    // Compose email message
    $subject = "New Quote Request";
    $message = "Customer Contact:\n";
    $message .= "First Name: $firstName\n";
    $message .= "Last Name: $lastName\n";
    $message .= "Phone Number: $phoneNumber\n";
    $message .= "Email: $email\n\n";

    $message .= "Part Information:\n";
    $message .= "Machine Make: $machineMake\n";
    $message .= "Model: $model\n";
    $message .= "Part Description: $partDesc\n";
    $message .= "Part Number: $partNumber\n";
    $message .= "Serial Number: $serialNumber\n";
    $message .= "Type: $radioValue\n";
    $message .= "Description: $description\n";

    // Google OAuth 2.0 credentials
    $clientId = '183845411677-ctau8mlb717s4o9s4pqfskmk1fj9ti66.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost:3000/auth/google/adParts';

    // Construct mailto URI
    $mailtoUri = "mailto:adparts2002@gmail.com?subject=" . urlencode($subject) . "&body=" . urlencode($message);

    /*// Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set the mailer to use SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Set Google OAuth 2.0 credentials
        $provider = new Google([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'redirectUri' => $redirectUri,
        ]);

        // Fetch Gmail API token
        $token = $provider->getAccessToken('authorization_code', [
            'code' => 'YOUR_AUTHORIZATION_CODE',
        ]);

        // Set Gmail API token
        $mail->setOAuth([
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $token->getRefreshToken(),
            'accessToken' => $token->getToken(),
            'expires' => $token->getExpires(),
        ]);

        // Set email details
        $mail->setFrom($email, $firstName.' '.$lastName);
        $mail->addAddress('adparts2002@gmail.com', 'Dominic'); // Replace with the recipient's email and name
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();

        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/
    // Redirect to the mailto URI
    header("Location: $mailtoUri");

    exit;
}



