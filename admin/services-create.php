<?php $pageTitle = "SERVICES CREATE"; ?>
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
                                Add Services
                                <a href="services.php" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">


                            <?= alertMessage(); ?>

                            <form action="code.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="name">Service Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label>Small Description</label>
                                    <textarea name="small_description" class="form-control" row="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control summernote" row="3"
                                        required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Upload Services Files/Images</label>
                                    <input type="file" id="image" name="image" class="form-control" />
                                </div>

                                <h5>SEO Tags</h5>

                                <div class="mb-3">
                                    <label for="name">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label for="name">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" row="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="name">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" row="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="status">Status(checked=hidden,unchecked=visible)</label>
                                    <br />
                                    <input type="checkbox" id="status" name="status"
                                        style="width: 30px; height: 30px;" />
                                </div>

                                <div class="mb-3 text-end">
                                    <button type="submit" name="saveService" class="btn btn-primary">Save
                                        Service</button>
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