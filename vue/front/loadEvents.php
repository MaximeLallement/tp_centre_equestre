
<?php
require "../../inc/bdd.inc.php";

global $con;
$sql = "SELECT * FROM ". DB_TABLE_EVENT ." WHERE actif = :actif ORDER BY id ;";
$req = $con->prepare($sql);
$req->bindValue(':actif',1,PDO::PARAM_INT);
$req->execute();
$result = $req->fetchAll();
foreach($result as $row) {
    //var_dump($row);
    $events[] = [
        'id'              => $row["id"],
        'title'           => $row["title"],
        'start'           => $row["start_event"],
        'end'             => $row["end_event"],
    ];
}

echo json_encode($events);


