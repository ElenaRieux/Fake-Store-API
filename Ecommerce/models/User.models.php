<?php
require_once "Dbh.models.php";


class User extends Dbh
{
    private $username;
    private $email;
    protected Role $role;

    public function __construct($username, $email, Role $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function isUser()
    {
        return $this->getRole()->getRoleName() === "user";
    }

    public function isAdmin()
    {
        return $this->getRole()->getRoleName() === "admin";
    }

    public function getUsers()
    {
        $users = array();

        $sql = "SELECT username, email, ruolo FROM utente";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            $user = array(
                'username' => $row['username'],
                'email' => $row['email'],
                'ruolo' => $row['ruolo']
            );

            $users[] = $user;
        }

        return $users;
    }

    public function deleteUsers($email)
    {

        $sql = "DELETE FROM utente WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $stmt->fetch();
    }

    public function updateUsers($newUsername, $newEmail, $newPassword, $newRuolo, $email)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE utente 
         SET 
        username = ?,
        email= ?,
        password = ?,
        ruolo = ? 
        WHERE email = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$newUsername, $newEmail, $hashedPassword, $newRuolo, $email]);
        $stmt->fetch();
    }

    public function createUser($username, $email, $password, $ruolo)
    {
        $stmt = $this->connect()->prepare("INSERT INTO utente (username, email, password, ruolo) VALUES (?, ?, ?, ?);");
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt->execute(array($username, $email, $hashedPassword, $ruolo));
    }

     public function hasPermission($permission)
    {
        return $this->role->hasPermission($permission);
    }
}
