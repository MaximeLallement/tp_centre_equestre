<?php

require_once '../inc/bdd.inc.php';

if(isset($_POST["id"]))
{
 $query = "
 UPDATE cours 
 SET libelle_cours=:title, debut_cours=:start_event, fin_cours=:end_event 
 WHERE id_cours=:id
 ";
 $statement = $con->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
