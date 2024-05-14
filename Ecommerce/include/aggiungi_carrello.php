<?php

require_once "../include/config_session.php";
require_once "../models/Role.models.php";
require_once "../models/User.models.php";
require_once "../models/AggiungiCarrello.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER['CONTENT_TYPE'] === 'application/json' && isset($_SESSION["logged_in"])) {

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (isset($data['idProdotto']) && isset($data['quantita'])) {

        $user = unserialize($_SESSION['user']);
        $idUtente = $user->getId();

        $idProdotto = $data['idProdotto'];
        $quantita = $data['quantita'];
        $prodotto = new AggiungiCarrello($idUtente, $idProdotto, $quantita);

        $NotInCart = $prodotto->checkProdotto();

        if(!$NotInCart){
            $prodotto->updateProdotto();
            echo json_encode(["message" => "success"]);
        } else

        try {
            $prodotto->aggiungiProdotto($idUtente, $idProdotto, $quantita);

            echo json_encode(["message" => "success"]);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            echo json_encode(["error" => $errorMessage]);
        }
    } else {
        echo json_encode(["error" => "Dati mancanti: 'idProdotto' e 'quantita' sono richiesti"]);
    }
} else if (!isset($_SESSION["logged_in"])) {
    echo json_encode(["message" => "not logged"]);
} else {
    echo json_encode(["error" => "Richiesta non valida: questa API accetta solo richieste POST JSON"]);
}
