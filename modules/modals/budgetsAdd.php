<div class="modal fade" id="add_budgets" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une dépense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addBudgets" method="POST">
                <div class="modal-body">

                    <div class="toast_addBudgets toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast_message">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Somme :</label>
                        <input type="text" class="form-control" name="sommes" id="sommes" placeholder="200.20" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Montant due :</label>
                        <input type="text" class="form-control" name="montant_due" id="montant_due" placeholder="200.20" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Facture payer :</label>
                        <select class="form-select" id="status" name="status" aria-label="Default select example">
                            <option value="1">Oui</option>
                            <option value="2" selected>Non</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Montant due :</label>
                        <select class="form-select" id="sommes_due" name="sommes_due" aria-label="Default select example">
                            <option value="1" selected>Non</option>
                            <option value="2">Oui</option>
                        </select>
                        <input type="hidden" class="form-control" name="month" id="month" value="<?= $_GET['budgets'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="submit_budgets" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>