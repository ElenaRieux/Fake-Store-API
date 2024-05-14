<?php

require_once "connessione.php";

function createCart($connessioneDB, $idUtente)
{
    $query = "SELECT prodotto.titolo, prodotto.prezzo, prodotto.immagine, prodotto.descrizione, carrello.quantita
    FROM carrello
    JOIN prodotto ON carrello.IDprodotto = prodotto.IDprodotto
    WHERE carrello.idUtente = :idUtente";

    $stmt = $connessioneDB->prepare($query);
    $stmt->execute(array(":idUtente" => $idUtente));

    if ($stmt->rowCount() > 0) {
?>
        <div class="left-container">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="cart-container">
                    <div class="item-container container-img">
                        <img src="<?php echo $row["immagine"]; ?>" alt="">
                    </div>
                    <div class="item-container info-container">
                        <h3><?php echo $row["titolo"]; ?></h3>
                        <p><?php echo $row["descrizione"]; ?></p>
                        <div class="control-cart">
                            <input type="number" value=<?php echo $row["quantita"]; ?>>
                            <a>Remove</a>
                            <a>Save for later</a>
                        </div>
                    </div>
                    <div class="item-container price">
                        <span><?php echo $row["prezzo"]; ?> $</span>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="item-container  cost">
            <span>Totale: 0</span>
            <button>Shop</button>
        </div>
<?php
    } else {
        echo "<h2>Your Cart is empty</h2>";
    }
}
