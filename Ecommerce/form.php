<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    if (empty($name) || empty($email) || empty($message) || empty($subject)) {
        http_response_code(400);
        header("Content-Type: text/plain");
        echo "Please fill in all the required fields.";
        exit;
    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "lele.rieux@gmail.com";

    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

    $email_body = $message;

    $_SESSION["risultato_form"] = "";

    if (mail($to, $subject, $email_body, $headers)) {
        http_response_code(200);
        header("Content-Type: text/plain");
        echo "Thank you " . $name . "! Your message has been sent successfully!";
    } else {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo  "Oops! Something went wrong. Please try again.";
    }
} else {
    header("Content-Type: text/plain");
    echo "Method not allowed.";
}
