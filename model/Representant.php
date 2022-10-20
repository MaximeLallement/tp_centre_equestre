<?php


function add_rep(Representant $representant)
{
    global $con;
    $sql = "INSERT INTO ".DB_TABLE_PERSONNE." (nom_personne,prenom_personne,date_de_naissance, mail,tel, rue,complement, code_postal, ville ) 
                                    VALUES ( :nom, :prenom, :datenaissance, :mail, :rue , :complement, :codepostal , :ville )";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$representant->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$representant->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$representant->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$representant->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$representant->getTel(),PDO::PARAM_STR);
    $req->bindValue(":rue",$representant->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$representant->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$representant->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$representant->getVille(),PDO::PARAM_STR);

    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function update_rep(Representant $representant, int $id)
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_PERSONNE." 
            SET nom_personne = :nom, 
                                prenom_personne = :prenom ,
                                date_de_naissance = :datenaissance,
                                mail = :mail,
                                tel =  :tel,
                                rue = :rue,
                                complement = :complement,
                                code_postal = :codepostal,
                                ville = :ville
            WHERE id_personne = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":nom",$representant->getNomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":prenom",$representant->getPrenomPersonne(),PDO::PARAM_STR);
    $req->bindValue(":datenaissance",$representant->getDateNaissance(),PDO::PARAM_STR);
    $req->bindValue(":mail",$representant->getMail(),PDO::PARAM_STR);
    $req->bindValue(":tel",$representant->getTel(),PDO::PARAM_STR);
    $req->bindValue(":rue",$representant->getRue(),PDO::PARAM_STR);
    $req->bindValue(":complement",$representant->getComplement(),PDO::PARAM_STR);
    $req->bindValue(":codepostal",$representant->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue(":ville",$representant->getVille(),PDO::PARAM_STR);
    $req->bindValue(":id",$id,PDO::PARAM_INT);


    try {
        $req->execute() ;
        return true; 
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}