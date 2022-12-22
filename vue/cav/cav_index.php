<?php
 $pagename = "Cavalier";
 require $headerpath;
?>

<head>
         
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#cav_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'cav_list'
        });   
    </script>
</head>

<body>
    
</body>
</html>
<p>Liste Cavalier</p>
<table id="cav_list">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Licence</th>
            <th>Date de Naissance</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $cav) {
        ?>
            <!-- Dialog box -->
            <!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action -->
            <div id="dialog<?= $cav["id_personne"]; ?>" title="Voulez-vous réellement MODIFIER cet utilisateur ?"></div>
            <script>
                $(function() {
                    $("#dialog<?= $cav["id_personne"]; ?>").dialog({ 
                        minWidth: 510,
                        autoOpen: false,
                        modal: true,
                        buttons: {
                            Oui: function() {
                                document.getElementById('modify<?= $cav["id_personne"]; ?>').click(); //Redirection vers le form de modification quand dialog validé
                            },
                            Non: function() {
                                $(this).dialog("close");
                            }
                        },
                        post: true
                    });
                    $("#opener<?= $cav["id_personne"]; ?>").click(function() {
                        $("#dialog<?= $cav["id_personne"]; ?>").dialog("open");
                    })
                });
            </script>

            <div id="dialog_del<?= $cav["id_personne"]; ?>" title="Voulez-vous réellement SUPPRIMER cet utilisateur ?"></div>
            <script>
                $(function() {
                    $("#dialog_del<?= $cav["id_personne"]; ?>").dialog({ 
                        minWidth: 520,
                        autoOpen: false,
                        modal: true,
                        buttons: {
                            Oui: function() {
                                document.getElementById('delete<?= $cav["id_personne"]; ?>').click(); //Exécution de la suppression quand dialog validé
                            },
                            Non: function() {
                                $(this).dialog("close");
                            }
                        },
                        post: true
                    });
                    $("#opener_del<?= $cav["id_personne"]; ?>").click(function() {
                        $("#dialog_del<?= $cav["id_personne"]; ?>").dialog("open");
                    })
                });
            </script>
            <!-- Dialog box -->

            <tr >
                <td><?= $cav["nom_personne"] ?></td>
                <td><?= $cav["prenom_personne"] ?></td>
                <td><?= $cav["num_licence"] ?></td>
                <td><?= $cav["date_de_naissance"] ?></td>

                <td>
                        <form action="../controller/CavalierController.php" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="form">
                            <input type="hidden" name="subaction" value="modify">
                            <input type="submit" id="modify<?= $cav["id_personne"]; ?>" name="modify" style="display: none">
                        </form>
                        <input type="button" id="opener<?= $cav["id_personne"]; ?>" value="Modifier">
                    </td>
                    <td>               
                        <form action="../controller/CavalierController.php" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="show">
                            <input type="submit" value="Afficher">
                        </form>
                    </td>
                    <td>
                            
                        <form action="CavalierController.php" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="submit" id="delete<?= $cav["id_personne"]; ?>" name="delete" style="display: none">
                        </form>
                        <input id="opener_del<?= $cav["id_personne"]; ?>" type="submit" value="Supprimer">
                    </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

