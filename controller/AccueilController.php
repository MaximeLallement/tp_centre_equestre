<?php

if(isset($_POST["index"])){

    return require_once "/tp_centre_equestre/index.php";

}

if(isset($_POST["dashboard"])){

    return require_once "../vue/dashboard.php";

}




?>