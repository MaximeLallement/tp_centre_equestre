<?php

require_once(".././inc/bdd.inc.php");
require_once(".././model/Representant.php");
$pagename = "Représentant";
require $headerpath; //Importe le header

?>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        <?php foreach(get_all_rep() as $rep){ ?> <!-- Génère un tableau des représentants avec leurs infos personnelles -->
            <tr>
                <td><?php echo utf8_encode($rep["nom_personne"]) ?></td>
                <td><?php echo utf8_encode($rep["prenom_personne"]) ?></td>
                <td><?php echo $rep["num_licence"] ?></td>

                <td>
                    <form action=".././controller/RepresentantController.php" method="post">
                        <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                        <input type="submit" id="modify" name="modify" style="display: none"/>
                    </form>
                    <div id="dialog" title="Voulez-vous réellement MODIFIER cet utilisateur ?"></div>
                    <button id="opener">Modifier</button>
                    <script>
                        $( "#dialog" ).dialog({ 
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Oui: function() {
                                    document.getElementById('modify').click();
                                },
                                Non: function() {
                                    $(this).dialog("close");
                                }
                            },
                            post: true
                        });
                        $( "#opener" ).click(function() {
                            $( "#dialog" ).dialog( "open" );
                        });
                    </script>
                </td>

                <td>
                    <form action=".././controller/RepresentantController.php" method="post">
                        <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                        <button type='submit' name="showOne"> <!-- Option Afficher -->
                            Afficher
                        </button>
                    </form>
                </td>

                <td>
                    <form action=".././controller/RepresentantController.php" method="post">
                        <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>"> <!-- Permet de récupérer l'id du représentant sélectionné -->
                        <button type="submit" name="delete" onclick="return confirm('Voulez-vous réellement SUPPRIMER cet utilisateur ?')"> <!-- Option supprimer -->
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php   }   ?>
    </tbody>
</table>
</body>


