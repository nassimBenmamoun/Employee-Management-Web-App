<?php

if(isset($_POST['find'])){
    $data = new EmployesController();
    $employes = $data->findEmployes();

}else{
    $data = new EmployesController();
    $employes = $data->getAllEmployes();
}
    
    
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;?>add" class="btn btn-sm btn-primary mb-2">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="<?= BASE_URL;?>" class="ms-2 btn btn-sm btn-secondary mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="<?= BASE_URL;?>logout" title="Déconnexion"
                        class="btn btn-sm btn-link ms-2 mb-2 border border-secondary rounded-pill">
                        <i class="fas fa-user text-primary"> <?= $_SESSION['username'];?></i>
                    </a>
                    <form method="POST" class="float-end mb-2 d-flex flex-row">
                        <div class="input-group">
                            <input class="form-control form-control-sm" type="text" name="search"
                                placeholder="Recherche">
                            <button class="btn btn-info btn-sm" name="find" type="submit"><i
                                    class="fas fa-search text-white"></i></button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nom & Prénom</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Département</th>
                                    <th scope="col">Poste</th>
                                    <th scope="col">Date Embauche</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($employes as $employe):?>
                                <tr>
                                    <th scope="row"><?= $employe['nom'].' '.$employe['prenom']; ?></th>
                                    <td><?= $employe['matricule']; ?></td>
                                    <td><?= $employe['depart']; ?></td>
                                    <td><?= $employe['post']; ?></td>
                                    <td><?= $employe['date_emb']; ?></td>
                                    <td><?php echo $employe['statut'] ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Resilié</span>'; ; ?>
                                    </td>
                                    <td class="d-flex flex-row justify-content-around">
                                        <form method="POST" action="update" class="mr-1">
                                            <input type="hidden" name="id" value="<?= $employe['id']; ?>">
                                            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>

                                        </form>
                                        <form method="POST" action="delete" class="mr-1">
                                            <input type="hidden" name="id" value="<?= $employe['id']; ?>">
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>