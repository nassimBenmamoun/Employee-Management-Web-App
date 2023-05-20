<?php
 
    if(isset($_POST['submit'])){
        $newUser = new UsersController();
        $newUser->register();
    }
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Inscription</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="fullname" placeholder="Nom & Prenom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Pseudo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="pw" placeholder="Mot de passe" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">S'inscrire</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?= BASE_URL;?>login" class="btn btn-link text-decoration-none">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
</div>