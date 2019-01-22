<?php

class appointments extends database {
    // champs de la table patients
    public $id;
    public $dateHour;
    public $idPatients;
    public $dateHourRequest;
    
    public function __construct() {
        parent::__construct();
    }
    // Exercice5 
    /**
     * Vérifie si le rendez-vous existe déjà
     * @return 1 ou 0 s'il y a ou pas des doublons possibles
     */
    public function checkFree(){
        $query = 'SELECT * FROM appointments WHERE dateHour = :dateHour';
        $sql = $this->database->prepare($query);
        $sql->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sql->execute();
        return $sql->rowCount();
    }
    // Suite
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
        $sql = $this->database->query('SELECT DATE_FORMAT(dateHour,"%d/%m/%Y - %H:%i") AS dateHourRequest, idPatients FROM appointments ORDER BY dateHour');
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Exercice7
    /**
     * Méthode qui renvoie la liste du détail d'un rendez-vous
     * @return Tableau de détail d'un rendez-vous
     */
     public function displayDetailsAppointments() {
        $sql = $this->database->prepare('SELECT patients.lastname, patients.firstname, DATE_FORMAT(appointments.dateHour,"%d/%m/%Y à %H:%i") AS dateHour, appointments.idPatients'
                                      . ' FROM appointments'
                                      . ' INNER JOIN patients'
                                      . ' ON appointments.idPatients = patients.id'
                                      . ' WHERE idPatients = :id');
        $sql->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}
?>

