<?php
require ('submit_form.php');
if(isset($_POST['submit'])){
    //if the form is submitted
    if(empty($_POST['email']) || empty($_POST["name"]) || empty($_POST["last-name"]) || empty($_POST["phone-number"])
        || empty($_POST["make"]) || empty($_POST["sNumber"]) || empty($_POST["model"]) || empty($_POST["p-desc"]) || empty($_POST["pNumber"]))
    {
        $response = "All fields are required";
    }else{
        $name = $_POST["name"];//
        $lastName = $_POST["last-name"];//
        $phoneNumber = $_POST["phone-number"];//
        $email = $_POST["email"];//

        $make = $_POST["make"];//
        $serialNumber = $_POST["sNumber"];//
        $model = $_POST["model"];//
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

        if($originalAfter === 'original')
        {
            $message .= "Original\n";
        }
        else{
            $message .= "After Market\n";
        }

        $message .= "Description: $description\n";
        $response = sendMail($subject,$message,$to);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AD Parts - Construction and mining machine official parts buying page">
    <meta name="keywords" content="AD Parts, machine parts, customer form, CAT, Caterpillar, Volvo, Komatsu, Liebherr, ">
    <title>AD Parts</title>
    <link rel="stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div id = "logo"></div>
    <div class = "nav-btn">About Us</div>
    <div class = "nav-btn">Customer Form</div>
</header>

<section>
    <div id = "CAT"></div>
</section>

<section id = "form">
    <form action="" method="post" >
        <div id ="customer-contact">
            <div id = "form-heading1"><h1>Customer Contact</h1></div>
            <div class = "form-item">
                <label for = "name">First Name<span>*</span></label>
                <input type = text name = "name" id = "name" required>
            </div>
            <div class = "form-item">
                <label for = "last-name">Last Name<span>*</span></label>
                <input type = text name = "last-name" id = "last-name" required>
            </div>

            <div class = "form-item">
                <label for = "phone-number">Phone number<span>*</span></label>
                <input type = text name = "phone-number" id = "phone-number" required>
            </div>

            <div class = "form-item">
                <label for = "email">Email<span>*</span></label>
                <input type = text name = "email" id = "email" required>
            </div>

        </div>

        <div id = "machine-part">
            <div id = "form-heading2"><h1>Part Information</h1></div>
            <div class = "form-item">
                <label for = "make">Machine Make<span>*</span></label>
                <input type = text name = "make" id = "make" required>
            </div>

            <div class = "form-item">
                <label for = "sNumber">Serial Number<span>*</span></label>
                <input type = text name = "sNumber" id = "sNumber" required>
            </div>

            <div class = "form-item">
                <label for = "model">Model<span>*</span></label>
                <input type = text name = "model" id = "model">
            </div>

            <div class = "form-item">
                <label for = "p-desc">Part Description<span>*</span></label>
                <input type = text name = "p-desc" id = "p-desc" required>
            </div>

            <div class = "form-item">
                <label for = "pNumber">Part Number<span>*</span></label>
                <input type = text name = "pNumber" id = "pNumber" required>
            </div>

            <div class = "form-item">
                <div id="radios">
                    <div>
                        <input type = "radio" name = "original-after" id = "original" style="border: 2px solid #aa1409" >
                        <label for = "original">Original</label>
                    </div>

                    <div>

                        <input type = "radio" name = "original-after" id = "after">
                        <label for = "after">After Market</label>
                    </div>


                </div>
            </div>



            <label for = "desc">Description<span>*</span></label>
            <input type = text name = "desc" id = "desc" required>

        </div>



        <div id="submit" onclick="changePage()"><button id = "quote" type = "submit" name = "submit">Get A Quote</button></div>

    </form>
</section>

<script>
    function changePage(){
        window.open('./submit.html');
    }
</script>

</body>
</html>
