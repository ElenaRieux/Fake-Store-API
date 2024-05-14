<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Fake Fashion </title>
    <link rel="icon" href="img/favicon.png" />
    <link rel="stylesheet" href="navbarstyle.css">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <?php
    require_once("include/config_session.php");
    require_once("models/Role.models.php");
    require_once("models/User.models.php");
    if (isset($_SESSION["logged_in"])) {
        require_once("navbar.php");
        $user = unserialize($_SESSION['user']);
        $Id = $user->getId();
        ?>
    ?>
<h1>Your Cart</h1>
<div class="total-container">
        
        <?php
    require_once "./include/crea_carrello.php";
    createCart($connessioneDB, $Id);
    ?>    
</div>

    <?php require_once "footer.html"; ?>
    <script src="cartscript.js"></script>
</body>
</html>
<?php } else {
    header("Location: login.php");
    exit;
}
?>