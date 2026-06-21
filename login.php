<?php 
require('actions/users/loginActions.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <div class="head">
        <?php require('assets/nav.php'); ?>
        <h1>Bienvenue sur le site</h1>
        <div class="formulaire">
        <form method="post">
            <?php 
                if(isset($errormessage)) {
                    echo '<p>'. $errormessage . '</p>';
                } 
            ?>
            <label for="email">Votre email :</label><input type="mail" name="email" id="email" placeholder="tobitogaming@gmail.com" >
            <label for="password">Votre mot de passe :</label><input type="password" name="password" id="password" >
            <input type="submit" name="formsend" id="formsend" value="Se connecter"> <br>
            
            <a href="signup.php"><p>Vous n'avez pas de compte</p></a>
        </form>
    </div>
    </div>

</body>
</html>