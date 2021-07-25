<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

if (!empty($_POST['montant'])) {

    $montant = '`montant` = "' . $_POST['montant'] . '"';
    $pole_emplois = '`pole_emplois` = "' . $_POST['pole_emplois'] . '"';
    $status = '`status` = "' . $_POST['status'] . '"';
    $month = '`month` = "' . $_POST['month'] . '"';
    $year = '`year` = "' . date('Y') . '"';

    $db->query('UPDATE `salaires` SET '. $montant.', '.$pole_emplois.', '.$status.', '.$month.', '.$year.' WHERE `id` = "' . $_GET['id'] . '" AND `user_id` = "' . $_SESSION['user_id'] . '"');
}