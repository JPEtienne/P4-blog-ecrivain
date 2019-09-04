<?php 
include('../../functions/include_views.php'); 
include('../common/header.php');
?>

<?php 
$post = new Post(DB::getInstance());
$tags = new Tag(DB::getInstance());
if (isset($_POST['btnSubmit'])) {
    $date = date('Y-m-d');
    if (!empty($_POST['title']) && !empty($_POST['desc'])) {

        $title = strip_tags($_POST['title']);
        $description = $_POST['desc'];
        $slug = createSlug($title);
        $checkSlug = $post->checkPostSlug($slug);
        if ($checkSlug == false) {
        $newSlug = $slug.uniqid();
        $record = $post->addPost($title, $description, uploadImage(), $date, $newSlug);
        } else {
        $record = $post->addPost($title, $description, uploadImage(), $date, $slug);
        }

        if($record == true) {
            echo'<div class="text-center alert alert-success">Post ajouté avec succès</div>';
        }

    } else {
        echo '<div class="text-center alert alert-danger">Champs manquants requis</div>';
    }
    
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="add-post" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Ajouter un post</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="editor" class="form-control" cols="10" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group form-check-inline">
                            <label for="tags{]"><b>Tags</b></label>
                            <?php foreach($tags->getAllTags() as $tag) { ?>
                            <input type="checkbox" name="tags[]" class="form-check-input" value="<?=$tag['id']?>"><?=$tag['tag']?>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-danger">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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