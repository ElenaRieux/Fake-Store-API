<?php

declare(strict_types=1);

function get_user(object $connessioneDB,string $email){
    $query = "SELECT * FROM utente WHERE email = :email;";
    $stmt = $connessioneDB->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}