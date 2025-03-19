<?php
$pageTitle = "REGISTER";
include('includes/header.php');
?>
<?php include('links.php'); ?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="text-black text-center">REGISTER</h4>
                    </div>
                    <div class="card-body">

                        <?= alertMessage(); ?>

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" placeholder="Email" name="email" class="form-control"
                                    required>
                                <center><span id="emailError" class="error-message text-danger"></span></center>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="phone" placeholder="Phone number" class="form-control" id="phone"
                                    name="phone" oninput="validatePhone()" required>
                                <center><span id="phoneError" class="error-message text-danger"></span></center>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Passsword</label>
                                <input type="password" id="password" name="password" placeholder="Create Password"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    placeholder="Confirm Password" class="form-control" required>
                            </div>
                            <center><span id="passwordError" class="error-message"></span></center>
                            <div class="mb-3">
                                <label for="select">Select Role</label>
                                <select class="form-select w-100" name="role" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="farmer">Farmer</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success w-100" name="registerBtn" type="submit"
                                    onmouseover="this.style.backgroundColor='darkgreen'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor=''; this.style.color='';">
                                    REGISTER
                                </button>
                            </div>
                            <center>
                                <p>
                                    <span class="text-primary">Already have an account?</span>
                                    <a href="login.php" class="fw-bold" onmouseover="this.style.color='red';"
                                        onmouseout="this.style.color='';">
                                        Login Here
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