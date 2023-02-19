<?php
$pagename = "Pensions";
require $headerpath;


?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pen_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'rep_list'
        });   
    </script>
</head>

<body>

<table id="pen_list">
    <thead>
        <tr>
            <th>Cheval</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Libelle</th>
            <th>Tarif mensuel</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>

        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $pen) {
            $che = get_one_che($pen["id_cheval"]);
            $ddf = get_date_de_fin($pen["id_pension"]);
           
         
        ?>
        <!-- Dialog box -->
            <!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action -->
            <div id="dialog<?= $pen["id_pension"]; ?>" title="Voulez-vous réellement MODIFIER cette pension ?"></div>
            <script>
                $(function() {
                    $("#dialog<?= $pen["id_pension"]; ?>").dialog({ 
                        minWidth: 510,
                        autoOpen: false,
                        modal: true,
                        buttons: {
                            Oui: function() {
                                document.getElementById('modify<?= $pen["id_pension"]; ?>').click(); //Redirection vers le form de modification quand dialog validé
                            },
                            Non: function() {
                                $(this).dialog("close");
                            }
                        },
                        post: true
                    });
                    $("#opener<?= $pen["id_pension"]; ?>").click(function() {
                        $("#dialog<?= $pen["id_pension"]; ?>").dialog("open");
                    })
                });
            </script>
            
            <div id="dialog_del<?= $pen["id_pension"]; ?>" title="Voulez-vous réellement SUPPRIMER cette pension ?"></div>
            <script>
                $(function() {
                    $("#dialog_del<?= $pen["id_pension"]; ?>").dialog({ 
                        minWidth: 520,
                        autoOpen: false,
                        modal: true,
                        buttons: {
                            Oui: function() {
                                document.getElementById('delete<?= $pen["id_pension"]; ?>').click(); //Exécution de la suppression quand dialog validé
                            },
                            Non: function() {
                                $(this).dialog("close");
                            }
                        },
                        post: true
                    });
                    $("#opener_del<?= $pen["id_pension"]; ?>").click(function() {
                        $("#dialog_del<?= $pen["id_pension"]; ?>").dialog("open");
                    })
                });
            </script>
            <!-- Dialog box -->
            <tr>
                <td><?= $che["nom_cheval"] ?></td>
                <td><?= $pen["date_de_debut"] ?></td>
                <td><?= $ddf["date_de_fin"] ?></td>
                <td><?= $pen["libelle_pension"] ?></td>
                <td><?= $pen["tarif"] ?>€</td>

                <!-- Modifier -->
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
                        <input type="hidden" name="action" value="form">
                        <input type="submit" id="modify<?= $pen["id_pension"]; ?>" name="subaction" value="modify" style="display: none">
                    </form>
                    <input type="button" id="opener<?= $pen["id_pension"]; ?>" value="Modifier"> <!-- Option Modifier -->
                </td>
                
                <!-- Afficher -->  
                <td>         
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
                        <input type="hidden" name="action" value="show">
                        <input type="submit" value="Afficher"> <!-- Option Afficher -->
                    </form>
                </td>
                
                <!-- Supprimer -->
                <td>    
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
                        <input type="submit" id="delete<?= $pen["id_pension"]; ?>" name="action" value="delete" style="display: none">
                    </form>
                    <input id="opener_del<?= $pen["id_pension"]; ?>" type="submit" value="Supprimer"> <!-- Option supprimer -->
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>

