<?php

class Dbh{

    protected function connect(){
        try {
            $connessioneDB = new PDO("mysql:host=localhost; dbname=fake_fashion", "root", "");
            $connessioneDB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connessioneDB;
        } catch (PDOException $e) {
            print "Connection failed: " . $e->getMessage()."</br>";
            die();
        }
    }
}