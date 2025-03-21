<?php $pageTitle = "SOCIAL MEDIA CREATE"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/header.php'); ?>

<body class="g-sidenav-show  bg-gray-100">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/admin/includes/sidebar.php'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Add Social Media
                                <a href="social-media.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">


                            <?= alertMessage(); ?>

                            <form action="code.php" method="POST">
                                <div class="mb-3">
                                    <label for="name">Social Media Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label for="url">Social Media URL/Link</label>
                                    <input type="text" id="url" name="url" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <br />
                                    <input type="checkbox" id="status" name="status"
                                        style="width: 30px; height: 30px;" />
                                </div>

                                <div class="mb-3 text-end">
                                    <button type="submit" name="saveSocialMedia" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/footer.php'); ?>

        </div>
    </main>

</body>

</html>