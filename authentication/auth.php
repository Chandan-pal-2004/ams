<?php
require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

// Check if user is logged in
if (!isset($_SESSION['auth']) || !isset($_SESSION['loggedInUserRole']) || !isset($_SESSION['loggedInUserId']) || !isset($_SESSION['loggedInUserName']) || !isset($_SESSION['loggedInUserEmail'])) {
    logoutSession();
    redirect('/ams/login.php', 'Unauthorized Access!');
    exit();
}

// Secure session data
$role = validate($_SESSION['loggedInUserRole']);
$user_id = validate($_SESSION['loggedInUserId']);
$name = validate($_SESSION['loggedInUserName']);
$email = validate($_SESSION['loggedInUserEmail']);

// Fetch user from database
$query = "SELECT * FROM users WHERE role='$role' AND user_id='$user_id' AND name='$name' AND email='$email'  LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Check if the user is banned
    if ($row['is_ban'] == 1) {
        logoutSession();
        redirect('/ams/login.php', 'Your account has been banned. Please contact admin.');
        exit();
    }

    $current_page = $_SERVER['REQUEST_URI'];

    if ($role == 'admin' && strpos($current_page, '/admin/') === false) {
        redirect('/ams/admin/index.php', 'Redirecting to Admin Dashboard...');
        exit();
    } elseif ($role == 'farmer' && strpos($current_page, '/farmer/') === false) {
        redirect('/ams/farmer/index.php', 'Redirecting to Farmer Dashboard...');
        exit();
    } elseif ($role == 'user' && strpos($current_page, '/user/') === false) {
        redirect('/ams/user/index.php', 'Redirecting to User Dashboard...');
        exit();
    } 
} else {

    logoutSession();
    redirect('/ams/login.php', 'Access Denied');
    exit();
}
?>