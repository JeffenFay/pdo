<?php

class patients extends database {
    // champs de la table patients arrributs
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;
    public $search;
    
    public function __construct() {
        parent::__construct();
    }
    /**
     * Méthode permettant d'ajouter un patient, grâce aux marqueurs nominatifs
     * @return exécute la requête pour ajouter un patient
     */
    public function addPatient() {
        $sql = $this->database->prepare('IF NOT EXISTS ( SELECT 1 FROM patients WHERE lastname = :lastname AND firstname = :firstname ) BEGIN '
                . 'INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)'
                . 'END');
        $sql->bindValue(':lastname',$this->lastname,PDO::PARAM_STR);
        $sql->bindValue(':firstname',$this->firstname,PDO::PARAM_STR);
        $sql->bindValue(':birthdate',$this->birthdate,PDO::PARAM_STR);
        $sql->bindValue(':phone',$this->phone,PDO::PARAM_STR);
        $sql->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        
        return $sql->execute();
    }
    
    // Exercice2
    /**
     * Méthode qui renvoie la liste de tous les patients ainsi que de leurs informations
     * @return Tableau des informations des patients
     */
     public function displayPatients() {
        $sql = $this->database->query('SELECT * FROM patients ORDER BY lastname');
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Exercice3
    /**
     * Méthode qui renvoie les informations appartenanant à un patient, grâce aux marqueurs nominatifs
     * @return Tableau des informations du patient
     */
     public function displayInfoPatient() {
        $sql = $this->database->prepare('SELECT * FROM patients WHERE id = :id');
        $sql->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    
    // Exercice4
    /**
     * Méthode qui met à jour les informations appartenanant à un patient, grâce aux marqueurs nominatifs
     * @return Tableau des informations du patient
     */
     public function updatePatient() {
        $sql = $this->database->prepare('UPDATE patients SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate, phone=:phone, mail=:mail WHERE id = :id');
        $sql->bindValue(':lastname',$this->lastname,PDO::PARAM_STR);
        $sql->bindValue(':firstname',$this->firstname,PDO::PARAM_STR);
        $sql->bindValue(':birthdate',$this->birthdate,PDO::PARAM_STR);
        $sql->bindValue(':phone',$this->phone,PDO::PARAM_STR);
        $sql->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        $sql->bindValue(':id',$this->id,PDO::PARAM_INT);
        
        return $sql->execute();
    }
    
    //Exercice11
    /**
     * Méthode permettant de supprimer un patient, grâce aux marqueurs nominatifs
     * @return Exécute la requête pour supprimer un patient
     */
    public function deletePatient() {
        $sql = $this->database->prepare('DELETE FROM patients WHERE id = :idPatient');
        $sql->bindValue(':idPatient', $this->id, PDO::PARAM_STR);
        return $sql->execute();
    }
    
    //Exercice12
    /**
     * Méthode permettant de faire une recherche
     * @return Exécute la requête pour effectuer une recherche
     */
    public function searchPatient() {
        $sql = $this->database->prepare('SELECT * FROM `patients` WHERE `lastname` LIKE :search OR `firstname` LIKE :search ORDER BY `lastname`');
        $sql->bindValue(':search', '%' . $this->search . '%', PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        parent::__destruct();
    }
}
?>
