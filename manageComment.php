<?php 
include($_SERVER['DOCUMENT_ROOT'].'/model/Comment.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/Db.php'); 

$comment = new Comment(DB::getInstance());
if (isset($_GET['signal'])) {
    $comment->signalComment($_GET['signal']);
    header('Location:post-'.$_GET['slug']);  
    
} elseif (isset($_GET['validate'])) {
    $comment->validateComment($_GET['validate']);
    header('Location:office-1');  

} elseif (isset($_GET['disable'])) {
    $comment->disableComment($_GET['disable']);
    header('Location:office-1'); 
  
} elseif (isset($_GET['delete'])) {
    $comment->deleteComment($_GET['delete']);
    header('Location:office-1'); 
}
