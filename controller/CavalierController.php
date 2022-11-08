<?php
require "../inc/bdd.inc.php";
require "../model/Cavalier.php";
require "../model/Representant.php";
require "../model/CavalierRepresentant.php";

$headerpath = "../vue/header.php";

/**
 * Retourne la vue qui affiche l'ensemble des Cavaliers 
 */
    if(isset($_POST) && $_POST["action"] == "index"){
    
    $data = get_all_cav();

    return require_once "../vue/cav/cav_index.php";

}

/**
 * Retourne la vue qui affiche un cavalier et son représentant s'il en a un
 */
if(isset($_POST) && $_POST["action"] == "show")
{
    $data = get_one_cav($_POST["cav_id"]);

    if ( isset($data["id_representant"]) && $data["id_representant"] != 0)
    {
        $rep = get_one_cav($data["id_representant"]);
    }

    return require_once "../vue/cav/cav_show.php";
}

/**
 * Retourne la vue qui affiche l'ensemble des Cavaliers après suppression ( SoftDelte ) d'un Cavalier
 */
if(isset($_POST) && $_POST["action"] == "delete"){

    soft_delete_cav_by_id($_POST["cav_id"]);
    
    return require_once "../vue/cav/cav_index.php";

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
     * Affiche la vue de formulaire pour un nouveau cavalier
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        return require_once "../vue/cav/cav_form.php";
    }
    /**
     * Affiche la vue de formulaire pour modifier un cavalier existant
     */
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_cav($_POST['cav_id']);

        $infosaved["id_personne"]   = $data["id_personne"] ;
        $infosaved["nom"]           = $data["nom_personne"] ;
        $infosaved["prenom"]        = $data["prenom_personne"] ;
        $infosaved["datenaissance"] = $data["date_de_naissance"] ;
        $infosaved["mail"]          = $data["mail"] ;
        $infosaved["tel"]           = $data["tel"] ;
        $infosaved["photo"]         = $data["photo"] ;
        $infosaved["numlic"]        = $data["num_licence"] ;

        
         if ( isset($data["id_representant"]) && $data["id_representant"] != 0){

            $infosaved["id_representant"] = $data["id_representant"];
            $data = get_one_cav($data['id_representant']);

            $infosaved["nomrep"]    = $data["nom_personne"] ;
            $infosaved["prenomrep"] = $data["prenom_personne"] ;
            $infosaved["datenaissancerep"]    = $data["date_de_naissance"] ;
            $infosaved["mailrep"]   = $data["mail"] ;
            $infosaved["telrep"]    = $data["tel"] ;

        }
            
        $infosaved["rue"]           = $data["rue"] ;
        $infosaved["numaddr"]       = $data["complement"] ;
        $infosaved["codep"]         = $data["code_postal"];
        $infosaved["ville"]         = $data["ville"] ;
        $infosaved["pays"]          = "Pays" ;
        
        
        $update = true;

        return require_once "../vue/cav/cav_form.php";
        
    }

    
    
    
    //Sauvegarde en cas de rafraichissement de la page ou d'erreur formulaire
    $infosaved = $_POST;

    // Validation de l' input photo
    require "../inc/photo.trait.php";
    
    isset($_POST["subaction"]) && $_POST["subaction"] == "update" ? $toUpdate = true : $toUpdate = false ;
    if($_FILES['photo']['size'] > 0){
        if(!upload_photo($toUpdate)){ 
            $error = "error photo";
            return require_once "../vue/cav/cav_form.php";
        }
        $photo = $_FILES['photo']['name'];
    }else {
        $data = get_one_cav($_POST["id_personne"]);
        $photo = $data["photo"];
    }

    // Validation de la composition du numéro de license
    // 7 caractères alphabétiques + 1 caractère numérique
    // Plus d'info --> Rechercher "regex php"
    if( !preg_match('/[A-Z]{7}[1-9]{1}/',$_POST["numlic"]) ){
        $error= "numlic";
        return require_once "../vue/cav/cav_form.php";
    }

    if( isset($_POST["choixRepresentant"]) && $_POST["choixRepresentant"] == "cav"){
        $cavalierRep = new CavalierRepresentant($_POST["nom"],
                                                    $_POST["prenom"],
                                                    $_POST["datenaissance"],
                                                    $_POST["mail"],
                                                    $_POST["tel"],
                                                    $photo,
                                                    $_POST["galop"],
                                                    $_POST["numlic"],
                                                    $_POST["rue"],
                                                    $_POST["numaddr"],
                                                    $_POST["codep"],
                                                    $_POST["ville"],
                                                    $_POST["pays"]
        );

        if ( isset($_POST["subaction"] ) && $_POST["subaction"] == "update") {
            if(!update_cavRep($cavalierRep,$_POST["id_personne"])){
                $error = "updcav";
                echo $error;
                return require_once "../vue/cav/cav_form.php";
            }else {
                //var_dump(update_cavRep($cavalierRep,$_POST["id_personne"]));
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
                                    $photo,
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
            return require_once "../vue/cav/cav_form.php";
        }else if(!update_rep($representant,$_POST["idrep"])){
            $error = "updrep";
            return require_once "../vue/cav/cav_form.php";
        }else{
           $data = get_all_cav();
           //var_dump(update_cav($cavalier,$_POST["id_personne"]));
           //var_dump(update_rep($representant,$_POST["idrep"]));

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
    }
}