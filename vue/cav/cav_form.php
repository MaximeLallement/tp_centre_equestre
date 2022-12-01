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
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_personne" value="<?= isset($infosaved["id_personne"]) ? $infosaved["id_personne"] : "" ;?>">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <label for="iNomCavalier">Nom*</label>
                <input type="text" name="nom" value="<?= isset($infosaved) ? $infosaved["nom"] : "";  ?>" class="form-control" id="iNomCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iPrenomCavalier">Prenom*</label>
                <input type="text" name="prenom" value="<?= isset($infosaved) ? $infosaved["prenom"] : "";  ?>" class="form-control" id="iPrenomCavalier" placeholder="" required>
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iDateCavalier">Date de Naissance*</label>
                <input type="date" name="datenaissance" value="<?= isset($infosaved) ? $infosaved["datenaissance"] : "";  ?>" class="form-control" id="iDateCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iMailCavalier">Address email*</label>
                <input type="email" name="mail" value="<?= isset($infosaved) ? $infosaved["mail"] : "";  ?>" class="form-control" id="iMailCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iTelCavalier">Telephone*</label>
                <input type="tel" pattern="[0-9]{10}" name="tel" value="<?= isset($infosaved) ? $infosaved["tel"] : "";  ?>" class="form-control" id="iTelCavalier" placeholder="" required>
            </div>
        </div>
        <div class="row">

            <div class="form-group col">
                <label for="iPhotoCavalier">Photo*</label>
                <input type="file" name="photo" class="form-control" id="iPhotoCavalier" style="display:none;">
                <img  id="imgCavalier" src="<?= isset($infosaved) ? "http://localhost/2a/tp_centre_equestre/media/".$infosaved['photo'] : "http://placekitten.com/400" ?>" alt="" onclick="openFileDialog()">
            </div>
            <div class="form-group col">
                <label for="iLicCavalier">N° License FFE*</label>
                <input type="text" pattern="[A-Z]{7}[1-9]{1}" name="numlic" value="<?= isset($infosaved) ? $infosaved["numlic"] : "";  ?>" class="form-control" id="iLicCavalier" placeholder="7 lettres + 1 chiffre" required>
            </div>
            <div class="form-group col">
                <label for="iSelectGalop">Galop*</label>
                <select name="galop" class="form-select" id="iSelectGalop" required>
                    <option value=1 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "1") ? "selected" : "" ?>> Galop 1</option>
                    <option value=2 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "2") ? "selected" : "" ?>> Galop 2 </option>
                    <option value=3 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "3") ? "selected" : "" ?>> Galop 3 </option>
                    <option value=4 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "4")? "selected" : "" ?>> Galop 4 </option>
                    <option value=5 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "5")? "selected" : "" ?>> Galop 5 </option>
                    <option value=6 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "6") ? "selected" : "" ?>> Galop 6 </option>
                    <option value=7 <?= (isset($infosaved["galop"]) && $infosaved["galop"] == "7") ? "selected" : "" ?>> Galop 7 </option>
                </select>
            </div>
        </div>
        

        <!-- 
        Cette input checkbox définis si l'utilisateur est son propre représentant ou non
        sa valeur sera passée avec le formulaire pour définir quels méthodes utiliser dans le controleur 
        1 = le cavalier est son representant
        0 = le cavalier n'est pas son représentant
        -->
        <div class="form-group">
            <h5 class="col-12">Etes-vous votre représentant(e) légale</h5>
            <label for="choixCav" class="col-6"> Je suis mon représentant légale</label>
            <input type="radio"  name="choixRepresentant" value="cav" id="choixCav" onclick="show(0)">
            <label for="choixRep" class="col-6" > Je suis ne suis pas mon représentant légale</label>
            <input type="radio"name="choixRepresentant" value="rep" id="choixRep" onclick="show(1)" >
        </div>
        
        <!-- LE CAVALIER N'EST PAS SON REPRESENTANT 
        DONC NOUVEAUX NOM,PRENOM, ETC... -->
        <div class="collapse"  id="repInfo">
            <input type="hidden" name="idrep" value="<?= isset($infosaved["id_representant"]) ? $infosaved["id_representant"] : "";  ?>">
            <div class="row">
                    <div class="form-group col">
                        <label for="iNomCavalier">Nom du représentant</label>
                        <input type="text" name="nomrep" value="<?= isset($infosaved["nomrep"]) ? $infosaved["nomrep"] : "";  ?>" class="form-control" id="iNomCavalier" placeholder="">
                    </div>
                    <div class="form-group col">
                        <label for="iPrenomCavalier">Prenom du représentant</label>
                        <input type="text" name="prenomrep" value="<?= isset($infosaved["prenomrep"]) ? $infosaved["prenomrep"] : "";  ?>"  class="form-control" id="iPrenomCavalier" placeholder="">
                    </div>
            </div>
            <div class="row">    
                    <div class="form-group col-6">
                        <label for="iDateRep">Date de Naissance du représentant</label>
                        <input type="date" name="datenaissancerep" value="<?= isset($infosaved["datenaissancerep"]) ? $infosaved["datenaissancerep"] : "";  ?>" class="form-control" id="iDateRep" placeholder="">
                    </div>
            </div>
            <div class="row">    
                    <div class="form-group col-6">
                        <label for="iMailCavalier">Address email du représentant</label>
                        <input type="email" name="mailrep"value="<?= isset($infosaved["mailrep"]) ? $infosaved["mailrep"] : "";  ?>"  class="form-control" id="iMailCavalier" placeholder="">
                    </div>
                    <div class="form-group col-6">
                        <label for="iTelCavalier">Telephone du représenttant <br><i>format : 0601020304</i></label>
                        <input type="tel" pattern="[0-9]{10}"  name="telrep" value="<?= isset($infosaved["telrep"]) ? $infosaved["telrep"] : "";  ?>" class="form-control" id="iTelCavalier" placeholder="">
                    </div>
            </div>
        </div>
        <!-- LE CAVALIER EST SON REPRESENTANT 
        DONC ADRESSE    -->
        <div class="row" >            
            <div class="form-group col">
                <label for="iPhotoCavalier">Rue*</label>
                <input type="text" name="rue"  value="<?= isset($infosaved) ? $infosaved["rue"] : "";  ?>"class="form-control" id="iPhotoCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iPhotoCavalier">Numéro*</label>
                <input type="text" name="numaddr" value="<?= isset($infosaved) ? $infosaved["numaddr"] : "";  ?>" class="form-control" id="iPhotoCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iPhotoCavalier">Code Postal*</label>
                <input type="text" name="codep" value="<?= isset($infosaved) ? $infosaved["codep"] : "";  ?>" class="form-control" id="iPhotoCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iPhotoCavalier">Ville*</label>
                <input type="text" name="ville" value="<?= isset($infosaved) ? $infosaved["ville"] : "";  ?>" class="form-control" id="iPhotoCavalier" placeholder="" required>
            </div>
            <div class="form-group col">
                <label for="iPhotoCavalier">Pays*</label>
                <input type="text" name="pays" value="<?= isset($infosaved) ? $infosaved["pays"] : "";  ?>" class="form-control" id="iPhotoCavalier" placeholder="" required>
            </div>
        </div>
        <?php if(isset($update) && $update == true ){ ?>
            <input type="hidden" name="subaction" value="update">
        <?php  } ?>
        <input type="hidden" name="action" value="form">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
    <div id="datepicker"></div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../inc/script/js/jquery-ui.min.js"></script>
<script>

    let blocRepInfo = document.getElementById("repInfo")

    function setRequired(bool){
        for (let i = 0; i < blocRepInfo.children.length; i++) 
        {
            for (let j = 0; j < 2; j++) {
                if(blocRepInfo.children[i].children[j] != null)
                {

                    blocRepInfo.children[i].children[j].children[1].required = bool
                }
            }
        }
    }

    /**
     * Fonction show
     * Permet l'affichage dynamic du formulaire
     */
    function show(value){
        if(value == 0){
            setRequired(false)    
            setTimeout(function(){ 
                $('#repInfo').collapse('hide')
            },500)
        }else{
            setRequired(true)
            setTimeout(function(){     
                $('#repInfo').collapse('show')
            },500)
        }
    }

    <?php  if (isset($infosaved["nomrep"]) && $infosaved["nomrep"] != "") { ?>
        $('#choixRep').prop("checked", true)
        show(1) 
    <?php } ?>

        
    let iFile = document.getElementById('iPhotoCavalier')
    
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
            $('#imgCavalier').attr('src', e.target.result);        
            console.log(e.target.result);
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