<?php
$pagename = "Formulaire pour Cavalier";
require $headerpath;
?>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
</head>

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
        <input type="hidden" name="id_epreuve" value="<?= isset($infosaved["id_epreuve"]) ? $infosaved["id_epreuve"] : "" ;?>">
        <div class="row justify-content-md-center">
            <div class="form-group col">
                <?php
                    // Afficher le nom du cavalier par defaut lors d'un modification
                    if(isset($infosaved["id_personne"]) && $infosaved["id_personne"] != '')
                    {
                        // get cav 
                    }

                ?>
                <label for="iCavalierEpreuve">Cavalier*</label>
                <input type="text" name="nom" value="" onkeyup = "autocomplet()" id="iCavalierEpreuve" placeholder="" class="form-control" required>
                <input type="hidden" name="id_personne" id="id_cavalier" value="<?= isset($infosaved["id_personne"]) && $infosaved["id_personne"] != "" ? $infosaved["id_personne"] : "";  ?>" class="form-control">
                <ul id="list_cav"></ul>
            </div>
            <div class="form-group col">
                <label for="iGalopEpreuve">Galop*</label>
                <input type="int" name="id_galop" value="<?= isset($infosaved) ? $infosaved["id_galop"] : "";  ?>" class="form-control" id="iGalopEpreuve" placeholder="" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="iDateEpreuve">Date de Passage*</label>
                <input type="date" name="date_epreuve" value="<?= isset($infosaved) ? $infosaved["date_epreuve"] : "";  ?>" class="form-control" id="iDateEpreuve" placeholder="" required>
            </div>
        </div>
        <?php if(isset($update) && $update == true ){ ?>
            <input type="hidden" name="subaction" value="update">
        <?php  } ?>
        <input type="hidden" name="action" value="form">
        <input type="submit" id="modify" class="btn btn-primary">
    </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../inc/script/js/jquery-ui.min.js"></script>
<script>
    function setInputValue(e)
    {
        //console.log(list);
        $("#id_cavalier").val(e.getAttribute('value'))
        $("#iCavalierEpreuve").val(e.innerHTML )
        $("#list_cav").hide();
    }

    function autocomplet()
    {
        var min_length = 2
        var keyword = $("#iCavalierEpreuve").val()

        if (keyword.length >= min_length) {
            $.ajax({
                method: "POST",
                url: "../inc/autocomplete.php",
                data : {keyword :keyword},
                success:function(data){
                    console.log(data);

                    $('#list_cav').show();
                    $('#list_cav').html(data);
                }
            })
        }
    }
</script>
</body>