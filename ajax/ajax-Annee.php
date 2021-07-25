<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

if (isset($_POST['year'])) {

    $entreprises = $db->query('SELECT sum(sommes) as sommes FROM `budgets` WHERE `year` = "' . $_POST['year']. '" AND user_id = "' . $_SESSION['user_id'] . '" AND sommes_due = 1');
    foreach ($entreprises as $entreprise) {
        echo $entreprise['sommes'];
    }
}
