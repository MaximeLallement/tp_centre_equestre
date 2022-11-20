<?php

$pagename = 'Connexion';
require_once '../vue/header.php';
 


?>

<body>

    <div class="containter">
        <form method="post" action=".././controller/ConnexionController.php">
            <div>
                <input type="text" name="username" placeholder="nom d'utilisateur" required/>
            </div>
            <div>
                <input type="password" name="mdp" placeholder="mot de passe" required/>
            </div>
            <div>
                <input type="submit" name="connexion_admin_validation" value="Se Connecter"/>
            </div>
        </form>
    </div>

</body>
</html>