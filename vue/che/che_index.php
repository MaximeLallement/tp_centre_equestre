<?php
 $pagename = "Cavalier";
 require $headerpath;
?>

<body>
    
</body>
</html>
<p>Liste Cavalier</p>
<table id="che_list">
    <thead>
        <tr>
            <th>Nom</th>
            <th>SIRE</th>
            <th>Robe</th>
            <th>Propriétaire</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $che) {

        ?>
            <tr>
                <td><?= $che["nom_cheval"] ?></td>
                <td><?= $che["SIRE"] ?></td>
                <td><?= $rob[$che["id_robe"]]["libelle_robe"] ?></td>
                <td><?= isset($che["id_cav"]) && $che["id_cav"] != "" ? $che["id_cav"] : "" ?></td>
                <td>
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="form">
                            <input type="hidden" name="subaction" value="modify">
                            <input type="submit" value="Modifier">
                        </form>
                    </td>
                    <td>               
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="show">
                            <input type="submit" value="Afficher">
                        </form>
                    </td>
                    <td>
                            
                        <form action="" method="post">
                            <input type="hidden" name="che_id" value="<?= $che["id_cheval"]; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    <!--  CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#che_list').DataTable();
        });   
    </script>
