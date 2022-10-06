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
        <input type="submit" value="AJOUT">
    </form>

</body>