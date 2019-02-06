<?php

require_once 'models/database.php';
require_once 'models/patientsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$deleteSuccess = false;
$searchExist = false;
$link = '/liste-patients.php';
$successPage = 'Patient supprimé';
$linkText = 'des patients';
// variable de récupération d'erreurs
$arrayError = [];
// PAGINATION
$patientsOBJ->rowPerPage = 3; // nombre de résultat par page
$patientsOBJ->rowStart = 0; // résultat de départ
$navPage = $patientsOBJ->rowStart + 1;
$allcount = $patientsOBJ->countPatients(); // nombre de patients en tout
$countPages = ceil($allcount / $patientsOBJ->rowPerPage); // nombre de pages arrondi au chiffre supérieur
// RECHERCHE affichage pagination
$searchRequest = false;
// REGEX pour la saisie ici nom et prénom
$patternName = '/^[a-zA-ZÀ-ÿ \'-]*$/';
// SESSION initialise la session si elle n'est pas remplie
$_SESSION['id_patient'] = isset($_SESSION['id_patient']) ? $_SESSION['id_patient'] : array();
$_SESSION['lastname'] = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : array();
$_SESSION['firstname'] = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : array();
$_SESSION['pageNum_patient'] = isset($_SESSION['pageNum_patient']) ? $_SESSION['pageNum_patient'] : array();
// Alerte suppression
$warning = false;
//Bouton afficher profil
if (isset($_POST['btn_display']) && isset($_POST['id'])) {
    // Ajout de l'id du patient en variable session
    $_SESSION['id_patient'] = test_input($_POST['id']);
    header('Location: profil-patient.php');
}
// Retour page cliquée de la pagination
if (isset($_SESSION['pageNum_patient']) && $_SESSION['pageNum_patient'] == 1) {
    $patientsOBJ->rowStart = 0;
} else if($_SESSION['pageNum_patient'] != NULL) {
    $navPage = $_SESSION['pageNum_patient'];
    $patientsOBJ->rowStart = ($navPage - 1) * $patientsOBJ->rowPerPage;
}
// Bouton précédent
if (isset($_POST['btn_prev'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $patientsOBJ->rowStart -= $patientsOBJ->rowPerPage;
    $navPage = $_SESSION['pageNum_patient'] = $patientsOBJ->rowStart / $patientsOBJ->rowPerPage + 1;
    if ($patientsOBJ->rowStart < 0) {
        $patientsOBJ->rowStart = 0;
        $navPage = $_SESSION['pageNum_patient'] = 1;
    }
}
// Boutons page
if (isset($_POST['btn_page'])) {
    $patientsOBJ->rowStart = $_POST['row'];
    $navPage = $_SESSION['pageNum_patient'] = $_POST['btn_page'];
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
        $navPage = $_SESSION['pageNum_patient'] = ($val / $patientsOBJ->rowPerPage) + 1;
    } else {
        $navPage = $_SESSION['pageNum_patient'] = ($val / $patientsOBJ->rowPerPage);
    }
}
// Bouton rechercher
if (isset($_POST['searchBtn']) && !empty($_POST['search'])) {
    $searchRequest = true;
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
// Bouton tryDelete
if (isset($_POST['btn_tryDelete']) && isset($_POST['id']) && isset($_POST['lastname']) && isset($_POST['firstname'])) {
    $_SESSION['id_patient'] = test_input($_POST['id']);
    $_SESSION['text'] = test_input($_POST['firstname']) . ' ' . test_input($_POST['lastname']);
    $warning = true;
}
// Bouton delete
if (isset($_POST['btn_delete']) && isset($_SESSION['id'])) {
        $patientsOBJ->id = $_SESSION['id_patient'];
        $patientsOBJ->deletePatient();
        $deleteSuccess = true;
}
// Bouton annuler suppression
if (isset($_POST['btn_abort'])) {
    $warning = false;
}

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>  
