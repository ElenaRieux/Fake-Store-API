<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "connessione.php";
        require_once "login_model.php";
        require_once "login_contr.php";

        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($connessioneDB, $email);

        if (is_email_wrong($result)) {
            $errors["email_incorrect"] = "Incorrect email";
        }

        if (!is_email_wrong($result) && is_password_wrong($password, $result["password"])) {
            $errors["password_incorrect"] = "Incorrect password";
        }

        require_once "config_session.php";

        if ($errors) {
            $_SESSION["error_login"] = $errors;
            header("Location: ../login.php?login=fail");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["IDUtente"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["IDUtente"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["logged_in"] = true;


        $_SESSION["last_regeneration"] = time();
        

        header("Location: ../index.php?login=success");

        $connessioneDB = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
