<?php $pageTitle = "USERS CREATE"; ?>
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
                                Add Users
                                <a href="users.php" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <?= alertMessage(); ?>

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone No.</label>
                                            <input type="text" id="phone" name="phone" oninput="validatePhone()"
                                                class="form-control" required>
                                            <center>
                                                <span id="phoneError" class="error-message text-danger"></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                            <center>
                                                <span id="emailError" class="error-message text-danger"></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Profile Image</label>
                                            <input type="file" name="profile_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Select Role</label>
                                            <select name="role" class="form-select" required>
                                                <option value="" disabled selected>Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="farmer">Farmer</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Is_Ban</label>
                                            <br />
                                            <input type="checkbox" name="is_ban" style="width:30px;height:30px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br />
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="saveUser" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
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