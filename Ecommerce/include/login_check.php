<?php

require_once "../models/Role.models.php";
require_once "../models/User.models.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "connessione.php";
        require_once "login_model.php";
        require_once "login_contr.php";

        $error = "";

        if (is_input_empty($email, $password)) {
            $error = "Fill in all fields!";
        } else if (!($result = get_email($connessioneDB, $email))) {
            $error = "Incorrect email";
        } else if (is_password_wrong($password, $result["password"])) {
            $error = "Incorrect password";
        }
        require_once "config_session.php";

        if ($error != "") {
            echo $error;
            die();
        }


        $ruolo = new Role($result["ruolo"]);
        $user = new User($result["username"], $email, $ruolo);

  
        $_SESSION['user'] = serialize($user); 
        $_SESSION["logged_in"] = true;


        $_SESSION["last_regeneration"] = time();


        echo "success";

        $connessioneDB = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
