<?php
require('actions/database.php');

// vérifier si l'identifiant de la question est rentrer en paramettre de l'url pour trouver la question correspondant a afficher
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        //  Récupérer l'identifiant de la question dans l'url
        $idQuestion = $_GET['id'];

        // récuperer toutes les données de la question avec l'identifiant rentrer en url
        $checkQuestion = $db->prepare("SELECT * FROM questions WHERE id = ?");
        $checkQuestion->execute(array($idQuestion));

        // vérifier si la question avec l'identifiant rentrer existe
        if($checkQuestion->rowCount() > 0) {
            // stocker toutes les données de la question avec l'identifiant dans un tableau
            $questionInfo = $checkQuestion->fetch();
            // stocker chaque donnée de la question dans une variable
            $question_title = $questionInfo['title'];
            $question_content = $questionInfo['contenu'];
            $question_author = $questionInfo['id_author'];
            $question_pseudo = $questionInfo['pseudo_author'];
            $question_date = $questionInfo['date_publication'];
        }else{
            $errormessage = '<p> Aucune question n\'a été trouvée </p>';
        }
            

    }else{
        $errormessage = '<p> Aucune question n\'a été trouvée </p>';
    }


?>