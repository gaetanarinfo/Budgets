<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

if (isset($_POST['year'])) {

    $entreprises = selectDB('*', 'salaires', 'year = "' . $_POST['year'] . '" AND month = "' . $_POST['month'] . '" AND user_id = "'. $_SESSION['user_id'] .'" ORDER BY id ASC', $db, '*');

    foreach ($entreprises as $entreprise) {
        echo $entreprise['pole_emplois'] . '';
    }
}
