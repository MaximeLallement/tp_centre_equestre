<?php
require "../inc/bdd.inc.php";
require "../model/Pension.php";

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
        $rep = get_one_pen($data["id_pension"]);
    }

    return require_once "../vue/pen/pen_show.php";
}

/**
 * Retourne la vue qui affiche l'ensemble des Pensions après suppression ( SoftDelte ) d'une Pension
 */
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_pen_by_id($_POST["pen_id"]);
    
    return require_once "../vue/pen/pen_index.php";

}

/*
 *
 * Retourne la vue qui affiche une pension
 * 
 */

if(isset($_POST) && $_POST["action"] == "show")
{
    $data = get_one_pen($_POST["pen_id"]);

    if ( isset($data["id_pension"]))
    {
        $rep = get_one_cav($data["id_pension"]);
    }

    return require_once "../vue/pen/pen_show.php";
}

/**
 * Retourne la vue qui affiche l'ensemble des Pension après suppression ( SoftDelte ) d'une Pension
*/
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_pen_by_id($_POST["pen_id"]);
    
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
 * [null] -> traitement d'ajout d'un cavalier
 * update -> traitement de modification d'un cavalier
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
        $infosaved["labelle"]       = $data["labelle_pension"] ;
        $infosaved["tarif"]         = $data["tarif"] ;
        $infosaved["datenaissance"] = $data["date_de_debut"] ;
        $infosaved["duree"]          = $data["duree"] ;
        
        $update = true;

        return require_once "../vue/pen/pen_form.php";
        
    }

    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;
    $error = null;

/*
    if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        if(!update_penRep($cavalierRep,$_POST["id_personne"])){
            $error = "updcav";
            echo $error;
            return require_once "../vue/cav/cav_form.php";
        }else {
            var_dump(update_cavRep($cavalierRep,$_POST["id_personne"]));
            $data = get_all_cav();
            return require_once "../vue/cav/cav_index.php";
        }
    }

        if(!add_cavRep($cavalierRep)){

            $error = "addcavrep";
            return require_once "../vue/cav/cav_form.php";
        }else {
            $data = get_all_cav();
            return require_once "../vue/cav/cav_index.php";
        }

    }else{
        $cavalier = new Cavalier($_POST["nom"],
                                    $_POST["prenom"],
                                    $_POST["datenaissance"],
                                    $_POST["mail"],
                                    $_POST["tel"],
                                    $_FILES["photo"]["name"],
                                    $_POST["galop"],
                                    $_POST["numlic"]
    );
        $representant = new Representant($_POST["nomrep"],
                                            $_POST["prenomrep"],
                                            $_POST["datenaissancerep"],
                                            $_POST["mailrep"],
                                            $_POST["telrep"],
                                            $_POST["rue"],
                                            $_POST["numaddr"],
                                            $_POST["codep"],
                                            $_POST["ville"],
                                            $_POST["pays"]
    );

    if (isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
        if(!update_cav($cavalier,$_POST["id_personne"])){
            $error = "updcav";
            echo $error;
            return require_once "../vue/cav/cav_form.php";
        }else if(!update_rep($representant,$_POST["idrep"])){
            $error = "updrep";
            echo $error;
            return require_once "../vue/cav/cav_form.php";
        }else{
           $data = get_all_cav();
           var_dump(update_cav($cavalier,$_POST["id_personne"]));
           var_dump(update_rep($representant,$_POST["idrep"]));

           return require_once "../vue/cav/cav_index.php";
        }
    }
        
        if(!add_cav($cavalier)){
            $error = "addcav";
            return require_once "../vue/cav/cav_form.php";
        }else if(!add_rep($representant)){
            $error = "addrep";
            return require_once "../vue/cav/cav_form.php";
        }else{
           $data = get_all_cav();
           return require_once "../vue/cav/cav_index.php";
        }
    }*/
}
