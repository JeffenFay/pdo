<?php

require_once '../models/database.php';
require_once '../models/patientsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$deleteSuccess = false;
$link = '../view/liste-patients.php';
$successPage = 'Patient supprimé';
$linkText = 'des patients';
if (isset($_GET['id'])) {
    $deleteSuccess = true;
    $patientsOBJ->id = $_GET['id'];
    $patientsOBJ->deletePatient();
} else {
    $deleteSuccess = false;
}
if (isset($_POST['searchBtn'])) {
    $patientsOBJ->search = $_POST['search'];
    $arrayPatients = $patientsOBJ->searchPatient();
} else {
    $arrayPatients = $patientsOBJ->displayPatients();
}
?>  
