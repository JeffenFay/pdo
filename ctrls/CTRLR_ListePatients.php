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
$navPage = $patientsOBJ->rowStart+1;
$allcount = $patientsOBJ->countPatients(); // nombre de patients en tout
$countPages = ceil($allcount / $patientsOBJ->rowPerPage); // nombre de pages arrondi au chiffre supérieur
//
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
if (isset($_POST['btn_prev'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $patientsOBJ->rowStart -= $patientsOBJ->rowPerPage;
    $navPage= $patientsOBJ->rowStart/$patientsOBJ->rowPerPage+1;
    if ($patientsOBJ->rowStart < 0) {
        $patientsOBJ->rowStart = 0;
        $navPage = 1;
    }
}

// Boutons page
if (isset($_POST['btn_page'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $navPage = $_POST['btn_page'];
    if ($navPage == 1) {
        $patientsOBJ->rowStart = 0;
    } else {
        $patientsOBJ->rowStart = ($navPage - 1) * $patientsOBJ->rowPerPage;
    }
}

// Bouton suivant
if (isset($_POST['btn_next'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $allcount = $_POST['allcount'];
    $val = $patientsOBJ->rowStart + $patientsOBJ->rowPerPage;
    if ($val < $allcount) {
        $patientsOBJ->rowStart = $val;
        $navPage = ($val/$patientsOBJ->rowPerPage)+1;
    } else {
        $navPage = ($val/$patientsOBJ->rowPerPage);
    }
}

// Bouton rechercher
if (isset($_POST['searchBtn']) && !empty($_POST['search'])) {
    // Contrôle de la saisie de la recherche
    $patientsOBJ->search = test_input($_POST['search']);
    // vérifie si le champs contient des lettres et de la ponctuation
    if (!preg_match($patternName, $patientsOBJ->search)) {
        // Affichage normal de la liste des patients
        $arrayPatients = $patientsOBJ->paginationPatients();
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
    $arrayPatients = $patientsOBJ->paginationPatients();
}

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>  
