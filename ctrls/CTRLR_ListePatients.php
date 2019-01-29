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
// PAGINATION
$patientsOBJ->rowPerPage = 3; // nombre de résultat par page
$patientsOBJ->rowStart = 0; // résultat de départ
$allcount = $patientsOBJ->countPatients(); // nombre de patients en tout
$countPages = round($allcount/$patientsOBJ->rowPerPage); // nombre de pages
// REGEX pour la saisie ici nom et prénom
$patternName = '/^[a-zA-ZÀ-ÿ \'-]*$/';
// Bouton supprimer
if (isset($_GET['id'])) {
    $deleteSuccess = true;
    $patientsOBJ->id = $_GET['id'];
    $patientsOBJ->deletePatient();
} else {
    $deleteSuccess = false;
}

// Bouton précédent
if (isset($_POST['but_prev'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $patientsOBJ->rowStart -= $patientsOBJ->rowPerPage;
    if ($patientsOBJ->rowStart < 0) {
        $patientsOBJ->rowStart = 0;
    }
}

// Bouton précédent
if (isset($_POST['but_page'])) {
    $patientsOBJ->rowStart = $_POST['but_page'];
    $allcount = $_POST['allcount'];
    $val = $patientsOBJ->rowStart + $patientsOBJ->rowPerPage;
    if ($val < $allcount) {
        $patientsOBJ->rowStart = $val;
    }
}

// Bouton suivant
if (isset($_POST['but_next'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $allcount = $_POST['allcount'];
    $val = $patientsOBJ->rowStart + $patientsOBJ->rowPerPage;
    if ($val < $allcount) {
        $patientsOBJ->rowStart = $val;
    }
}

// Bouton rechercher
if (isset($_POST['searchBtn']) && !empty($_POST['search'])) {
    // Contrôle de la saisie de la recherche
    $patientsOBJ->search = test_input($_POST['search']);
    // vérifie si le champs contient des lettres et de la ponctuation
    if (!preg_match($patternName, $patientsOBJ->search)) {
        // Affichage normal de la liste des patients
        $arrayPatients = $patientsOBJ->displayPatients();
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
