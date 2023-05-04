<?php
 $pagename = "Epreuve";
 require $headerpath;
?>

<head>
         
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {

          $('#epr_list').DataTable(); //Applique la fontion DataTable() à l'élément dont l'id = 'cav_list'

        });   
    </script>
</head>

<body>
    
</body>
</html>
<p>Liste Cavalier</p>
<table id="epr_list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date de Passage</th>
            <th>Cavalier ID</th>
            <th>Galop</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Loop sur les éléments de la requête SQL pour affichage
        foreach ($data as $epr) {

          $cav = get_one_cav($epr['id_personne']);
        ?>
            <tr >
                <td><?= $epr["id_epreuve"] ?></td>
                <td><?= date_format(date_create($epr["date_epreuve"]),"d/m/Y ") ?></td>
                <td><?= $cav["nom_personne"] . ' '. $cav["prenom_personne"] ?></td>
                <td><?= $epr["id_galop"] ?></td>
                <td>
                    <form action="../controller/EpreuveController.php" method="post">
                        <input type="hidden" name="epr_id" value="<?= $epr["id_epreuve"]; ?>">
                        <input type="hidden" name="action" value="form">
                        <input type="hidden" name="subaction" value="modify">
                        <input type="submit" id="modify<?= $epr["id_epreuve"]; ?>" name="modify" value="Modifier">
                    </form>
                </td>             
                <td>
                        
                    <form action="CavalierController.php" method="post">
                        <input type="hidden" name="cav_id" value="<?= $epr["id_personne"]; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input disabled type="submit" id="delete<?= $epr["id_personne"]; ?>" name="delete" value="Supprimer">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

