<?php
$pageTitle = "LOGIN";
include($_SERVER['DOCUMENT_ROOT'] . '/ams/includes/header.php');

if (isset($_SESSION['auth']) && isset($_SESSION['loggedInUserRole']) && isset($_SESSION['loggedInUserId']) && isset($_SESSION['loggedInUserName']) && isset($_SESSION['loggedInUserEmail'])) {

    // Get role from session
    $loggedInUserRole = $_SESSION['loggedInUserRole'];

    // Redirect based on user role
    if ($loggedInUserRole == 'admin') {
        redirect('/ams/admin/index.php', 'You Are Already Logged In as Admin!');
    } elseif ($loggedInUserRole == 'farmer') {
        redirect('/ams/farmer/index.php', 'You Are Already Logged In as Farmer!');
    } elseif ($loggedInUserRole == 'user') {
        redirect('/ams/user/index.php', 'You Are Already Logged In as User!');
    } else {
        redirect('/ams/index.php', 'Log In First!');
    }
}
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

<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/includes/footer.php');?>