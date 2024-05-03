<?php

require_once "../../include/config_session.php";
require_once "../../models/Role.models.php";
require_once "../../models/User.models.php";
require_once "addUserContr.php";

$user = unserialize($_SESSION['user']);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user']) && $user->hasPermission("create")){

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordRepeat = isset($_POST['passwordRepeat']) ? $_POST['passwordRepeat'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';

 $newUser = new addUserContr($username, $email, $password, $passwordRepeat, $role);

 $result = $newUser->addUser();

 echo $result;

} else {
  echo "You don't have permission to do it";
}