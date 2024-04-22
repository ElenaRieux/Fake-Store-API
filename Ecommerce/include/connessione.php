<?php
try {
    $connessioneDB = new PDO("mysql:host=localhost; dbname=fake_fashion", "root", "");
    $connessioneDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
