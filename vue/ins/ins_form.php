<?php
$pagename = "Formulaire pour Cavalier";
require $headerpath;
?>
<body>
    <style>
        .collapse.in{
            display: block;
        }
    </style>
<div class="container">
    <?php if(isset($error) && $error != ""){  ?>
        <div class="row justify-content-center" >
            <div class="col-6" role="alert">
                <div class="alert alert-danger" style="border:1px solid red;" role="alert">
                    <?= $error ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <form action="InscriptionController.php" method="POST">
            <input type="hidden" name="id_cav" value="<?= isset($infosaved["id_cav"]) ? $infosaved["id_cav"] : 6 ;?>">

            <input type="hidden" name="id_ins" value="<?= isset($_POST["ins_id"]) ? $_POST["ins_id"] : "" ;?>">

            <!-- Input Cottisation  * 2 -->
            <div class="form-group col">
                <label for="iCotisationIns">Cotisation Club*</label>
                <input type="number" name="ins_cotisation" id="iCotisationIns" value="<?= isset($infosaved["ins_cotisation"]) ? $infosaved["ins_cotisation"] : "";  ?>" required>
            </div>
            <div class="form-group col">
                <label for="iFfeIns">Cotisation FFE*</label>
                <input type="number" name="ins_ffe" id="iFfeIns" value="<?= isset($infosaved["ins_ffe"]) ? $infosaved["ins_ffe"] : "";  ?>" required>
            </div>
            <!-- Input Année -->
            <div class="form-group col">
                <label for="iAnneeIns">Année de l'inscription*</label>
                <input type="date" name="ins_annee" id="iAnneeIns" value="<?= isset($infosaved["ins_annee"]) ? $infosaved["ins_annee"] : "";  ?>" required>
            </div>
            <?php if(isset($update) && $update == true ){ ?>
                <input type="hidden" name="subaction" value="update">
            <?php  } ?>
            <input type="hidden" name="action" value="form">
            <input type="submit" value="Appliquer" class="btn btn-primary">
    </form> 

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../../inc/script/js/jquery-ui.min.js"></script>

</body>