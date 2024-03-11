<?php

declare(strict_types=1);

function  check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];

        echo '<br>';
        foreach($errors as $error){
            echo '<p class="form-error">'. $error .'</p>';
        }

        unset($_SESSION['errors_signup']);
    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="success"> Erfolgreich registriert!</p>';
    }
}


function signup_inputs(){

    if(isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['username_taken'])){
        echo '<input type="text" name="Rbenutzername" placeholder="Benutzername" value="' . $_SESSION['signup_data']['username'] . '"><br>';
    } else{
        echo '<input type="text" name="Rbenutzername" placeholder="Benutzername"><br>';
    }

    echo '<input type="password" name="Rpasswort" placeholder="Passwort"><br>';

    if(isset($_SESSION['signup_data']['email']) && !isset($_SESSION['errors_signup']['email_used']) && !isset($_SESSION['errors_signup']['invalid_email'])){
        echo '<input type="text" name="Remail" placeholder="E-Mail" value="' . $_SESSION['signup_data']['email'] . '"><br>';
    } else{
        echo '<input type="text" name="Remail" placeholder="E-Mail"><br>';
    }
}