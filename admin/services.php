<?php $pageTitle = "SERVICES"; ?>
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
                                Services
                                <a href="services-create.php" class="btn btn-primary float-end">Add Services</a>
                            </h4>
                        </div>
                        <div class="card-body">


                            <?= alertMessage(); ?>

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $services = getAll('services');
                                    if ($services) {
                                        if (mysqli_num_rows($services) > 0) {
                                            foreach ($services as $item) {
                                                ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($item['status'] == 1) {
                                                            echo '<span class="badge bg-danger text-white">Hidden</span>';
                                                        } else {
                                                            echo '<span class="badge bg-success text-white">Visible</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="services-edit.php?id=<?= $item['id']; ?>"
                                                            class="btn btn-success btn-sm">Edit</a>
                                                        <a href="services-delete.php?id=<?= $item['id']; ?>"
                                                            class="btn btn-danger btn-sm mx-2"
                                                            onclick="return confirm('Are you sure you want to delete this data?')">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="4">NO RECORD FOUND</td>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">Something Went Wrong</td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/footer.php'); ?>

        </div>
    </main>

</body>

</html>