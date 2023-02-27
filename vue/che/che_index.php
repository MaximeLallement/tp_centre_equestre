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
            $('#che_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'che_list'
        });   
    </script>
</head>

<body>
    
</body>
</html>
<p>Liste Cavalier</p>
<table id="che_list">
    <thead>
        <tr>
            <th>Nom</th>
            <th>SIRE</th>
            <th>Robe</th>
            <th>Propriétaire</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($data) && $data !== null){
        //Loop sur les éléments de la requête SQL pour affichage
            foreach ($data as $che) {
            ?>
                <!-- Dialog box -->
                <!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action -->
                <div id="dialog<?= $che["id_cheval"]; ?>" title="Voulez-vous réellement MODIFIER ce cheval ?"></div>
                <script>
                    $(function() {
                        $("#dialog<?= $che["id_cheval"]; ?>").dialog({ 
                            minWidth: 510,
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Oui: function() {
                                    document.getElementById('modify<?= $che["id_cheval"]; ?>').click(); //Redirection vers le form de modification quand dialog validé
                                },
                                Non: function() {
                                    $(this).dialog("close");
                                }
                            },
                            post: true
                        });
                        $("#opener<?= $che["id_cheval"]; ?>").click(function() {
                            $("#dialog<?= $che["id_cheval"]; ?>").dialog("open");
                        })
                    });
                </script>

                <div id="dialog_del<?= $che["id_cheval"]; ?>" title="Voulez-vous réellement SUPPRIMER ce cheval ?"></div>
                <script>
                    $(function() {
                        $("#dialog_del<?= $che["id_cheval"]; ?>").dialog({ 
                            minWidth: 520,
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Oui: function() {
                                    document.getElementById('delete<?= $che["id_cheval"]; ?>').click(); //Exécution de la suppression quand dialog validé
                                },
                                Non: function() {
                                    $(this).dialog("close");
                                }
                            },
                            post: true
                        });
                        $("#opener_del<?= $che["id_cheval"]; ?>").click(function() {
                            $("#dialog_del<?= $che["id_cheval"]; ?>").dialog("open");
                        })
                    });
                </script>
                <!-- Dialog box -->

                <tr>
                    <td><?= $che["nom_cheval"] ?></td>
                    <td><?= $che["SIRE"] ?></td>
                    <td><?= $rob[$che["id_robe"]-1]["libelle_robe"] ?></td>
                    <td><?= isset($che["id_cav"]) && $che["id_cav"] != "" ? $che["id_cav"] : "" ?></td>

                    <!-- Modifier -->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="form">
                            <input type="hidden" name="subaction" value="modify">
                            <input type="submit" id="modify<?= $che["id_cheval"]; ?>" style="display: none">          
                        </form>
                        <input type="submit" id="opener<?= $che["id_cheval"]; ?>" value="Modifier">
                    </td>

                    <!-- Afficher -->
                    <td>               
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="show">
                            <input type="submit" value="Afficher">
                        </form>
                    </td>

                    <!-- Supprimer -->
                    <td>     
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="submit" id="delete<?= $che["id_cheval"]; ?>" style="display: none">       
                        </form>
                        <input type="submit" id="opener_del<?= $che["id_cheval"]; ?>" value="Supprimer">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>