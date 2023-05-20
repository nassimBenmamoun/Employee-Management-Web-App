<?php
class EmployesController{
    public function getAllEmployes(){
        $employes = Employe::getAll();
        return $employes;
    }

    public function getOneEmploye(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $employe = Employe::getEmploye($id);
            return $employe;
        }
    }

    public function addEmploye(){
        if(isset($_POST['submit'])){
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'matricule' => $_POST['mat'],
                'depart' => $_POST['depart'],
                'post' => $_POST['poste'],
                'date_emb' => $_POST['dateEmb'],
                'statut' => $_POST['statut']
            );

            $result = Employe::add($data);
            if($result === 'ok'){
                Session::set('success','Employé Ajouté');
                Redirect::to('home');
            }else{
                Session::set('error','Employé Non Ajouté');
                echo $result;
            }
        }
    }

    public function updateEmploye(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $_POST['id'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'matricule' => $_POST['mat'],
                'depart' => $_POST['depart'],
                'post' => $_POST['poste'],
                'date_emb' => $_POST['dateEmb'],
                'statut' => $_POST['statut']
            );

            $result = Employe::update($data);
            if($result === 'ok'){
                Session::set('success','Employé Modifié');
                Redirect::to('home');
            }else{
                Session::set('error','Employé Non Modifié');
                echo $result;
            }
        }
    }

    public function deleteEmploye(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $result = Employe::delete($id);
            if($result === 'ok'){
                Session::set('success','Employé Supprimé');
                Redirect::to('home');
            }else{
                Session::set('error','Employé Non Supprimé');
                echo $result;
            }
        }
    }

    public function findEmployes(){
        if(isset($_POST['search'])){
            $data = array('search' => $_POST['search']);
            $employes = Employe::find($data);
            return $employes;
        }
        
    }
}
?>