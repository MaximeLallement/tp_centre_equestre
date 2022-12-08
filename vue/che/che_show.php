<?php
$pagename = "Cheval : ".$data["nom_cheval"]." ".$data["SIRE"];
require $headerpath;
?>
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
                    <form action="" method="post" class="d-inline" >
                        <input type="hidden" name="che_id" value="<?= $data["id_cheval"]; ?>">
                        <input type="hidden" name="action" value="form">
                        <input type="hidden" name="subaction" value="modify">
                        <input type="submit" value="Modifier ce Cheval" style="width:35%;">
                    </form>
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="che_id" value="<?= $data["id_cheval"]; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="submit" value="Supprimer ce Cheval" style="width:35%;">
                    </form>
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
