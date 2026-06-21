<?php
    require('actions/database.php'); 

    // vérifier si l'id de la question est contenu dans l'url pour modifier la question avec l'identifiant choisi
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idquest = $_GET['id'];

        // vérifier à partir de l'id de la question si elle existe
        $checkQuestion = $db->prepare("SELECT * FROM questions WHERE id = ?");
        $checkQuestion->execute(array($idquest));

        
        if($checkQuestion->rowCount() > 0){ 
            //  récupérer les donnée de la question (auteur de la question et date et contenu de la question)
            $question_infos = $checkQuestion->fetch();
            if($question_infos['id_author'] == $_SESSION['auth_id']){
                
                $question_title = $question_infos['title'];
                $question_description = $question_infos['description'];
                $question_content = $question_infos['contenu'];
                $question_date = $question_infos['date_publication'];
                $question_description =  str_replace('</br>', '', $question_description);    
                $question_content = str_replace('</br>', '', $question_content);           

            }else{
                $errormessage = 'Vous n\'êtes pas l\'auteur de cette question.';
            }
        }else{
            $errormessage = 'La question n\'existe pas';
        }
    }else{ 
        $errormessage = 'Aucune question trouvée';
    };
?>