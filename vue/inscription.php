<?php

require_once "../inc/bdd.inc.php";
$pagename = "Inscription";
require $headerpath;


?>

<html>
<body>

    <div class="containter">
        <form method="post" action="../controller/CompteController.php">
            <div>
                <input type="text" name="username" placeholder="nom d'utilisateur" required/>
            </div>
            <div>
                <input type="password" name="mdp" placeholder="mot de passe" required/>
            </div>
            <div>
                <input type="password" name="mdp_confirm" placeholder="confirmer mot de passe" required/>
            </div>
            <div>
                <input type="submit" name="create_account" value="S'inscrire"/>
            </div>
        </form>
    </div>

</body>
</html>