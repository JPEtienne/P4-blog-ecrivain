<?php 
include('../../functions/include_views.php');
include('../common/header.php');

$infos = new Info(DB::getInstance());
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php foreach($infos->getInfo() as $info) { ?>
            <form action="manageInfo.php?id=1" method="POST"> 
                <div class="card">
                    <div class="card-header">Mes informations</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="<?=$info['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone" class="form-control" value="<?=$info['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="mail">E-mail</label>
                            <input type="mail" name="mail" class="form-control" value="<?=$info['mail'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="job">Métier</label>
                            <input type="text" name="job" class="form-control" value="<?=$info['job'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="editor" class="form-control"><?=$info['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                                    <button type="submit" name="btnSubmit" class="btn btn-danger">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
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