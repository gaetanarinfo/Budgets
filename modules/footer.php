<?php include 'modals/calculatrice.php'; ?>
<?php include 'modals/faqs.php'; ?>
<?php include 'modals/finance.php'; ?>

<footer class="footer mt-auto py-3 bg-dark" style="position: static;bottom: 0;width: 100%;">
    <div class="container text-center">
        <span class="text-white">Copyright Gaëtan Seigneur - 2021 - 2022</span>
    </div>
</footer>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= $static_url ?>bootstrap/js/popper.min.js" crossorigin="anonymous"></script>

<!-- Slider -->
<?php if ($_SERVER['REQUEST_URI'] == "/") { ?>
    <script src="<?= $static_url ?>js/slider.js?<?= time() ?>" crossorigin="anonymous"></script>
    <script src="<?= $static_url ?>js/home.js?<?= time() ?>" crossorigin="anonymous"></script>
<?php } ?>

<!-- Budgets -->
<?php

if (!empty($_GET['budgets'])) {

    if ($_SERVER['REQUEST_URI'] == "/budgets/" . $_GET['budgets']) { ?>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <script src="<?= $static_url ?>js/budgets.js?<?= time() ?>" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/rr-1.2.8/sc-2.0.4/sb-1.1.0/datatables.min.js"></script>

<?php }
} ?>

<!-- Annee -->
<?php

if (!empty($_GET['annee'])) {

    if ($_SERVER['REQUEST_URI'] == "/annee/" . $_GET['annee']) { ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <script src="<?= $static_url ?>js/annee.js" crossorigin="anonymous"></script>
<?php }
} ?>

<?php if ($_SERVER['REQUEST_URI'] == "/login") { ?>
    <script src="<?= $static_url ?>js/login.js?<?= time() ?>" crossorigin="anonymous"></script>
<?php } ?>

<?php if ($_SERVER['REQUEST_URI'] == "/register") { ?>
    <script src="<?= $static_url ?>js/register.js?<?= time() ?>" crossorigin="anonymous"></script>
<?php } ?>

<script src="<?= $static_url ?>js/navbar.js?<?= time() ?>" crossorigin="anonymous"></script>

</body>

</html>