<?php

declare(strict_types=1);

function get_email(object $connessioneDB,string $email){
    $query = "SELECT * FROM utente WHERE email = :email;";
    $stmt = $connessioneDB->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_data(object $connessioneDB, string $email){     
    $sql = "SELECT username, email, ruolo FROM utente WHERE email = :email";
    $stmt = $connessioneDB->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}