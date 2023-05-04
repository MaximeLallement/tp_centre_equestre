<?php

/**
 * Selectionne tous les Epreuves de la table
 * On distingue un Epreuve d'un représentant par la valeur de sa license 
 */
function get_all_epr()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_EPREUVE.";";
    $req = $con->prepare($sql);
    
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function get_one_epr(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_EPREUVE." WHERE id_epreuve = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetch();
    } catch (PDOException $e) {
       return $e->getMessage();
   }
}


function add_epr(Epreuve $epreuve)
{
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_EPREUVE." (date_epreuve, id_galop, id_personne) 
                                    VALUES ( :date_epreuve, :id_galop, :id_personne )";
    $req = $con->prepare($sql);
    $req->bindValue(":date_epreuve",$epreuve->getDate(),PDO::PARAM_STR);
    $req->bindValue(":id_galop",$epreuve->getGalop(),PDO::PARAM_STR);
    $req->bindValue(":id_personne",$epreuve->getCavalier(),PDO::PARAM_STR);

    try {
        $req->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function update_epr(Epreuve $epreuve, int $id)
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_EPREUVE." 
            SET date_epreuve = :date_epreuve, 
                id_galop = :id_galop ,
                id_personne = :id_personne 
            WHERE id_epreuve = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":date_epreuve",$epreuve->getDate(),PDO::PARAM_STR);
    $req->bindValue(":id_galop",$epreuve->getGalop(),PDO::PARAM_STR);
    $req->bindValue(":id_personne",$epreuve->getCavalier(),PDO::PARAM_STR);
    $req->bindValue(":id",$id,PDO::PARAM_INT);

    try {
        $req->execute() ;
        return true;  
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
