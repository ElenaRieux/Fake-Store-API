<?php

require_once "Dbh.models.php";

class AggiungiCarrello extends Dbh
{

    private $idUtente;
    private $idProdotto;
    private $quantita;

    public function __construct($idUtente, $idProdotto, $quantita)
    {
        $this->idUtente = $idUtente;
        $this->idProdotto = $idProdotto;
        $this->quantita = $quantita;
    }

    public function aggiungiProdotto($idUtente, $idProdotto, $quantita)
    {
        $sql = "INSERT INTO carrello (IDutente, IDprodotto, quantita) VALUES  (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$idUtente, $idProdotto, $quantita]);
    }

    public function checkProdotto()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM carrello WHERE IDutente = ? AND IDprodotto = ?;");

        if (!$stmt->execute(array($this->idUtente, $this->idProdotto))) {
            $stmt = null;
            echo "Error: statement failed";
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    public function updateProdotto()
    {
        $sql = "UPDATE carrello 
             SET 
            quantita = quantita + ?
            WHERE IDutente = ? AND IDprodotto = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->quantita, $this->idUtente, $this->idProdotto]);
        $stmt->fetch();
    }
}
