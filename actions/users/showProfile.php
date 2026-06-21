<?php
require('actions/database.php');

// vérifier si l'identifiant de l'utilisateur est rentré dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // récupérer l'identifiant entré dans une variable
    $id_user = $_GET['id'];

    // récupérer les informations de l'utilisateur en fonction de l'identifiant
    $checkUser = $db->prepare("SELECT * FROM user WHERE id = ?");
    $checkUser->execute(array($id_user));

    // vérifier si l'utilisateur existe
    if($checkUser->rowCount() > 0) {
        $userInfo = $checkUser->fetch();

        // récupérer les information de l'utilisateur
        $user_pseudo = $userInfo['pseudo'];
        $user_mail = $userInfo['mail'];
        $user_date = $userInfo['date'];

        // récupérer toutes les questions publiés par l'utilisateur
        $user_Questions = $db->prepare("SELECT * FROM questions WHERE id_author = ? ORDER BY id DESC");
        $user_Questions->execute(array($id_user));

        
    }else{$errormessage = 'L\'utilisateur n\'existe pas';} 
    
}else{
    $errormessage = 'Aucun utilisateur trouvé';
}





?>