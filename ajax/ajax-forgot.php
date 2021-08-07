<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

$email = $_POST['email'];

$login = selectDB('*', 'users', 'email = "' . $email . '"', $db, '1');

if ($email == $login['email']) {

    $_SESSION['token'] = uniqid();

    $token = '`token` = "' . $_SESSION['token'] . '"';

    $db->query('UPDATE `users` SET ' . $token . ' WHERE `email` = "' . $_POST['email'] . '"');

    $from         = 'support@app-budgets.store';
    $from_name     = 'Budgets - Seigneur Gaëtan';
    $to             = $login['email'];
    $to_name     = $login['username'];
    $reply         = $login['email'];
    $reply_name     = $login['username'];
    $subject     = "Réinitialisation de votre mot de passe";
    $content     = template_mail_forgot($login['username'], $_SESSION['token']);

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);

    echo 'ok';

} else {

    echo 'error_email';

}
