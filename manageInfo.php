<?php
include($_SERVER['DOCUMENT_ROOT'].'/Db.php');
include($_SERVER['DOCUMENT_ROOT'].'/model/info.php');

$infos = new Info(DB::getInstance());

if (isset($_GET['id'])) {
    if ($_GET['id'] == '1') {
        $infos->updateInfo($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['job'], $_POST['desc']);
        header('Location:my-information');
    } else {
        header('Location:home-1');
    }
} else {
    header('Location:home-1');
}
