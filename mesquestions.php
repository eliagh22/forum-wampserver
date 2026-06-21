<?php
    require("actions/users/securityActions.php");require("actions/questions/questionsActions.php") 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes questions</title>
</head>
<body>
    <?php require('assets/nav.php'); ?>

    <?php 
        while($questions =  $getAllquest->fetch()) {
            ?>
            <div class="card">
                <div class="">
                    <h3>Titre</h3>
                    <?= $questions['title'] ?>
                </div>
                <div class="">
                    <h4>Description</h4>
                    <p class=""><?= $questions['description'] ?></p>
                    <a href="article.php?id=<?=$questions['id']?>" class="">Accéder à la question</a>
                    <a href="editQuestion.php?id=<?= $questions['id'] ?>" class="">Modifier l'article</a>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?= $questions['id']?>" class="">Supprimer la question</a>
                </div>
            </div>
            <?php
        }
    ?>
    
</body>
</html>