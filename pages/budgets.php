<?php

$month = selectDB('*', 'month', 'value = "' . $_GET['budgets'] . '" ORDER BY id ASC', $db, '1');

if ($_GET['budgets'] != $month['url']) {
    header('Location: /');
}

$budgets = selectDB('*', 'budgets', 'month = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '*');
$budgets_total = $db->query('SELECT sum(sommes) as sommes FROM `budgets` WHERE `month` = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND year = "' . date('Y') . '" AND user_id = "' . $_SESSION['user_id'] . '" AND sommes_due = 1')->fetchColumn();
$budgets_total_due = $db->query('SELECT sum(montant_due) as montant_due FROM `budgets` WHERE `month` = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND year = "' . date('Y') . '" AND user_id = "' . $_SESSION['user_id'] . '"')->fetchColumn();
$salaire = selectDB('*', 'salaires', 'month = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '1');
$salairec = selectDB('*', 'salaires', 'month = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '*');

if (!empty($salaire['montant'])) {

    $total_salaire = $salaire['montant'] + $salaire['pole_emplois'];
    $percentage = round($budgets_total * 100 / $total_salaire);
}

?>

<div class="b-example-divider"></div>

<div class="container-xxl my-md-4 bd-layout mb-4">

    <div class="bd-content ps-lg-4">
        <h2 class="text-center mb-4  mt-4">Budget pour <?= $_GET['budgets'] ?> <?= date('Y') ?></h2>
    </div>

    <div class="toast_success toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast_message">

            </div>
        </div>
    </div>

    <div style="position: relative;text-align: right;">
        <?php if (count($salairec) != 1) { ?>
            <a href="#" class="btn btn-success me-2 mt-2 mb-2 text-white" data-bs-toggle="modal" data-bs-target="#add_salaire"><i class="fas fa-plus text-white me-1"></i> Ajouter le salaire</a>
        <?php } else { ?>
            <a href="#" class="btn btn-warning me-2 mt-2 mb-2 text-black" data-bs-toggle="modal" data-bs-target="#edit_salaire"><i class="fas fa-pencil-alt text-black me-1"></i> Modifier le salaire</a>
        <?php } ?>
        <a href="#" class="btn btn-info me-2 mt-2 mb-2 text-white" data-bs-toggle="modal" data-bs-target="#add_budgets"><i class="fas fa-plus text-white me-1"></i> Ajouter une dépense</a>

        <a class="popper btn btn-info me-2 mt-2 mb-2 text-white" data-bs-trigger="hover" data-bs-toggle="popover"><i class="fas fa-book"></i> Lexique</a>
        <div class="popper-content d-none">
            <ul class="list-group">
                <li class="list-group-item"><b>Dépenses :</b> Nom de votre dépense</li>
                <li class="list-group-item"><b>Montant :</b></b> Total de vos charges sur le mois</li>
                <li class="list-group-item"><b>Status :</b> Montant payé ou en attante de paiement</li>
                <li class="list-group-item"><b>Montant due :</b> Montant en votre faveur</li>
                <li class="list-group-item"><b>Actions :</b> Les actions que vous pouvez faire pour une dépense</li>
            </ul>
        </div>
    </div>

    <?php if (!empty($salaire['montant'])) { ?>

        <hr />

        <div style="position: relative;text-align: left;display: block;" class="col-12 col-md-5 col-lg-5 mt-2 mb-2">
            <div class="mb-2">Salaire dépensé à <b><?= $percentage; ?> %</b> (Restant : <b><?= intval($total_salaire - $budgets_total) ?> €</b>) :
            </div>
            <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percentage; ?>%"></div>
            </div>
        </div>

    <?php } ?>

    <hr />

    <div class="table-responsive">

        <?php if (count($budgets) != 0) { ?>

            <table id="table_budgets" class="table table-striped table-hover tablesorter text-center">
                <thead>
                    <tr role="row" class="tablesorter-headerRow">
                        <th scope="col">Dépenses</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Montant due</th>
                        <th scope="col"></th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($budgets as $key => $budget) { ?>
                        <tr>
                            <td><?= $budget['name'] ?></td>
                            <td><?= number_format($budget['sommes'], 0, ",", " "); ?> €</td>
                            <td><?php if ($budget['status'] != 2) { ?><span class="badge bg-success">Payé</span><?php } else { ?><span class="badge bg-danger">Non payé</span><?php } ?></td>
                            <td><?php if ($budget['sommes_due'] != 2) { ?><span class="badge bg-danger">Aucun montant</span><?php } else { ?><span class="badge bg-success">En +</span><?php } ?></td>
                            <td><?= number_format($budget['montant_due'], 0, ",", " "); ?> €</td>
                            <td><a data-bs-toggle="modal" data-bs-target="#edit_budgets_<?= $budget['id'] ?>" href="#" class="btn btn-warning me-2 mt-2 mb-2"><i class="fas fa-pencil-alt"></i></a><a id="delete_budgets_<?= $budget['id'] ?>" href="#" class="btn btn-danger me-2 mt-2 mb-2"><i class="fas fa-trash"></i></a><?php include 'modules/modals/budgetsEdit.php'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <div class="bd-content ps-lg-4">
                <h5 class="text-center mb-4  mt-4"><i class="fas fa-exclamation-circle text-warning"></i> Aucun budget trouvé pour le mois de <?= $_GET['budgets'] ?></h5>
            </div>
        <?php } ?>

    </div>

    <div class="mt-3 mb-3">

        <?php if (count($budgets) != 0) { ?>
            <div>
                <span style="font-size: 13px;font-weight: bold;">Dépenses :</span>
                <span class="badge bg-info ms-1"><?= count($budgets); ?> sur le mois</span>
            </div>

            <?php if (!empty($salaire['montant'])) { ?>
                <div>
                    <span style="font-size: 13px;font-weight: bold;">Salaire :</span>
                    <span class="badge bg-secondary ms-1"><?= number_format($salaire['montant'], 0, ",", "."); ?> € net sur le mois</span>
                </div>
            <?php } ?>

            <?php if (!empty($salaire['pole_emplois'])) { ?>
                <div>
                    <span style="font-size: 13px;font-weight: bold;">Pôle emplois :</span>
                    <span class="badge bg-secondary ms-1"><?= number_format($salaire['pole_emplois'], 0, ",", "."); ?> € net sur le mois</span>
                </div>
            <?php } ?>

            <?php if (!empty($salaire['pole_emplois'])) { ?>
                <div>
                    <span style="font-size: 13px;font-weight: bold;">Montant due :</span>
                    <span class="badge bg-success ms-1"><?= number_format($budgets_total_due, 0, ",", "."); ?> € sur le mois</span>
                </div>
            <?php } ?>

            <div>
                <span style="font-size: 13px;font-weight: bold;">Total :</span>
                <span class="badge bg-danger ms-1"><?php $total_salaire + $budgets_total_due; ?><?= number_format($total_salaire - $budgets_total, 0, ",", "."); ?> € en <?= $_GET['budgets'] ?> <?= date('Y') ?></span>
            </div>
            <input type="hidden" name="month" value="<?= $_GET['budgets'] ?>">
            <input type="hidden" name="year" value="<?= date('Y') ?>">
        <?php } ?>

    </div>

</div>

<div class="b-example-divider"></div>

<div class="container-xxl my-md-4 bd-layout mb-4">

    <div class="bd-content ps-lg-4">
        <h2 class="text-center mb-4  mt-4">Dépenses pour <?= $_GET['budgets'] ?> <?= date('Y') ?></h2>
    </div>

    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1539" height="649" style="display: block; width: 1539px; height: 649px;"></canvas>

</div>

<div class="b-example-divider"></div>

<?php include 'modules/modals/budgetsAdd.php'; ?>
<?php include 'modules/modals/salaireAdd.php'; ?>

<?php if (count($budgets) != 0) { ?>
    <?php include 'modules/modals/salaireEdit.php'; ?>
<?php } ?>

<script>
    <?php foreach ($budgets as $key => $budget) { ?>
        $('#editBudgets_<?= $budget['id'] ?>').submit(function() {

            $.ajax({
                url: "../ajax/ajax-editBudgets.php?id=<?= $budget['id'] ?>",
                type: "POST",
                data: {
                    name: $('#name_<?= $budget['id'] ?>').val(),
                    sommes: $('#sommes_<?= $budget['id'] ?>').val(),
                    sommes_due: $('#sommes_due_<?= $budget['id'] ?>').val(),
                    montant_due: $('#montant_due_<?= $budget['id'] ?>').val(),
                    status: $('#status_<?= $budget['id'] ?>').val(),
                    month: $('#month_<?= $budget['id'] ?>').val()
                },
                cache: false,
                success: function(data) {

                    $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre modification à été pris en compte !')
                    $('.toast_success').fadeIn();

                    setTimeout(() => {
                        location.reload();
                    }, 1500);

                }

            });

            return false;

        });

        $('#delete_budgets_<?= $budget['id'] ?>').click(function() {

            if (confirm('Êtes-vous sûr de vouloir continuer ?')) {

                $.ajax({
                    url: "../ajax/ajax-deleteBudgets.php?id=<?= $budget['id'] ?>",
                    type: "POST",
                    data: {},
                    cache: false,
                    success: function() {

                        $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre dépense à été supprimer !')
                        $('.toast_success').fadeIn();

                        setTimeout(() => {
                            location.reload();
                        }, 1500);

                    }

                });

            }

            return false;

        });
    <?php } ?>
</script>