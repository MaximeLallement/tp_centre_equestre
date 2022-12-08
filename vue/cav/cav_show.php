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
            <p>Cours Dispobible</p>
            <table style="width:100%;">
                <thead>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Début <small>hh:mm</small> </th>
                    <th>Fin <small>hh:mm</small></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($cou as $c) {  ?>
                    <tr>
                        <td><?= $c["id_cours"] ?></td>
                        <td><?= $c["title"] ?></td>
                        <td><?= substr($c["start_event"],-8,-3) ?></td>
                        <td><?= substr($c["end_event"],-8,-3) ?></td>
                        <td>
                            <form action="ParticipationController.php" method="post">
                                <input type="hidden" name="id_cours" value="<?= $c["id_cours"] ?>" >
                                <input type="hidden" name="id_cav" value="<?= $data["id_personne"] ?>" >
                                <input type="hidden" name="action" value="add" >
                                <input type="submit" value="PARTICPER">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>Cours Cette Semaine</p>
            <table style="width:100%;">
                <thead>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Début <small>hh:mm</small> </th>
                    <th>Fin <small>hh:mm</small></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($part1 as $p) {  ?>
                    <tr>
                        <td><?= $p["id_cour"] ?></td>
                        <td><?= $p["title"] ?></td>
                        <td><?= substr($c["start_event"],-8,-3) ?></td>
                        <td><?= substr($c["end_event"],-8,-3) ?></td>
                        <td>
                            <form action="ParticipationController.php" method="post">
                                <input type="hidden" name="id_cours" value="<?= $p["id_cour"] ?>" >
                                <input type="hidden" name="id_week_cour" value="<?= $p["id_week_cour"] ?>" >
                                <input type="hidden" name="id_cav" value="<?= $data["id_personne"] ?>" >
                                <input type="hidden" name="actif" value="0" >
                                <input type="hidden" name="action" value="update" >
                                <input type="submit" value="S'ABSENTER">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>Cours ou je m'absente</p>
            <table style="width:100%;">
                <thead>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Début <small>hh:mm</small> </th>
                    <th>Fin <small>hh:mm</small></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($part0 as $p) {  ?>
                    <tr>
                        <td><?= $p["id_cour"] ?></td>
                        <td><?= $p["title"] ?></td>
                        <td><?= substr($c["start_event"],-8,-3) ?></td>
                        <td><?= substr($c["end_event"],-8,-3) ?></td>
                        <td>
                            <form action="ParticipationController.php" method="post">
                                <input type="hidden" name="id_cours" value="<?= $p["id_cour"] ?>" >
                                <input type="hidden" name="id_week_cour" value="<?= $p["id_week_cour"] ?>" >
                                <input type="hidden" name="id_cav" value="<?= $data["id_personne"] ?>" >
                                <input type="hidden" name="actif" value="1" >
                                <input type="hidden" name="action" value="update" >
                                <input type="submit" value="REVENIR">
                            </form>
                        </td>
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
