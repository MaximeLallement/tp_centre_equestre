<?php

require_once("../inc/bdd.inc.php");
require_once(".././model/Representant.php");
$pagename = "Représentant";
require $headerpath; //Importe le header

?>
<head>
         
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#rep_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'rep_list'
        });   
    </script>
</head>
<!-- Affiche la liste des représentants -->

<body>
<table id='rep_list'>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Licence</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
        </tr>
    </thead> 
    <tbody>
        <?php 
        if(isset($data) && $data !== null){
            foreach($data as $rep){ ?> <!-- Génère un tableau des représentants avec leurs infos personnelles -->
                <!-- Dialog box -->
                <!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action --> 
                <div id="dialog_del<?= $rep["id_personne"]; ?>" title="Voulez-vous réellement SUPPRIMER cet utilisateur ?"></div>
                <script>
                    $(function() {
                        $("#dialog_del<?= $rep["id_personne"]; ?>").dialog({ 
                            minWidth: 520,
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Oui: function() {
                                    document.getElementById('delete<?= $rep["id_personne"]; ?>').click(); //Exécution de la suppression quand dialog validé
                                },
                                Non: function() {
                                    $(this).dialog("close");
                                }
                            },
                            post: true
                        });
                        $("#opener_del<?= $rep["id_personne"]; ?>").click(function() {
                            $("#dialog_del<?= $rep["id_personne"]; ?>").dialog("open");
                        })
                    });
                </script>
                <!-- Dialog box -->
                
                <tr>
                    <td><?= $rep["nom_personne"] ?></td>
                    <td><?= $rep["prenom_personne"] ?></td>
                    <td><?= $rep["num_licence"] ?></td>
                
                    <!-- Modifier -->
                    <td>
                        <form action=".././controller/RepresentantController.php" method="post">
                            <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                            <input type="hidden" name="modify">               
                            <input type="submit" value="Modifier">
                        </form>
                    </td>
                
                    <!-- Afficher -->
                    <td>
                        <form action=".././controller/RepresentantController.php" method="post">
                            <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                            <input type='submit' name="showOne" value="Afficher"> <!-- Option Afficher -->
                        </form>
                    </td>
                
                    <!-- Supprimer -->
                    <td>
                        <form action=".././controller/RepresentantController.php" method="post">
                            <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                            <input type="submit" id="delete<?= $rep["id_personne"]; ?>" name="delete" style="display: none">
                        </form>  
                        <input id="opener_del<?= $rep["id_personne"]; ?>" type="submit" value="Supprimer"> <!-- Option supprimer -->
                    </td>
                </tr>
        <?php   
            }
        }   
        ?>
    </tbody>
</table>
</body>


