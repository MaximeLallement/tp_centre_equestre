<?php
$pagename = "Représentant : ".$rep["nom_personne"]." ".$rep["prenom_personne"];
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
<div id="dialog_del" title="Voulez-vous réellement SUPPRIMER cet utilisateur ?"></div>
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
    <div class="row">
        <p>Information Générale</p>
        <div class="col">
            <table style="width:100%;">
                <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de Naissance</th>
                    <th>E-Mail</th>
                    <th>Telephone</th>
                </thead>
                <tbody>
                    <?php if (isset($rep) ) { ?>
                    <th>Information Représentant</th>
                    <tr>  
                        <td><?= $rep["nom_personne"] ?></td>
                        <td><?= $rep["prenom_personne"] ?></td>
                        <td><?= $rep["date_de_naissance"] ?></td>
                        <td><?= $rep["mail"] ?></td>
                        <td><?= $rep["tel"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="container-fluid">
            <!-- Option Modifier -->
            <form action="" method="post" class="d-inline" >
                <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                <input type="hidden" name="modify">
                <input type="submit" value="Modifier ce Représentant" style="width:35%;">
            </form>
            

            <!-- Option Supprimer -->
            <form action="" method="post" class="d-inline">
                <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                <input type="submit" id="delete" name="delete" style="display: none;">
            </form>
            <input type="submit" id="opener_del" value="Supprimer ce Représentant" style="width:35%;">
        </div>
    </div>
        <div class="col-2">
            <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data) ? $data["photo"] : null  ?>" alt="">
        </div>
    </div>
</div>