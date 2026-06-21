<?php
    require('actions/database.php');
    // Récupérer toutes les questions de la base de données dans l'ordre de parution du plus récent.
    $getQuest = $db->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

    // vérifier si une recherche à été envoyé dans la barre de recherche
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        // variable contenant la recherche dans l'url
        $userSearch = $_GET['search'];
        // récupérer toutes les questions qui correspondes à la recherche en fonction du titre et en néglineant les texte supperfluxs ce qui permet une recherche plus précise
        $getQuest = $db->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');
    }

?>