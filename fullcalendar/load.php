<?php
require_once '../inc/bdd.inc.php';

$data = array();

$query = "SELECT * FROM cours WHERE actif = 1 ORDER BY id_cours";

$statement = $con->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id_cours"],
  'title'   => $row["libelle_cours"],
  'start'   => $row["debut_cours"],
  'end'   => $row["fin_cours"]
 );
}

echo json_encode($data);

?>
