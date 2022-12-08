<?php
 $pagename = "Cavalier";
 require $headerpath;
?>

<body>
    
</body>
</html>
<p>Liste Cavalier</p>
<table id="ins_list">
    <thead>
        <tr>
            <th>id</th>
            <th>Cottisation Club</th>
            <th>Cottisation FFE</th>
            <th>Année</th>
            <th>Cavalier</th>
            <th>Modifier</th>
            <th>Supprimer/th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $ins) {

        ?>
            <tr>
                <td><?= $ins["id_inscription"] ?></td>
                <td><?= $ins["montant_cotisation"] ?></td>
                <td><?= $ins["montant_ffe"] ?></td>
                <td><?= $ins["annee"] ?></td>
                <td><?= $ins["id_cav"] ?></td>

                <td>
                        <form action="" method="post">
                            <input type="hidden" name="ins_id" value="<?= $ins["id_inscription"]; ?>">
                            <input type="hidden" name="action" value="form">
                            <input type="hidden" name="subaction" value="modify">
                            <input type="submit" value="Modifier">
                        </form>
                    </td>
                    <td>
                            
                        <form action="" method="post">
                            <input type="hidden" name="ins_id" value="<?= $ins["id_inscription"]; ?>">
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
            $('#ins_list').DataTable();
        });   
    </script>
