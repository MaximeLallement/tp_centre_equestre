<?php

/**
 * Selectionne tous les cavaliers de la table
 * On distingue un cavalier d'un représentant par la valeur de sa license 
 */
function get_all_cav()
{
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE num_licence != :val AND actif = :actif ;";
    $req = $con->prepare($sql);
    $req->bindValue(':actif',1,PDO::PARAM_INT);
    $req->bindValue(':val',"",PDO::PARAM_STR);
    
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function get_one_cav(int $id){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_PENSION." WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        $req->execute();
        return $req->fetch();
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}


function add_cav(Cavalier $cavalier)
{
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_PERSONNE." (nom_personne,prenom_personne,date_de_naissance, mail,tel,photo,num_licence, galop) 
                                    VALUES ( :nom, :prenom, :datenaissance, :mail, :tel, :photo, :numlic, :galop )";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalier->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalier->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalier->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalier->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalier->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalier->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalier->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalier->getGalop(),PDO::PARAM_INT);

    try {
        $req->execute();
        return true;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function soft_delete_by_id(int $id){
    global $con;
    $sql = "UPDATE ".DB_TABLE_PERSONNE." SET actif = :actif WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(':actif',0,PDO::PARAM_INT);
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    
    try {
        
        $req->execute();
        return true;
   } catch (PDOException $e) {
       return $e->getMessage();
   }
}


function update_cav(Cavalier $cavalier, int $id)
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_PERSONNE." 
            SET nom_personne = :nom, 
                                prenom_personne = :prenom ,
                                date_de_naissance = :datenaissance,
                                mail = :mail,
                                tel =  :tel,
                                photo = :photo,
                                num_licence = :numlic,
                                galop = :galop  
            WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalier->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalier->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalier->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalier->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalier->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalier->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalier->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalier->getGalop(),PDO::PARAM_INT);
    $req->bindValue(":id",$id,PDO::PARAM_INT);


    try {
        $req->execute() ;
        return true;  
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
