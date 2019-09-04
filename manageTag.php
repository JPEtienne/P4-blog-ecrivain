<?php
include($_SERVER['DOCUMENT_ROOT'].'/model/Tag.php');
include($_SERVER['DOCUMENT_ROOT'].'/Db.php');

$tags = new Tag(DB::getInstance());

if (isset($_GET['add'])) {
    if (isset($_POST['name'])) {
        $tags->addTag($_POST['name']);
        header('Location:my-tags');
    }
}

if (isset($_GET['delete'])) {
    $tags->deleteTag($_GET['delete']);
    header('Location:my-tags');
}
