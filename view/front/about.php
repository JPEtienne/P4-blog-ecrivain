<?php 
include('../../functions/include_views.php');
include('../common/header.php');
$infos = new Info(DB::getInstance());
?>

<div class="container">
    <div class="row">
        <h4 class="about-title">À propos</h4>
        <div class="col-md-12 about">
            <?php foreach($infos->getInfo() as $info) { ?>
                <p><?=$info['name'] ?></p>
                <p><?=$info['phone'] ?></p>
                <p><?=$info['mail'] ?></p>
                <p><?=$info['job'] ?></p>
                <div>Me concernant: <br><?=$info['description']?></div>
            <?php } ?>
        </div>
    </div>
</div>

</body>
</html>