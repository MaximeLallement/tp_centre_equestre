<?php
require "../inc/bdd.inc.php";
require "../model/Cours.php";
require "../model/Participation.php";


if ( isset($_GET['username']) && isset($_GET['password'])) {
    if ( $_GET['username'] != '' && $_GET['password'] != '' ) {
        $username = $_GET['username'];
        $mdp = $_GET['password'];
    
        $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = :username AND mdp = :mdp AND type = 'u';";
        $req = $con->prepare($sql);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $req->execute();
    
        $count = $req->rowCount();
    
        if($count == 1){ //S'il existe une correspondance entre login et mdp, établir la connexion
            $response = [ 
                "success" => true,
                "user" => $req->fetch()];
            echo json_encode($response);
            exit;
        }else {
            echo json_encode('Connexion Fail');
            exit;
        }
    }
    echo json_encode('NO PASSWORD OR USERNAME');
    exit;
}

if( isset($_GET["user_id"]) && $_GET["user_id"] != ''){
    if ( isset($_GET["action"]) && $_GET["action"] == 'get_cou' ) 
    {
        echo json_encode(get_all_cou());
        exit;
    }

    if ( isset($_GET["action"]) && $_GET["action"] == 'get_weekly_part' ) 
    {
        echo json_encode(get_all_weekly_part_by_id($_GET["user_id"],1,$_GET["week_increment"]));
        exit;
    }

    if ( isset($_GET["action"]) && $_GET["action"] == 'get_user_NOT_part' ) 
    {

        echo json_encode(get_all_part_by_id($_GET["user_id"],0));
        exit;
    }

    echo json_encode("no action");
}else {
    echo json_encode("no user");
}



?>
