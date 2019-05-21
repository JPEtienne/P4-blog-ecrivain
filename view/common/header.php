

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="../front/index.php?page=1">Blog P4</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?=$_SERVER['SCRIPT_NAME'] == '/P4/index.php'?'active':'' ?>">
        <a class="nav-link" href="../front/index.php?page=1">Accueil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item <?=$_SERVER['SCRIPT_NAME'] == '/P4/about.php'?'active':'' ?>">
        <a class="nav-link" href="../front/about.php">À propos <span class="sr-only"></span></a>
      </li>
      <?php if (!empty($_SESSION['username'])) { ?>
      <li class="nav-item <?=$_SERVER['SCRIPT_NAME'] == '/P4/result.php'?'active':'' ?>">
        <a class="nav-link" href="../back/result.php?page=1">Back Office</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../logout.php">Déconnexion</a>
      </li>
      <?php } ?>
    </ul>
  </div>
  
</nav>

</body>
</html>