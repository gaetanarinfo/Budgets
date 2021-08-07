<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(false);

if (!empty($_POST['id']) && !empty($_SESSION['user_id'])) {

    $active = '`active` = "' . $_POST['active'] . '"';

    $db->query('UPDATE `budgets` SET '.$active.' WHERE `id` = "' . $_POST['id'] . '" AND `user_id` = "' . $_SESSION['user_id'] . '"');

    echo "ok";
}