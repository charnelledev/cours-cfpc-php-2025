<?php
$hostname="127.0.0.1";
$database="tp-01-crud-student";

$dsn="mysql:host=$hostname;dbname=$database";
$username = "root";
$password="";


try {
    $pdo= new PDO($dsn, $username, $password, );
  
    echo "Succès : Connexion à la base de données établie avec succès !";
  } catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
  }


//  if ($connect->connect_error){
//     echo "Erreur:La connexion a la base de donnees a echoue: 
//     $connect->connect_error";
//  }else{
//     echo "succes:connexion a la base se donnees avec succes!";
//  }