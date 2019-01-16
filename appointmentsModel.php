<?php

class appointments extends database {
    // champs de la table patients
    public $id;
    public $dateHour;
    public $idPatients;
    
    public function __construct() {
        parent::__construct();
    }
    /**
     * Méthode permettant d'ajouter un rendez-vous
     * @return Exécute la requête pour ajouter un rendez-vous
     */
    public function addRDV() {
        $sql = $this->database->prepare('INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)');
        $sql->bindValue(':dateHour',$this->dateHour,PDO::PARAM_STR);
        $sql->bindValue(':idPatients',$this->idPatients,PDO::PARAM_STR);
        
        return $sql->execute();
    }
    
    
    public function __destruct() {
        parent::__destruct();
    }
}
?>

