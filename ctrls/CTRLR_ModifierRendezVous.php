<?php
require_once 'models/database.php';
require_once 'models/appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
$rendezvousFailure = false;
$updateSuccess = false;
$link = 'views/liste-rendezvous.php';
$successPage = 'Rendez-vous modifié';
$linkText = 'des rendez-vous';
//
// Variables pour l'horaire $dateTime
$today = date('Y-m-d'); // variable servant à initialiser le calendrier à la date du jour
$oneDateLater = date('Y-m-d', strtotime(date('Y-m-d') . ' +6 month')); // variable servant à délimiter la fin du calendrier
$startHour = 8; // heure de début de rendez-vous
$endHour = 10; // nombre d'heures à afficher pour une journée ouvrée +1
// vérifie si l'id est passée en paramètre dans l'URL
if (isset($_GET['id'])) {
    $appointmentsOBJ->id = $_GET['id']; // affecte l'id de l'URL à l'attribut $id par la méthode $_GET
    $arrayPatientRDV = $appointmentsOBJ->displayDetailsAppointments(); // exécute la requête via la méthode de l'objet patients, pour afficher le profil du  patient
}
// variable de récupération d'erreurs
$arrayError = [];
// Test des champs obligatoires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // regex utilisées pour le contrôle de saisie
    $regexDate = '/^((20[0-9]{2})\-(0[1-9]|1[012])\-(0[1-9]|([1-2][0-9])|3[0-1]))$/';
    $regexHour = '/([01]?[0-9]|2[0-3]):[0-5][0-9]/';
    // contrôle de saisie
    
// JOUR
    if (empty($_POST['inputDate']) || $_POST['inputDate'] < $today || $_POST['inputDate'] > $oneDateLater) {
        $arrayError['dayErr'] = 'Un jour (correct) est requis';
    } else {
        $dateInput = test_input($_POST['inputDate']);
        if (preg_match($regexDate, $dateInput)) {
            unset($arrayError['dayErr']);
        }
    }
// HEURE
    if (empty($_POST['selectTime'])) {
        $arrayError['hourErr'] = 'Une heure est requise';
    } else {
        $hourInput = test_input($_POST['selectTime']);
        if (!preg_match($regexHour, $hourInput)) {
            $arrayError['hourErr'] = 'Une heure correcte est requise';
        } else {
            unset($arrayError['hourErr']);
        }
    }

// VALIDER
    if (isset($_POST['submit']) && count($arrayError) == 0) {
        $appointmentsOBJ->dateHourRequest = $dateInput . ' ' . $hourInput; // mise en forme pour l'ajout à la table appointments
        $temp = $appointmentsOBJ->dateHour;
        $appointmentsOBJ->dateHour = $appointmentsOBJ->dateHourRequest;
        $count = $appointmentsOBJ->checkFree(); // Vérification de l'existence d'un doublon avant insertion dans la base
        if ($count > 0) {
            $rendezvousFailure = true;
            $appointmentsOBJ->dateHour = $temp;
            $failurePage = 'Le rendez-vous du ' . $appointmentsOBJ->dateHour . ' ';
            $arrayError['dayErr'] = 'Le rendez-vous existe déjà';
        } else {
            $rendezvousFailure = false;
            // exécute la méthode permettant l'ajout de rendez-vous
            $testDoubleEntry = $appointmentsOBJ->updateAppointments();
            if ($testDoubleEntry === false) {
                $updateSuccess = false; // variable mise à false si échec
            } else {
                $updateSuccess = true; // variable mise à true pour cacher le formulaire si réussite
            }
        }
    }
}

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
