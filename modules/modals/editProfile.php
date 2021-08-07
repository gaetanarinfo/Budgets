<div class="modal fade" id="edit_profil" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editer mon profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editProfil" method="POST">
                <div class="modal-body">

                    <div class="toast_edit_profil toast align-items-center text-white bg-success border-0 m-auto" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast_message">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Adresse email :</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $users['email'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Votre mot de passe :</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="submit_edit_profil" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>