<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

if (!empty($_POST['password'])) {

    $users = selectDB('*', 'users', 'token = "'. $_SESSION['token'] .'" ORDER BY id DESC', $db, '1');

    if ($_SESSION['token'] == $users['token']) {

        $password = '`password` = "' . md5($_POST['password']) . '"';
        $token = '`token` = "NULL"';

        $db->query('UPDATE `users` SET ' . $password . ', ' . $token . ' WHERE `token` = "' . $_SESSION['token'] . '"');

        $_SESSION['token'] = "";

        echo "ok";

    }else{

        echo "error_token";
        
    }

}

?>