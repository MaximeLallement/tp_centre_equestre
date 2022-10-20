<?php
 require $headerpath;
?>

<body>
    
</body>
</html>

<table id="cav_list">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Licence</th>
            <th>Date de Naissance</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach (get_all_cav() as $cav) {

        ?>
            <tr>
                <td><?= $cav["nom_personne"] ?></td>
                <td><?= $cav["prenom_personne"] ?></td>
                <td><?= $cav["num_licence"] ?></td>
                <td><?= $cav["date_de_naissance"] ?></td>

                <td>
                        <form action="" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="form">
                            <input type="hidden" name="subaction" value="modify">
                            <input type="submit" value="Modifier">
                        </form>
                    </td>
                    <td>               
                        <form action="" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
                            <input type="hidden" name="action" value="show">
                            <input type="submit" value="Afficher">
                        </form>
                    </td>
                    <td>
                            
                        <form action="" method="post">
                            <input type="hidden" name="cav_id" value="<?= $cav["id_personne"]; ?>">
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
            $('#cav_list').DataTable();
        });   
    </script>
