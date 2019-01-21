<?php

class appointments extends database {
    // champs de la table patients
    public $id;
    public $dateHour;
    public $idPatients;
    
    public function __construct() {
        parent::__construct();
    }
    // Exercice5
    /**
     * Méthode permettant d'ajouter un rendez-vous
     * @return Exécute la requête pour ajouter un rendez-vous
     */
    public function addRDV() {
        $sql = $this->database->prepare('INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)');
        $sql->bindValue(':dateHour',$this->dateHour,PDO::PARAM_STR);
        $sql->bindValue(':idPatients',$this->idPatients,PDO::PARAM_INT);
        return $sql->execute();
    }
    
    // Exercice6
    /**
     * Méthode qui renvoie la liste de tous les rendez-vous
     * @return Tableau des rendez-vous
     */
     public function displayAppointments() {
        $sql = $this->database->query('SELECT * FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id ');
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}
?>

