<<<<<<< Updated upstream
<?php
$page_name = "Formulaire pour Pension";

require $headerpath;

?>

<body>
    <style>
        .collapse.in{
            display: block;
        }
    </style>
<div class="container">
    <?php if(isset($error)){  ?>
        <div class="row justify-content-center" >
            <div class="col-6" role="alert">
                <div class="alert alert-danger" style="border:1px solid red;" role="alert">
                    This is a danger alert—check it out! <?= $error ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pension" value="<?= isset($infosaved["id_pension"]) ? $infosaved["id_pension"] : "" ;?>">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <label for="iLibellePen">Libelle*</label>
                <input type="text" name="libelle" value="<?= isset($infosaved) ? $infosaved["libelle_pension"] : "";  ?>" class="form-control" id="iLibellePension" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iTarifPension">Tarif*</label>
                <input type="text" name="tarif" value="<?= isset($infosaved) ? $infosaved["tarif"] : "";  ?>" class="form-control" id="iTarifPension" placeholder="" required>
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iDatePension">Début de la pension*</label>
                <input type="date" name="datepension" value="<?= isset($infosaved) ? $infosaved["date_de_debut"] : "";  ?>" class="form-control" id="iDatePension" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iDuree">Durée*</label>
                <input type="number" name="duree" value="<?= isset($infosaved) ? $infosaved["duree"] : "";  ?>" class="form-control" id="iDuree" placeholder="" required>
            </div>
        </div>
        
            
            
        
        <?php if(isset($update) && $update == true ){ ?>
        <input type="hidden" name="subaction" value="update">
        <?php  } ?>
        <input type="hidden" name="action" value="form">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
=======
<?php

$page_name = "Formulaire pour Pension";

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

>>>>>>> Stashed changes
</body>