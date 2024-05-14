<?php 

class addUserContr extends User
{
    private $nomeUtente;
    private $email;
    private $password;
    private $passwordRepeat;
    protected $ruolo;

    public function __construct($nomeUtente, $email, $password, $passwordRepeat, $ruolo = "user")
    {
        $this->nomeUtente = $nomeUtente;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->ruolo = $ruolo;
    }

    private function emptyInput()
    {
        $result = false;

        if (empty($this->nomeUtente) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUser()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->nomeUtente)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch()
    {
        $result = false;
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
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

    public function addUser()
    {

        $message = "";

        if ($this->emptyInput() == false) {
            $message = "Fill in all fields!"; 
            return $message;
            exit();
        }

        elseif ($this->invalidUser() == false) {
            $message = "Invalid User";
            return $message;
            exit();
        }

        elseif ($this->invalidEmail() == false) {
            $message = "Invalid Email";
            return $message;
            exit();
        }

        elseif ($this->passwordMatch() == false) {
            $message = "The Password doesn't match";
            return $message;
            exit();
        }
        elseif ($this->checkEmail($this->email) == false) {
            $message = "This Email is already registered";
            return $message;
            exit();

        }
        
        $this->createUser($this->nomeUtente, $this->email, $this->password, $this->ruolo);
        $message = "success";
        return $message;
        exit();
        
    }
}