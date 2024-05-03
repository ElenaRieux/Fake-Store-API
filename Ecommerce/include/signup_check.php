<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat =  $_POST["passwordRepeat"];

    include "../models/Dbh.models.php";
    include "../models/Signup.models.php";
    include "../models/Signup-control.models.php";
    $signup = new SignupContr($username, $email, $password, $passwordRepeat);

    echo $signup->signupUser();

} else {
    header("Location: ../index.php");
    die();
}
