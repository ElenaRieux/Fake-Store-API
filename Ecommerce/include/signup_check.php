<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {

        require_once "signup_contr.php";
        require_once "connessione.php";
        require_once "signup_model.php";

        $errors = [];

        if (is_input_empty($username, $email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        }

        if (is_email_taken($connessioneDB, $email)) {
            $errors["email_taken"] = "Email already registered";
        }

        require_once "config_session.php";

        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            $signupData=[
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../login.php");
            die();
        }

        create_user($connessioneDB,  $username,  $email,  $password);

        header("Location: ../login.php?signup=success");

        $connessioneDB = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
