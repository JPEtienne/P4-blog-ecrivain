<?php 
include('../../functions/include_views.php');
include('../common/header.php');
Autoloader::register();

$tags = new Tag(DB::getInstance());
?>

<div class="container">

    <nav>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="add-tag">Ajouter un tag <span class="sr-only"></span></a>
            </li>
        </ul>
    </nav>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tags->getAllTags() as $tag) { ?>
        <tr>
            <td><?=$tag['tag']?></td>
            <td>
                <a href="suppr-tag-<?=$tag['id']?>">
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

</body>
</html>