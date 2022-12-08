<?php

function add_compte(){
    $username = $_POST['username'];
    $mdp = md5($_POST['mdp']);
    $type = "u";
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_UTILISATEUR." (nom_utilisateur, mdp, type) VALUES (:user, :mdp, :type);";
    $req = $con->prepare($sql);
    //FAIRE PARAM
    $req->bindValue(':user', $username, PDO::PARAM_STR);
    $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $req->bindValue(':type', $type, PDO::PARAM_STR);

    try {
        $req->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}









?>