<?php
require('actions/database.php');

if(isset($_POST['formsend'])){

    if(!empty($_POST['answers'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answers']));
        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
        $h = strftime('%I') + 2;
        $date = strftime('%A %d %B %Y'. ' à ' . $h.':%M:%S'.' ANG');

        $insertAnswer = $db->prepare('INSERT INTO answers (id_author, pseudo_author, id_question, contenu, date_publication) VALUES (?,?,?,?,?)');
        $insertAnswer->execute(array($_SESSION['auth_id'],$_SESSION['auth_pseudo'],$idQuestion,$user_answer, $date));
    }else{
        $errormessage = 'Remplissez le champs de réponse';
    }
}

?>