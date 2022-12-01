<?php

try {
    /*  Connexion  */
    $hostname = "localhost";
    $username = "root";
    $password = "Hashka852456";
    $dbname = "tp_centre_equestre";

    $con = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    //echo "Connected to database";
}catch(PDOException $e) {
    echo $e->getMessage();
}

// DEFINE
define('DB_TABLE_PERSONNE','personne');
define('DB_TABLE_EVENT','event');
define('DB_TABLE_PENSION','pension');
define('DB_TABLE_CHEVAL','cheval');
define('DB_TABLE_ROBE','robe');


/* Include des class  */
require "class/Personne.class.php";
require "class/Cavalier.class.php";
require "class/Representant.class.php";
require "class/CavalierRepresentant.class.php";
require "class/cheval.class.php";
require "class/pension.class.php";

/* Récupération des objets */

