<?php
require "../inc/bdd.inc.php";
require "../model/Cavalier.php";
require "../model/Representant.php";
require "../model/CavalierRepresentant.php";
require "../model/Inscription.php";
require "../model/Participation.php";

$headerpath = "../vue/header.php";


if(isset($_POST["action"]) && $_POST["action"] == "add"){

    add_part($_POST["id_cav"],$_POST["id_cours"]);
    $_SESSION["action"] = "show";
    $_SESSION["cav_id"] = $_POST['id_cav'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if(isset($_POST["action"]) && $_POST["action"] == "update"){

    upd_del_one_by_id($_POST["id_cours"],$_POST["id_week_cour"],$_POST['id_cav'],$_POST["actif"]);
    $_SESSION["action"] = "show";
    $_SESSION["cav_id"] = $_POST['id_cav'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if(isset($_POST["action"]) && $_POST["action"] == "delete"){

    del_many_by_id($_POST["id_cours"],$_POST['id_cav']);
    $_SESSION["action"] = "show";
    $_SESSION["cav_id"] = $_POST['id_cav'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}