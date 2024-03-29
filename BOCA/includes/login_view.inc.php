<?php

declare(strict_types= 1);

function output_username(){
    if(isset($_SESSION['user_id'])){
        echo"<h4>Angemeldet als <font color='#2980b9'><u>" . $_SESSION['user_username'] . "</u></font color></h4>";
    }
    else{
        echo '<h4>Nicht angemeldet!</h4>';
    }
}

function check_login_errors(){
    if(isset($_SESSION['errors_login'])){
        $errors = $_SESSION['errors_login'];

        echo'<br>';

        foreach( $errors as $error ){
            echo '<p class="errors">'.$error.'</p>';
        }

    unset($_SESSION['errors_login']);
}else if(isset($_GET['login']) && $_GET['login'] === 'success'){
    echo '<br>';
    echo '<p class="success">Anmeldung erfolgreich!</p>';
    }
}