<<<<<<< Updated upstream
<?php
$page_name = "Pensions";
require $headerpath;


?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/>

<body>

<table id="pen_list">
    <thead>
        <tr>
            <th>Libelle</th>
            <th>Tarif</th>
            <th>Date de début</th>
            <th>Durée</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>

        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $pen) {
        ?>
            <tr>
                <td><?= $pen["libelle_pension"] ?></td>
                <td><?= $pen["tarif"] ?></td>
                <td><?= $pen["date_de_debut"] ?></td>
                <td><?= $pen["duree"] ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
                        <input type="hidden" name="action" value="form">
                        <input type="hidden" name="subaction" value="modify">
                        <input type="submit" value="Modifier">
                    </form>
                </td>
                <td>               
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
                        <input type="hidden" name="action" value="show">
                        <input type="submit" value="Afficher">
                    </form>
                </td>
                <td>
                        
                    <form action="" method="post">
                        <input type="hidden" name="pen_id" value="<?= $pen["id_pension"]; ?>">
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

</body>
</html>
    <!--  CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#pen_list').DataTable();
        });   
    </script>
=======
<?php

$page_name = "Pensions";

require "../header.php";

// Reconstruit mes valeurs
$data = unserialize($_GET["data"]) ;

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/>

<body>

<table id="pen_list">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Licence</th>
            <th>Date de Naissance</th>

        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $cav) {
        ?>
            <tr>
                <td><?= $cav["nom_personne"] ?></td>
                <td><?= $cav["prenom_personne"] ?></td>
                <td><?= $cav["num_licence"] ?></td>
                <td><?= $cav["date_de_naissance"] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>
    <!--  CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#pen_list').DataTable();
        });   
    </script>
>>>>>>> Stashed changes
