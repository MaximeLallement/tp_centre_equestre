<?php
if(!isset($_SESSION)){ 

    session_start();

}

if(!isset($_SESSION['connecte'])){

    $_SESSION['connecte'] = False;
    
}

if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == False && !isset($_POST["inscription"])){ ?>
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
define('DB_TABLE_PERSONNE','personne');
define('DB_TABLE_EVENT','event');
define('DB_TABLE_PENSION','pension');
define('DB_TABLE_CHEVAL','cheval');
define('DB_TABLE_ROBE','robe');
define('DB_TABLE_UTILISATEUR','utilisateur');
define('DB_TABLE_INSCRIPTION','inscription');
define('DB_TABLE_COURS','cours');
define('DB_TABLE_PARTICIPATION','participation');


/* Include des class  */
require "class/Personne.class.php";
require "class/Cavalier.class.php";
require "class/Representant.class.php";
require "class/CavalierRepresentant.class.php";
require "class/cheval.class.php";
require "class/pension.class.php";
require "class/inscription.class.php";
require "class/cours.class.php";

