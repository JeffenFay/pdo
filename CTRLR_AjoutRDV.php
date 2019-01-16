<?php
require_once 'database.php';
require_once 'patientsModel.php';
require_once 'appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$appointmentsOBJ = new appointments();
$rendezvousSuccess = false; 
$arrayPatientRDV = $patientsOBJ->displayPatients();
// Variables pour l'horaire $dateTime

// variable de récupération d'erreurs
$arrayError = [];
// Test des champs obligatoires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // VALIDER
    if (isset($_POST['submit'])) {
        $patientsOBJ->addRDV(); // exécute la méthode permettant la mise à jour du patient
        $addSuccess = true; // variable mise à true pour cacher le formulaire
    }
}

?>
