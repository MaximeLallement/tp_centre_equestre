<?php
require "../inc/bdd.inc.php";
require "../model/Cours.php";
require "../model/Participation.php";

if ( isset($_GET['action']) && $_GET['action'] == "update") {

    if ( isset($_GET['id_cour']) && isset($_GET['id_week']) && isset($_GET['idcav']) && isset($_GET['actif'])) {
        if ( $_GET['id_cour'] !=  '' && $_GET['id_week'] !=  '' && $_GET['idcav'] !=  '' && $_GET['actif'] !=  '' ) {

                upd_del_one_by_id($_GET['id_cour'],$_GET['id_week'],$_GET['idcav'],$_GET['actif']);
                $response = [ "success" => true];
                echo json_encode($response);

        }else {
            $response = [ "success" => "value not defined",];
            echo json_encode($response);
        }
    }else {
        $response = [ "success" => "value missing",];
        echo json_encode($response);
    }


}elseif ( isset($_GET['action']) && $_GET['action'] == 'add') {

    if ( isset($_GET['id_cour']) && isset($_GET['idcav']) ) {
        if ( $_GET['id_cour'] !=  '' && $_GET['idcav'] !=  ''  ){

                if( add_part( $_GET['idcav'],$_GET['id_cour']) ){
                    $response = [ "success" => true,
                                    "message" => "Vous êtes désormais inscrit" ];
                    echo json_encode($response);
                }else{
                    $response = [ "success" => false,
                                    "message" => "Cavalier déjà inscrit" ];
                    echo json_encode($response);
                }

        }else {
            $response = [ "success" => "value not defined",];
            echo json_encode($response);
        }
    }else {
        $response = [ "success" => "value missing",];
        echo json_encode($response);
    }

}else{
    $response = [ "success" => "action missing",];
    echo json_encode($response);
}
?>
