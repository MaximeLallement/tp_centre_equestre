<?php

/**
 * Selectionne tous les chevals de la table
 * On distingue un cheval d'un représentant par la valeur de sa license 
 */
function get_all_rob()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_ROBE.";";
    $req = $con->prepare($sql);
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function get_rob_by_id(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_ROBE." WHERE id_robe = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetch();
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}
