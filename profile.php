<?php
require('actions/users/securityActions.php');
require('actions/users/showProfile.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profile</title>
</head>
<body>
    <?php require('assets/nav.php') ?>
    <?php                 
        if(isset($user_Questions)){
            ?>
            <div>
                <h2>Profil d'utilisateur</h2>
                <hr>
                <h4>Mon pseudo : <?= $user_pseudo ?></h4>
                <h4>Mon email : <?= $user_mail ?></h4>
                <small>Le compte a été créer le <?= $user_date ?></small>
                <br><br><br>
            </div>
            <?php
            if($user_Questions->rowCount() > 0){
                while($questions = $user_Questions->fetch()){?>
                <hr>
                <div>
                    <h3>Titre : <?= $questions['title']?></h3>
                    <h4>Description <?= $questions['description']?></h4>
                </div>
                <br><?php    
                }
            }else{$errormessage = 'Vous n\'avez pas encore de questions';}
        }
        if(isset($errormessage)) {
            echo '<p>'. $errormessage . '</p>';
        }
        ?>
</body>
</html>