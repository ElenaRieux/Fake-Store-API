<?php

require_once "../../include/config_session.php";
require_once "../../models/User.models.php";
require_once "../../models/Role.models.php";


$user = unserialize($_SESSION['user']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $response = "";

    if (isset($_POST['username'])) {
        $newUsername = $_POST['username'];
        if (empty($newUsername)) {
            $response = "Username empty";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $newUsername)) {
            $response = "Username invalid";
        } else {
            $user->updateUsername($newUsername, $user->getEmail());
            $user->setUsername($newUsername);
            $_SESSION['user'] = serialize($user);
            $response = "Username updated";
        }
    }

    if (isset($_POST['email'])) {
        $newEmail = $_POST['email'];
        if (empty($newEmail)) {
            $response = "Email empty";
        } else if (!$user->checkEmail($newEmail)){
            $response = "Email used";
        }else {
            $user->updateEmail($newEmail);
            $user->setEmail($newEmail);
            $_SESSION['user'] = serialize($user);
            $response = "Email updated";
        }
    }


    if (isset($_POST['password'])) {
        $newPassword = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        if (($newPassword !== $passwordRepeat)) {
            $response = 'Password not match';
        } else if (empty($newPassword)) {
            $response = "Password empty";
        } else {
            $user->updatePassword($newPassword, $user->getEmail());
            $response = "Password updated";
        }
    }

    echo $response;
}
