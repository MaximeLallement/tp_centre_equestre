<?php

require('../inc/bdd.inc.php');

global $con;
$sql = "SELECT nom_personne, prenom_personne, tel, mail, rue, complement FROM personne
            WHERE DATEDIFF(NOW(), date_de_naissance) / 365 > 18"; //Sélectionne personnes ayant plus de 18 ans

$req = $con->prepare($sql);
$req->execute(array($sql));
$result = $req->fetchAll();

foreach($result as $row){ //Parcours de la liste des personnes ayant plus de 18 ans, et affichage de leurs propriétés
        echo utf8_encode("
            $row[nom_personne] <br> 
            $row[prenom_personne] <br> 
            $row[tel] <br>
            $row[mail] <br> 
            $row[rue] <br> 
            $row[complement] <br><br>
        ");
    }




















?>