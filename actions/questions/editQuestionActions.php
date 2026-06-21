<?php
require('actions/database.php');

// vérifier si le formulaire a été envoyé
if(isset($_POST['formsend'])){

    // vérifier si les champs sont remplis
    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['description'])){

        $new_title = htmlspecialchars($_POST['title']);
        $new_description = nl2br(htmlspecialchars($_POST['description'])); 
        $new_content = nl2br(htmlspecialchars($_POST['content']));
        
        // modifier la question qui possède l'id rentrer en paramètre dans l'url 
        $editQuestion = $db->prepare("UPDATE questions SET title = ?, description = ?, contenu = ? WHERE id = ?");
        $editQuestion->execute(array($new_title, $new_description ,$new_content, $idquest));

        // redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: mesquestions.php');
    }else{
        $errormessage = 'Veulliez compléter le formulaire';
    }
}

?>