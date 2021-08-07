<?php $slider = selectDB('*', 'sliders', 'month = "' . date('m') . '" ORDER BY id ASC', $db, '1'); ?>

<div style="background:url(<?= $static_img ?>slider/<?= $slider['image'] ?>);background-repeat: no-repeat;background-size: cover;background-attachment: fixed;background-position: center;width: 100%;height: auto;">

    <div class="b-example-divider"></div>

    <div class="container-xxl my-md-4 bd-layout mobile" id="budgets">

        <div class="bd-content ps-lg-4">
            <h2 class="text-center mb-4 text-white mt-4" style="text-shadow: -2px 3px 14px #000000d6;">Mes budgets par mois et pour l'année <?= date('Y') ?></h2>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">

            <?php foreach ($months as $key => $month) { ?>
                <div class="col">
                    <div class="card">
                        <img class="bd-placeholder-img card-img-top p-4 m-auto" style="width: 140px;" src="<?= $static_img ?>19826-bubka-coins.png" />
                        <div class="card-body">
                            <h5 class="card-title"><i class="far fa-calendar-alt me-1"></i> <?= $month['value'] ?></h5>
                            <p class="card-text">Voir toutes les dépenses pour le mois de <?= $month['value'] ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="budgets/<?= $month['url'] ?>" class="btn btn-success"><i class="fas fa-glasses text-white me-1"></i> Voir</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>

<div class="b-example-divider"></div>

<div class="container-xxl my-md-4 bd-layout" id="budgets-annee">

    <div class="bd-content ps-lg-4">
        <h2 class="text-center mb-4 mt-4">Mes budgets pour différentes années</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">

        <?php foreach (range(2015, date('Y') + 5) as $year) { ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-calendar-alt me-1"></i> <?= $year ?></h5>
                        <p class="card-text">Voir toutes les dépenses pour l'année <?= $year ?></p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="annee/<?= $year ?>" class="btn btn-success"><i class="fas fa-glasses text-white me-1"></i> Voir</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="b-example-divider"></div>

<div class="container-md my-md-4 bd-layout" id="meteo">

    <div class="container col-12 col-md-5 col-lg-5 mt-4">
        <h2 class="text-center mb-4 mt-4">Météo</h2>
        <form id="form-sub">
            <div class="form-group ">
                <label id="lab" for="lab">Pays ou Ville :</label>
                <input type="text" class="form-control mt-2 mb-2" id="city" placeholder="ex. Le mans..." autocomplete="off">
                <small id="bot" class="form-text">Remplissez le nom de la ville ou du pays pour avoir les détails météorologiques</small>
                <button class="btn btn-success d-block mt-2 mb-2">Rechercher...</button>
                <div id="progress" class="progress mt-2" style="display: none;">
                    <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
        </form>
        <hr>
        <p id="city-name" class="mr-3"></p>
        <p id="city-weather"></p>
        <img id="city-img" src="">
        <p id="city-temp"></p>
        <p id="city-temp-min"></p>
        <p id="city-temp-max"></p>
    </div>

</div>