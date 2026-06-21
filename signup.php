<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>
    <?php require('assets/nav.php'); require('actions/users/signupactions.php') ?>
    <div class="formulaire">
        <form method="post">
            <?php 
                if(isset($errormessage)) {
                    echo '<p>'. $errormessage . '</p>';
                } 
            ?>
            <label for="pseudo">Votre surnom :</label><input type="text" name="pseudo" id="pseudo" placeholder="Maxime" >
            <label for="email">Votre email :</label><input type="mail" name="email" id="email" placeholder="tobitogaming@gmail.com" >
            <label for="password">Votre mot de passe :</label><input type="password" name="password" id="password" >
            <input type="submit" name="formsend" id="formsend" value="S'inscrire"> <br>

            <a href="login.php"><p>Vous avez déjà un compte</p></a>
        </form>
    </div>
</body>
</html>