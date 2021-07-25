<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

if (!empty($_POST['name'])) {

    $user_id = '' . $_SESSION['user_id'] . '';
    $name = '' . $_POST['name'] . '';
    $sommes = '' . $_POST['sommes'] . '';
    $status = '' . $_POST['status'] . '';
    $month = '' . $_POST['month'] . '';
    $year = '' . date('Y') . '';
    $sommes_due = '' . $_POST['sommes_due'] . '';
    $montant_due = '' . $_POST['montant_due'] . '';

    $db->query('INSERT INTO `budgets` (`user_id`,`name`,`sommes`,`sommes_due`,`montant_due`,`status`,`month`,`year`) VALUES (
        "' . $user_id . '",
        "' . $name . '",
        "' . $sommes . '",
        "' . $sommes_due . '",
        "' . $montant_due . '",
        "' . $status . '",
        "' . $month . '",
        "' . $year . '")');
}