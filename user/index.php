<?php $pageTitle = "USER"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/header.php'); ?>
<body class="g-sidenav-show  bg-gray-100">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/user/includes/sidebar.php'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/navbar.php'); ?>

        <div class="container-fluid py-4">

            <?= alertMessage(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/footer.php'); ?>
