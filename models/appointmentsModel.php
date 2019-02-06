<?php

class appointments extends database {

    // champs de la table patients
    public $id;
    public $dateHour;
    public $idPatients;
    public $dateHourRequest;
    public $rowStart;
    public $rowPerPage;

    public function __construct() {
        parent::__construct();
    }

    // Contrôle des doublons 
    /**
     * Vérifie si le rendez-vous existe déjà, grâce aux marqueurs nominatifs
     * @return 1 ou 0 s'il y a ou pas des doublons possibles
     */
    public function checkFree() {
        $query = 'SELECT * FROM appointments WHERE dateHour = :dateHour';
        $sql = $this->database->prepare($query);
        $sql->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sql->execute();
        return $sql->rowCount();
    }

    // Exercice5 
    /**
     * Méthode permettant d'ajouter un rendez-vous, grâce aux marqueurs nominatifs
     * @return Exécute la requête pour ajouter un rendez-vous
     */
    public function addRDV() {
        $sql = $this->database->prepare('INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)');
        $sql->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sql->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $sql->execute();
    }

    // Exercice6
    /**
     * Méthode qui renvoie la liste de tous les rendez-vous
     * @return Tableau des rendez-vous
     */
    public function displayAppointments() {
        $sql = $this->database->query('SELECT id, DATE_FORMAT(dateHour,"%d/%m/%Y - %H:%i") AS dateHourRequest, idPatients FROM appointments ORDER BY dateHour');
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Exercice 13
    /**
     * Méthode qui renvoie la liste de tous les rendez-vous ainsi que de leurs informations en paginant via $rowPerPage
     * @return Tableau des informations des rendez-vous
     */
     public function paginationAppointments() {
        $sql = $this->database->query('SELECT id, DATE_FORMAT(dateHour,"%d/%m/%Y - %H:%i") AS dateHourRequest, idPatients FROM appointments ORDER BY dateHour LIMIT ' . $this->rowStart . ', ' . $this->rowPerPage);
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    public function countAppointments() {
        $sql = $this->database->query('SELECT * FROM appointments');
        return $sql->rowCount();
    }

    // Exercice7
    /**
     * Méthode qui renvoie la liste du détail d'un rendez-vous, grâce aux marqueurs nominatifs
     * @return Tableau de détail d'un rendez-vous
     */
    public function displayDetailsAppointments() {
        $sql = $this->database->prepare('SELECT patients.lastname, patients.firstname, DATE_FORMAT(appointments.dateHour,"%d/%m/%Y à %H:%i") AS dateHour, appointments.id'
                . ' FROM appointments'
                . ' INNER JOIN patients'
                . ' ON appointments.idPatients = patients.id'
                . ' WHERE appointments.id = :idRdv');
        $sql->bindValue(':idRdv', $this->id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    // Exercice8
    /**
     * Méthode qui met à jour le rendez-vous d'un patient, grâce aux marqueurs nominatifs
     * @return Tableau du rendez-vous d'un patient
     */
    public function updateAppointments() {
        $sql = $this->database->prepare('UPDATE appointments SET dateHour=:dateHourRequest WHERE id = :id');
        $sql->bindValue(':dateHourRequest', $this->dateHourRequest, PDO::PARAM_STR);
        $sql->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $sql->execute();
    }

    // Exercice9
    /**
     * Méthode qui renvoie la liste de tous les rendez-vous d'un patient, grâce aux marqueurs nominatifs
     * @return Tableau des rendez-vous
     */
    public function appointmentsByPatient() {
        $sql = $this->database->prepare('SELECT DATE_FORMAT(dateHour,"%d/%m/%Y à %H:%i") AS dateHourRequest FROM appointments WHERE idPatients = :idPatients ORDER BY dateHour');
        $sql->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    //Exercice10
    /**
     * Méthode permettant de supprimer un rendez-vous, grâce aux marqueurs nominatifs
     * @return Exécute la requête pour supprimer un rendez-vous
     */
    public function deleteRDV() {
        $sql = $this->database->prepare('DELETE FROM appointments WHERE id = :idRdv');
        $sql->bindValue(':idRdv', $this->id, PDO::PARAM_STR);
        return $sql->execute();
    }

    public function __destruct() {
        parent::__destruct();
    }

}
?>

