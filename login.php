<?php
$pageTitle = "LOGIN";
include('includes/header.php');
include('links.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="text-black text-center">LOGIN</h4>
                    </div>
                    <div class="card-body">

                        <?= alertMessage(); ?>

                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label for="identifier">Email or User ID</label>
                                <input type="text" name="identifier" class="form-control"
                                    placeholder="Enter Email or User ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Passsword</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                    required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" name="loginBtn" type="submit">LOGIN</button>
                            </div>
                            <center>
                                <p>Don't have an account? <a href="register.php">Register here</a></p>
                                <p><a href="forgot.php">Forgot Password?</a></p>
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>