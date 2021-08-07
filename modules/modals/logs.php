<div class="modal fade" id="logs" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Journal des modifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol class="list-group list-group-numbered">
                    <?php $changelogs = selectDB('*', 'changelogs', '1 ORDER BY created_at DESC', $db, '*'); ?>

                    <?php foreach ($changelogs as $changelog) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?= $changelog['title'] ?></div>
                                <div><?= $changelog['value'] ?></div>
                                <div><i class="far fa-clock me-1"></i><span><?= dateToFrench($changelog['created_at'], 'l j F Y à H:i') ?></span></div>
                            </div>
                            <span class="badge <?= ($changelog['status'] == 0) ? "bg-danger" : "" ?><?= ($changelog['status'] == 1) ? "bg-success" : "" ?><?= ($changelog['status'] == 2) ? "bg-info" : "" ?> rounded-pill"><?= ($changelog['status'] == 0) ? '<i class="fas fa-times"></i>' : "" ?><?= ($changelog['status'] == 1) ? '<i class="fas fa-check"></i>' : "" ?><?= ($changelog['status'] == 2) ? '<i class="far fa-hourglass"></i>' : "" ?></span>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>