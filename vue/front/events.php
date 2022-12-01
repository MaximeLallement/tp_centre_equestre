<?php  
//echo json_encode("level-0");
//echo json_encode($_POST["action"]);

require "../../inc/bdd.inc.php";
require "../../model/Cavalier.php";
require "../../model/Representant.php";
require "../../model/CavalierRepresentant.php";


$headerpath = "../vue/header.php";
  

if(isset($_POST) && $_POST["action"] == "add"){
    global $con;

    $start = new DateTime($_POST["start_event"]);
    $end = new DateTime($_POST["end_event"]);
    $date_end = new DateTime($_POST["date_end"]);


    $sql = "INSERT INTO ".DB_TABLE_EVENT." (  start_event, end_event, title, actif ) 
    VALUES ( :date_debut, :date_fin, :titre, :actif )";
    $req = $con->prepare($sql);
    $req->bindValue(":date_debut",$start->format("Y-m-d h:m-s"),PDO::PARAM_STR);
    $req->bindValue(":date_fin",$end->format("Y-m-d h:m-s"),PDO::PARAM_STR);
    $req->bindValue(":titre",$_POST["title"],PDO::PARAM_STR);
    $req->bindValue(":actif",1,PDO::PARAM_INT);

    echo json_encode($req->execute());

    $sql = "SELECT LAST_INSERT_ID() FROM ".DB_TABLE_EVENT." ;";
    $req = $con->prepare($sql);
    $req->execute();
    $resultat = $req->fetch();

    $id = $resultat[0];
    $weekid = 1;
    while ($date_end > $start) {

        $start = date_add($start, date_interval_create_from_date_string("7 days"));
        $end = date_add($end, date_interval_create_from_date_string("7 days"));

        $sql = "INSERT INTO ".DB_TABLE_EVENT." ( id, weekid, start_event, end_event, title, actif ) 
        VALUES ( :id, :weekid, :date_debut, :date_fin, :titre, :actif );";
        $req = $con->prepare($sql);
        $req->bindValue(":date_debut",$start->format("Y-m-d h:m-s"),PDO::PARAM_STR);
        $req->bindValue(":date_fin",$end->format("Y-m-d h:m-s"),PDO::PARAM_STR);
        $req->bindValue(":titre",$_POST["title"],PDO::PARAM_STR);
        $req->bindValue(":actif",1,PDO::PARAM_INT);
        $req->bindValue(":weekid",$weekid,PDO::PARAM_INT);
        $req->bindValue(":id",$id,PDO::PARAM_INT);
        echo json_encode($req->execute());
        $weekid++;

    }
    
    exit;

}
if(isset($_POST) && $_POST["action"] == "update"){
    global $con;

    $sql = "SELECT * FROM ".DB_TABLE_EVENT." WHERE id = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":id",$_POST["id"]);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row ) {

        //Incremente les date de début et de fin des nouvelles valeurs
        $start = date_add( new Datetime($row["start_event"]), date_interval_create_from_date_string($_POST["delta_days"]."days"));
        $start = date_add( $start, date_interval_create_from_date_string($_POST["delta_hours"]."hours"));
        $start = date_add( $start, date_interval_create_from_date_string($_POST["delta_minutes"]."minutes"));

        $end = date_add(new Datetime($row["end_event"]), date_interval_create_from_date_string( $_POST["delta_days"]." days"));
        $end = date_add($end, date_interval_create_from_date_string( $_POST["delta_days"]." hours"));
        $end = date_add($end, date_interval_create_from_date_string( $_POST["delta_days"]." minutes"));

        $sql = "UPDATE ".DB_TABLE_EVENT." SET start_event = :date_debut, end_event = :date_fin, title = :titre
                                        WHERE id = :id AND weekid = :weekid ;";
        $req = $con->prepare($sql);

        $req->bindValue(":date_debut",$start->format("Y-m-d H:i:s"),PDO::PARAM_STR);
        $req->bindValue(":date_fin",$end->format("Y-m-d H:i:s"),PDO::PARAM_STR);
        $req->bindValue(":titre",$row["title"],PDO::PARAM_STR);
        $req->bindValue(":id",$row["id"],PDO::PARAM_INT);
        $req->bindValue(":weekid",$row["weekid"],PDO::PARAM_INT);
        echo json_encode($req->execute());
    }
    
    exit;
}

if(isset($_POST) && $_POST["action"] == "delete"){
    global $con;
    $sql = "UPDATE ".DB_TABLE_EVENT." SET actif = :actif WHERE id = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
    $req->bindValue(":actif", 0, PDO::PARAM_BOOL);
        
    echo json_encode($req->execute());
    
    exit;

}

if(isset($_POST) && $_POST["action"] == "resize"){
    global $con;

    $sql = "SELECT * FROM ".DB_TABLE_EVENT." WHERE id = :id ;";
    $req = $con->prepare($sql);
    $req->bindValue(":id",$_POST["id"]);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row ) {

        
        $date = date_add( new Datetime($row["end_event"]), date_interval_create_from_date_string($_POST["start_delta_m"]." minutes"));
        $date = date_add( $date, date_interval_create_from_date_string( $_POST["start_delta_h"]." hours"));

        $sql = "UPDATE ".DB_TABLE_EVENT." SET end_event = :date_fin
                                        WHERE id = :id AND weekid = :weekid ;";
        $req = $con->prepare($sql);
    
        $req->bindValue(":date_fin",$date->format("Y-m-d H:i:s"),PDO::PARAM_STR);
        $req->bindValue(":id",$row["id"],PDO::PARAM_INT);
        $req->bindValue(":weekid",$row["weekid"],PDO::PARAM_INT);
        echo json_encode($req->execute());
    }
    
    exit;
}

?>  