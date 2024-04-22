<?php

declare(strict_types=1);

function signup_inputs(){

      if(isset($_SESSION["signup_data"]["username"])){
        echo '<input type="text" name="username" placeholder="Name" value="'.$_SESSION["signup_data"]["username"].'"/>';
      }else{
        echo '<input type="text" name="username" placeholder="Name"/>';
      }

      if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_taken"])){
        echo '<input type="email" name="email" placeholder="Email" value="'.$_SESSION["signup_data"]["email"].'"/>';
      } else{
        echo '<input type="email" name="email" placeholder="Email"/>';
      }

echo '<input type="password" name="password" placeholder="Password" />';

echo '<input type="password" placeholder="Repeat Password" />';
}

function check_signup_errors()
{
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo "<br/>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
            break;
        }

        unset($_SESSION["error_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<script> const formLogin = document.querySelector(".form-login.sign-in-container");
        const formSignup = document.querySelector(".form-login.sign-up-container");
        const buttonLog = document.querySelector(".button-login");
        const buttonSign = document.querySelector(".button-signup");
        formLogin.classList.add("open");
        formSignup.classList.remove("open");
        buttonLog.classList.add("active");
        buttonSign.classList.remove("active");</script>';
    }
};