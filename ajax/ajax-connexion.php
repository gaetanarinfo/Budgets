<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = selectDB('*', 'users', 'username = "' . $username . '" AND password = "' . md5($password) . '"', $db, '1');

if ($username == $login['username']) {

    if (md5($password) == $login['password']) {

        if ($login['status'] != 0) {

            $_SESSION['user_id'] = $login['id'];
            $_SESSION['username'] = $login['username'];
            $_SESSION['email'] = $login['email'];

            $from         = 'support@app-budgets.store';
            $from_name     = 'Budgets - Seigneur Gaëtan';
            $to             = $login['email'];
            $to_name     = $login['username'];
            $reply         = $login['email'];
            $reply_name     = $login['username'];
            $subject     = "Connexion à votre compte";
            $content     = template_mail($login['username']);

            sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);

            echo 'ok';
        } else {
            echo 'error_status';
        }
    } else {

        echo 'error_login';
    }
} else {

    echo 'error_login';
}
