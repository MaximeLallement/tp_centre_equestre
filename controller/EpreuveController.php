<?php
require "../inc/bdd.inc.php";
require "../model/Epreuve.php";
require "../model/Cavalier.php";
require "../model/Representant.php";
require "../model/Inscription.php";
require "../model/Cours.php";
require "../model/Participation.php";
require "../model/Compte.php";

$headerpath = "../vue/header.php";


/**
 * Retourne la vue qui affiche l'ensemble des Epreuves 
 */

if(isset($_POST["action"]) && $_POST["action"] == "index"){
    $data = get_all_epr();
    return require_once "../vue/epr/epr_index.php";
}


/**
 * Reception des action sur la vue formulaire
 * 
 * Rentre via $_POST["action"] = form
 * 
 * S'execute selon $_POST["subaction"] =
 * new -> redirige sur formulaire vide
 * modify -> redirige sur formulaire pré rempli
 * [null] -> traitement d'ajout d'un Epreuve
 * update -> traitement de modification d'un Epreuve
 * 
 * 
 */

if(isset($_POST["action"]) && $_POST["action"] == "form"){

    /**
     * Affiche la vue de formulaire pour un nouveau Epreuve
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        $new = true; //Permet de vérifier si le formulaire est celui d'ajout et non de modification
        return require_once "../vue/epr/epr_form.php";
    }
    /**
     * Affiche la vue de formulaire pour modifier un Epreuve existant
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_epr($_POST['epr_id']);

        $infosaved["id_epreuve"]  = $data["id_epreuve"] ;
        $infosaved["date_epreuve"]  = $data["date_epreuve"] ;
        $infosaved["id_personne"]   = $data["id_personne"] ;
        $infosaved["id_galop"]      = $data["id_galop"] ;

        $update = true;

        return require_once "../vue/epr/epr_form.php";
        
    }

    
    
    
    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;

    $epreuve = new Epreuve($_POST["date_epreuve"],
                                $_POST["id_personne"],
                                $_POST["id_galop"],
    );

       

    if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        if(!update_epr($epreuve,$_POST["id_epreuve"])){
            $error = "upd_epr";
            echo $error;
            return require_once "../vue/epr/epr_form.php";
        }else {
            //var_dump(update_epr($epreuve,$_POST["id_personne"]));
            $data = get_all_epr();
            return require_once "../vue/epr/epr_index.php";
        }
    }

    if(!add_epr($epreuve)){
        $error = "add_epr";
        return require_once "../vue/epr/epr_form.php";
    }else {
        //var_dump(add_epr($EpreuveRep));
        $data = get_all_epr();
        return require_once "../vue/epr/epr_index.php";
    }
}