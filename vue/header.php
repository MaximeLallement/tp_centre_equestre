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
$doc_root = str_replace('/','\\', $doc_root);
// épuration de l'url
$base_url = str_replace($doc_root, '', $base_dir);

/* Mise en place de l'url dynamic */
$url = "${protocol}://${domain}${disp_port}${base_url}";

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{PAGE_NAME}}</title>
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
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="assets/img/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>