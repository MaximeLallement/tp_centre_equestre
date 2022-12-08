<?php

require_once "../inc/bdd.inc.php";

if(isset($_POST["id"]))
{
    $query = "
    UPDATE cours set actif = 0 WHERE id_cours=:id
    ";
    $statement = $con->prepare($query);
    $statement->execute(
        array(
         ':id' => $_POST['id']
        )
    );
}

?>