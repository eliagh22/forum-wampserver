<?php
    try{        
        $db = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'OK'. '</br>';
    }catch(PDOException $e){
        echo $e;
    }


?>