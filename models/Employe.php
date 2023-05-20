<?php
class Employe{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM employes');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function getEmploye($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM employes WHERE id=?');
            $stmt->execute([$id]);
            $employe = $stmt->fetch(PDO::FETCH_ASSOC);
            return $employe;
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }

    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO employes (nom, prenom, matricule, depart, post, date_emb, statut) VALUES (:nom,:prenom,:matricule,:depart,:post,:date_emb,:statut)');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':matricule',$data['matricule']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':post',$data['post']);
        $stmt->bindParam(':date_emb',$data['date_emb']);
        $stmt->bindParam(':statut',$data['statut']);
        
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE employes SET nom= :nom, prenom= :prenom, matricule= :matricule, depart= :depart, post= :post, date_emb= :date_emb, statut= :statut WHERE id= :id');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':matricule',$data['matricule']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':post',$data['post']);
        $stmt->bindParam(':date_emb',$data['date_emb']);
        $stmt->bindParam(':statut',$data['statut']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function delete($id){
        $stmt = DB::connect()->prepare('DELETE FROM employes WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function find($data){
        $search = $data['search'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM employes WHERE nom LIKE ? OR prenom LIKE ?');
            $stmt->execute(['%'.$search.'%','%'.$search.'%']);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
}
?>