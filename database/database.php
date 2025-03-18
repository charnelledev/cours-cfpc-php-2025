<?php
$hostname="127.0.0.1";
$username = "root";
$password="";
$database="cours-cfpc-php-2025";
$connect= new mysqli($hostname, $username, $password, $database);


 if ($connect->connect_error){
    echo "Erreur:La connexion a la base de donnees a echoue: 
    $connect->connect_error";
 }else{
    echo "succes:connexion a la base se donnees avec succes!";
 }











?>