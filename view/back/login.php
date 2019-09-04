<?php 
include('../../functions/include_login.php');
include('../common/header.php');

$user = new Account(DB::getInstance());
if (isset($_POST['btnLogin'])) {
    $user->login($_POST['username'], md5($_POST['password']));
}
?>

<form action="login" method="POST">
    <div class="container">
        <h4>Login</h4>
        <div class="col-md-4">
            <div class="form-group">	
                <label for="username">Pseudo</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">	
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">	
                <button type="submit" name="btnLogin" class="btn btn-danger">connexion</button>
            </div>

        </div>
    </div>
</form>