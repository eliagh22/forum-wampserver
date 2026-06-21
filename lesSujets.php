<?php 
require("actions/users/securityActions.php");
require('actions/questions/showQuestions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les sujets</title>
</head>
<body>
    <?php require('assets/nav.php'); ?>
    <form method='GET'>
        <input type="search" name="search" id="search">
        <button type='submit'>Rechercher</button>
    </form>
    <br>
    <?php
        while($question = $getQuest->fetch()){?>
           <div class="card">
                <h3>Titre : <a href="article.php?id=<?=$question['id']?>"><?= $question['title']?></a></h3>
                <p>Description : <?= $question['description']?></p>
                <p>Publier par <a href="profile.php?id=<?=$question['id_author']?>"><?= $question['pseudo_author']?></a> le <?= $question['date_publication']?></p>
           </div><br><?php
          
        }
    ?>
</body>
</html>