<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(false);

if (!empty($_POST['month']) && !empty($_SESSION['user_id'])) {

    $month = '`month` = "' . $_POST['month'] . '"';
    $active = '`active` = "' . $_POST['active'] . '"';

    $db->query('UPDATE `budgets` SET '.$month.', '.$active.' WHERE `month` = "' . $_POST['month'] . '" AND `user_id` = "' . $_SESSION['user_id'] . '"');

    echo "ok";
}