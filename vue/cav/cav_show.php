<?php
$page_name = "Cavalier : ".$data["nom_personne"]." ".$data["prenom_personne"];
require $headerpath;

?>
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
                    <th>telephone</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $data["nom_personne"] ?></td>
                        <td><?= $data["prenom_personne"] ?></td>
                        <td><?= $data["date_de_naissance"] ?></td>
                        <td><?= $data["mail"] ?></td>
                        <td><?= $data["tel"] ?></td>
                    </tr>
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
            <form action="" method="post" class="d-inline" >
                <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="modify">
                <input type="submit" value="Modifier ce Cavalier" style="width:35%;">
            </form>
            <form action="" method="post" class="d-inline">
                <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                <input type="hidden" name="action" value="delete">
                <input type="submit" value="Supprimer ce Cavalier" style="width:35%;">
            </form>
        </div>
    </div>
        <div class="col-2">
            <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data) ? $data["photo"] : null  ?>" alt="">
        </div>
    </div>
    <div class="row">
        <p>Information Cavalier</p>
        <table>
            <thead>
                <th>Galop</th>
                <th>License</th>
                <th>Cotisation</th>
                <th>Membres depuis</th>
                <th>Pension ? </th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data["galop"] ?></td>
                    <td><?= $data["num_licence"] ?></td>
                    <td>Oui</td>
                    <td>xx Juin 20XX</td>
                    <td>Complète / Demi / Non</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="row">
        <p>Information Cours</p>
        <table>
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