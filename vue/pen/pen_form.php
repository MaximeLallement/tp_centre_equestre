<?php
$pagename = "Formulaire pour Pension";

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
                    This is a danger alert—check it out! <?= $error ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pension" value="<?= isset($infosaved["id_pension"]) ? $infosaved["id_pension"] : "" ;?>">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <label for="iLibellePension">Libelle*</label>
                <select name="libelle" class="form-select" id="iLibellePension" required>
                    <option value="" <?= (isset($infosaved["libelle"]) && $infosaved["libelle"] == "") ? "selected" : "" ?>></option>
                    <option value="Pension" <?= (isset($infosaved["libelle"]) && $infosaved["libelle"] == "Pension") ? "selected" : "" ?>>Pension</option>
                    <option value="Demi-pension" <?= (isset($infosaved["libelle"]) && $infosaved["libelle"] == "Demi-pension") ? "selected" : "" ?>>Demi-pension</option>
                </select>
                <!--<input type="text" name="libelle" value="<?= isset($infosaved) ? $infosaved["libelle"] : "";  ?>" class="form-control" id="iLibellePension" placeholder="" required>-->
            </div>
            <div class="form-group col">
                <label for="iTarifPension">Tarif mensuel*</label>
                <input type="text" name="tarif" value="<?= isset($infosaved) ? $infosaved["tarif"] : "";  ?>" class="form-control" id="iTarifPension" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="IdCheval">Cheval sélectionné*</label>
                <input type="text" name="nom_cheval" id="nom_cheval" value="<?= isset($infosaved["nom_cheval"]) && $infosaved["nom_cheval"] != "" ? $infosaved["nom_cheval"] : "";  ?>" onkeyup = "autocomplet_che()" class="form-control">
                <input type="hidden" name="id_cheval" id="id_cheval" value="<?= isset($infosaved) && $infosaved["id_cheval"] != "" ? $infosaved["id_cheval"] : "";  ?>" class="form-control">
                <ul id="list_cheval"></ul>
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iDatePension">Début de la pension*</label>
                <input type="date" name="date_de_debut" value="<?= isset($infosaved) ? $infosaved["date_de_debut"] : "";  ?>" class="form-control" id="iDatePension" placeholder="" required>
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
<script src="../../lib/jquery-ui.js"></script>
<script src="../../lib/external/jquery/jquery.js"></script>
<script> 
$(function (){
   $("libelle").selectmenu(); 
});

function setInputValue(e){
    //console.log(list);
    $("#id_cheval").val(e.getAttribute('value'));
    $("#nom_cheval").val(e.innerHTML );
    $("#list_cheval").hide();
}

function autocomplet_che(){
    var min_length = 2;
    var keyword = $("#nom_cheval").val();

    if (keyword.length >= min_length) {
        $.ajax({
            method: "POST",
            url: "../inc/autocomplete_che.php",
            data : {keyword :keyword},
            success:function(data){
                $('#list_cheval').show();
                $('#list_cheval').html(data);
            }
        });
    }
}

</script>
</body>