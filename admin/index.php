<?php $pageTitle = "ADMIN"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/header.php'); ?>

<body class="g-sidenav-show  bg-gray-100">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/admin/includes/sidebar.php'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/navbar.php'); ?>

        <div class="container-fluid py-4">

            <?= alertMessage(); ?>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card card-body p-3">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                        <h5>
                            2
                        </h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-body p-3">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                        <h5>
                            2
                        </h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-body p-3">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                        <h5>
                            2
                        </h5>
                    </div>
                </div>
            </div>

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/footer.php'); ?>
        </div>
    </main>

</body>

</html>