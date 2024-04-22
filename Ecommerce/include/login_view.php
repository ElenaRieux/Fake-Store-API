<?php

declare(strict_types=1);

function check_login_errors(){
    if(isset($_SESSION["error_login"])){
        $errors = $_SESSION["error_login"];

        foreach($errors as $error){
            echo '<p class="form-error">'.$error.'</p>';
            break;
        }

        unset($_SESSION["error_login"]);
    }
    else if (isset($_GET["login"]) && $_GET["login"] === "success"){
        
    }
}
