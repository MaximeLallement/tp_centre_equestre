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
    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id_cheval" value="<?= isset($infosaved["id_cheval"]) ? $infosaved["id_cheval"] : "" ;?>">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <label for="iNomCheval">Nom du Cheval*</label>
                <input type="text" name="nom_cheval" value="<?= isset($infosaved) ? $infosaved["nom_cheval"] : "";  ?>" class="form-control" id="iNomCheval" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iSire">N° SIRE</label>
                <input type="text" pattern="[0-9]{9}" name="sire" value="<?= isset($infosaved) ? $infosaved["sire"] : "";  ?>" class="form-control" id="iSire" placeholder="9 chiffres" required>
            </div>
            <div class="form-group col">
                <label for="iSelectRobe">Robe*</label>
                <select name="id_robe" class="form-select" id="iSelectRobe" required>
                    <option value=1 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "1") ? "selected" : "" ?>> Alezan </option>
                    <option value=2 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "2") ? "selected" : "" ?>> Café au Lait </option>
                    <option value=3 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "3") ? "selected" : "" ?>> Noir </option>
                    <option value=4 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "4")? "selected" : "" ?>> Blanc </option>
                    <option value=5 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "5")? "selected" : "" ?>> Bai </option>
                    <option value=6 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "6") ? "selected" : "" ?>> Isabelle </option>
                    <option value=7 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "7") ? "selected" : "" ?>> Souris </option>
                    <option value=8 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "8") ? "selected" : "" ?>> Aubère </option>
                    <option value=9 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "9") ? "selected" : "" ?>> Grise </option>
                    <option value=10 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "10") ? "selected" : "" ?>> Louvet </option>
                    <option value=11 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "11") ? "selected" : "" ?>> Rouan </option>
                    <option value=12 <?= (isset($infosaved["id_robe"]) && $infosaved["id_robe"] == "12") ? "selected" : "" ?>> Pie </option>
                </select>
            </div>
            <div class="form-group col">
                <label for="iPhotoCavalier">Photo*</label>
                <input type="file" name="photo_cheval" class="form-control" id="iPhotoCheval" style="display:none;" onchange="">
                <img  id="imgCheval" src="<?= isset($infosaved['photo_cheval']) && $infosaved['photo_cheval'] != ''  ? "http://localhost/2a/tp_centre_equestre/media/".$infosaved['photo_cheval'] : "http://placekitten.com/200" ?>" alt="" onclick="openFileDialog()" >
            </div>
        </div>

            <!-- CHOIX DU PROPRIETAIRE -->
            <div class="form-group col">
                <label for="nom_proprietaire">Nom du Proprietaire*</label>
                <input type="text" name="nom_cav" id="nom_proprietaire" value="<?= isset($infosaved["nom_cav"]) && $infosaved["nom_cav"] != "" ? $infosaved["nom_cav"] : "";  ?>" onkeyup = "autocomplet()" class="form-control">
                <input type="hidden" name="id_cav" id="id_proprietaire" value="<?= isset($infosaved) && $infosaved["id_cav"] != "" ? $infosaved["id_cav"] : "";  ?>" class="form-control">
                <ul id="list_cav"></ul>
            </div>

            <?php if(isset($update) && $update == true ){ ?>
                <input type="hidden" name="subaction" value="update">
            <?php  } ?>
            <input type="hidden" name="action" value="form">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form> 

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../../inc/script/js/jquery-ui.min.js"></script>
<script>

    function setInputValue(e)
    {
        //console.log(list);
        $("#id_proprietaire").val(e.getAttribute('value'))
        $("#nom_proprietaire").val(e.innerHTML )
        $("#list_cav").hide();
    }

    function autocomplet()
    {
        var min_length = 2
        var keyword = $("#nom_proprietaire").val()

        if (keyword.length >= min_length) {
            $.ajax({
                method: "POST",
                url: "../inc/autocomplete.php",
                data : {keyword :keyword},
                success:function(data){
                    $('#list_cav').show();
                    $('#list_cav').html(data);
                }
            })
        }
    }
       
    let iFile = document.getElementById('iPhotoCheval')
    
    function openFileDialog()
    {
        iFile.click()
    }

    $(document).ready(function(){
    $(iFile).on('change', function(evt){
        var f = evt.target.files[0]; 
        if (f){
        var r = new FileReader();
        r.onload = function(e){  
            $('#imgCheval').attr('src', e.target.result);        
        };
            r.readAsDataURL(f);
        } else 
        {
            console.log("failed");
        }
    });
});


</script>
</body>