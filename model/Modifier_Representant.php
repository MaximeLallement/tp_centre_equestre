<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 text-align="center">Formulaire Inscription</h1>
        <form method="post" action="Modifier_Representant.php">
            <div>
                <label for='id'></label>
            </div>
            <div>
                <label for="mail">Mail</label>
                <input type="email" id="mail" name="mail_personne">
            </div>
            <div>
                <label for="tel">Tel</label>
                <input type="text" id="tel" name="tel_personne">
            </div>
            <div>
                <label for="rue">Rue</label>
                <input type="text" id="rue" name="rue_personne">
            </div>
            <div>
                <label for="complement">Complément</label>
                <input type="text" id="complement" name="complement_personne">
            </div>
            <div>
                <label for="cp">Code postal</label>
                <input type="text" id="cp" name="cp_personne">
            </div>
            <div>
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville_personne">
            </div>
            <input type="submit" name="Modifier" value="Modifier"/>
        </form>
    </body>
</html>

<?php

require('../inc/bdd.inc.php');

function update(){
    
    $id_personne = $_POST['id_personne'];
    $mail= $_POST['mail_personne'];
    $tel= $_POST['tel_personne'];
    $rue= $_POST['rue_personne'];
    $complement= $_POST['complement_personne'];
    $code_postal= $_POST['cp_personne'];
    $ville= $_POST['ville_personne'];

    $id_personne = (int) $id_personne;
    if(!$id_personne){
        return false;
    }
    global $con;
    $request = "UPDATE ".DB_TABLE_PERSONNE." SET mail = :mail, tel = :tel, rue = :rue, complement = :complement, code_postal = :cp, ville = :ville WHERE id_personne = :id_personne";
    $sql = $con->prepare($request);
    $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_STR);
    $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
    $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
    $sql->bindValue(':rue', $rue, PDO::PARAM_STR);
    $sql->bindValue(':complement', $complement, PDO::PARAM_STR);
    $sql->bindValue(':cp', $code_postal, PDO::PARAM_STR);
    $sql->bindValue(':ville', $ville, PDO::PARAM_STR);
    
    try{
        $sql->execute();
        return true;
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

if(isset($_POST["Modifier"])){
   update();
}
 















