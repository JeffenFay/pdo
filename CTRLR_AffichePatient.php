<?php

require_once 'database.php';
require_once 'patientsModel.php';
// Instanciation de l'objet patients contenant les méthodes utilisées
$patientsOBJ = new patients();
// variable test sur l'existence de l'id
$idExist = false;
// vérifie si l'id est passée en paramètre dans l'URL
if (isset($_GET['id'])) {

    $patientsOBJ->id = $_GET['id']; // affecte l'id de l'URL à l'attribut $id
    $arrayPatient = $patientsOBJ->displayInfoPatient();
    if ($arrayPatient === false) {
        $idExist = false;
    } else {
        $idExist = true;
    }
}
?>
