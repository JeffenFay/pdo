<?php

require_once '../models/database.php';
require_once '../models/patientsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$deleteSuccess = false;
$searchExist = false;
$link = '../view/liste-patients.php';
$successPage = 'Patient supprimé';
$linkText = 'des patients';
// variable de récupération d'erreurs
$arrayError = [];
// REGEX pour les noms
$patternName = '/^[a-zA-ZÀ-ÿ \'-]*$/';
// Bouton supprimer
if (isset($_GET['id'])) {
    $deleteSuccess = true;
    $patientsOBJ->id = $_GET['id'];
    $patientsOBJ->deletePatient();
} else {
    $deleteSuccess = false;
}
// Bouton rechercher
if (isset($_POST['searchBtn']) && !empty($_POST['search'])) {
    // Contrôle de la saisie de la recherche
    $patientsOBJ->search = test_input($_POST['search']);
    // vérifie si le champs contient des lettres et de la ponctuation
    if (!preg_match($patternName, $patientsOBJ->search)) {
        $arrayError['searchErr'] = 'Caractères incorrects ex : John';
    } else {
        unset($arrayError['searchErr']);
        $arrayPatients = $patientsOBJ->searchPatient();
        // contrôle si la recherche ne renvoie aucun résultat
        if (count($arrayPatients) < 1) {
            $searchExist = true;
        } else {
            $searchExist = false;
        }
    }
} else {
    // Affichage normal de la liste des patients
    $arrayPatients = $patientsOBJ->displayPatients();
}

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>  
