<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

if (!empty($_POST['montant']) || !empty($_POST['pole_emplois'])) {

    $user_id = '' . $_SESSION['user_id'] . '';
    $montant = '' . $_POST['montant'] . '';
    $pole_emplois = '' . $_POST['pole_emplois'] . '';
    $status = '' . $_POST['status'] . '';
    $month = '' . $_POST['month'] . '';
    $year = '' . date('Y') . '';

    $db->query('INSERT INTO `salaires` (`user_id`,`montant`,`pole_emplois`,`status`,`month`,`year`) VALUES (
        "' . $user_id . '",
        "' . $montant . '",
        "' . $pole_emplois . '",
        "' . $status . '",
        "' . $month . '",
        "' . $year . '")');
}