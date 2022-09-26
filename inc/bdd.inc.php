<?php

/*  Connexion     */
$hostname = "localhost";
$username = "root";
$password = "Hashka852456";
//DATABASE_URL="mysql://root:Hashka852456@127.0.0.1:3306/eu2p-frontoffice?serverVersion=8.0&charset=utf8"


try {
    $db = new PDO("mysql:host=$hostname;dbname=tp_centre_equestre", $username, $password);
    //echo "Connected to database";
}catch(PDOException $e) {
    echo $e->getMessage();
}



/* INCLUDE  */
