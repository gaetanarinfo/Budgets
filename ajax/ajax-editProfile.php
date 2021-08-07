<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(false);

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $users = selectDB('*', 'users', 'id = "' . $_SESSION['user_id'] . '"', $db, '1');

    if (md5($_POST['password']) == $users['password']) {

        $email = '`email` = "' . $_POST['email'] . '"';

        $db->query('UPDATE `users` SET ' . $email . ' WHERE `id` = "' . $_SESSION['user_id'] . '"');

        echo "ok";

    }else {

        echo "error_password";

    }

}else{

    echo "error_password";

}

?>