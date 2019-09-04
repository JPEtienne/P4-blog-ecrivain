<?php 
include('../../functions/include_views.php');
include('../common/header.php');

$posts = new Post(DB::getInstance());
$comment = new Comment(DB::getInstance());
?>

<div class="container">
    <h2>Posts</h2>
    <?php
/*        if (!empty($_SESSION['username'])) {
            echo "Bonjour, {$_SESSION['username']}";
        } else {
            echo "Vous n'êtes pas connecté";
        }
*/    
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="add-post">Ajouter un post <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my-information">Mes informations <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my-tags">Tags <span class="sr-only"></span></a>
            </li>
            
        </ul>
    </nav>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts->getPost() as $post) { ?>
            <tr>
                <td><?=$post['title']?></td>
                <td><?=substr($post['description'], 0, 20)?></td>
                <td><?=date('d/m/Y', strtotime($post['created_at']));?></td>
                <td>
                    <a href="post-<?=$post['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Voir</button>
                    </a>
                    <a href="edit-post-<?=$post['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Éditer</button>
                    </a>
                    <a href="delete-<?=$post['slug']?>">
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if (isset($_GET['page'])) { ?>
        <ul class="pagination">
            <?php $row = $posts->countPostPages();
            $totalPages = ceil($row/4); ?>
            <li class="page-item" style="<?= $_GET['page'] <= 1 ?'display:none;':'';?>"><a class="page-link" href="office-1"><i class="fas fa-angle-double-left"></i></a></li>
            <li class="page-item" style="<?= $_GET['page'] <= 1 ?'display:none;':'';?>"><a class="page-link" href="office-<?=$_GET['page']-1?>"><i class="fas fa-chevron-left"></i></a></li>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item <?= $i != $_GET['page'] ?: 'active';?>" style="<?php if (($i >= ($_GET['page']+4)) || ($i <= ($_GET['page']-4))) {echo 'display:none;';}?>">
                    <a class="page-link" href="office-<?=$i?>"><?=$i?></a>
                </li>
            <?php } ?>
            <li class="page-item" style="<?= $_GET['page'] >= $totalPages ?'display:none;':'';?>"><a class="page-link" href="office-<?=$_GET['page']+1?>"><i class="fas fa-chevron-right"></i></a></li>
            <li class="page-item" style="<?= $_GET['page'] >= $totalPages ?'display:none;':'';?>"><a class="page-link" href="office-<?=$totalPages?>"><i class="fas fa-angle-double-right"></i></a></li>                    
        </ul> 
    <?php } ?>  

    

    <h2>Commentaires signalés</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Description</th>
                <th>Ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comment->getCommentBySignal() as $comment) { ?>
            <tr>
                <td><?=$comment['name']?></td>
                <td><?=$comment['email']?></td>
                <td><?=substr($comment['description'], 0, 20)?></td>
                <td><?=date('d/m/Y', strtotime($post['created_at']));?></td>
                <td>
                    <a href="post-<?=$comment['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Voir</button>
                    </a>
                    <a href="validate-comment-'<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-danger btn-sm">Valider</button>
                    </a>
                    <a href="disable-comment-'<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                    </a>
                    <a href="comment-delete-'<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>