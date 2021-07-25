<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config/config.php';
include "assets/langs/" . $lang . ".php";
include 'config/fonctions.php';
include 'config/connexion.php';

login(false);

include 'modules/header.php';

include 'modules/navbar.php';

include 'pages/budgets.php';

include 'modules/footer.php';
