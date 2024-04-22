<?php

declare(strict_types=1);

function get_username(object $connessioneDB, string $email)
{
    $query = "SELECT email FROM utente WHERE email = :email;";
    $stmt = $connessioneDB->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $connessioneDB, string $username, string $email, string $password)
{
    $query = "INSERT INTO utente (username, email, password) VALUES (:username,:email,:password);";
    $stmt = $connessioneDB->prepare($query);

$options =[
    'cost' => 12
];

$hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->execute();
}
