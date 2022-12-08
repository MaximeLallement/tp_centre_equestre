
<?php
require "../../inc/bdd.inc.php";

global $con;
$sql = "SELECT * FROM ". DB_TABLE_COURS." WHERE actif = :actif ORDER BY id_cours ;";
$req = $con->prepare($sql);
$req->bindValue(':actif',1,PDO::PARAM_INT);
$req->execute();
$result = $req->fetchAll();
foreach($result as $row) {
    $cours[] = [
        'id'              => $row["id_cours"],
        'title'           => $row["title"],
        'start'           => $row["start_event"],
        'end'             => $row["end_event"],
    ];
}

echo json_encode($cours);


