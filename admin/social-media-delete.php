<?php $pageTitle = "SOCIAL MEDIA DELETE"; ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/ams/config/function.php');

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $socialMediaId = validate($paramResult);

    $socialMedia = getById('social_medias', $socialMediaId);
    if ($socialMedia['status'] == 200) {

        $socialMediaDeleteRes = deleteQuery('social_medias', $socialMediaId);
        if ($socialMediaDeleteRes) {

            redirect('social-media.php', 'Social Media Deleted successfully');


        } else {
            redirect('social-media.php', 'something went wrong');

        }



    } else {
        redirect('social-media.php', $socialMedia['message']);

    }

} else {
    redirect('social-media.php', $paramResult);
}
 ?>