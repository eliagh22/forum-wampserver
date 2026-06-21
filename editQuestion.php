<?php
    require('actions/users/securityActions.php'); 
    require('actions/questions/infoeditQuestionActions.php');  
    require('actions/questions/editQuestionActions.php'); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une question</title>
</head>
<body>
    <?php require('assets/nav.php') ?>
    <div>
        <?php 
            if(isset($errormessage)) {
                echo '<p>'. $errormessage . '</p>';
            }elseif(isset($sucessMsg)){
                echo '<p>'. $sucessMsg. '</p>';
            }

        ?>
        <?php 
            if(isset($question_content)){ ?>
                <form method="post">

                        <label for="title">Titre du sujet : </label><textarea name="title" id="title" ><?= $question_title; ?></textarea> <br>
                        <label for="description">Description de la question : </label><textarea name="description" id="description"><?= $question_description; ?></textarea> <br>
                        <label for="content">Contenu : </label><textarea name="content" id="content"><?= $question_content; ?></textarea> <br>
                        <input type="submit" name="formsend" id="formsend" value="Modifier le sujet"> <br>
                </form>                 
            <?php }
        ?>
       
    </div>

</body>
</html>