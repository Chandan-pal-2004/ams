<?php $pageTitle = "SERVICES DELETE"; ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $serviceId = validate($paramResult);

    $service = getById('services', $serviceId);
    if ($service['status'] == 200) {

        $serviceDeleteRes = deleteQuery('services', $serviceId);
        if ($serviceDeleteRes) {

            $deleteFile = "../" . $service['data']['image'];
            if (file_exists($deleteFile)) {
                unlink($deleteFile);
            }
            redirect('services.php', 'Service Deleted successfully');


        } else {
            redirect('services.php', 'something went wrong');

        }

    } else {
        redirect('services.php', $service['message']);

    }

} else {
    redirect('services.php', $paramResult);
}

?>