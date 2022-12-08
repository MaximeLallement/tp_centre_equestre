<?php

/**
 * Selectionne tous les inscriptions de la table
 * On distingue un inscription d'un représentant par la valeur de sa license 
 */
function get_all_cou()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_COURS." WHERE actif = :actif GROUP BY id_cours;";
    $req = $con->prepare($sql);
    $req->bindValue(':actif',1,PDO::PARAM_INT);
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function a(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_INSCRIPTION." WHERE id_inscription = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetch();
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}

function b(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_INSCRIPTION." WHERE id_cav = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetchAll();
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}

