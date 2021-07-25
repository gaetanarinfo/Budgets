<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config/config.php';
include "assets/langs/" . $lang . ".php";
include 'config/fonctions.php';
include 'config/connexion.php';

login(false);

$year = selectDB('*', 'annee', '1 ORDER BY id ASC', $db, '1');

if ($_GET['annee'] != $year['value']) {
    header('Location: /');
}

include 'modules/header.php';

include 'modules/navbar.php';

include 'pages/annee.php';

include 'modules/footer.php';
