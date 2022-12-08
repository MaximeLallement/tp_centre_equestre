<?php

    require_once '../inc/bdd.inc.php';
    $pagename = 'Accueil';
    require "header.php";

?>

<body>
<div class="container">
    <div class="row">
        
        <div class="col-6">
            <h5>Cavalier</h5>
            <form action="../controller/CavalierController.php" method="post">
                <input type="hidden" name="action" value="index">
                <input type="submit" value="INDEX">
            </form>
            <form action="../controller/CavalierController.php" method="post">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="new">
                <input type="submit" value="AJOUT">
            </form>
        </div>
        <div class="col-6">
            <h5>Representant</h5>
            <form action="../controller/RepresentantController.php" method="post">
                <input type="hidden" name="showAll">
                <input type="submit" value="INDEX">
            </form>
        </div>
        <div class="col-6">
            <h5>Pension</h5>
                <!-- ALLER A L'INDEX PENSION -->
                <form action="../controller/PensionController.php" method="post">
                <input type="hidden" name="action" value="index">
                <input type="submit" value="INDEX">
                </form>   
    
                <!-- AJOUT D'UNE PENSION -->
                <form action="../controller/PensionController.php" method="post">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="new">
                <input type="submit" value="AJOUT">    
                </form>
        </div>
        <div class="col-6">
        <h5>Chevaux</h5>
            <form action="../controller/ChevalController.php" method="post">
                <input type="hidden" name="action" value="index">
                <input type="submit" value="INDEX">
            </form>
            <form action="../controller/ChevalController.php" method="post">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="new">
                <input type="submit" value="AJOUT">
            </form>
        </div>
        <div class="col-6">
            <h5>Inscription</h5>
            <form action="../controller/InscriptionController.php" method="post">
                <input type="hidden" name="action" value="index">
                <input type="submit" value="INDEX">
            </form>
            <form action="../controller/InscriptionController.php" method="post">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="new">
                <input type="submit" value="AJOUT">
            </form>
        </div>
        <div class="col-6">
            <h5>Gestion des cours</h5>
            <a href="cours/cours_management.php"><input type="submit" value="GESTION"></a>
        </div>


    </div>
</div>

</body>