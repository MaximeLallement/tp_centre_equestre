<?php
require "../inc/bdd.inc.php";

/* CREATE / INSERT INTO
 * 
 * Créer la pension dans la table
 * 
 */
function create_pension(Pension $pension){
    global $con;    
    $sql = "INSERT INTO ".DB_TABLE_PENSION." (`libelle_pension`, `tarif`, `date_de_debut`, `duree`) "
            . "VALUES (:libelle_pension, :tarif, :date_de_debut, :duree);";
    $req = $con->prepare($sql);
    $req->bindValue(':libelle_pension', $pension->getLibelle(), PDO::PARAM_STR);
    $req->bindValue(':tarif', $pension->getTarif(), PDO::PARAM_INT);
    $req->bindValue(':date_de_debut', $pension->getDate_de_debut(), PDO::PARAM_STR);
    $req->bindValue(':duree', $pension->getDuree(), PDO::PARAM_INT);
            
    try {
        $con->exec($sql);
    }
    catch (PDOException $e) {
        return $e->getMessage();
    }
}

/* READ / SELECT
 * 
 * Selectionne toutes les pensions de la table
 * 
 */
function get_all_pension(){
    global $con;
    $sql = "SELECT * FROM ".DB_TABLE_PENSION.";";
    $req = $con->prepare($sql);
    
    try {
         $req->execute();
         return $req->fetchAll();
    }
    catch (PDOException $e) {
        return $e->getMessage();
    }
}

/* UPDATE
 * 
 * Modifie la pension dans la table
 * 
 */
function update_pension()
{
    global $con;
    $sql = "UPDATE ".DB_TABLE_PENSION." SET `libelle_pension`='".$_POST['libelle_pensionU']."', `libelle_pension`='".$_POST['libelle_pensionU']."',";
}

/* DELETE
 * 
 * Supprime la pension dans la table
 * 
 */
?>