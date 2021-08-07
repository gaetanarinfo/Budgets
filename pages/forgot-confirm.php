<main class="form-signin">

    <div class="toast_forgot align-items-center text-white bg-success border-0 m-auto" style="margin-bottom: 37px !important;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast_message">

            </div>
        </div>
    </div>


    <form id="forgot_confirm" class="text-center">
        <img class="mb-4" src="<?= $static_img ?>bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Mot de passe oublié</h1>

        <div class="form-floating">
            <input type="password" class="form-control mb-2" name="password" id="password" autocomplete="off" minlength="4" placeholder="Mot de passe">
            <label for="password">Nouveau mot de passe</label>
        </div>

        <div class="form-check form-switch mb-3 mt-3" style="padding: 0 0 0 47px;">
            <input class="form-check-input" type="checkbox" id="cgu" required>
            <label class="form-check-label" for="cgu">Conditions Général D'utilisation</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>

        <p class="mt-5 mb-3 text-muted"> © Copyright - Seigneur Gaëtan - Budgets - <?= date('Y') ?></p>
    </form>
</main>