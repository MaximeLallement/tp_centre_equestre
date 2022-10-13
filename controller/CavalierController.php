<?php
require "../inc/bdd.inc.php";
require "../model/Cavalier.php";
$headerpath = "../vue/header.php";

if(isset($_POST) && $_POST["action"] == "index"){
    
    // Recupère les valeurs en base de données puis les passent dans un convertisseur
    $data = get_all_cav();

    return require_once "../vue/cav/cav_index.php";
    
}

if(isset($_POST) && $_POST["action"] == "delete"){
    return var_dump(soft_delete_by_id($_POST["cav_id"]));

}


if(isset($_POST) && $_POST["action"] == "form"){
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "new"){
        
        return require_once "../vue/cav/cav_form.php";
    }
    if(isset($_POST["subaction"] ) && $_POST["subaction"] == "modify"){
        
        $data = get_one_cav($_POST['cav_id']);
        $infosaved["id_personne"]   = $data["id_personne"] ;
        $infosaved["nom"]           = $data["nom_personne"] ;
        $infosaved["prenom"]        = $data["prenom_personne"] ;
        $infosaved["datenaissance"] = $data["date_de_naissance"] ;
        $infosaved["mail"]          = $data["mail"] ;
        $infosaved["tel"]           = $data["tel"] ;
        $infosaved["photo"]         = $data["photo"] ;
        $infosaved["numlic"]        = $data["num_licence"];

        /**
         * if has representant
         * then 
         *  new sql
         *  $infosaved["nomrep"]    = $data["nom_personne"] ;
         *  $infosaved["prenomrep"] = $data["prenom_personne"] ;
         *  $infosaved["prenom"]    = $data["prenom_personne"] ;
         *  $infosaved["mail"]      = $data["mail"] ;
         *  $infosaved["tel"]       = $data["tel"] ;
         *  $infosaved["rue"]       = $data["rue"] ;
         * $infosaved["numaddr"]    = $data["complement"] ;
         *  $infosaved["ville"]     = $data["ville"] ;
         *  $infosaved["pays"]      = $data["pays"] ;
         * 
         */



        return require_once "../vue/cav/cav_form.php";
    }

    
    
    require "../inc/photo.trait.php";

    //Save Information in order to reload form with already filed input in case of error
    $infosaved = $_POST;
    $error = null;

    //test 
    $error = "testerror";
    require_once "../vue/cav/cav_form.php";
    
    

    // Validation des INPUTS
    if(!upload_photo()){ 
        $error= "img";
        require_once "../vue/cav/cav_form.php";
        exit;
    }

    // Vérification de la composition du numéro de license
    // 7 caractères alphabétiques + 1 caractère numérique
    // Plus d'info --> Rechercher "regex php"
    if( !preg_match('/[A-Z]{7}[1-9]{1}/',$_POST["numlic"]) ){
        $error= "numlic";
        require_once "../vue/cav/cav_form.php";

        exit;
    }

    if( isset($_POST["choixRepresentant"]) && $_POST["choixRepresentant"] == "cav"){
        $cavalierRep = new CavalierRepresentant($_POST["nom"],
                                                    $_POST["prenom"],
                                                    $_POST["datenaissance"],
                                                    $_POST["mail"],
                                                    $_POST["tel"],
                                                    $_FILES["photo"]["name"],
                                                    $_POST["galop"],
                                                    $_POST["numlic"],
                                                    $_POST["rue"],
                                                    $_POST["numaddr"],
                                                    $_POST["codep"],
                                                    $_POST["ville"],
                                                    $_POST["pays"]
        );

        // modele function add
        /*if(!add_cavRep($cavalierRep)){
            $error = "addcavrep";
            require_once "../vue/cav/cav_form.php";
            exit;
        }else {
            //Success
        }*/



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
        //modele function add
        /*if(!add_cav($cavalier)){
            $error = "addcav"
            require_once "../vue/cav/cav_form.php";
            exit;

        }else if(!add_rep($representant)){
            $error = "addrep";
            require_once "../vue/cav/cav_form.php";
            exit;

        }else{
            //Success
        }*/
    }

    //header("Location: http://localhost/2a/tp_centre_equestre/vue/cav/cav_form.php?formFailed=true&reason=$error");


}




