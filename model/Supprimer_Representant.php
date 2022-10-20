<?php
require('../inc/bdd.inc.php');
return require('../model/Liste_Representant.php');

function soft_delete(){
    global $id; 
    global $con;
    $sql = "UPDATE ".DB_TABLE_PERSONNE." SET is_visible = 0 WHERE id_personne = :id_personne";
    $req = $con->prepare($sql);
    $req->BindValue(':id_personne', $id, PDO::PARAM_INT);

    try {
        $req = $con->query($sql);
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

soft_delete();











?>