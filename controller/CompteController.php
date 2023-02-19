<?php

require_once "../inc/bdd.inc.php";
require_once "../model/Compte.php";
$headerpath = "../vue/header.php";

if(isset($_POST["inscription"])){
    return require_once "../vue/inscription.php";
}

if(isset($_POST["create_account"])){
    //Ajout d'un compte dans la table utilisateur de type user (type='u')
    if($_POST["mdp"] == $_POST["mdp_confirm"]){
        add_compte_u(); 
        return require_once "../vue/dashboard.php";
    }

    else{ ?>
        <script>alert("MDP pas similaire");</script>
    <?php  
      return require_once "../vue/inscription.php";
    }
}



?>