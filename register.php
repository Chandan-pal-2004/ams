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

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" placeholder="Email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="phone" placeholder="Phone number" class="form-control" name="phone"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Passsword</label>
                                <input type="password" name="password" placeholder="Create Password" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Passsword</label>
                                <input type="password" name="confirm_password" placeholder="Confirm Password"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <select class="input-field w-100" name="role" required>
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
                                <p>Already have an account? <a href="login.php">login here</a></p>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>