<?php
$page_name = "Affichage";
require $headerpath;

?>
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
            <form action="" method="post" class="d-inline" >
                <input type="hidden" name="pen_id" value="<?= $data["id_pension"]; ?>">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="modify">
                <input type="submit" value="Modifier cette Pension" style="width:35%;">
            </form>
            <form action="" method="post" class="d-inline">
                <input type="hidden" name="pen_id" value="<?= $data["id_pension"]; ?>">
                <input type="hidden" name="action" value="delete">
                <input type="submit" value="Supprimer cette Pension" style="width:35%;">
            </form>
        </div>
    </div>
</div>