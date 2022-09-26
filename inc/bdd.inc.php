<?php

try {
    /*  Connexion  */
    $hostname = "localhost";
    $username = "root";
    $password = "Hashka852456";
    $dbname = "tp_centre_equestre";

    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    //echo "Connected to database";
}catch(PDOException $e) {
    echo $e->getMessage();
}

// DEFINE
define('DB_TABLE_PERSONNE','personne');

/* Include des class  */
require "class/Personne.class.php";
require "class/Cavalier.class.php";
require "class/Representant.class.php";
require "class/CavalierRepresentant.class.php";

/* Récupération des objets */
