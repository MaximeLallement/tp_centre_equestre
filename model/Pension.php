<?php
require "../bdd.inc.php";

/* CREATE / INSERT INTO
 * 
 * Créer la pension dans la table
 * 
 */
function create_pension(){
    global $con;    
    $sql = "INSERT INTO ".DB_TABLE_PENSION." VALUES (NULL, '".$_POST['libelle_pension']."', '".$_POST['tarif']."', '".$_POST['date_de_debut']."', '".$_POST['duree']."')";
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