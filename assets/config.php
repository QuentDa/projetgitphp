<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$dbname = "projet_git";

try{

    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password); // 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $error){ 
    echo 'Erreur' . $error->getMessage();
}

?>