<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

if (!empty($_POST['name']) || !empty($_POST['sommes'])) {

    $name = '`name` = "' . $_POST['name'] . '"';
    $sommes = '`sommes` = "' . $_POST['sommes'] . '"';
    $sommes_due = '`sommes_due` = "' . $_POST['sommes_due'] . '"';
    $montant_due = '`montant_due` = "' . $_POST['montant_due'] . '"';
    $status = '`status` = "' . $_POST['status'] . '"';
    $month = '`month` = "' . $_POST['month'] . '"';
    $year = '`year` = "' . date('Y') . '"';

    $db->query('UPDATE `budgets` SET '. $name.', '.$sommes.', '.$sommes_due.', '.$montant_due.', '.$status.', '.$month.', '.$year.' WHERE `id` = "' . $_GET['id'] . '" AND `user_id` = "' . $_SESSION['user_id'] . '"');
}