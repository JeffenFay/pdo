<?php

/**
 * Classe permettant la connexion avec la base de donnée
 * @return Methods
 */
class database {

    public $database;
    // variables stockant les paramètres de connexions à la base
    private $server = 'mysql:host=localhost;dbname=hospitalE2N;charset=UTF8'; // le chemin vers le serveur
    private $user = 'Jeffen'; // nom d'utilisateur pour se connecter
    private $password = 'At@ri55468'; // mot de passe de l'utilisateur pour se connecter
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING); // Affiche les erreurs SQL

    // Ce qui va être exécuté en premier lors de l'instanciation de la classe

    public function __construct() {
        try {
            // Mise en relation avec la base de donnée
            $this->database = new PDO($this->server, $this->user, $this->password, $this->options);
        } catch (Exception $error) {
            // récupération des erreurs
            die('Erreur : ' . $error->getMessage());
        }
    }

    // Ce qui va être exécuté en dernier lors de l'instanciation de la classe
    public function __destruct() {
        $this->database = NULL;
    }

}
