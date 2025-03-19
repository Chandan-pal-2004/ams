<?php
include 'config/function.php'; // Include helper functions

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['registerBtn'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    // Check if the email already exists in the database
    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $email_check_result = mysqli_query($conn, $email_check_query);

    if (mysqli_num_rows($email_check_result) > 0) {
        redirect('register.php', 'Email already exists. Use a different email.');
        exit();
    }
    
    // Generate user_id based on role
    $prefix = ($role == 'admin') ? 'A' : (($role == 'farmer') ? 'F' : 'U');
    $query = "SELECT COUNT(*) AS count FROM users WHERE role='$role'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] + 1;
    $user_id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT);

    // Handle Profile Image Upload
    $profile_image = "assets/images/profile_images/default-profile.jpg"; // Default profile image
    if (!empty($_FILES['profile_image']['name'])) {
        $image_name = time() . "_" . $_FILES['profile_image']['name']; // Unique image name
        $image_tmp = $_FILES['profile_image']['tmp_name'];
        $image_path = "assets/images/profile_images/" . $image_name; // Path to store image

        if (move_uploaded_file($image_tmp, $image_path)) {
            $profile_image = "assets/images/profile_images/" . $image_name; // Save path in DB
        }
    }

    if ($name != '' || $email != '' || $phone != '' || $password != '' || $confirm_password !='' || $role != '') {

            $hashedpassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users (user_id, name, email, phone,profile_image, password, role) 
            VALUES ('$user_id', '$name', '$email', '$phone','$profile_image','$hashedpassword', '$role')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                // Send Email with User ID
                $mail = new PHPMailer(true);
                try {
                    // SMTP Server Settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Change if using another provider
                    $mail->SMTPAuth = true;
                    $mail->Username = 'farmerworld356@gmail.com'; // Your Gmail address
                    $mail->Password = 'xkum rvvp micv fmty'; // Use an App Password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Email Settings
                    $mail->setFrom('farmerworld356@gmail.com', 'Farm Management');
                    $mail->addAddress($email, $name);
                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome to Farm Management System - Your User ID';

                    // Email Body (HTML Template)
                    $mail->Body = "
                <div style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; font-family: Arial, sans-serif;'>
                    <div style='background: #28a745; padding: 15px; text-align: center; color: white; border-radius: 10px 10px 0 0;'>
                        <h2>Welcome to Farm Management System</h2>
                    </div>
                    <div style='padding: 20px;'>
                        <p style='font-size: 18px;'>Hello <strong>$name</strong>,</p>
                        <p>Thank you for registering on our platform. Below are your account details:</p>
                        <table style='width: 100%; border-collapse: collapse; margin-top: 10px;'>
                            <tr>
                                <td style='padding: 10px; background: #f2f2f2; font-weight: bold;'>User ID:</td>
                                <td style='padding: 10px; background: #f9f9f9;'>$user_id</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px; background: #f2f2f2; font-weight: bold;'>Email:</td>
                                <td style='padding: 10px; background: #f9f9f9;'>$email</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px; background: #f2f2f2; font-weight: bold;'>Phone:</td>
                                <td style='padding: 10px; background: #f9f9f9;'>$phone</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px; background: #f2f2f2; font-weight: bold;'>Role:</td>
                                <td style='padding: 10px; background: #f9f9f9;'>$role</td>
                            </tr>
                        </table>
                        <p style='margin-top: 20px;'>You can now log in to your account and start using our services.</p>
                        <div style='text-align: center; margin-top: 20px;'>
                            <a href='http://localhost/ams/login.php' style='padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;'>Login Now</a>
                        </div>
                    </div>
                    <div style='background: #28a745; padding: 10px; text-align: center; color: white; border-radius: 0 0 10px 10px; font-size: 14px;'>
                        &copy; 2025 Farm Management System | All Rights Reserved
                    </div>
                </div>
            ";
                    $mail->send();
                } catch (Exception $e) {
                    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
                }
                // Redirect to login page after successful registration
                redirect('login.php', 'Registration SuccessFull!.');
                //header("Location: login.php");
                exit();
            } else {
                redirect('register.php', 'Something Went Wrong');
            }
    } else {
        redirect('register.php', 'All Fields are mandatory');
    }
}

if (isset($_POST['loginBtn'])) {
    $identifier = validate($_POST['identifier']);
    $password = validate($_POST['password']);

    // Fetch user details from database
    $query = "SELECT * FROM users WHERE email='$identifier' OR user_id='$identifier' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the user is banned
        if ($user['is_ban'] == 1) {
            redirect('login.php', 'Your account has been banned. Contact Admin.');
            exit();
        }

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store session variables
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name']; 
            $_SESSION['role'] = $user['role'];

            // Redirect users based on their role
            switch ($user['role']) {
                case 'admin':
                    redirect('admin/index.php', 'Welcome Admin!');
                    break;
                case 'farmer':
                    redirect('farmer/index.php', 'Welcome Farmer!');
                    break;
                case 'user':
                    redirect('user/index.php', 'Welcome User!');
                    break;
                default:
                    redirect('index.php', 'Something Went Wrong!');
                    break;
            }
            exit();
        } 
        else {
            redirect('login.php','Invalid password!');
        }
    } 
    else {
        redirect('login.php','User not found!');
    }
}
?>