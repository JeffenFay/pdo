<?php

require_once 'models/database.php';
require_once 'models/patientsModel.php';
require_once 'models/appointmentsModel.php';
// Instanciation de l'objet patients contenant les méthodes utilisées
$patientsOBJ = new patients();
$rdvOBJ = new appointments();
// variable test sur l'existence de l'id et des rendez-vous
$idExist = false;
$rdvExist = false;
// SESSION initialise la session si elle n'est pas remplie
$_SESSION['id_patient']=isset($_SESSION['id_patient']) ? $_SESSION['id_patient'] : array();
// vérifie si l'id est présent dans la session
if(isset($_SESSION['id_patient'])){
    $patientsOBJ->id = $_SESSION['id_patient']; // affecte l'id de l'URL à l'attribut $id
    $arrayPatient = $patientsOBJ->displayInfoPatient(); // exécute la requête 
    if ($arrayPatient === false) { // si il y a une erreur dans l'exécution de la requête
        $idExist = false; // passe la variable à false et cache le profil
    } else {
        // affichage des rendez-vous d'un patient
        $rdvOBJ->idPatients = $patientsOBJ->id;
        $arrayRDV = $rdvOBJ->appointmentsByPatient(); // méthode renvoyant otus les rendez-vous d'un patient
        if (count((array)$arrayRDV)) {
            $rdvExist = true; // pas de rendez-vous
        }
        $idExist = true; // sinon, affiche le profil
    }
}
?>
