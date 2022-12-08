<?php
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
            <form action="rep/rep_index.php" method="post">
                <input type="hidden" name="action" value="form">
                <input type="hidden" name="subaction" value="new">
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
    </div>
</div>

</body>