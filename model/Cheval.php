<?php

/**
 * Selectionne tous les chevals de la table
 * On distingue un cheval d'un représentant par la valeur de sa license 
 */
function get_all_che()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_CHEVAL." WHERE valid = :valid;";
    $req = $con->prepare($sql);
    $req->bindValue(':valid',1,PDO::PARAM_INT);
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function get_one_che(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_CHEVAL." WHERE id_cheval = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetch();
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}


function add_che(Cheval $cheval)
{
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_CHEVAL." (SIRE,nom_cheval,id_robe,id_cav, photo_cheval) 
                                    VALUES ( :sire, :nom_cheval, :id_robe , :id_cav, :photo_cheval);";
    $req = $con->prepare($sql);
    //FAIRE PARAM
    $req->bindValue(":sire",$cheval->getSIRE(),PDO::PARAM_STR);
    $req->bindValue(":nom_cheval",$cheval->getNom(),PDO::PARAM_STR);
    $req->bindValue(":id_robe",$cheval->getRobe(),PDO::PARAM_INT);
    $req->bindValue(":id_cav",$cheval->getCavalier(),PDO::PARAM_INT);
    $req->bindValue(":photo_cheval",$cheval->getPhoto(),PDO::PARAM_STR);

    try {
        $req->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function soft_delete_che_by_id(int $id){
    global $con;
    $sql = "UPDATE ".DB_TABLE_CHEVAL." SET valid = :valid WHERE id_cheval = :id ;";
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


function update_che(Cheval $cheval, int $id)
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_CHEVAL." SET nom_cheval = :nom_cheval, 
                                            SIRE = :sire ,
                                            id_robe = :id_robe ,
                                            id_cav = :id_cav ,
                                            photo_cheval = :photo_cheval 
                                        WHERE id_cheval = :id ;";
    $req = $con->prepare($sql);
    // FAIRE PARAM
    $req->bindValue(":sire",$cheval->getSIRE(),PDO::PARAM_STR);
    $req->bindValue(":nom_cheval",$cheval->getNom(),PDO::PARAM_STR);
    $req->bindValue(":id_robe",$cheval->getRobe(),PDO::PARAM_INT);
    $req->bindValue(":id_cav",$cheval->getCavalier(),PDO::PARAM_INT);
    $req->bindValue(":photo_cheval",$cheval->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":id",$id,PDO::PARAM_INT);


    try {
        $req->execute() ;
        return true;  
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
