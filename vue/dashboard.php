<?php

require "header.php";

?>

<body>

    <!-- ALLER A L'INDEX -->
    <form action="../controller/CavalierController.php" method="post">
        <input type="hidden" name="action" value="index">
        <input type="submit" value="INDEX">
    </form>

    <!-- AJOUT D'UN ELEMENT -->
    <form action="../controller/CavalierController.php" method="post">
        <input type="hidden" name="action" value="form">
        <input type="hidden" name="subaction" value="new">
        <input type="submit" value="AJOUT">
    </form>
    
    <!-- ALLER A L'INDEX PENSION -->
    <form action="../controller/PensionController.php" method="post">
        <input type="hidden" name="action" value="index">
        <input type="submit" value="INDEX PENSION">
    </form>   
    
    <!-- AJOUT D'UNE PENSION -->
    <form action="../controller/PensionController.php" method="post">
        <input type="hidden" name="action" value="form">
        <input type="hidden" name="subaction" value="new">
        <input type="submit" value="AJOUT PENSION">    
    </form>

</body>