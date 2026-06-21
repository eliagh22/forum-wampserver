<?php
        session_start();
        require('actions/database.php');
        // validation du formulaire d'inscription
        if(isset($_POST['formsend'])){

            // données de l'utilisateur
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // vérifie si l'utisateur a complété tous les champs
            if(!empty($email) && !empty($password)) {
                // vérifier si l'utilisateur existe
                $checkifUserExist = $db->prepare('SELECT * FROM user WHERE mail = ?');
                $checkifUserExist->execute(array($email));

                if($checkifUserExist->rowCount() > 0) {

                    // récupère le mot de passe crypté de l'utilisateur
                    $userinfos = $checkifUserExist->fetch();
                    // vérifie si le mot de passe correspondant au mot de passe crypté de l'utilisateur
                    if(password_verify($password, $userinfos['password'])){


                            // authentification de l'utilisateur
                            $_SESSION['auth_user'] = true;
                            $_SESSION['auth_id'] = $userinfos['id'];
                            $_SESSION['auth_mail'] = $userinfos['mail'];
                            $_SESSION['auth_pseudo'] = $userinfos['pseudo'];

                            // redirection vers la page d'accueil
                            header("Location: index.php");

                    }else{
                        $errormessage = "Votre mot de passe est incorrecte";
                    }

                }else {
                    $errormessage = "Votre email est incorrecte...";
                }
                
            }else {
                $errormessage = "Veuillez compléter tous les champs...";
        
            }
        }


?>