<?php 
include('../../functions/include_views.php');
include('../common/header.php');

$posts = new Post($db);

if (isset($_POST['btnUpdate'])) {
    $result = $posts->updatePost($_POST['title'], $_POST['desc'], $_GET['slug']);
    if ($result == true) {
        echo'<div class="text-center alert alert-success">Post modifié avec succès</div>';
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
    <?php foreach($posts->getSinglePost($_GET['slug']) as $post) { ?>
        <div class="col-md-8">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Éditer un post</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" class="form-control" value="<?=$post['title'];?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="desc" id="editor" class="form-control" cols="10" ><?=$post['description'];?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="images/<?=$post['image'];?>" style="width: 180px;" alt="<?=$post['title'];?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btnUpdate" class="btn btn-danger">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
    </div>
</div>
<script>
    CKEDITOR.replace('desc', {
        language: 'fr'
    });
</script>
<style type="text/css">
    .card {
        margin-top: 10px;
    }
</style>