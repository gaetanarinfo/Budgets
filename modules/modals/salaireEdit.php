<?php $salairess = selectDB('*', 'salaires', 'month = "' . str_replace($_SERVER['REQUEST_URI'], 'budgets/', $_GET['budgets']) . '" AND user_id = "' . $_SESSION['user_id'] . '" AND id = "' . $salaire['id'] . '"', $db, '1'); ?>
<div class="modal fade" id="edit_salaire" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editer le salaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSalaire" method="POST">
                <div class="modal-body">

                    <div class="toast_edit toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast_message">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Montant (Net) :</label>
                        <input type="number" class="form-control" name="montant" id="montant_edit" value="<?= $salairess['montant'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Pole emplois (Net) :</label>
                        <input type="number" class="form-control" name="pole_emplois" id="pole_emplois_edit" value="<?= $salairess['pole_emplois'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Salaire perçu :</label>
                        <select class="form-select" id="status_edit" name="status" aria-label="Default select example">
                            <?php if ($salairess['status'] == "1") { ?>
                                <option value="1" selected>Oui</option>
                            <?php } else { ?>
                                <option value="2" selected>Non</option>
                            <?php } ?>
                            <option value="">--------</option>
                            <option value="1">Oui</option>
                            <option value="2">Non</option>
                        </select>
                        <input type="hidden" class="form-control" name="month" id="month_edit" value="<?= $salairess['month'] ?>">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $salairess['id'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="submit_budgets_edit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>