<?php
require "../inc/bdd.inc.php";
require "../model/Cheval.php";
require "../model/Cavalier.php";
require "../model/Representant.php";
//require "../model/Pension.php";
require "../model/CavalierRepresentant.php";

$headerpath = "../vue/header.php";

/**
 * Retourne la vue qui affiche l'ensemble des Cavaliers 
 */
if(isset($_POST) && $_POST["action"] == "index"){
    
    $data = get_all_che();

    return require_once "../vue/che/che_index.php";
}

/**
 * Retourne la vue qui affiche un cavalier et son représentant s'il en a un
 */
if(isset($_POST) && $_POST["action"] == "show")
{
    $data = get_one_che($_POST["che_id"]);

    if ( isset($data["id_cav"]) && $data["id_cav"] != 0)
    {
        $cav = get_one_cav($data["id_cav"]);
    }

    //$pen = get_pension_che();

    return require_once "../vue/che/che_show.php";
}

/**
 * Retourne la vue qui affiche l'ensemble des Cavaliers après suppression ( SoftDelte ) d'un Cavalier
 */
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_che_by_id($_POST["che_id"]);
    $data = get_all_che();
    
    return require_once "../vue/che/che_index.php";

}


/**
 * Reception des action sur la vue formulaire
 * 
 * Rentre via $_POST["action"] = form
 * 
 * S'execute selon $_POST["subaction"] =
 * new -> redirige sur formulaire vide
 * modify -> redirige sur formulaire pré rempli
 * [null] -> traitement d'ajout d'un cavalier
 * update -> traitement de modification d'un cavalier
 * 
 * 
 */
if(isset($_POST) && $_POST["action"] == "form"){

    /**
     * Affiche la vue de formulaire pour un nouveau cheval
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        return require_once "../vue/che/che_form.php";
    }
    /**
     * Affiche la vue de formulaire pour modifier un cheval existant
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_che($_POST['che_id']);

        $infosaved["id_cheval"]   = $data["id_cheval"] ;
        $infosaved["nom_cheval"]  = $data["nom_cheval"] ;
        $infosaved["sire"]        = $data["SIRE"] ;
        $infosaved["id_robe"] = $data["id_robe"] ;
        $infosaved["photo_cheval"] = $data["photo_cheval"];
        $infosaved["id_cav"] = $data["id_cav"] ;
        
        if(isset($data["id_cav"]) && $data["id_cav"] != ""){

            $cav = get_one_cav($data["id_cav"]);
            $infosaved["nom_cav"] = $cav["nom_personne"] . " " . $cav["prenom_personne"];
        }

        $update = true;

        return require_once "../vue/che/che_form.php";
    }

    
    
    
    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;

    // Validation de l' input photo
    require "../inc/photo.trait.php";
    
    isset($_POST["subaction"]) && $_POST["subaction"] == "update" ? $toUpdate = true : $toUpdate = false ;
    if($_FILES['photo_cheval']['size'] > 0){
        if(!upload_photo($toUpdate, 'photo_cheval', $_POST['nom_cheval']))
        { 
            $error = "error photo";
            return require_once "../vue/cav/cav_form.php";
        }
        $photo = $_FILES['photo_cheval']['name'];

    }else {
        $data = get_one_che( (int)$_POST["id_cheval"]);
        $photo = $data["photo_cheval"];
    }
    
    $cheval = new Cheval(   $_POST['nom_cheval'],
                            $_POST['sire'],
                            (int)$_POST['id_robe'],
                            (int)$_POST["id_cav"],
                            $photo
                        );

    if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        if(!update_che($cheval,$_POST["id_cheval"])){
            $error = "updche";
            return require_once "../vue/che/che_form.php";
        }else {
            $data = get_all_che();
            return require_once "../vue/che/che_index.php";
        }
    }

    if(!add_che($cheval)){
        $error = "addche";
        return require_once "../vue/che/che_form.php";
    }else {
        $data = get_all_che();
        return require_once "../vue/che/che_index.php";
    }

}
