<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Db.php');
include($_SERVER['DOCUMENT_ROOT'].'/model/Post.php'); 

$post = new Post(DB::getInstance());
$post->deletePostBySlug($_GET['slug']);
header('Location:office-1');