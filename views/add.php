<?php
    if(isset($_POST['submit'])){
        $newEmploye = new EmployesController();
        $newEmploye->addEmploye();
    }
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <h5 class="card-header text-center">Ajouter un employé</h5>
                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="POST">
                        <div class="mb-3">
                            <label>Nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div class="mb-3">
                            <label>Prenom*</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                        </div>
                        <div class="mb-3">
                            <label>Matricule*</label>
                            <input type="text" name="mat" class="form-control" placeholder="Matricule">
                        </div>
                        <div class="mb-3">
                            <label>Departement*</label>
                            <input type="text" name="depart" class="form-control" placeholder="Departement">
                        </div>
                        <div class="mb-3">
                            <label>Poste*</label>
                            <input type="text" name="poste" class="form-control" placeholder="Poste">
                        </div>
                        <div class="mb-3">
                            <label>Date Embauche*</label>
                            <input type="date" name="dateEmb" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select name="statut" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Resilié</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>