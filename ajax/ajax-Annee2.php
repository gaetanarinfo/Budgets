<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

if (isset($_POST['year'])) {

    $entreprises = $db->query('SELECT sum(montant) as montant FROM `salaires` WHERE `year` = "' . $_POST['year']. '" AND user_id = "' . $_SESSION['user_id'] . '"');
    foreach ($entreprises as $entreprise) {
        echo $entreprise['montant'];
    }
}
