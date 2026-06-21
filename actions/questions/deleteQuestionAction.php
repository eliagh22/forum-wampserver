<?php
require('../database.php');
session_start();
if(!isset($_SESSION['auth_user'])){
    header("location: ../../login.php");
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $idquest = $_GET['id'];

    $checkQuestion = $db->prepare("SELECT * FROM questions WHERE id = ?");
    $checkQuestion->execute(array($idquest));

    if($checkQuestion->rowCount() > 0){ 
        $questionInfo = $checkQuestion->fetch();
        if($questionInfo['id_author'] == $_SESSION['auth_id']){

            $delete = $db->prepare("DELETE FROM questions WHERE id =?");
            $delete->execute(array($idquest));

            header("location: ../../mesquestions.php");
        }else {
            "Vous n'avez pas le droit de supprimer cette question !! ";
        }

    }echo '<p> Aucune question n\'a été trouvée</p>';

}else{
    echo '<p> Aucune question n\'a été trouvée</p>';
}
?>