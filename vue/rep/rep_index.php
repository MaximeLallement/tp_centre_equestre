<?php

require_once(".././inc/bdd.inc.php");
require_once(".././model/Representant.php");
$pagename = "Représentant";
require $headerpath; //Importe le header

?>
<? //Affiche la liste des représentants ?>
<table id='rep_list'>
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Licence</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead> 
    <tbody>
        <?php foreach(get_all_rep() as $rep){ ?> <!-- Génère un tableau des représentants avec leurs infos personnelles -->
            <tr>
                <td><?php echo $rep["id_personne"] ?></td>
                <td><?php echo utf8_encode($rep["nom_personne"]) ?></td>
                <td><?php echo utf8_encode($rep["prenom_personne"]) ?></td>
                <td><?php echo $rep["num_licence"] ?></td>

                <td>
                    <form action=".././controller/RepresentantController.php" method="post">
                        <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                        <button type='submit' name="modify"> <!-- Option modifier -->
                            Modifier
                        </button>
                    </form>
                </td>

                <td>
                    <form action=".././controller/RepresentantController.php" method="post">
                        <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                        <button type="submit" name="delete"> <!-- Option supprimer -->
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php   }   ?>
    </tbody>
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#rep_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'rep_list'
        });   
    </script>
