<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $website = $_POST['website'];
        $message = $_POST['message'];

        if(!empty($email) && !empty($message)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $receiver = "manuel.folliot@gmail.com";
                $subject = "From: $name <$email> ";
                $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage: $message";
                $sender = "From: $email";
                if(mail($receiver, $subject, $body, $sender)){
                    echo "Your mail has been sent";
                }else{
                    echo "Sorry, failed to sent mail";
                }
            }else{
                echo "Enter a valid email adress";
            }
        }else{
            echo "You need to give an email adress and write a message.";
        }
    } else {
        echo "Error: Invalid request";
        exit;
    }
    
?>