<?php

if(isset($_POST['submit'])){
    $existUser = new UsersController();
    $existUser->login();
}
    
    
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Connexion</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Pseudo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="pw" placeholder="Mot de passe" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Se connecter</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?= BASE_URL;?>register" class="btn btn-link text-decoration-none">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>