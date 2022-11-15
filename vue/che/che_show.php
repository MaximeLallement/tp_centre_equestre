<?php
$pagename = "Cheval : ".$data["nom_cheval"]." ".$data["SIRE"];
require $headerpath;
?>
<div class="container">
    <p>Information Générale</p>
    <div class="row">
        <div class="col">
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
                        <td><?= $data["id_robe"] ?></td>
                    </tr>
            </tbody>
        </table>
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
        <div class="col-2">
            <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data["photo_cavalier"]) && $data["photo_cavalier"] != "" ? $data["photo_cavalier"] : null  ?>" alt="">
        </div>
    </div>
    <?php if (isset($data["id_cav"]) && $data["id_cav"] != "") { ?>
    <p>Information Cavalier</p>
        <div class="row">
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
            <div class="container-fluid">
                <form action="CavalierController.php" method="post" class="d-inline" >
                    <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                    <input type="hidden" name="action" value="show">
                    <input type="submit" value="Aller à page du Propriétaire" style="width:35%;">
                </form>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($data["id_cav"]) && $data["id_cav"] != "") { ?>
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
    <?php } ?>
    
</div>

