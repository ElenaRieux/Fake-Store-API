<?php

declare(strict_types=1);


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