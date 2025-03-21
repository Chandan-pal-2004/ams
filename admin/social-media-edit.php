<?php $pageTitle = "SOCIAL MEDIA EDIT"; ?>
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
                                Edit Social Media
                                <a href="social-media.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">


                            <?= alertMessage(); ?>

                            <form action="code.php" method="POST">

                                <?php
                                $paramResult = checkParamId('id');
                                if (!is_numeric($paramResult)) {
                                    echo "<h5>" . $paramResult . "</h5>";
                                    return false;
                                }

                                $socialMedia = getById('social_medias', $paramResult);
                                if ($socialMedia) {
                                    if ($socialMedia['status'] == 200) {
                                        ?>

                                        <input type="hidden" name="socialMediaId" value="<?= $socialMedia['data']['id'] ?>">

                                        <div class="mb-3">
                                            <label for="name">Social Media Name</label>
                                            <input type="text" id="name" name="name" value="<?= $socialMedia['data']['name'] ?>"
                                                class="form-control" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="url">Social Media URL/Link</label>
                                            <input type="text" id="url" name="url" value="<?= $socialMedia['data']['url'] ?>"
                                                class="form-control" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <br />
                                            <input type="checkbox" id="status" name="status"
                                                <?= $socialMedia['data']['status'] == 1 ? 'checked' : ''; ?>
                                                style="width: 30px; height: 30px;" />
                                        </div>

                                        <div class="mb-3 text-end">
                                            <button type="submit" name="updateSocialMedia" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                        <?php
                                    } else {
                                        echo "<h5>" . $socialMedia['message'] . "</h5>";
                                    }
                                } else {
                                    echo "<h5>Something Went Wrong</h5>";
                                }
                                ?>

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