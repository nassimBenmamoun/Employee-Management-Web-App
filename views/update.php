<?php
    if(isset($_POST['id'])){
        $existEmploye = new EmployesController();
        $employe = $existEmploye->getOneEmploye();
    }else{
        Redirect::to('home');
    }

    if(isset($_POST['submit'])){
        $newEmploye = new EmployesController();
        $newEmploye->updateEmploye();
    }
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <h5 class="card-header text-center">Modifier un employé</h5>
                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="POST">
                        <div class="mb-3">
                            <label>Nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom"
                                value="<?= $employe['nom']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Prenom*</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prenom"
                                value="<?= $employe['prenom']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Matricule*</label>
                            <input type="text" name="mat" class="form-control" placeholder="Matricule"
                                value="<?= $employe['matricule']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Departement*</label>
                            <input type="text" name="depart" class="form-control" placeholder="Departement"
                                value="<?= $employe['depart']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Poste*</label>
                            <input type="text" name="poste" class="form-control" placeholder="Poste"
                                value="<?= $employe['post']; ?>">

                        </div>
                        <div class="mb-3">
                            <label>Date Embauche*</label>
                            <input type="date" name="dateEmb" class="form-control" value="<?= $employe['date_emb']; ?>">
                        </div>
                        <div class="mb-3">
                            <select name="statut" class="form-select">
                                <option value="1" <?php echo $employe['statut'] ? 'selected' : '' ;?>>Active</option>
                                <option value="0" <?php echo $employe['statut'] ? '' : 'selected' ;?>>Resilié</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $employe['id']; ?>">
                            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>