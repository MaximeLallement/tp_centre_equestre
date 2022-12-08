<?php

require_once '../inc/bdd.inc.php';

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO cours 
 (libelle_cours, debut_cours, fin_cours) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $con->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>