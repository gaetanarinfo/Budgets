<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = selectDB('*', 'users', 'username = "' . $username . '" AND password = "' . md5($password) . '"', $db, '1');

if ($username == $login['username']) {

    if (md5($password) == $login['password']) {

        $_SESSION['user_id'] = $login['id'];
        $_SESSION['username'] = $login['username'];

        echo 'ok';

    } else {

        echo 'error_login';
    }

} else {

    echo 'error_login';
    
}
