<?php

/** RÉCUPÉRATION DES VARIABLES */
// récupération du répertoir
$base_dir = __DIR__;
// récuperation du protocole
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
// récupération du nom de domaine
$domain = $_SERVER['SERVER_NAME'];

$doc_root = $_SERVER['DOCUMENT_ROOT'];
// récupération du port serveur
$port = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

/** PATH 
 *  String manipulation
 */
// inversement des slash 
$doc_root = str_replace('/', '\\', $doc_root);
// épuration de l'url
$base_url = str_replace($doc_root, '', $base_dir);

/* Mise en place de l'url dynamic */
$url = "$protocol://$domain$disp_port$base_url";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$home_link = "http://localhost/tp_centre_equestre/";
$home_link_index = "http://localhost/tp_centre_equestre/index.php";
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title><?= isset($pagename) ? $pagename : "{{PAGE_NAME}}" ?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="<?= $url ?>/../css/bootstrap.css">
    <link rel="stylesheet" href="<?= $url ?>/../css/fonts.css">
    <link rel="stylesheet" href="<?= $url ?>/../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= $url ?>/../css/jquery-ui.min.css">

    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="assets/img/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<?php if ($actual_link !== $home_link && $actual_link !== $home_link_index) { ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">

                <form action="../../tp_centre_equestre/" method="post">
                    <button class="navbar-brand" type="submit" name="index">Accueil</button>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="../controller/AccueilController.php" method="post">
                            <button type="submit" name="dashboard">Dashboard</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="../controller/RepresentantController.php" method="post">
                            <button type="submit" name="showAll">Représentants</button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <form action="../controller/CavalierController.php" method="post">
                            <button type="submit" name="action" value="index">Cavaliers</button>
                        </form>
                    </li>

                    <?php
                    if (isset($_SESSION) && $_SESSION['connecte'] == True) { //Si connecté, afficher boutton déconnexion
                    ?>

                        <li class="nav-item">
                            <form action="../controller/ConnexionController.php" method="post">
                                <button type="submit" name="deconnexion">Déconnexion</button>
                            </form>
                        </li>

                    <?php } else { //Sinon afficher boutton connexion
                    ?>

                        <li class="nav-item">
                            <form action="../controller/ConnexionController.php" method="post">
                                <button type="submit" name="connexion">Connexion</button>
                            </form>
                        </li>

                    <?php } ?>

                    <li class="nav-item">
                        <form action="../controller/CompteController.php" method="post">
                            <button type="submit" name="inscription">Inscription</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } else { ?>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">

                <form action="/tp_centre_equestre" method="post">
                    <button class="navbar-brand" type="submit" name="index">Accueil</button> <!-- Renvoie vers la page d'accueil (pour le moment 'Test.php') -->
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="./controller/AccueilController.php" method="post">
                            <button type="submit" name="dashboard">Dashboard</button>
                        </form>
                    </li>
                    <?php
                    if (isset($_SESSION) && $_SESSION['connecte'] == True) { //Si connecté, afficher boutton déconnexion
                    ?>
                    
                        <li class="nav-item">
                            <form action="./controller/ConnexionController.php" method="post">
                                <button type="submit" name="deconnexion">Déconnexion</button>
                            </form>
                        </li>

                    <?php } else { //Sinon afficher boutton connexion
                    ?>

                        <li class="nav-item">
                            <form action="controller/ConnexionController.php" method="post">
                                <button type="submit" name="connexion">Connexion</button>
                            </form>
                        </li>

                    <?php } ?>

                    <li class="nav-item">
                        <form action="controller/CompteController.php" method="post">
                            <button type="submit" name="inscription">Inscription</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>

</html>