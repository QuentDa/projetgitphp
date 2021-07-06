<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = "entreprise";

try{

    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password); // 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $error){ 
    echo 'Erreur' . $error->getMessage();
}

?>