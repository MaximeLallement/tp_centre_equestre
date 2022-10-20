<?php
    $pagename = "Modifier Representant"; 
    require $headerpath;
?>
    <body>
        <h1 text-align="center">Formulaire Inscription</h1>
        <form method="post" action="Modifier_Representant.php">
            <div>
                <label for='id'></label>
            </div>
            <div>
                <label for="mail">Mail</label>
                <input type="email" id="mail" name="mail_personne">
            </div>
            <div>
                <label for="tel">Tel</label>
                <input type="text" id="tel" name="tel_personne">
            </div>
            <div>
                <label for="rue">Rue</label>
                <input type="text" id="rue" name="rue_personne">
            </div>
            <div>
                <label for="complement">Complément</label>
                <input type="text" id="complement" name="complement_personne">
            </div>
            <div>
                <label for="cp">Code postal</label>
                <input type="text" id="cp" name="cp_personne">
            </div>
            <div>
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville_personne">
            </div>
            <input type="submit" name="Modifier" value="Modifier"/>
        </form>
    </body>
</html>













