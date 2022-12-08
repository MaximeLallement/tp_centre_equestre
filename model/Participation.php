<?php

/**
 * Selectionne tous les inscriptions de la table
 * On distingue un inscription d'un représentant par la valeur de sa license 
 */
function get_all_weekly_part_by_id(int $id,int $actif)
{
    global $con;
    $sql = "SELECT P.id_cour,P.id_week_cour,P.id_cav,C.start_event,C.end_event,C.title
	        FROM ".DB_TABLE_PARTICIPATION." as P
	        inner join ".DB_TABLE_COURS." as C ON C.id_cours = P.id_cour  
                WHERE P.actif = :actif 
                AND P.id_cav = :id_cav
                AND week(now()) = week(C.start_event)
                AND id_week_cour = week(now())
                AND year(C.start_event) = year(now());";
    $req = $con->prepare($sql);
    $req->bindValue(':actif',$actif,PDO::PARAM_INT);
    $req->bindValue(':id_cav',$id,PDO::PARAM_INT);
    try {
         $req->execute();
         return $req->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function add_part(int $id_cav,int $id_cours){
    global $con;

    
    //Selectionne le nombre de cours selon l'id cours
    //J'insère une ligne par cour pour chaque participation de l'utilisateur
    //Check si la participation existe déja
    $sql = "SELECT * FROM ".DB_TABLE_PARTICIPATION." WHERE id_cav = :id_cav AND id_cour = :id_cour ";
    $req = $con->prepare($sql);
    $req->bindValue(':id_cour',$id_cours,PDO::PARAM_INT);
    $req->bindValue(':id_cav',$id_cav,PDO::PARAM_INT);
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    if ($result)  {
        return false;
    }
    
    $sql = "SELECT count(*) as NbrRow FROM ".DB_TABLE_COURS." WHERE id_cours = :id_cours;  ";
    $req = $con->prepare($sql);
    $req->bindValue(':id_cours',$id_cours,PDO::PARAM_INT);

    $req->execute();
    $result = $req->fetch();
    $weekid = 0;
    for ($i=0; $i < $result[0]; $i++) { 
            $sql = "INSERT INTO ".DB_TABLE_PARTICIPATION." (id_cour,id_week_cour,id_cav) 
                                                    VALUES (:id_cour,:id_week_cour,:id_cav) ;";
            $req = $con->prepare($sql);
            $req->bindValue(':id_cour',$id_cours,PDO::PARAM_INT);
            $req->bindValue(':id_week_cour',$weekid,PDO::PARAM_INT);
            $req->bindValue(':id_cav',$id_cav,PDO::PARAM_INT);

            $req->execute();
            $weekid++;
    }

}

function upd_del_one_by_id(int $id_cours,int $id_week,int $id_cav,int $actif){
    global $con;
    $sql = "UPDATE ".DB_TABLE_PARTICIPATION." SET actif = :actif
                                            WHERE id_cour = :id_cour
                                                AND id_week_cour = :id_week_cour
                                                AND id_cav = :id_cav ;";
    $req = $con->prepare($sql);
    $req->bindValue(':id_cour',$id_cours,PDO::PARAM_INT);
    $req->bindValue(':id_week_cour',$id_week,PDO::PARAM_INT);
    $req->bindValue(':id_cav',$id_cav,PDO::PARAM_INT);
    $req->bindValue(':actif',$actif,PDO::PARAM_INT);
    
    try {
        $req->execute();
   } catch (PDOException $e) {
       return $e->getMessage();
   }

}

