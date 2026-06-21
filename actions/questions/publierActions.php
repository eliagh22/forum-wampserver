<?php
require('actions/database.php');

// valider le forumaire 
if(isset($_POST['formsend'])){
    //  vérifier si les champs ne sont pas vides
    if(!empty($_POST['description']) AND !empty($_POST['title']) AND !empty($_POST['content'])){
        // récupérer les données des champs des questions 
        $question_title = htmlspecialchars($_POST['title']);
        $question_decription = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y'); 
        $question_id_author = $_SESSION['auth_id'];
        $question_pseudo_author = $_SESSION['auth_pseudo'];

        // insérer la question dans la base de données dans la table questions
        $insertQuestions = $db->prepare('INSERT INTO questions(title, description, contenu, id_author, pseudo_author, date_publication) VALUES(?, ?, ?, ?, ? ,?) ');
        $insertQuestions->execute(array($question_title, $question_decription, $question_content, $question_id_author, $question_pseudo_author, $question_date));

        // affichage du message de succès
        $sucessMsg = 'Votre question a été ajoutée avec succès!';

    }else{
        $errormessage = "Vous n'avez pas remplis tous les champs ...";
    }
}

?>