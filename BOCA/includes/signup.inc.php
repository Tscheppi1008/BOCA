<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){

    $username = $_POST["Rbenutzername"];
    $password = $_POST["Rpasswort"];
    $email = $_POST["Remail"];

    try{

        require_once 'dbhandler.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS (checking inputs)
        $errors = [];

        if(is_input_empty($username, $password, $email)){
            $errors['empty_input'] = 'Füllen sie alle Felder aus!';
        }
        if(is_email_invalid($email)){
            $errors['invalid_email'] = 'Ungültige E-Mail-Adresse verwendet!';
        }
        if(is_username_taken($pdo, $username)){
            $errors['username_taken'] = 'Benutzername bereits vergeben!';
        }
        if(is_email_registered($pdo, $username)){
            $errors['email_used'] = 'E-Mail bereits registriert!';
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION['errors_signup'] = $errors;

            $signupData = [
                'username' => $username,
                'email' => $email
            ];

            $_SESSION['signup_data'] = $signupData;


            header('Location: ../index.php');
            die();
        }

        create_user($pdo, $username, $password, $email);

        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;

        die();

    }catch(PDOException $exeption){
        die('Query failed: '.$exeption->getMessage());
    }
}else{
    header('Location: ../index.php');
    die();
}