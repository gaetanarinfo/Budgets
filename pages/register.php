<main class="form-signin">

  <div class="toast align-items-center text-white bg-success border-0 m-auto" style="margin-bottom: 37px !important;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body toast_message">

      </div>
    </div>
  </div>

  <form id="register" class="text-center">
    <img class="mb-4" src="<?= $static_img ?>bootstrap-logo.svg" alt="" width="72" height="57">

    <h1 class="h3 mb-3 fw-normal">Inscription</h1>

    <div class="form-floating mb-2">
      <input type="texte" class="form-control" id="username" minlength="4" placeholder="Nom d'utilisateur" required>
      <label for="username">Nom d'utilisateur</label>
    </div>

    <div class="form-floating mb-2">
      <input type="password" minlength="8" class="form-control" id="password" placeholder="Mot de passe" required>
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-floating mb-2">
      <input type="email" minlength="4" class="form-control" id="email" placeholder="Adresse email" required>
      <label for="email">Adresse email</label>
    </div>

    <div class="form-check form-switch mb-2" style="padding: 0 0 0 47px;">
      <input class="form-check-input" type="checkbox" id="cgu" required>
      <label class="form-check-label" for="cgu">Conditions Général D'utilisation</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">S'inscrire</button>

    <p class="mt-5 mb-3 text-muted"> © Copyright - Seigneur Gaëtan - Budgets - <?= date('Y') ?></p>

  </form>
</main>