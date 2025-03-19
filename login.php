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
                                <button class="btn btn-success w-100" name="loginBtn" type="submit"
                                    onmouseover="this.style.backgroundColor='darkgreen'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor=''; this.style.color='';">
                                    LOGIN
                                </button>
                            </div>
                            <center>
                                <p>
                                    <span class="text-danger">Don't have an account?</span>
                                    <a href="register.php" class="fw-bold" onmouseover="this.style.color='blue';" onmouseout="this.style.color='';">
                                        Register Here
                                    </a>
                                </p>
                                <p>
                                    <a href="forgot.php" class="fw-bold" onmouseover="this.style.color='red';" onmouseout="this.style.color='';">
                                        Forgot Password?
                                    </a>
                                </p>
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>