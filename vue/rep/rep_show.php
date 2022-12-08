<?php
$pagename = "Représentant : ".$rep["nom_personne"]." ".$rep["prenom_personne"];
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
            <form action="" method="post" class="d-inline" >
                <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                <input type="hidden" name="modify">
                <input type="submit" value="Modifier ce Représentant" onclick="return confirm('Voulez-vous réellement MODIFIER cet utilisateur ?')" style="width:35%;">
            </form>
            <form action="" method="post" class="d-inline">
                <input type="hidden" name="rep_id" value="<?= $rep["id_personne"]; ?>">
                <input type="hidden" name="delete">
                <input type="submit" value="Supprimer ce Représentant" onclick="return confirm('Voulez-vous réellement SUPPRIMER cet utilisateur ?')" style="width:35%;">
            </form>
        </div>
    </div>
        <div class="col-2">
            <img src="http://localhost/2a/tp_centre_equestre/media/<?= isset($data) ? $data["photo"] : null  ?>" alt="">
        </div>
    </div>
</div>