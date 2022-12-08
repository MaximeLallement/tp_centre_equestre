<?php
    require '../inc/bdd.inc.php';
    $pagename = 'Accueil';
    require '../vue/header.php';
?>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<form action=".././controller/RepresentantController.php" method="post">
    <input type="submit" id="show" name="showAll" style="display: none"/>
</form>
<div id="dialog" title="Voulez-vous afficher les utilisateurs ?"></div>
<button id="opener">Afficher</button>
<script>
    $( "#dialog" ).dialog({ 
        autoOpen: false,
        modal: true,
        buttons: {
            Oui: function() {
                document.getElementById('show').click();
            },
            Non: function() {
                $(this).dialog("close");
            }
        },
        post: true
    });
    $( "#opener" ).click(function() {
    $( "#dialog" ).dialog( "open" );
    });
</script>

    <body>
        <form action="./RepresentantController.php" method="post">
            <button type="submit" name="showAll">Afficher_Représentants</button>
        </form>

        <form action="./CavalierController.php" method="post">
            <button type="submit" name="index" value="index">Afficher_Cavaliers</button>
        </form>

        
        <form action="./ConnexionController.php" method="post">
            <button type="submit" name="connexion">Connexion</button>
        </form>
    </body>

