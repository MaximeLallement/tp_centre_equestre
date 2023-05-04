<?php

/**
 * Selectionne tous les inscriptions de la table
 * On distingue un inscription d'un représentant par la valeur de sa license 
 */
function get_all_ins()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_INSCRIPTION." WHERE valid = :valid;";
    $req = $con->prepare($sql);
    $req->bindValue(':valid',1,PDO::PARAM_INT);
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function get_one_ins(int $id){
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

function get_ins_one_cav(int $id){
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



function add_ins(Inscription $inscription)
{
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_INSCRIPTION." (montant_cotisation, montant_ffe, annee,id_cav) 
                                    VALUES ( :ins_cotisation, :ins_ffe, :ins_annee , :id_cav);";
    $req = $con->prepare($sql);
    //FAIRE PARAM
    $req->bindValue(":ins_cotisation",$inscription->getCottisation(),PDO::PARAM_INT);
    $req->bindValue(":ins_ffe",$inscription->getFFE(),PDO::PARAM_INT);
    $req->bindValue(":ins_annee",$inscription->getAnnee(),PDO::PARAM_STR);
    $req->bindValue(":id_cav",$inscription->getCav(),PDO::PARAM_INT);
    try {
        $req->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function soft_delete_ins_by_id(int $id){
    global $con;
    $sql = "UPDATE ".DB_TABLE_INSCRIPTION." SET valid = :valid WHERE id_inscription = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':valid',0,PDO::PARAM_INT);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return true;
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}


function update_ins(Inscription $inscription, int $id)
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_INSCRIPTION." SET montant_cotisation = :ins_cotisation, 
                                            montant_ffe = :ins_ffe ,
                                            annee = :ins_annee ,
                                            id_cav = :id_cav 
                                        WHERE id_inscription = :id ;";
    $req = $con->prepare($sql);
    // FAIRE PARAM
    $req->bindValue(":ins_cotisation",$inscription->getCottisation(),PDO::PARAM_INT);
    $req->bindValue(":ins_ffe",$inscription->getFFE(),PDO::PARAM_INT);
    $req->bindValue(":ins_annee",$inscription->getAnnee(),PDO::PARAM_STR);
    $req->bindValue(":id_cav",$inscription->getCav(),PDO::PARAM_INT);
    $req->bindValue(":id",$id,PDO::PARAM_INT);
    try {
        $req->execute() ;
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
