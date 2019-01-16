<?php
require_once 'database.php';
require_once 'patientsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$patientsOBJ = new patients();
$arrayPatients = $patientsOBJ->displayPatients();


?>
