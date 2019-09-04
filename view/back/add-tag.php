<?php 
include('../../functions/include_views.php');
include('../common/header.php');

$tags = new Tag(DB::getInstance());
?>

<div class="container">
    <nav>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="my-tags">Tag <span class="sr-only"></span></a>
            </li>
        </ul>
    </nav>
    <form action="new-tag" method="POST">
        <div class="card">
            <div class="card-header">Ajouter un tag</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" value="">
                </div>
                <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-danger">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>