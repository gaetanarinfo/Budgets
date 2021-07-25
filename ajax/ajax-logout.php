<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(false);

session_destroy(); //destroy the session

header("location: /login"); 

exit();