<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['Lbenutzername'];
    $password = $_POST['Lpasswort'];

    try{
        
        require_once('dbhandler.inc.php');
        require_once('login_model.inc.php');
        require_once('login_contr.inc.php');

        //ERROR HANDLERS (checking inputs)
        $errors = [];

        if(is_loginInput_empty($username, $password)){
            $errors['empty_input'] = 'Füllen sie alle Felder aus!';
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)){
            $errors['login_incorrect'] = 'Falsche Anmeldeinformationen!';
        }
        if (!is_username_wrong($result) && is_password_wrong($password, $result['passwort'])){
            $errors['login_incorrect'] = 'Falsche Anmeldeinformationen!';
        }


        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION['errors_login'] = $errors;

            header('Location: ../index.php');
            die();
        }

        $newSessionId = session_create_id();
        $sessionID = $newSessionId . '_' . $result['id']; 
        session_id($sessionID);

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_username'] = htmlspecialchars($result['benutzername']);

        $_SESSION['last_regeneration'] = time();

        header('Location: ../index.php?login=success');
        $pdo = null;
        $statement = null;
        die();

    }catch(PDOException $exeption){
        die('Query failed: '.$exeption->getMessage());
    }
}else{
    header('Location: ../index.php');
    die();
}