<?php $months = selectDB('*', 'month', '1 ORDER BY id ASC', $db, '*'); ?>

<header class="p-3 bg-dark text-white w-100">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="navbar-brand text-white text-decoration-none">
                <img src="<?= $static_img ?>bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Budgets
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mobile_nav">
                <li><a href="/" class="nav-link px-2 <?php if ($_SERVER['REQUEST_URI'] == "/") { ?>text-secondary<?php } else { ?>text-white<?php } ?>"><i class="fas fa-home me-2"></i>Accueil</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#faqs" class="nav-link px-2 text-white"><i class="fas fa-question me-2"></i>À propos</a></li>

                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logs" class="nav-link px-2 text-white"><i class="fab fa-microblog me-2"></i>Changelog</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog me-2"></i>Les outils
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="/#budgets-annee" class="dropdown-item px-2"><i class="fas fa-wallet me-2"></i>Budgets</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="/#meteo" class="dropdown-item px-2"><i class="fas fa-cloud-moon-rain me-2"></i>Météo</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#calculatrice" class="dropdown-item px-2"><i class="fas fa-calculator me-2"></i>Calculatrice</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#finance" class="dropdown-item px-2"><i class="fas fa-piggy-bank me-2"></i>Bourse</a></li>
                    </ul>
                </li>

                <?php if (!empty($_GET['budgets'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-calendar-plus me-2"></i>Menu rapide
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <?php foreach ($months as $key => $month) { ?>
                                <li><a href="/budgets/<?= $month['url'] ?>" class="dropdown-item px-2 <?= ($month['url'] == $_GET['budgets']) ? "active" : "" ?>"><i class="fas fa-calendar-plus me-2" style="color: #<?= $month['color']; ?>;"></i><?= $month['value'] ?></a></li>
                                <?php if ($month['id'] != 12) { ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mobile_nav">
                Nous sommes le <span class="ms-1 text-capitalize"> <?= dateToFrench('now', 'l j F Y') ?></span>
            </form>

            <div class="text-end mobile_nav">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <a href="../login" class="btn btn-outline-success me-2"><i class="fas fa-sign-in-alt me-2"></i>Connexion</a>
                    <a href="../register" class="btn btn-outline-info"><i class="fas fa-plus me-2"></i>Inscription</a>
                <?php } else { ?>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $static_img ?>/users/default.jpg" alt="mdo" width="38" height="38" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_profil"><i class="fas fa-user-edit me-2"></i> Mon profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item logout" href=""><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                        </ul>
                    </div>

                <?php } ?>
            </div>

            <button class="navbar-toggler collapsed mobile_nav button_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>

            <div class="navbar-collapse collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == "/") { ?>text-secondary<?php } else { ?>text-white<?php } ?>" aria-current="page" href="/"><i class="fas fa-home me-2"></i>Accueil</a></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#calculatrice" class="nav-link text-white"><i class="fas fa-calculator me-2"></i>Calculatrice</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#faqs" class="nav-link text-white"><i class="fas fa-question me-2"></i>À propos de Budgets</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#budgets-annee" class="nav-link text-white"><i class="fas fa-wallet me-2"></i>Budgets</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#meteo" class="nav-link text-white"><i class="fas fa-cloud-moon-rain me-2"></i>Météo</a>
                    </li>
                    <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#finance" class="nav-link text-white"><i class="fas fa-piggy-bank me-2"></i>Bourse</a></li>

                    <?php if (!empty($_GET['budgets'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-calendar-plus me-2"></i>Menu rapide
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <?php foreach ($months as $key => $month) { ?>
                                    <li><a href="/budgets/<?= $month['url'] ?>" class="dropdown-item px-2 <?= ($month['url'] == $_GET['budgets']) ? "active" : "" ?>"><i class="fas fa-calendar-plus me-2" style="color: #<?= $month['color']; ?>;"></i><?= $month['value'] ?></a></li>
                                    <?php if ($month['id'] != 12) { ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item mb-2 mt-2">
                            <a href="../login" class="btn btn-outline-success"><i class="fas fa-sign-in-alt me-2"></i>Connexion</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="../register" class="btn btn-outline-info"><i class="fas fa-plus me-2"></i>Inscription</a>
                        </li>
                    <?php } else { ?>
                        <div class="dropdown text-left">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $static_img ?>/users/default.jpg" alt="mdo" width="38" height="38" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_profil"><i class="fas fa-user-edit me-2"></i> Mon profil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item logout" href=""><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</header>