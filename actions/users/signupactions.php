<?php
        session_start();
        require('actions/database.php');

        // validation du formulaire d'inscription
        if(isset($_POST['formsend'])){

            // données de l'utilisateur
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // vérifie si l'utisateur a complété tous les champs
            if(!empty($pseudo) && !empty($email) && !empty($password)) {
                echo 'Votre pseudo : '. $_POST['pseudo'] . '</br>';
                echo 'Votre mail : ' . $_POST['email']  . '</br>';
                echo 'Votre mot de passe : '. $password;

                // vérifier la nomenclature de l'email
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        // vérifie si le mail de l'utilisateur existe déjà
                        $checkuserexist_mail = $db->prepare('SELECT mail FROM user WHERE mail = ?');
                        $checkuserexist_mail ->execute(array($email));
                        if($checkuserexist_mail->rowCount() == 0) {

                            // vérifie si le pseudo de l'utilisateur existe déjà
                            $checkuserexist_pseudo = $db->prepare('SELECT pseudo FROM user WHERE pseudo = ?');
                            $checkuserexist_pseudo->execute(array($pseudo));
        
                            if($checkuserexist_pseudo->rowCount() == 0) {
                                // insertion de l'utilisateur dans la bdd
                                $insert = $db->prepare('INSERT INTO user(pseudo, mail, password) VALUES (?,?,?)');
                                $insert->execute(array($pseudo, $email, $password));
                                
                                // récupérer les infos de l'utilisateur
                                $getInfoUser = $db->prepare('SELECT id , pseudo , mail FROM user WHERE pseudo =? AND mail =?');
                                $getInfoUser->execute(array($pseudo, $email));

                                $usersinfo = $getInfoUser->fetch();

                                // authentification de l'utilisateur
                                $_SESSION['auth_user'] = true;
                                $_SESSION['auth_id'] = $usersinfo['id'];
                                $_SESSION['auth_mail'] = $usersinfo['mail'];
                                $_SESSION['auth_pseudo'] = $usersinfo['pseudo'];

                                // redirige vers la page d'accueil
                                header('Location: index.php');


                            }else {
                                $errormessage = 'Le pseudo existe déjà...';
                            }      
                        }else{
                            $errormessage = "L'adresse email existe déjà...";
                        }
                }else {
                    $errormessage = "L'adresse email n'est pas valide";
                }
                
            }else {
                $errormessage = "Veuillez compléter tous les champs...";
        
            }




        }
?>