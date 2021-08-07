<div class="modal fade" id="edit_budgets_<?= $budget['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une dépense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBudgets_<?= $budget['id'] ?>" method="POST">
                <div class="modal-body">

                    <div class="toast_success toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast_message">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="name_<?= $budget['id'] ?>" id="name_<?= $budget['id'] ?>" value="<?= $budget['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Somme :</label>
                        <input type="text" class="form-control" name="sommes_<?= $budget['id'] ?>" placeholder="200.20" id="sommes_<?= $budget['id'] ?>" value="<?= $budget['sommes'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Montant due :</label>
                        <input type="text" class="form-control" name="montant_due_<?= $budget['id'] ?>" placeholder="200.20" id="montant_due_<?= $budget['id'] ?>" value="<?= $budget['montant_due'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Facture payer :</label>
                        <select class="form-select" id="status_<?= $budget['id'] ?>" name="status_<?= $budget['id'] ?>" aria-label="Default select example">
                            <?php if ($budget['status'] == "1") { ?>
                                <option value="1" selected>Oui</option>
                            <?php } else { ?>
                                <option value="2" selected>Non</option>
                            <?php } ?>
                            <option value="">--------</option>
                            <option value="1">Oui</option>
                            <option value="2">Non</option>
                        </select>
                        <input type="hidden" class="form-control" name="month_<?= $budget['id'] ?>" id="month_<?= $budget['id'] ?>" value="<?= $budget['month'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Montant due :</label>
                        <select class="form-select" id="sommes_due_<?= $budget['id'] ?>" name="sommes_due_<?= $budget['id'] ?>" aria-label="Default select example">
                            <?php if ($budget['sommes_due'] == "1") { ?>
                                <option value="1" selected>Non</option>
                            <?php } else { ?>
                                <option value="2" selected>Oui</option>
                            <?php } ?>
                            <option value="">--------</option>
                            <option value="1">Oui</option>
                            <option value="2">Non</option>
                        </select>
                        <input type="hidden" class="form-control" name="month_<?= $budget['id'] ?>" id="month_<?= $budget['id'] ?>" value="<?= $budget['month'] ?>">
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