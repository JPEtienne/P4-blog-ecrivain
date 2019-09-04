<?php
include('../../functions/include_views.php');
include('../common/header.php');

$posts = new Post(DB::getInstance());
$comments = new Comment(DB::getInstance());
?>

<div class="container">
    <div class="row row-view">
        <?php foreach($posts->getSinglePost($_GET['slug']) as $posts) { ?>
        <div class="card">
            <img src="image-<?=$posts['image'];?>" class="card-img-top">
        </div>
        <div class="card-body">
            <h4 class="card-title"><?=ucfirst($posts['title']);?></h4>
            <p class="card-text"><?=$posts['description'];?></p>
        </div>
    </div>
    <?php } ?>
    <div class="comment-post">
    <h4>Commentaires (<?=$comments->countComments($_GET['slug']);?>)</h4>
    <?php if(isset($_POST['btnComment'])) {
        $date = date('Y-m-d');
        $status = 1;
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['description'])) {
            $result = $comments->comment(st($_POST['name']), st($_POST['email']), st($_POST['description']), st($_GET['slug']), $date, $status);
            if ($result == true) {
                echo '<div class="text-center alert alert-success">Commentaire ajouté</div>';
            }
            } else {
                echo '<div class="text-center alert alert-danger">Champs manquants requis</div>';
            }
    } ?>

    <form action="" method="POST">
        <div class="col-md-10 comment"> 
            <div class="form-group comment-input">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group comment-input">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Commentaire</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="btnComment" class="btn btn-secondary btn-send">Envoyer</button>
            </div>
        </div>
    </form>
    </div>
    <?php foreach($comments->getComment($_GET['slug']) as $comment) { ?>
     <div class="media">
        
        <div class="media-body">
            <strong><?=$comment['name']?></strong>
            <p><?=date('d/m/Y', strtotime($comment['created_at']));?> <a title="signaler" href="manageComment.php?signal=<?=$comment['id']?>&slug=<?=$comment['slug']?>"><i class="fas fa-exclamation-triangle"></i></a></p>
            <p><?=$comment['description']?></p>
            <hr>
        </div>
    </div>
    <?php } ?>

</div>