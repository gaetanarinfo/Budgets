<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$req = selectDB('*', 'users', 'username = "' . $username . '"', $db, '1');

if ($username != $req['username']) {

    $usernames = '' . $username . '';
    $passwords = '' . $password . '';
    $email = '' . $email . '';
    $status = '0';

    // Modification de l'entreprise
    $db->query('INSERT INTO `users` (`username`, `password`, `email`, `status`) VALUES (
        "' . $usernames . '",
        "' . $passwords . '",
        "' . $email . '",
        "' . $status . '")');

    $from         = 'support@app-budgets.store';
    $from_name     = 'Budgets - Seigneur Gaëtan';
    $to             = $_POST['email'];
    $to_name     = $_POST['username'];
    $reply         = $_POST['email'];
    $reply_name     = $_POST['username'];
    $subject     = "Inscription sur budgets";
    $content     = template_mail_register($_POST['username'], $_POST['email']);

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);


    echo 'ok';
} else {

    echo 'error_register';
}
