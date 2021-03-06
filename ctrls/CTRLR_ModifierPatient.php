<?php
require_once 'models/database.php';
require_once 'models/patientsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$updateSuccess = false;
$link = 'liste-patients.php';
$successPage = 'Patient modifié';
$linkText = 'des patients';
// SESSIONS initialise la session si elle n'est pas remplie
$_SESSION['id_patient']=isset($_SESSION['id_patient']) ? $_SESSION['id_patient'] : array();
// vérifie si l'id est passée en paramètre dans l'URL
if(isset($_SESSION['id_patient'])){
    $patientsOBJ->id = $_SESSION['id_patient']; // affecte l'id de l'URL à l'attribut $id par la méthode $_GET
    $arrayProfilPatient = $patientsOBJ->displayInfoPatient(); // exécute la requête via la méthode de l'objet patients, pour afficher le profil du  patient
}
// variable de récupération d'erreurs
$arrayError = [];
// Test des champs obligatoires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // regex utilisées pour le contrôle de saisie
    $patternName = '/^[a-zA-ZÄ-ỳ \'-]*$/';
    $patternPhone = '/^0[0-9]([ .-]?[0-9]{2}){4}$/';
    // contrôle de saisie
    // NOM
    if (empty($_POST['inputLastname'])) {
        $arrayError['lastnameErr'] = 'Le nom est requis';
    } else {
        $patientsOBJ->lastname = test_input($_POST['inputLastname']);
        // vérifie si le champs contient des lettres et de la ponctuation
        if (!preg_match($patternName, $patientsOBJ->lastname)) {
            $arrayError['lastnameErr'] = 'Caractères incorrects ex : DOE';
        } else {
            $patientsOBJ->lastname = strtoupper($patientsOBJ->lastname);
            unset($arrayError['lastnameErr']);
        }
    }
    // PRENOM
    if (empty($_POST['inputFirstname'])) {
        $arrayError['firstnameErr'] = 'Le prénom est requis';
    } else {
        $patientsOBJ->firstname = test_input($_POST['inputFirstname']);

        // vérifie si le champs contient des lettres et de la ponctuation
        if (!preg_match($patternName, $patientsOBJ->firstname)) {
            $arrayError['firstnameErr'] = 'Caractères incorrects ex : John';
        } else {
            $patientsOBJ->firstname = ucfirst(strtolower($patientsOBJ->firstname));
            unset($arrayError['firstnameErr']);
        }
    }
    // EMAIL
    if (empty($_POST['inputEmail'])) {
        $arrayError['emailErr'] = 'L\'email est requis';
    } else {
        $patientsOBJ->mail = test_input($_POST['inputEmail']);
        // vérifie si le champs contient un email
        if (!filter_var($patientsOBJ->mail, FILTER_VALIDATE_EMAIL)) {
            $arrayError['emailErr'] = 'Format d\'email invalide ex : nom.prenom@mail.com';
        } else {
            $patientsOBJ->mail = strtolower($patientsOBJ->mail);
            unset($arrayError['emailErr']);
        }
    }
    // DATE DE NAISSANCE
    if (empty($_POST['inputBirthdate'])) {
        $arrayError['birthdateErr'] = 'La date de naissance est requise';
    } else {
        $patientsOBJ->birthdate = test_input($_POST['inputBirthdate']);
        $dateTime1 = new DateTime($patientsOBJ->birthdate);
        $dateTime2 = new DateTime(date('Y-m-d'));
        // vérifie si le champs contient une date de naissance plausible
        if (!$dateTime1->diff($dateTime2)>0) {
            $arrayError['emailErr'] = 'Date incorrecte ex: 01/01/2000';
        } else {
            unset($arrayError['birthdateErr']);
        }
    }
    // NUMERO DE TELEPHONE
    if (empty($_POST['inputPhone'])) {
        $arrayError['phoneErr'] = 'Le téléphone est requis.';
    } else {
        $patientsOBJ->phone = test_input($_POST['inputPhone']);
        if (!preg_match($patternPhone, $patientsOBJ->phone)) {
            $arrayError['phoneErr'] = 'Il y a une erreur dans le numéro de téléphone';
        } else {
            unset($arrayError['inputPhone']);
        }
    }
    // VALIDER
    if (isset($_POST['submit']) && count($arrayError) == 0) {
        $patientsOBJ->updatePatient(); // exécute la méthode permettant la mise à jour du patient
        $updateSuccess = true; // variable mise à true pour cacher le formulaire
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
