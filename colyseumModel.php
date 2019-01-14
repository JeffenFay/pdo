<?php

class Colyseum extends DatabaseColyseumClass {
    // champs de la table client
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $card;
    public $cards;
    public $cardNumber;
    // champs de la table shows
    public $title;
    public $performer;
    public $date;
    public $showTypesId;
    public $firstGenresId;
    public $secondGenreId;
    public $duration;
    public $startTime;
    /**
     * Methode qui va récuperer un tableau d'objets clients
     * @return Array
     */    
    public function displayClients() {
        $sql = $this->database->query('SELECT `lastName`, `firstName` FROM `clients` ORDER BY `lastName`');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour tous les types de spectacles possibles
     * @return Array
     */    
    public function displayShowTypes() {
        $sql = $this->database->query('SELECT type FROM showTypes ORDER BY type');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour les 20 premiers clients
     * @return Array
     */    
    public function displayTwentyClients() {
        $sql = $this->database->query('SELECT id, lastName, firstName FROM clients LIMIT 20');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour les clients qui ont une carte de fidélité
     * @return Array
     */    
    public function displayFidCard() {
        $sql = $this->database->query('SELECT lastName, firstName, clients.cardNumber AS cardNumb FROM clients
                                        INNER JOIN cards ON clients.cardNumber = cards.cardNumber
                                        INNER JOIN cardTypes ON cards.cardTypesId = cardTypes.id
                                        WHERE cardTypes.id = 1');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour les clients qui ont un nom commençant par 'M'
     * @return Array
     */    
    public function displayClientsM() {
        $sql = $this->database->query("SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName");
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour le pragramme des spectacles
     * @return Array
     */    
    public function displayShowsSchedule() {
        $sql = $this->database->query('SELECT title, performer, DATE_FORMAT(date,\'%d/%m/%Y\') AS date, startTime FROM shows ORDER BY title');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Methode qui va récuperer un tableau d'objets pour les informations des clients
     * @return Array
     */    
    public function displayClientsInfo() {
        $sql = $this->database->query('SELECT lastName, firstName, DATE_FORMAT(birthDate,\'%d/%m/%Y\') AS birthDate, IF(card=1, \'OUI\', \'NON\') AS card, cardNumber FROM clients ORDER BY lastName');
        // Récupération de toutes les lignes d'un jeu de résultats
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>

