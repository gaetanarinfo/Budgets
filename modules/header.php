<!doctype html>

<html lang="<?= $lang ?>">

<head>

    <title>Budgets - Gaëtan Seigneur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Budgets est l'application qui vous aide à prendre de meilleures décisions pour votre argent. Gérez simplement vos dépenses, votre budget, votre épargne, et vos crédits. Avec notre application, vous ferez des économies et mettrez plus facilement de côté." />
    <meta name="author" content="Gaëtan Seigneur">

    <!-- Style -->
    <link href="<?= $static_url ?>bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Boostrap -->
    <link href="<?= $static_url ?>css/style.css?<?= time() ?>" rel="stylesheet" type="text/css" />

    <!-- Home -->
    <?php if ($_SERVER['REQUEST_URI'] == "/") { ?>
        <link href="<?= $static_url ?>css/home.css?<?= time() ?>" rel="stylesheet" type="text/css" />
        <link href="<?= $static_url ?>css/slider.css?<?= time() ?>" rel="stylesheet" type="text/css" />
    <?php } ?>

    <!-- Login -->
    <?php if ($_SERVER['REQUEST_URI'] == "/login") { ?>
        <link href="<?= $static_url ?>css/login.css?<?= time() ?>" rel="stylesheet" type="text/css" />
    <?php } ?>

    <!-- Register -->
    <?php if ($_SERVER['REQUEST_URI'] == "/register") { ?>
        <link href="<?= $static_url ?>css/register.css?<?= time() ?>" rel="stylesheet" type="text/css" />
    <?php } ?>

    <!-- 404 -->
    <link href="<?= $static_url ?>css/404.css?<?= time() ?>" rel="stylesheet" type="text/css" />

    <!-- Budgets -->
    <?php if (!empty($_GET['budgets'])) {

        if ($_SERVER['REQUEST_URI'] == "/budgets/" . $_GET['budgets']) { ?>

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/rr-1.2.8/sc-2.0.4/sb-1.1.0/datatables.min.css" />

            <link href="<?= $static_url ?>css/budgets.css?<?= time() ?>" rel="stylesheet" type="text/css" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/dragtable.mod.min.css" rel="stylesheet" type="text/css" />

    <?php }
    } ?>

    <!-- Annee -->
    <?php if (!empty($_GET['annee'])) {

        if ($_SERVER['REQUEST_URI'] == "/annee/" . $_GET['annee']) { ?>
            <link href="<?= $static_url ?>css/annee.css?<?= time() ?>" rel="stylesheet" type="text/css" />
    <?php }
    } ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/9d1d83a1dd.js" crossorigin="anonymous"></script>

    <meta name="theme-color" content="#f5f5f5">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= $static_url ?>favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="<?= $static_url ?>favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= $static_url ?>favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="<?= $static_url ?>favicons/manifest.json">
    <link rel="mask-icon" href="<?= $static_url ?>favicons/safari-pinned-tab.svg" color="#f5f5f5">
    <link rel="icon" href="<?= $static_url ?>favicons/favicon.ico">

    <script src="<?= $static_url ?>bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="<?= $static_url ?>js/jquery.min.js" crossorigin="anonymous"></script>

    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.js" crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9R54C1MBSD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9R54C1MBSD');
    </script>

</head>

<body class="d-flex flex-column h-100">