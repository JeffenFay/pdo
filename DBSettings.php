<?php

class DatabaseSettings {

    var $settings;

    function getSettings() {
        // variables stockant les paramètres de connexions à la base
        $settings = array();
        $settings['SGBD'] = 'mysql';
        $settings['HOST'] = 'localhost'; // le chemin vers le serveur
        $settings['DB_NAME'] = 'hospitalE2N'; // le nom de votre base de données
        $settings['USER'] = 'Jeffen'; // nom d'utilisateur pour se connecter
        $settings['PASSWORD'] = 'At@ri55468'; // mot de passe de l'utilisateur pour se connecter
        $settings['OPTIONS'] = array(
            // Activation des exceptions PDO :
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Change le fetch mode par défaut sur FETCH_ASSOC ( fetch() retournera un tableau associatif ) :
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        return $settings;
    }

}

?>