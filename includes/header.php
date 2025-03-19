<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($pageTitle)) {
            echo $pageTitle;
        } else {
            echo webSetting('title') ?? 'AMS';
        } ?>
    </title>

    <link rel="icon" type="image/png" href="assets/images/tractorlogo.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

    <?php include('navbar.php'); ?>