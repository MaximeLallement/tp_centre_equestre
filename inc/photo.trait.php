<?php
/**
 * Function : upload_photo
 * Need $_POST["nom"], $_POST["prenom"] and $_FILES[]
 */
function upload_photo($toUpdate = false)
{
    /** 
     * Traitement de la photo
     */
        
    // Modifie le nom de la photo
    $_FILES["photo"]["name"] = $_POST["nom"].$_POST["prenom"].date("Ymdhs").".jpg";
    // Supprime les espaces blancs
    str_replace(' ','',$_FILES["photo"]["name"]);

    $target_dir = "../media/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    //Variable pivot de vérification
    (int)$uploadOk = 1;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if the file already exist within the folder
    if(!$toUpdate)
    {  
        if(file_exists($target_file)) {    
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
           return true;
        } else {
            return false;
        }
    }
}