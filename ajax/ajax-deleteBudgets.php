<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/connexion.php';

login(true);

$db->query('DELETE FROM `budgets` WHERE `id` = "'.$_GET['id'].'" AND `user_id` = "'. $_SESSION['user_id'] .'"');