<?php
require "../inc/bdd.inc.php";
require "../model/Pension.php";
require "../model/Cheval.php";

$headerpath = "../vue/header.php";

/**
 * Retourne la vue qui affiche l'ensemble des Pensions 
 */
if(isset($_POST) && $_POST["action"] == "index"){
    
    $data=get_all_pension();

    return require_once "../vue/pen/pen_index.php";

}

/**
 * Retourne la vue qui affiche une Pension
 */
if(isset($_POST) && $_POST["action"] == "show")
{
    $data = get_one_pen($_POST["pen_id"]);

    if ( isset($data["id_pension"]) && $data["id_pension"] != 0)
    {
        $pen = get_one_pen($data["id_pension"]);
    }

    return require_once "../vue/pen/pen_show.php";
}

/**
 * Retourne la vue qui affiche l'ensemble des Pensions après suppression ( SoftDelte ) d'une Pension
 */
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_pen_by_id($_POST["pen_id"]);
    
    $data=get_all_pension();
    
    return require_once "../vue/pen/pen_index.php";

}

/**
 * Reception des action sur la vue formulaire
 * 
 * Rentre via $_POST["action"] = form
 * 
 * S'execute selon $_POST["subaction"] =
 * new -> redirige sur formulaire vide
 * modify -> redirige sur formulaire pré rempli
 * [null] -> traitement d'ajout d'une pension
 * update -> traitement de modification d'une pension
 * 
 * 
 */
if(isset($_POST) && $_POST["action"] == "form"){

    /**
     * Affiche la vue de formulaire pour une nouvelle pension
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        return require_once "../vue/pen/pen_form.php";
    }
    /**
     * Affiche la vue de formulaire pour modifier une pension existante
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_pen($_POST['pen_id']);
     
        $infosaved["id_pension"]    = $data["id_pension"] ;
        $infosaved["libelle"]       = $data["libelle_pension"] ;
        $infosaved["tarif"]         = $data["tarif"] ;
        $infosaved["date_de_debut"] = $data["date_de_debut"] ;
        $infosaved["duree"]         = $data["duree"] ;
        $infosaved["id_cheval"]     = $data["id_cheval"];
        
        if(isset($data["id_cheval"]) && $data["id_cheval"] != ""){

            $che = get_one_che($data["id_cheval"]);
            $infosaved["nom_cheval"] = $che["nom_cheval"];
        }
        
        $update = true;

        return require_once "../vue/pen/pen_form.php";
    }

    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;
    $error = null;

    $pension = new Pension($_POST["tarif"], $_POST["duree"], $_POST["date_de_debut"], $_POST["libelle"], $_POST["id_cheval"]);
    
    if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        
        // Créer $pension comme obejt Pension
        if(!update_pension($pension,$_POST["id_pension"])){
            $error = "updpen";
            echo $error;
            return require_once "../vue/pen/pen_form.php";
        }else {
            //var_dump(update_pension($pension,$_POST["id_pension"]));
            $data = get_all_pension();
            return require_once "../vue/pen/pen_index.php";
        }
    }

        if(!create_pension($pension)){
            $error = "addpen";
            return require_once "../vue/pen/pen_form.php";
        }else {
            $data = get_all_pension();
            return require_once "../vue/pen/pen_index.php";
        }

    }else{
        $pension = new Pension(     $_POST["libelle"],
                                    $_POST["tarif"],
                                    $_POST["date_de_debut"],
                                    $_POST["duree"],
                                    $_POST["id_cheval"]
    );

    if (isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        if(!update_pension($pension,$_POST["id_pension"])){
            $error = "updpen";
            echo $error;
            return require_once "../vue/pen/pen_form.php";
        }else{
           $data = get_all_pension();
           //var_dump(update_pension($pension,$_POST["id_pension"]));
           return require_once "../vue/pen/pen_index.php";
        }
    }
        
        if(!create_pension($pension)){
            $error = "addpen";
            return require_once "../vue/pen/pen_form.php";
        }else{
           $data = get_all_pension();
           return require_once "../vue/pen/pen_index.php";
        }
    }
