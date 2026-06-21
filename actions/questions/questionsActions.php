<?php
require('actions/database.php');

    $getAllquest = $db->prepare("SELECT id, title, description FROM `questions` WHERE id_author = ? ORDER BY id DESC");
    $getAllquest->execute(array($_SESSION['auth_id']));

?>