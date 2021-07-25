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
    $status = '0';

    // Modification de l'entreprise
    $db->query('INSERT INTO `users` (`username`, `password`, `status`) VALUES (
        "' . $usernames . '",
        "' . $passwords . '",
        "' . $status . '")');


    echo 'ok';
} else {

    echo 'error_register';
    
}
