<?php
require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

if(isset($_SESSION['auth']) || !isset($_SESSION['loggedInUserRole']) || !isset($_SESSION['loggedInUserId']) || !isset($_SESSION['loggedInUserName']) || !isset($_SESSION['loggedInUserEmail']))
{
    logoutSession();
    redirect('/ams/login.php', 'Logout SuccessFully!.');
}
?>