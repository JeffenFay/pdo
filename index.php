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
    case '/views/rendezvous' :
        require __DIR__ . '/views/rendezvous.php';
        break;
    case '/views/profil-patient' :
        require __DIR__ . '/views/profil-patient.php';
        break;
    case '/views/modifier-patient' :
        require __DIR__ . '/views/modifier-patient.php';
        break;
    case '/views/modif-rendezvous' :
        require __DIR__ . '/views/modif-rendezvous.php';
        break;
    case '/views/liste-rendezvous' :
        require __DIR__ . '/views/liste-rendezvous.php';
        break;
    case '/views/liste-patients' :
        require __DIR__ . '/views/liste-patients.php';
        break;
    case '/views/ajout-patient' :
        require __DIR__ . '/views/ajout-patient.php';
        break;
    case '/views/ajout-rendezvous' :
        require __DIR__ . '/views/ajout-rendezvous.php';
        break;
    default: 
        require __DIR__ . '/views/errors/error_404.php';
        break;
}
?>
