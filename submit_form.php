<?php
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

    // Replace your-email@example.com with the actual email address where you want to receive the form data
    $to = "your-email@example.com";

    // Additional headers
    $headers = "From: $email" . "\r\n";

    // Send email
    mail($to, $subject, $message, $headers);

    // Redirect after submission
    header("Location: ./submit.html");
    exit;
}
?>

