<?php

class SignupContr extends Signup
{
    private $username;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($username, $email, $password, $passwordRepeat)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    private function emptyInput()
    {
        $result = false;

        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUser()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
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

    private function existEmail()
    {
        $result = true;
        if (!$this->checkEmail($this->email)) {
            $result = false;
        }
        return $result;
    }

    public function signupUser()
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
        elseif ($this->existEmail() == false) {
            $message = "This Email is already registered";
            return $message;
            exit();

        }
        
        
            $this->setUser($this->username, $this->email, $this->password);
            $message = "You signed up successfully";
            return $message;
            exit();
        
    }
}
