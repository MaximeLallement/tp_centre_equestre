<?php

require('../../inc/bdd.inc.php');
require "../../model/Representant.php";
$data = get_all_rep();

?>
<table>
<?php foreach($data as $row){ ?>
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
    <?php   }   ?>
</table>