<?php 
require_once "../inc/bdd.inc.php";
require ".././model/Representant.php";
require ".././controller/ConnexionController.php";
$headerpath = "../vue/header.php"; //Enregistre dans une variable le header 'vue/header.php'


if(isset($_POST["showAll"])){

    $data = get_all_rep();
    return require_once "../vue/rep/rep_index.php";

}

if(isset($_POST["showOne"])){ //Affiche le représentant sélectionné dans 'rep_index.php'

    $rep = get_one_rep($_POST["rep_id"]); //Id récupéré dans 'rep_index.php' dans le bouton 'Afficher'

    return require_once "../vue/rep/rep_show.php";

}

if(isset($_POST["modify"])){ //Génère la page de modification d'une personne

    $data = get_one_rep($_POST['rep_id']); //Récupère les infos relatives au représentant dont son id est spécifié dans 'rep_index.php' dans le bouton 'Modifier'

        $infosaved["rep_id"]            = $data["id_personne"] ;
        $infosaved["rep_nom"]           = $data["nom_personne"] ;
        $infosaved["rep_prenom"]        = $data["prenom_personne"] ;
        $infosaved["rep_dna"]           = $data["date_de_naissance"] ;
        $infosaved["rep_mail"]          = $data["mail"] ;
        $infosaved["rep_tel"]           = $data["tel"] ;
        $infosaved["rep_rue"]           = $data["rue"];
        $infosaved["rep_complement"]    = $data["complement"];
        $infosaved["rep_cp"]            = $data["code_postal"] ;
        $infosaved["rep_ville"]         = $data["ville"];

    return require_once "../vue/rep/rep_form.php";

}

if (isset($_POST["modify_validation"])){ //Modifie les infos relative à une personne

    $representant = new Representant($_POST["rep_nom"], //Instanciation d'un représentant en récupérant les valeurs des champs du formulaire 'rep_form.php'
        $_POST["rep_prenom"],
        $_POST["rep_dna"],
        $_POST["rep_mail"],
        $_POST["rep_tel"],
        $_POST["rep_rue"],
        $_POST["rep_complement"],
        $_POST["rep_cp"],
        $_POST["rep_ville"],
        ""
    );

    update_rep($representant, $_POST["rep_id"]);
    return require_once "../vue/rep/rep_index.php";

}

if(isset($_POST["delete"])){

    soft_delete_rep_by_id($_POST["rep_id"]);
    $data = get_all_rep();
    return require_once "../vue/rep/rep_index.php";

}

?>