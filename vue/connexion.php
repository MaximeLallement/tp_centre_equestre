<?php

$pagename = 'Connexion';
require_once '../vue/header.php';
 


?>

<body>

    <div class="containter">
        <div class="row">
            <div class="col">
                <h3>Connectez-vous en tant qu'utilisateur</h3>
                <form method="post" action="../controller/ConnexionController.php">
                    <div>
                        <input type="text" name="username" placeholder="nom d'utilisateur" required/>
                    </div>
                    <div>
                        <input type="password" name="mdp" placeholder="mot de passe" required/>
                    </div>
                    <div>
                        <input type="submit" name="connexion_utilisateur_validation" value="Se Connecter"/>
                    </div>
                </form>
            </div>
            <div class="col">
                <h3>Connectez-vous en tant qu'administrateur</h3>
                <form method="post" action="../controller/ConnexionController.php">
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
        </div>
    </div>

</body>
</html>