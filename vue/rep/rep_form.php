<?php
    $pagename = "Modifier Représentant"; 
    require $headerpath; //Importe le header
?>
<!-- Formulaire pré-rempli qui récupère les info relatives à l'utilisateur sélectionné dans 'rep_index.php'
     Permet de modifier les infos en base
-->
    <body>
        <h3 text-align="center">Modifier le profil de <b><?= $infosaved["rep_prenom"]?> <?= $infosaved["rep_nom"] ?></b></h3> <!-- Titre personnalisé -->
        <form method="post" action=".././controller/RepresentantController.php">
        <input type="hidden" name="rep_id" value="<?= isset($infosaved["rep_id"]) ? $infosaved["rep_id"] : "" ;?>">
            <div>
                <label for='id'></label>
            </div>
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="rep_nom" name="rep_nom" value="<?= isset($infosaved) ? $infosaved["rep_nom"] : "";  ?>">
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="rep_prenom" name="rep_prenom" value="<?= isset($infosaved) ? $infosaved["rep_prenom"] : "";  ?>">
            </div>
            <div>
                <label for="date">Date de Naissance</label>
                <input type="text" id="rep_dna" name="rep_dna" value="<?= isset($infosaved) ? $infosaved["rep_dna"] : "";  ?>">
            </div>
            <div>
                <label for="mail">Mail</label>
                <input type="email" id="rep_mail" name="rep_mail" value="<?= isset($infosaved) ? $infosaved["rep_mail"] : "";  ?>">
            </div>
            <div>
                <label for="tel">Tel</label>
                <input type="text" id="rep_tel" name="rep_tel" value="<?= isset($infosaved) ? $infosaved["rep_tel"] : "";  ?>">
            </div>
            <div>
                <label for="rue">Rue</label>
                <input type="text" id="rep_rue" name="rep_rue" value="<?= isset($infosaved) ? $infosaved["rep_rue"] : "";  ?>">
            </div>
            <div>
                <label for="complement">Complément</label>
                <input type="text" id="rep_complement" name="rep_complement" value="<?= isset($infosaved) ? $infosaved["rep_complement"] : "";  ?>">
            </div>
            <div>
                <label for="cp">Code postal</label>
                <input type="text" id="rep_cp" name="rep_cp" value="<?= isset($infosaved) ? $infosaved["rep_cp"] : "";  ?>">
            </div>
            <div>
                <label for="ville">Ville</label>
                <input type="text" id="rep_ville" name="rep_ville" value="<?= isset($infosaved) ? $infosaved["rep_ville"] : "";  ?>">
            </div>
            <input type="submit" name="modify_validation" value="Modifier"/> <!-- Exécute la requête de modification -->
        </form>
    </body>
</html>













