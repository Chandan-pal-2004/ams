<?php
require ($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/ams/links.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php if (isset($pageTitle)) {
            echo $pageTitle;
        } else {
            echo webSetting('title') ?? 'AMS';
        } ?>
    </title>
</head>
