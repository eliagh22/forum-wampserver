<?php 
    require('actions/users/securityActions.php');
    require('actions/questions/publierActions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une question</title>
</head>
<body>
    <?php require('assets/nav.php'); ?>
        <form method="post">
            <?php 
                if(isset($errormessage)) {
                    echo '<p>'. $errormessage . '</p>';
                }elseif(isset($sucessMsg)){
                    echo '<p>'. $sucessMsg. '</p>';
                }

            ?>
            <label for="title">Titre du sujet : </label><textarea name="title" id="title" placeholder="Entrez le titre ..." ></textarea> <br>
            <label for="description">Description de la question : </label><textarea name="description" id="description" placeholder="La description..."></textarea> <br>
            <label for="content">Contenu : </label><textarea name="content" id="content" placeholder="Ecrire ici..."></textarea> <br>
            <input type="submit" name="formsend" id="formsend" value="Publier le sujet"> <br>
        </form>
</body>
</html>