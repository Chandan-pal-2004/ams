<?php $pageTitle = "USERS EDIT"; ?>
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
                    Edit Users
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>
        
                        <form action="code.php" method="POST" enctype="multipart/form-data">
        
                            <?php
                            $paramResult = checkParamId('id');
                            if (!is_numeric($paramResult)) {
                                echo '<h5>' . $paramResult . '</h5>';
                                return false;
                            }

                            $user = getById('users', checkParamId('id'));
                            if ($user['status'] == 200) {
                                ?>
        
        
                                <input type="hidden" name="userId" value="<?= $user['data']['id']; ?>" required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" value="<?= $user['data']['name']; ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone No.</label>
                                            <input type="text" name="phone" value="<?= $user['data']['phone']; ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?= $user['data']['email']; ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" value="<?= $user['data']['password']; ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
        
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Select Role</label>
                                            <select name="role" class="form-select" required>
                                                <option value="" disabled selected>Select Role</option>
                                                <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected' : ''; ?>>Admin
                                                </option>
                                                <option value="farmer" <?= $user['data']['role'] == 'farmer' ? 'selected' : ''; ?>>
                                                    Farmer
                                                </option>
                                                <option value="user" <?= $user['data']['role'] == 'user' ? 'selected' : ''; ?>>User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Is_Ban</label>
                                            <br />
                                            <input type="checkbox" name="is_ban" <?= $user['data']['is_ban'] == true ? 'checked' : ''; ?> style="width:40px;height:40px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="updateUser" class="btn btn-primary ">Update</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                echo '<h5>' . $user['message'] . '</h5>';
                            }
                            ?>
        
        
        
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/footer.php'); ?>