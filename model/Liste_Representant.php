<?php

require('../inc/bdd.inc.php');
$data = rep_get_all();

function rep_get_all(){
    global $con;
    $sql = "SELECT id_personne, nom_personne, prenom_personne, tel, mail, rue, complement FROM personne
        WHERE DATEDIFF(NOW(), date_de_naissance) / 365 > 18 AND is_visible = 1"; //Sélectionne personnes ayant plus de 18 ans
    try{
        $req = $con->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

foreach ($data as $row) {
    $id = $row["id_personne"]; ?>
    <tr data-value="<?php echo $id ?>">
    <td style='width: 5%'>
    <input type='checkbox' class='checkbox' data-index="<?php echo $id ?>" checked='false'></td>
    <td><center><?php echo $id ?></center></td>
    <td><center><?php echo $row["nom_personne"] ?></center></td>
    <td style='display:flex; justify-content: space-evenly;'>
    <form action="Modifier_Representant.php" method="post">
        <button type='button' onclick="location.href = 'Modifier_Representant.php'">
            Modifier
        </button>
        <button type="button" onclick="location.href = 'Supprimer_Representant.php'">
            Supprimer
        </button>
    </form>
        <form action="Modifier_Representant.php" method="post">
            <input type="hidden" name="id_personne" value="<?php echo $id ?>">
        </form>
    </td>
    </tr>
    <?php
}
?>