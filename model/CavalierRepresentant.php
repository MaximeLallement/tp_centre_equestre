<<<<<<< Updated upstream
<?php


function add_cavRep(CavalierRepresentant $cavalierRep){
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_PERSONNE." (nom_personne,prenom_personne,date_de_naissance, mail,tel,photo,num_licence, galop,rue, complement, code_postal, ville ) 
                                    VALUES ( :nom, :prenom, :datenaissance, :mail, :tel, :photo, :numlic, :galop, :rue , :complement, :codepostal, :ville )";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalierRep->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalierRep->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalierRep->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalierRep->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalierRep->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalierRep->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalierRep->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalierRep->getGalop(),PDO::PARAM_INT);
    $req->bindValue(":rue",$cavalierRep->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$cavalierRep->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$cavalierRep->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$cavalierRep->getVille(),PDO::PARAM_STR);

    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function update_cavRep(CavalierRepresentant $cavalierRep, int $id)
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
                                galop = :galop,
                                rue = :rue,
                                complement = :complement,
                                code_postal = :codepostal,
                                ville = :ville
            WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalierRep->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalierRep->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalierRep->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalierRep->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalierRep->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalierRep->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalierRep->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalierRep->getGalop(),PDO::PARAM_INT);
    $req->bindValue(":rue",$cavalierRep->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$cavalierRep->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$cavalierRep->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$cavalierRep->getVille(),PDO::PARAM_STR);
    $req->bindValue(":id",$id,PDO::PARAM_INT);


    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
=======
<?php


function add_cavRep(CavalierRepresentant $cavalierRep){
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_PERSONNE." (nom_personne,prenom_personne,date_de_naissance, mail,tel,photo,num_licence, galop,rue, complement, code_postal, ville ) 
                                    VALUES ( :nom, :prenom, :datenaissance, :mail, :tel, :photo, :numlic, :galop  )";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalierRep->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalierRep->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalierRep->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalierRep->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalierRep->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalierRep->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalierRep->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalierRep->getGalop(),PDO::PARAM_INT);
    $req->bindValue(":rue",$cavalierRep->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$cavalierRep->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$cavalierRep->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$cavalierRep->getVille(),PDO::PARAM_STR);


    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function update_cavRep(CavalierRepresentant $cavalierRep, int $id)
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
                                galop = :galop,
                                rue = :rue,
                                complement = :complement,
                                code_postal = :codepostal,
                                ville = :ville
            WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$cavalierRep->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$cavalierRep->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$cavalierRep->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$cavalierRep->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$cavalierRep->getTel(),PDO::PARAM_STR);
    $req->bindValue(":photo",$cavalierRep->getPhoto(),PDO::PARAM_STR);
    $req->bindValue(":numlic",$cavalierRep->getNlic(),PDO::PARAM_STR);
    $req->bindValue(":galop",$cavalierRep->getGalop(),PDO::PARAM_INT);
    $req->bindValue(":rue",$cavalierRep->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$cavalierRep->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$cavalierRep->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$cavalierRep->getVille(),PDO::PARAM_STR);
    $req->bindValue(":id",$id,PDO::PARAM_INT);


    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
>>>>>>> Stashed changes
}