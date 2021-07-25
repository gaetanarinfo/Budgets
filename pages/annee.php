<?php

$budgets_total = $db->query('SELECT sum(sommes) as sommes FROM `budgets` WHERE `year` = "' . str_replace($_SERVER['REQUEST_URI'], 'annee/', $_GET['annee']) . '" AND user_id = "' . $_SESSION['user_id'] . '" AND sommes_due = 1');
$salaires = $db->query('SELECT sum(montant) as montant FROM `salaires` WHERE `year` = "' . str_replace($_SERVER['REQUEST_URI'], 'annee/', $_GET['annee']) . '" AND user_id = "' . $_SESSION['user_id'] . '"');
$poles = $db->query('SELECT sum(pole_emplois) as pole_emplois FROM `salaires` WHERE `year` = "' . str_replace($_SERVER['REQUEST_URI'], 'annee/', $_GET['annee']) . '" AND user_id = "' . $_SESSION['user_id'] . '"');

?>

<div class="b-example-divider"></div>

<div class="container-md my-md-4 bd-layout mb-4">

    <div class="bd-content ps-lg-4">
        <h2 class="text-center mb-4">Total du budget pour <?= date('Y') ?></h2>
    </div>

    <div class="toast_success toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast_message">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 m-auto">
            <ul class="list-group">
                <?php foreach ($budgets_total as $key => $annees) { ?>
                    <?php foreach ($salaires as $key => $salaire) { ?>
                        <?php foreach ($poles as $key => $pole) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dépenses
                                <span class="badge bg-success rounded-pill"><?= number_format($annees['sommes'], 0, ",", " "); ?> €</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Salaires
                                <span class="badge bg-info rounded-pill"><?= number_format($salaire['montant'], 0, ",", " "); ?> €</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pôle emploi
                                <span class="badge bg-danger rounded-pill"><?= number_format($pole['pole_emplois'], 0, ",", " "); ?> €</span>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>

    <input type="hidden" name="year" value="<?= date('Y') ?>">
    
</div>

<div class="b-example-divider"></div>

<div class="container-xxl my-md-4 bd-layout mb-4">

    <div class="bd-content ps-lg-4">
        <h2 class="text-center mb-4  mt-4">Total du budget pour <?= date('Y') ?></h2>
    </div>

    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1539" height="649" style="display: block; width: 1539px; height: 649px;"></canvas>

</div>

<div class="b-example-divider"></div>