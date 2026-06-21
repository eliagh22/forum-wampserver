<?php
    require('actions/users/securityActions.php');
    require('actions/questions/showArticle.php');
    require('actions/questions/answersActions.php');
    require('actions/questions/showAllAnswers.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="photos/image.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article <?= $idQuestion?></title>
</head>
<body>
    <?php require 'assets/nav.php'?>
    <br><br>

    <div class="question">
        <?php
            if(isset($errormessage)){
                echo $errormessage;
            }       
            if(isset($question_date)){
                ?>
                <section class="show-question">
                    <h3><?= $question_title ?></h3>
                    <hr>
                    <p><?= $question_content ?></p>
                    <hr>
                    <small>Ecrit par <?= $question_pseudo ?>, le <?= $question_date ?></small>
                    <br><br>                    
                </section>
                <section class="show-answers">
                    <form method='POST'>
                        <label for="answers">Réponse</label><br>
                        <textarea name="answers" id="answers"></textarea><br>
                        <button type="submit" name='formsend'>Répondre</button>
                    </form>
                    <br>
                    <hr>
                    <h2>Les réponses de la question :</h2>
                    <hr>
                    <?php
                        while($answer = $getAnswers->fetch()){
                            ?>
                            <div class="card">
                                <h3>Par <?= $answer['pseudo_author'] ?></h3>
                                <p><?= $answer['contenu']?></p>
                                <small><?= $answer['date_publication'] ?></small>
                            </div>
                            <?php
                        }
                    ?>
                </section>
 
                <?php
            }
        ?>
    </div>

</body>
</html>