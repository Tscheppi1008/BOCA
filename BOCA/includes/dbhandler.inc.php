<?php

$host = 'localhost';
$db_name = 'boca';
$db_username = 'root';
$db_passwort = 'rooter123';


try{
    $pdo = new PDO("mysql:host=$host;dbname=$db_name",$db_username,$db_passwort);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $exeption){
    die("Connection failed: ".$exeption->getMessage());
}