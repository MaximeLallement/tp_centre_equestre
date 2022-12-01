<?php
include  "../header.php";


$dir_name = "../../media/";
$images = glob($dir_name."*.jpg");
?>
<style>
    #sortable img,#sortable2, #sortable3 img{        margin : 0px;    }
    #sortable, #sortable2, #sortable3 { list-style-type: none; margin: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: 100%}
    #sortable li,#sortable2 li, #sortable3 li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; text-align: center; }
    
</style>

<div class="container">
    <div class="row">
        <h5>Gestion des slider de photos des évènements</h1>
        <p>Collection Main</p>
        <ul id="sortable">
            <?php $i = 0;
                foreach($images as $image) {        ?>           
                <li>
                    <img id="<?= $i ?>" src="<?= $image ?>" alt="">
                </li>
            <?php  $i++; } ?>
        </ul>   
    </div>
    <div class="row">
        <div class="col">
            <p>Collection évènement 1 </p>
            <ul id="sortable2">
                <li>
                    <img id="" src="../../media/stock-photo-give-us-a-kiss-a-young-woman-and-her-horse-look-at-each-other-with-a-look-of-love-1343346290.jpg" alt="">
                </li>
            </ul>
        </div>
        <div class="col">
            <p>Collection évènement 1 </p>
            <ul id="sortable3">
                <li>
                    <img id="" src="../../media/stock-photo-welsh-pony-running-and-standing-in-high-grass-long-mane-brown-horse-galloping-brown-horse-1175510683.jpg" alt="">
                </li>
            </ul>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../inc/script/js/jquery-ui.min.js"></script>
<script>



$( function() {
    $( "#sortable , #sortable2, #sortable3" ).sortable({
        connectWith: "ul",
        receive: function(event,ui){
            // Making sure there is no duplicate
            let count = 0
            for(let item of this.children){
                if ( item.children[0].currentSrc == ui.item[0].children[0].currentSrc   ) {
                    count++
                    if (count >= 2) {
                        console.log('hey')
                        ui.sender.sortable("cancel");
                    }
                }
            }
        },
        
    });

    $( "#sortable , #sortable2, #sortable3" ).disableSelection();
} );

/* 
Pour continuer
0 - Dissocier la collection main et les collection event
1 - Repopulariser la collection main aprés un drop dans une collection event
2 - Destroy les éléments lorsqu'il sont drag d'une collection event à la collection main
3 - Enregistrer les url des collections d'event en bdd
4 - Création d'une collection event en dynamique 
        -> formulaire de création d'un evenement
        -> insertion des evenements en bdd ( => depuis fullCalendar ? )
5 - Interface commune ( Fullcalender + Collection )
*/



</script>
