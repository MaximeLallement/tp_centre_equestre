<?php

try {
    /*  Connexion  */
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tp_centre_equestre";

    $con = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    //echo "Connected to database";
}catch(PDOException $e) {
    echo $e->getMessage();
}

// DEFINE
define('DB_TABLE_PERSONNE','personne');
define('DB_TABLE_PENSION', 'pension');

/* Include des class  */
require "class/Personne.class.php";
require "class/Cavalier.class.php";
require "class/Representant.class.php";
require "class/CavalierRepresentant.class.php";
require "class/pension.class.php";

/* Récupération des objets */