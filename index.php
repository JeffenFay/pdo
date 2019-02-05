<?php
// ROUTER servant à la redirection des pages pour le modèle MVC
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/index.php' :
        require __DIR__ . '/views/accueil.php';
        break;
    case '/' :
        require __DIR__ . '/views/accueil.php';
        break;
    case '/accueil.php' :
        require __DIR__ . '/views/accueil.php';
        break;
    case '/rendezvous.php' :
        require __DIR__ . '/views/rendezvous.php';
        break;
    case '/profil-patient.php' :
        require __DIR__ . '/views/profil-patient.php';
        break;
    case '/modifier-patient.php' :
        require __DIR__ . '/views/modifier-patient.php';
        break;
    case '/modif-rendezvous.php' :
        require __DIR__ . '/views/modif-rendezvous.php';
        break;
    case '/liste-rendezvous.php' :
        require __DIR__ . '/views/liste-rendezvous.php';
        break;
    case '/liste-patients.php' :
        require __DIR__ . '/views/liste-patients.php';
        break;
    case '/ajout-patient.php' :
        require __DIR__ . '/views/ajout-patient.php';
        break;
    case '/ajout-rendezvous.php' :
        require __DIR__ . '/views/ajout-rendezvous.php';
        break;
    default: 
        require __DIR__ . '/views/errors/error_404.php';
        break;
}
?>
