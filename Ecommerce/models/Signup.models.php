<?php

class Signup extends Dbh
{

    protected function setUser($username, $email, $password)
    {
        $stmt = $this->connect()->prepare("INSERT INTO utente (username, email, password) VALUES (?, ?, ?);");
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        if(!$stmt->execute(array($username, $email, $hashedPassword))){
            $stmt=null;
            echo "Error: statement failed";
            exit();
        }

        $stmt = null;
    }

    protected function checkEmail($email)
    {
        $stmt = $this->connect()->prepare("SELECT email FROM utente WHERE email = ?;");

        if (!$stmt->execute(array($email))) {
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
}
