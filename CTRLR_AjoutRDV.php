<?php

require_once 'database.php';
require_once 'patientsModel.php';
require_once 'appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$appointmentsOBJ = new appointments();
$arrayPatientRDV = $patientsOBJ->displayPatients();
$rendezvousSuccess = false;
$successPage = 'Rendez-vous ajouté'; // message personnalisé pour la validation
$link = 'liste-rendezvous.php';
$linkText = 'des rendez-vous';
// Variables pour l'horaire $dateTime
$today = date('Y-m-d'); // variable servant à initialiser le calendrier à la date du jour
$oneDateLater = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 month')); // variable servant à délimiter la fin du calendrier
$startHour = 8; // heure de début de rendez-vous
$endHour = 10; // nombre d'heures à afficher pour une journée ouvrée +1
// variable de récupération d'erreurs
$arrayError = [];
$regexDate = '/^(0[1-9]|((19|20)[0-9]{2})\-(0[1-9]|1[012])\-([1-2][0-9])|3[01])$/';
$regexHour = '/([01]?[0-9]|2[0-3]):[0-5][0-9]/';
// Test des champs obligatoires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // PATIENT
    if (empty($_POST['selectId'])) {
        $arrayError['patientErr'] = 'Un patient est requis';
    } else {
        $inputID = test_input($_POST['selectId']);
        unset($arrayError['patientErr']);
    }
    // JOUR
    if (empty($_POST['inputDate']) || $_POST['inputDate'] < $today) {
        $arrayError['dayErr'] = 'Un jour correct est requis';
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
        }
    }

    // VALIDER
    if (isset($_POST['submit']) && count($arrayError) == 0) {
        $appointmentsOBJ->idPatients = $_POST['selectId']; // id du patient sélectionné
        $appointmentsOBJ->dateHour = $dateInput . ' ' . $hourInput; // mise en forme pour l'ajout à la table appointments
        $testDoubleEntry = $appointmentsOBJ->addRDV(); // exécute la méthode permettant l'ajout de rendez-vous
        if ($testDoubleEntry === false) {
            $rendezvousSuccess = false; // variable mise à false
        } else {
            $rendezvousSuccess = true; // variable mise à true pour cacher le formulaire
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