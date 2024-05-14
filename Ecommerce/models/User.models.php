<?php
require_once "Dbh.models.php";


class User extends Dbh
{
    private $username;
    private $email;
    protected Role $role;
    private $id;

    public function __construct($username, $email, Role $role, $id)
    {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    
    
        public function updateUsername($username, $email)
        {
    
            $sql = "UPDATE utente 
             SET 
            username = ?
            WHERE email = ?";
    
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$username, $email]);
            $stmt->fetch();
        }
    
        public function updateEmail($email)
        {
    
            $sql = "UPDATE utente 
             SET email = ?
            WHERE email = ?";
    
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $email]);
            $stmt->fetch();
        }
    
        public function updatePassword($password, $email)
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE utente 
             SET 
            password = ?
            WHERE email = ?";
    
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$hashedPassword, $email]);
            $stmt->fetch();
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
                    'ruolo' => $row['ruolo'],
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
    
    public function checkEmail($email)
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
    public function getCartNum(){
        $sql = "SELECT SUM(quantita) AS total_quantity
        FROM carrello
        WHERE IDUtente = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['total_quantity'])) {
            return $result['total_quantity'];
        } else {
            return '0';
        }
    }
}
