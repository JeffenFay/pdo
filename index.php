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
        require __DIR__ . '/liste-rendezvous.php';
        break;
    case '/views/liste-patients' :
        require __DIR__ . '/liste-patients.php';
        break;
    case '/views/ajout-patient' :
        require __DIR__ . '/ajout-patient.php';
        break;
    case '/views/ajout-rendezvous' :
        require __DIR__ . '/ajout-rendezvous.php';
        break;
    case '/views/accueil2' :
        require __DIR__ . '/views/accueil2.php';
        break;
    default: 
        require __DIR__ . '/views/errors/error_404.php';
        break;
}
?>
