<?php

// Insertion des données d'un représentant
// INSERT
// Récupérer les valeurs du formulaire et les insérer dans la base
require('../inc/bdd.inc.php');

function create_cav_rep()
{
    global $con;
    $nom = $_POST['nom_personne'];
    $prenom = $_POST['prenom_personne'];
    $date = $_POST['date_personne'];
    $m = $_POST['mail_personne'];
    $tel = $_POST['tel_personne'];
    $num = $_POST['licence_personne'];
    $r = $_POST['rue_personne'];
    $n = $_POST['complement_personne'];
    $cp = $_POST['cp_personne'];
    $v = $_POST['ville_personne'];

    $sql = "INSERT INTO ".DB_TABLE_PERSONNE."
    (nom_personne, prenom_personne, date_de_naissance, mail, tel, num_licence, rue, complement, code_postal, ville) 
    VALUES('".$nom."', '".$prenom."', '".$date."', '".$m."', '".$tel."', '".$num."', '".$r."', '".$n."', '".$cp."', '".$v."');";
    $req = $con->prepare($sql);
    
    try {
        $req->execute();
    } catch (PDOException $e) {
        return $e->getMessage();
    }

    echo "Formulaire envoyé";
}

create_cav_rep();


?>