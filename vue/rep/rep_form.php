<?php
    $pagename = "Modifier Représentant"; 
    require $headerpath; //Importe le header ('header.php')
?>
<!-- Formulaire pré-rempli qui récupère les info relatives à l'utilisateur sélectionné dans 'rep_index.php'
     Permet de modifier les infos en base
-->

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
</head>

<!-- Dialog box -->
<!-- Permet l'ouverture d'une boite de dialogue pour confirmer l'exécution d'une action -->

<!-- Valider modifications -->
<div id="dialog_modify" title="Appliquer les modification ?"></div>
<script>
    $(function() {
        $("#dialog_modify").dialog({ 
            minWidth: 250,
            autoOpen: false,
            modal: true,
            buttons: {
                Oui: function() {
                    document.getElementById('modify').click(); //Modification du représentant quand dialog validé
                },
                Non: function() {
                    $(this).dialog("close");
                }
            },
            post: true
        });
        $("#opener_modify").click(function() {
            $("#dialog_modify").dialog("open");
        })
    });
</script>

<!-- Annuler modifications -->
<div id="dialog_cancel" title="Annuler les modifications ?"></div>
<script>
    $(function() {
        $("#dialog_cancel").dialog({ 
            minWidth: 250,
            autoOpen: false,
            modal: true,
            buttons: {
                Oui: function() {
                    document.getElementById('cancel').click(); //Modification du représentant quand dialog validé
                },
                Non: function() {
                    $(this).dialog("close");
                }
            },
            post: true
        });
        $("#opener_cancel").click(function() {
            $("#dialog_cancel").dialog("open");
        })
    });
</script>
<!-- Dialog box -->

    <body>
        <div class="container">
            <h3 text-align="center">Modifier le profil de <b><?= $infosaved["rep_prenom"]." ".$infosaved["rep_nom"] ?></b></h3> <!-- Titre personnalisé -->
            <form method="post" action=".././controller/RepresentantController.php">
                <input type="hidden" name="rep_id" value="<?= isset($infosaved["rep_id"]) ? $infosaved["rep_id"] : "" ;?>">
                <div>
                    <label for='id'></label>
                </div>

                <div class="row justify-content-md-center">
                    <div class="form-group col">
                        <label for="nom">Nom</label>
                        <input type="text" id="rep_nom" name="rep_nom" value="<?= isset($infosaved) ? $infosaved["rep_nom"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="rep_prenom" name="rep_prenom" value="<?= isset($infosaved) ? $infosaved["rep_prenom"] : "";  ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="date">Date de Naissance</label>
                        <input type="text" id="rep_dna" name="rep_dna" value="<?= isset($infosaved) ? $infosaved["rep_dna"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="mail">Mail</label>
                        <input type="email" id="rep_mail" name="rep_mail" value="<?= isset($infosaved) ? $infosaved["rep_mail"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="tel">Tel</label>
                        <input type="text" id="rep_tel" name="rep_tel" value="<?= isset($infosaved) ? $infosaved["rep_tel"] : "";  ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="rue">Rue</label>
                        <input type="text" id="rep_rue" name="rep_rue" value="<?= isset($infosaved) ? $infosaved["rep_rue"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="complement">Complément</label>
                        <input type="text" id="rep_complement" name="rep_complement" value="<?= isset($infosaved) ? $infosaved["rep_complement"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="cp">Code postal</label>
                        <input type="text" id="rep_cp" name="rep_cp" value="<?= isset($infosaved) ? $infosaved["rep_cp"] : "";  ?>" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="ville">Ville</label>
                        <input type="text" id="rep_ville" name="rep_ville" value="<?= isset($infosaved) ? $infosaved["rep_ville"] : "";  ?>" class="form-control">
                    </div>
                </div>
                <input type="submit" id="modify" name="modify_validation" style="display: none;" /> <!-- Exécute la requête de modification si msg de confirmation validé-->
                <input type="submit" id="cancel" name="showAll" style="display: none"/> <!-- Retourne sur la page 'rep_index.php' -->  
            </form>
            <div>
                <input type="button" id="opener_cancel" value="Annuler" class="btn btn-primary">
                <input type="button" id="opener_modify" value="Modifier" class="btn btn-primary">
            </div>
            
        </div>
    </body>
</html>













