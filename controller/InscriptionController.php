<?php
require "../inc/bdd.inc.php";
require "../model/Cavalier.php";
require "../model/Representant.php";
require "../model/CavalierRepresentant.php";
require "../model/Inscription.php";

$headerpath = "../vue/header.php";

/**
 * Retourne la vue qui affiche l'ensemble des Inscriptions 
 */

if(isset($_POST) && $_POST["action"] == "index"){
    
    $data = get_all_ins();

    return require_once "../vue/ins/ins_index.php";
}


/**
 * Retourne la vue qui affiche l'ensemble des Cavaliers après suppression ( SoftDelte ) d'un Cavalier
 */
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_ins_by_id($_POST["ins_id"]);
    
    return require_once "../vue/ins/ins_index.php";

}


/**
 * Reception des action sur la vue formulaire
 * 
 * Rentre via $_POST["action"] = form
 * 
 * S'execute selon $_POST["subaction"] =
 * new -> redirige sur formulaire vide
 * modify -> redirige sur formulaire pré rempli
 * update -> traitement de modification d'un cavalier
 * [null] -> traitement d'ajout d'un cavalier
 * 
 * 
 */
if(isset($_POST) && $_POST["action"] == "form"){

    /**
     * Affiche la vue de formulaire pour un nouveau cavalier
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        return require_once "../vue/ins/ins_form.php";
    }
    /**
     * Affiche la vue de formulaire pour modifier un cavalier existant
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_ins($_POST['ins_id']);

        $infosaved["id_inscription"]   = $data["id_inscription"] ;
        $infosaved["ins_cotisation"]           = $data["montant_cotisation"] ;
        $infosaved["ins_ffe"]        = $data["montant_ffe"] ;
        $infosaved["ins_annee"] = $data["annee"] ;
        $infosaved["id_cav"] = $data["id_cav"] ;
        
        
        $update = true;

        return require_once "../vue/ins/ins_form.php";
        
    }

    
    
    
    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;


        $inscription = new Inscription($_POST["ins_cotisation"],
                                            $_POST["ins_ffe"],
                                            $_POST["ins_annee"],
                                            $_POST["id_cav"]
        );

        
        if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
            if(!update_ins($inscription,$_POST["id_ins"])){
                $error = "updins";
                echo $error;
                return require_once "../vue/ins/ins_form.php";
            }else {
                //var_dump(update_cavRep($inscription,$_POST["id_personne"]));
                $data = get_all_ins();
                return require_once "../vue/ins/ins_index.php";
            }
        }

        if(!add_ins($inscription)){
            $error = "addins";
            return require_once "../vue/ins/ins_form.php";
        }else {
            $data = get_all_cav();
            return require_once "../vue/cav/cav_index.php";
        }
}