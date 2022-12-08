<?php
$pagename = "Cavalier : ".$data["nom_personne"]." ".$data["prenom_personne"];
require $headerpath;

?>
<div class="container">
    <div id="cav-tabs">
        <ul>
            <li><a href="#fragment-1"><span>Information Cavalier</span></a></li>
            <li><a href="#fragment-2"><span>Information Club</span></a></li>
            <li><a href="#fragment-3"><span>Information Cours</span></a></li>
        </ul>
        <div class="" id="fragment-1">
            <p>Information Générale</p>
            <div class="row">
                <div class="col-10">
                    <table style="width:100%;">
                        <thead>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de Naissance</th>
                            <th>E-Mail</th>
                            <th>Telephone</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $data["nom_personne"] ?></td>
                                <td><?= $data["prenom_personne"] ?></td>
                                <td><?= $data["date_de_naissance"] ?></td>
                                <td><?= $data["mail"] ?></td>
                                <td><?= $data["tel"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                    <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data) && $data["photo"] != "" ? $data["photo"] : "default.jpg"  ?>" alt="">
                </div>
            </div>

            <?php if (isset($rep) ) { ?>
            <h6>Représentant Légal</h6>
            <div class="row">
                <div class="col-10">
                    <table style="width:100%;">
                        <tbody>
                            <tr>
                                <td><?= $rep["nom_personne"] ?></td>
                                <td><?= $rep["prenom_personne"] ?></td>
                                <td><?= $rep["date_de_naissance"] ?></td>
                                <td><?= $rep["mail"] ?></td>
                                <td><?= $rep["tel"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                    <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($rep) && $rep["photo"] !="" ? $rep["photo"] : "default.jpg"  ?>" alt="">
                </div>
            </div>
            <?php } ?>
            <div class="container-fluid">
                <form action="" method="post" class="d-inline" >
                    <input type="hidden" name="cav_id" value="<?= $data["id_personne"]; ?>">
                    <input type="hidden" name="action" value="form">
                    <input type="hidden" name="subaction" value="modify">
                    <input type="submit" value="Modifier ce Cavalier" style="width:35%;">
                </form>
                <form action="" method="post" class="d-inline">
                    <input type="hidden" name="cav_id" value="<?= $data["id_personne"]; ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" value="Supprimer ce Cavalier" style="width:35%;">
                </form>
            </div>

        </div>
        <div class="" id="fragment-2">
            <p>License</p>
            <table style="width:100%;">
                <thead>
                    <th>N°</th>
                    <th>Cotisation CLub</th>
                    <th>Cotisation FFE</th>
                    <th>Année</th>
                </thead>
                <tbody>
                    <?php foreach ($ins as $inscription) { ?>
                        <tr>
                            <td><?= $inscription["id_inscription"] ?></td>
                            <td><?= $inscription["montant_cotisation"] ?></td>
                            <td><?= $inscription["montant_ffe"] ?></td>
                            <td><?= $inscription["annee"] ?></td>
                        </tr>
                  <?php  } ?>
                </tbody>
            </table>
            
        </div>       
        <div class="" id="fragment-3">
            <table style="width:100%;">
                <thead>
                    <th>Date</th>
                    <th>Durée</th>
                    <th>Libéllé</th>
                    <th>Enseignant cavalerie</th>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < 5 ; $i++) {  ?>
                    <tr>
                        <td><?= date("y-m-d") ?></td>
                        <td>4</td>
                        <td>Cours de Saut</td>
                        <td>Mr. Lafargue</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../inc/script/js/jquery-ui.min.js"></script>
<script>
    $( "#cav-tabs" ).tabs();

</script>
