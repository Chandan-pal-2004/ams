<?php $pageTitle = "SERVICES EDIT"; ?>
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
                                Edit Service
                                <a href="services.php" class="btn btn-danger float-end">BACK</a>
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

                                $service = getById('services', $paramResult);
                                if ($service) {
                                    if ($service['status'] == 200) {
                                        ?>

                                        <input type="hidden" name="serviceId" value="<?= $service['data']['id']; ?>">

                                        <div class="mb-3">
                                            <label for="name">Service Name</label>
                                            <input type="text" id="name" name="name" value="<?= $service['data']['name']; ?>"
                                                class="form-control" required />
                                        </div>

                                        <div class="mb-3">
                                            <label>Small Description</label>
                                            <textarea name="small_description" class="form-control" row="3"
                                                required><?= $service['data']['small_description']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Long Description</label>
                                            <textarea name="long_description" class="form-control mysummernote" row="3"
                                                required><?= $service['data']['long_description']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Upload Services Images</label>
                                            <input type="file" id="image" name="image" class="form-control" />
                                            <img src="<?= "../" . $service['data']['image']; ?>" style="width:70px;height:70px;"
                                                alt="Img">
                                        </div>

                                        <h5>SEO Tags</h5>

                                        <div class="mb-3">
                                            <label for="name">Meta Title</label>
                                            <input type="text" name="meta_title" value="<?= $service['data']['meta_title']; ?>"
                                                class="form-control" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="name">Meta Description</label>
                                            <textarea name="meta_description" class="form-control"
                                                row="3"><?= $service['data']['meta_description']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name">Meta Keyword</label>
                                            <textarea name="meta_keyword" class="form-control"
                                                row="3"><?= $service['data']['meta_keyword']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status">Status(checked=hidden,unchecked=visible)</label>
                                            <br />
                                            <input type="checkbox" name="status" id="status" <?= $service['data']['status'] == 1 ? 'checked' : ''; ?> style="width: 30px; height: 30px;" />
                                        </div>

                                        <div class="mb-3 text-end">
                                            <button type="submit" name="updateService" class="btn btn-primary">Update
                                                Service</button>
                                        </div>
                                        <?php

                                    } else {
                                        echo "<h5>No such data found!</h5>";
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