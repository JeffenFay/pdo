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
    //INSERT INTO appointments (dateHour, idPatients) SELECT '2019-01-30 16:00:00', 2 WHERE NOT EXISTS (SELECT dateHour FROM appointments WHERE dateHour = '2019-01-30 16:00:00' OR idPatients = 2);
    public function addRDV() {
        $sql = $this->database->prepare('INSERT INTO appointments (dateHour, idPatients)'
                . ' SELECT :dateHour, :idPatients'
                . ' WHERE NOT EXISTS'
                . ' (SELECT dateHour FROM appointments WHERE dateHour = :dateHour AND idPatients = :idPatients)');
        $sql->bindValue(':dateHour',$this->dateHour,PDO::PARAM_STR);
        echo $this->dateHour;
        $sql->bindValue(':idPatients',$this->idPatients,PDO::PARAM_INT);
        return $sql->execute();
    }
    
    // Exercice6
    /**
     * Méthode qui renvoie la liste de tous les rendez-vous
     * @return Tableau des rendez-vous
     */
     public function displayAppointments() {
        $sql = $this->database->query('SELECT DATE_FORMAT(dateHour,"%d/%m/%Y - %H:%i") AS dateHour, idPatients FROM appointments');
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

