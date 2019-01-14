<?php

class patients extends database {
    // champs de la table patients
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;
    /**
     * Méthode permettant d'ajouter un patient
     * @return exécute la requête pour ajouter un patient
     */
    function addPatient() {
        //
        $sql = $this->database->prepare('INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
        $sql->bindValue(':lastname',$this->lastname,PDO::PARAM_STR);
        $sql->bindValue(':firstname',$this->firstname,PDO::PARAM_STR);
        $sql->bindValue(':birthdate',$this->birthdate,PDO::PARAM_STR);
        $sql->bindValue(':phone',$this->phone,PDO::PARAM_STR);
        $sql->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        
        return $sql->execute();
    }
    // Exercice2
    function displayPatients() {
        $sql = $this->database->prepare('SELECT * FROM patients');
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    // Exercice3
    function displayPatient() {
        $sql = $this->database->query('SELECT * FROM patients WHERE id=:id');
        $result = $sql->execute(array(
            'id' => $this->id
        ));
        return $result;
    }
}
?>

