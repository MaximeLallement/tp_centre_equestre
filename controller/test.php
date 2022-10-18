<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    
    <body>
        <button type="button" class="btn btn-primary">Create</button>
        
        <h1>Ajout pension</h1>
        <form method="post">
            <label>Libelle Pension</label>
            <input type="text" name="libelle_pension">
            <label>Tarif</label>
            <input type="number" name="tarif">
            <label>Date de Debut</label>
            <input type="date" name="date_de_debut">
            <label>Durée</label>
            <input type="number" name="duree">
            <input type="submit" name="ajouter">
        </form>
        <?php
            require "../bdd.inc.php";
                global $con;    
                $sql = "INSERT INTO ".DB_TABLE_PENSION." VALUES (NULL, '".$_POST['libelle_pension']."', '".$_POST['tarif']."', '".$_POST['date_de_debut']."', '".$_POST['duree']."')";
                try {
                    $con->exec($sql);
                }
                catch (PDOException $e) {
                    return $e->getMessage();
            }   
        ?>
    </body>
</html>
