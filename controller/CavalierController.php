<?php
require "../inc/bdd.inc.php";
require "../model/Cavalier.php";


if(isset($_POST) && $_POST["action"] == "index"){
    
    // Recupère les valeurs en base de données puis les passent dans un convertisseur
    $data = serialize(get_all_cav());
    
    header("Location: http://localhost/2a/tp_centre_equestre/vue/cav/cav_index.php?data=$data");
    //header('HTTP/1.1 307 Temporary Redirect');

}

if(isset($_POST["action"] ) && $_POST["action"] == "form"){
    
    if ( isset($_POST['subaction']) && $_POST["subaction"] == "modify") {

        // GET DATA FROM MODEL
        header("Location: http://localhost/2a/tp_centre_equestre/vue/cav/cav_form.php?");

    }else {

        header("Location: http://localhost/2a/tp_centre_equestre/vue/cav/cav_form.php?");

    }
}

if(isset($_POST) && $_POST["action"] == "add"){
    
    /**
     * Traitement
     */
    // MODEL FUNCTION ADD
    header("Location: http://localhost/2a/tp_centre_equestre/vue/cav/cav_form.php?");

}