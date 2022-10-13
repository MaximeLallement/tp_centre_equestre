<?php
$page_name = "Formulaire pour Cavalier";

require "../header.php";

?>
<body>
    
<div class="container">
    <form action="../../controller/CavalierController.php" method="POST">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <label for="iNomCavalier">Nom</label>
                <input type="text" class="form-control" id="iNomCavalier" placeholder="">
            </div>
            <div class="form-group col">
                <label for="iPrenomCavalier">Prenom</label>
                <input type="text" class="form-control" id="iPrenomCavalier" placeholder="">
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iDateCavalier">Date de Naissance</label>
                <input type="date" class="form-control" id="iDateCavalier" placeholder="">
            </div>
            <div class="form-group col">
                <label for="iMailCavalier">Address email</label>
                <input type="mail" class="form-control" id="iMailCavalier" placeholder="">
            </div>
            <div class="form-group col">
                <label for="iTelCavalier">Telephone</label>
                <input type="tel" class="form-control" id="iTelCavalier" placeholder="">
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iPhotoCavalier">Photo</label>
                <input type="file" class="form-control" id="iPhotoCavalier" placeholder="">
            </div>
            <div class="form-group col">
                <label for="iLicCavalier">N° License FFE</label>
                <input type="text" class="form-control" id="iLicCavalier" placeholder="">
            </div>
            <div class="form-group col-2">
                <label for="inputState">Galop</label>
                <select id="inputState" class="form-control">
                    <option>Galop 1</option>
                    <option> Galop 2 </option>
                    <option> Galop 3 </option>
                    <option> Galop 4 </option>
                    <option> Galop 5 </option>
                    <option> Galop 6 </option>
                    <option> Galop 7 </option>
                </select>
            </div>
        </div>
        
    <input type="hidden" name="action" value="add">

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <!-- A faire FORM SI CAV == Représentant
                      SI CAV != Représentant     -->

</body>