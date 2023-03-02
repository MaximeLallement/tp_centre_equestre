<?php
require_once '../inc/bdd.inc.php';
$headerpath = "../vue/header.php";

if(isset($_POST["action"]) && $_POST["action"] == "cours"){
    return require_once "../vue/cours/cours_management.php";
}
