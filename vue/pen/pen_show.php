<?php
$pagename = "Affichage";
require $headerpath;

?>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
</head>

<!-- Dialog box -->
<!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action -->
<div id="dialog" title="Voulez-vous réellement MODIFIER cette pension ?"></div>
<script>
    $(function() {
        $("#dialog").dialog({ 
            minWidth: 510,
            autoOpen: false,
            modal: true,
            buttons: {
                Oui: function() {
                    document.getElementById('modify').click(); //Redirection vers le form de modification quand dialog validé
                },
                Non: function() {
                    $(this).dialog("close");
                }
            },
            post: true
        });
        $("#opener").click(function() {
            $("#dialog").dialog("open");
        })
    });
</script>

<div id="dialog_del" title="Voulez-vous réellement SUPPRIMER cette pension ?"></div>
<script>
    $(function() {
        $("#dialog_del").dialog({ 
            minWidth: 520,
            autoOpen: false,
            modal: true,
            buttons: {
                Oui: function() {
                    document.getElementById('delete').click(); //Exécution de la suppression quand dialog validé
                },
                Non: function() {
                    $(this).dialog("close");
                }
            },
            post: true
        });
        $("#opener_del").click(function() {
            $("#dialog_del").dialog("open");
        })
    });
</script>
<!-- Dialog box -->

<div class="container">
    <p>Information Générale</p>
    <div class="row">
        <div class="col">
            <table style="width:100%;">
                <thead>
                    <th>Libelle</th>
                    <th>Tarif</th>
                    <th>Date de début</th>
                    <th>Durée</th>
                    <th>Cheval</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $data["libelle_pension"] ?></td>
                        <td><?= $data["tarif"] ?></td>
                        <td><?= $data["date_de_debut"] ?></td>
                        <td><?= $data["duree"] ?></td>
                        <td><?= $data["id_cheval"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid">
            <!-- Option Modifier -->
            <form action="" method="post" class="d-inline" >
                <input type="hidden" name="pen_id" value="<?= $data["id_pension"]; ?>">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="modify">
                <input type="submit" id="modify" style="display: none;">
            </form>
            <input type="button" id="opener" value="Modifier cette Pension" style="width:35%" >

            <!-- Option Supprimer -->
            <form action="" method="post" class="d-inline">
                <input type="hidden" name="pen_id" value="<?= $data["id_pension"]; ?>">
                <input type="hidden" name="action" value="delete">
                <input type="submit" id="delete" style="display: none;">
            </form>
            <input type="button" id="opener_del" value="Supprimer cette Pension" style="width:35%;">
        </div>
    </div>
</div>