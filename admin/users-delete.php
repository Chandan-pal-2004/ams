<?php $pageTitle = "USERS DELETE"; ?>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/Exception.php');
require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/ams/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $userId = validate($paramResult);

    $user = getById('users', $userId);
    if ($user['status'] == 200) {

        $userData = $user['data'];
        $email = $userData['email'];
        $name = $userData['name'];

        $userDeleteRes = deleteQuery('users', $userId);
        if ($userDeleteRes) {
            // Send email notification
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'farmerworld356@gmail.com'; // Your email
                $mail->Password = 'xkum rvvp micv fmty'; // Your app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('farmerworld356@gmail.com', 'FARM Management System');
                $mail->addAddress($email, $name);
                $mail->isHTML(true);
                $mail->Subject = 'Account Deletion Notification';
                $mail->Body = "
                    <div style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; font-family: Arial, sans-serif;'>
                        <div style='background: #dc3545; padding: 15px; text-align: center; color: white; border-radius: 10px 10px 0 0;'>
                            <h2>Account Deletion Notice</h2>
                        </div>
                        <div style='padding: 20px;'>
                            <p style='font-size: 18px;'>Hello <strong>$name</strong>,</p>
                            <p>We regret to inform you that your account has been deleted from our platform.</p>
                            <p>If you believe this was a mistake or have any questions, please contact us immediately.</p>
                            <p>Thank you for being part of the Agriculture Management System.</p>
                            <div style='text-align: center; margin-top: 20px;'>
                                <a href='mailto:farmerworld356@gmail.com' style='padding: 10px 20px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px;'>Contact Support</a>
                            </div>
                        </div>
                        <div style='background: #dc3545; padding: 10px; text-align: center; color: white; border-radius: 0 0 10px 10px; font-size: 14px;'>
                            &copy; 2025 Agriculture Management System | All Rights Reserved
                        </div>
                    </div>
                ";


                $mail->send();
            } catch (Exception $e) {
                echo "<script>alert('User deleted, but email notification failed. Error: {$mail->ErrorInfo}');</script>";
                //echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }

            redirect('users.php', 'User Deleted successfully!');


        } else {
            redirect('users.php', 'Something Went Wrong!');

        }



    } else {
        redirect('users.php', $user['message']);

    }

} else {
    redirect('users.php', $paramResult);
}


?>