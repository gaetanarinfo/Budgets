<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config/config.php';
include "assets/langs/" . $lang . ".php";
include 'config/fonctions.php';
include 'config/connexion.php';

login(true);

if (!empty($_SESSION['token'])) {
    $users = selectDB('*', 'users', 'token = "' . $_SESSION['token'] . '"', $db, '1');
}

if ($_GET['token'] != $_SESSION['token'] && $_GET['token'] != $users['token']) {
    header('Location: /');
}

include 'modules/header.php';

include 'modules/navbar.php';

include 'pages/forgot-confirm.php';

include 'modules/footer.php';
