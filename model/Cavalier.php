<?php
/* Model Default */


// SELECT

/**
 * Selectionne tous les cavaliers de la table
 * On distingue un cavalier d'un représentant par la valeur de sa license 
 */
function get_all_cav()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE num_licence != :val ;";
    $req = $con->prepare($sql);
    $req->bindValue(':val',0,PDO::PARAM_INT);
    
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
