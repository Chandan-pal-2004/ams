<?php $pageTitle = "CODES"; ?>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/Exception.php');
require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;
    $role = validate($_POST['role']);

    // Ensure the phone number is exactly 10 digits
    if (!preg_match("/^\d{10}$/", $phone)) {
        redirect('users-create.php', 'Invalid phone number! It must be exactly 10 digits.');
        exit;
    }

    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        redirect('users-create.php', 'Email already exists!');
        exit;
    }

    if ($name != '' && $email != '' && $phone != '' && $password != '' && $role != '') {

        // Generate unique user ID based on role
        $role_prefix = strtoupper(substr($role, 0, 1)); // A for Admin, F for Farmer, U for User
        $count_query = "SELECT COUNT(*) as count FROM users WHERE role = '$role'";
        $count_result = mysqli_query($conn, $count_query);
        $count_row = mysqli_fetch_assoc($count_result);
        $user_count = $count_row['count'] + 1;
        $user_id = $role_prefix . str_pad($user_count, 3, '0', STR_PAD_LEFT);

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

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(user_id, name, phone,profile_image, email, password, is_ban, role) 
                    VALUES ('$user_id', '$name', '$phone','$profile_image', '$email', '$hashedPassword', '$is_ban', '$role')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // Send welcome email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'farmerworld356@gmail.com';
                $mail->Password = 'xkum rvvp micv fmty';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

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
                echo "<script>alert('User Added,Email could not be sent. Error: {$mail->ErrorInfo}');</script>";
                //echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }
            
            redirect('users.php', 'Added Successfully!.');

        } else {
            redirect('users-create.php', 'Something Went Wrong!.');
        }

    } 
    else {
        redirect('users-create.php', 'Please fill all input fields.');
    }
}

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;
    $role = validate($_POST['role']);

    $userId = validate($_POST['userId']);

    // Ensure the phone number is exactly 10 digits
    if (!preg_match("/^\d{10}$/", $phone)) {
        redirect('users-edit.php?id=' . $userId, 'Invalid phone number Format! It must be exactly 10 digits.');
        exit;
    }

    $user = getById('users', $userId);
    if ($user['status'] != 200) {
        redirect('users-edit.php?id=' . $userId, 'No Such Id Found');
    }

    if ($name != '' || $email != '' || $phone != '' || $password != '' || $role != '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE users SET 
                name = '$name',
                phone ='$phone',
                email ='$email',
                password ='$hashedPassword',
                is_ban ='$is_ban',
                role ='$role'
                WHERE id='$userId' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users-edit.php?id=' . $userId, 'User/Admin Updated Successfully');
        } else {
            redirect('users-create.php', 'SomeThing Went Wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all input fields');
    }
}

if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {
        $query = "INSERT INTO settings (title,slug,small_description,meta_description,meta_keyword,email1,email2,phone1,phone2,address)
                    VALUES ('$title','$slug','$small_description','$meta_description','$meta_keyword','$email1','$email2','$phone1','$phone2','$address')";

        $result = mysqli_query($conn, $query);
    }

    if (is_numeric($settingId)) {
        $query = "UPDATE settings SET 
                    title = '$title',
                    slug = '$slug',
                    small_description = '$small_description',
                    meta_description = '$meta_description',
                    meta_keyword = '$meta_keyword',
                    email1 = '$email1',
                    email2 = '$email2',
                    phone1 = '$phone1',
                    phone2 = '$phone2',
                    address = '$address'
                    WHERE id='$settingId'
        ";
        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        redirect('settings.php', 'Settings Saved');
    } else {
        redirect('settings.php', 'Something Went Wrong');
    }
}

?>