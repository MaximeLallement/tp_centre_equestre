<?php
$pagename = "Cheval : ".$data["nom_cheval"]." ".$data["SIRE"];
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
<div id="dialog" title="Voulez-vous réellement MODIFIER ce cheval ?"></div>
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

<div id="dialog_del" title="Voulez-vous réellement SUPPRIMER ce cheval ?"></div>
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
    <div id="che-tabs">
        <ul>
            <li><a href="#fragment-1"><span>Information Cheval</span></a></li>
            <li><a href="#fragment-2"><span>Information Cavalier</span></a></li>
            <li><a href="#fragment-3"><span>Information Pension</span></a></li>
        </ul>
        <div class="" id="fragment-1">
            <p>Information Générale</p>
            <div class="row">
                <div class="col-10">
                    <table style="width:100%;">
                        <thead>
                            <th>Nom</th>
                            <th>SIRE</th>
                            <th>Robe</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $data["nom_cheval"] ?></td>
                                <td><?= $data["SIRE"] ?></td>
                                <td><?php 
                                        $robe = get_rob_by_id($data["id_robe"]) ; 
                                        echo $robe["libelle_robe"] 
                                    ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                    <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data["photo_cheval"]) && $data["photo_cheval"] != "" ? $data["photo_cheval"] : "default.jpg"  ?>" alt="">
                </div>
                <div class="container-fluid">

                    <!-- Option Modifier -->
                    <form action="" method="post" class="d-inline" >
                        <input type="hidden" name="che_id" value="<?= $data["id_cheval"]; ?>">
                        <input type="hidden" name="action" value="form">
                        <input type="hidden" name="subaction" value="modify">
                        <input type="submit" id="modify" style="display: none">                      
                    </form>
                    <input type="submit" id="opener" value="Modifier ce Cheval" style="width:35%;">

                    <!-- Option Supprimer -->
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="che_id" value="<?= $data["id_cheval"]; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="submit" id="delete" style="display: none;">          
                    </form>
                    <input type="submit" id="opener_del" value="Supprimer ce Cheval" style="width:35%;">
                </div>

            </div>
        </div>
        <?php if (isset($data["id_cav"]) && $data["id_cav"] != "") { ?>
        <div class="" id="fragment-2">
            <p>Information Cavalier</p>
                <div class="row">
                    <div class="col">
                        <table style="width:100%;">
                            <thead>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>N°License</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $cav["nom_personne"] ?></td>
                                    <td><?= $cav["prenom_personne"] ?></td>
                                    <td><?= $cav["num_licence"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-2">
                        <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($cav["photo"]) && $cav["photo"] != "" ? $cav["photo"] : "default.jpg"  ?>" alt="">
                    </div>    
                    <div class="container-fluid">
                        <form action="CavalierController.php" method="post" class="d-inline" >
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="show">
                            <input type="submit" value="Aller à page du Propriétaire" style="width:35%;">
                        </form>
                    </div>
                </div>
        </div>
        <?php } ?>

        <!-- Doit être remplacer par la fonction PENSION -->
        <?php if (isset($data["id_cav"]) && $data["id_cav"] != "") { ?>  
        <div class="" id="fragment-3">
            <p>Information Pension</p>
                <div class="row">
                    <table style="width:100%;">
                        <thead>
                            <th>N°</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Commanditaire</th>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < 6 ; $i++) { ?>
                                <tr>
                                    <td><?= $i * 4444 ?></td>
                                    <td><?= date('ymd') * $i+6 ?></td>
                                    <td><?= date('ymd')+ 5 * $i ?></td>
                                    <td><?= $i ?></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <?php } ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../inc/script/js/jquery-ui.min.js"></script>

<script>
    $( "#che-tabs" ).tabs();

</script>
