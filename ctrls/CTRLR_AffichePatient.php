<?php

require_once '../models/database.php';
require_once '../models/patientsModel.php';
require_once '../models/appointmentsModel.php';
// Instanciation de l'objet patients contenant les méthodes utilisées
$patientsOBJ = new patients();
$rdvOBJ = new appointments();
// variable test sur l'existence de l'id et des rendez-vous
$idExist = false;
$rdvExist = false;
// vérifie si l'id est passée en paramètre dans l'URL
if (isset($_GET['id'])) {
    $patientsOBJ->id = $_GET['id']; // affecte l'id de l'URL à l'attribut $id
    $arrayPatient = $patientsOBJ->displayInfoPatient(); // exécute la requête 
    if ($arrayPatient === false) { // si il y a une erreur dans l'exécution de la requête
        $idExist = false; // passe la variable à false et cache le profil
    } else {
        // affichage des rendez-vous d'un patient
        $rdvOBJ->idPatients = $patientsOBJ->id;
        $arrayRDV = $rdvOBJ->appointmentsByPatient();
        if (count((array)$arrayRDV)) {
            $rdvExist = true; // pas de rendez-vous
        }
        $idExist = true; // sinon, affiche le profil
    }
}
?>
