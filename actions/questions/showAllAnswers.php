<?php
require('actions/database.php');

// commmande SQL avec la base de donnees pour récupérer les données des réponses en fonction de l'id de la question 
$getAnswers = $db->prepare('SELECT id_author, pseudo_author, id, contenu, date_publication FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAnswers->execute(array($idQuestion));

?>