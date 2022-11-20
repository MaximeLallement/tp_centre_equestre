<<<<<<< Updated upstream
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

define('DB_TABLE_PENSION','pension');
define('DB_TABLE_CHEVAL','cheval');


/* Include des class  */
require "class/Personne.class.php";
require "class/Cavalier.class.php";
require "class/Representant.class.php";
require "class/CavalierRepresentant.class.php";
require "class/cheval.class.php";
require "class/pension.class.php";

/* Récupération des objets */

=======
<?php

if(!isset($_SESSION)){ 

    session_start();

}

if(!isset($_SESSION['connecte'])){

    $_SESSION['connecte'] = False;
    
}

if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == False){ ?>
    <script>window.location.replace('../vue/connexion.php')</script>
<?php }



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
if(!defined('DB_TABLE_PERSONNE') && !defined('DB_TABLE_PENSION')){
    
define('DB_TABLE_PERSONNE','personne');
define('DB_TABLE_PENSION','pension');

}

/* Include des class  */
require_once "class/Personne.class.php";
require_once "class/Cavalier.class.php";
require_once "class/Representant.class.php";
require_once "class/CavalierRepresentant.class.php";


?>
>>>>>>> Stashed changes
