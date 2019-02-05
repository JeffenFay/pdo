<?php
require_once 'models/database.php';
require_once 'models/appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
$deleteSuccess = false;
$link = 'liste-rendezvous.php';
$successPage = 'Rendez-vous supprimé';
$linkText = 'des rendez-vous';
// PAGINATION
$appointmentsOBJ->rowPerPage = 3; // nombre de résultat par page
$appointmentsOBJ->rowStart = 0; // résultat de départ
$navPage = $appointmentsOBJ->rowStart+1;
$allcount = $appointmentsOBJ->countAppointments(); // nombre de patients en tout
$countPages = ceil($allcount / $appointmentsOBJ->rowPerPage); // nombre de pages arrondi au chiffre supérieur
// SESSION initialise la session si elle n'est pas remplie
$_SESSION['rdv'] = isset($_SESSION['rdv']) ? $_SESSION['rdv'] : array();
// Alerte suppression
$warning = false;
//Bouton afficher profil
if (isset($_POST['btn_details'])) {
    // Ajout de l'id du patient en variable session
    if (isset($_POST['id'])) {
        $_SESSION['rdv'][$appointmentsOBJ->id] = test_input($_POST['id']);
        header('Location: rendezvous.php');
    }
}
// Bouton suppression
if (isset($_POST['btn_tryDelete'])) {
    if (isset($_POST['id'])) {
        $_SESSION['rdv'][$appointmentsOBJ->id] = test_input($_POST['id']);
        $warning = true;
    }
}
// Bouton DELETE
if (isset($_POST['btn_delete'])) {
    if (array_key_exists($appointmentsOBJ->id, $_SESSION['patient'])) {
        $appointmentsOBJ->id = $_SESSION['patient'][$appointmentsOBJ->id];
        $deleteSuccess = true;
        $appointmentsOBJ->deleteRDV();
    }
} else {
    $deleteSuccess = false;
}
// Bouton annuler suppression
if (isset($_POST['btn_abort'])) {
    $deleteSuccess = false;
    $warning = false;
}
// Bouton précédent
if (isset($_POST['btn_prev'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $appointmentsOBJ->rowStart -= $appointmentsOBJ->rowPerPage;
    $navPage= $appointmentsOBJ->rowStart/$appointmentsOBJ->rowPerPage+1;
    if ($appointmentsOBJ->rowStart < 0) {
        $appointmentsOBJ->rowStart = 0;
        $navPage = 1;
    }
}
// Boutons page
if (isset($_POST['btn_page'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $navPage = $_POST['btn_page'];
    if ($navPage == 1) {
        $appointmentsOBJ->rowStart = 0;
    } else {
        $appointmentsOBJ->rowStart = ($navPage - 1) * $appointmentsOBJ->rowPerPage;
    }
}

// Bouton suivant
if (isset($_POST['btn_next'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $allcount = $_POST['allcount'];
    $val = $appointmentsOBJ->rowStart + $appointmentsOBJ->rowPerPage;
    if ($val < $allcount) {
        $appointmentsOBJ->rowStart = $val;
        $navPage = ($val/$appointmentsOBJ->rowPerPage)+1;
    } else {
        $navPage = ($val/$appointmentsOBJ->rowPerPage);
    }
}
$arrayRDV = $appointmentsOBJ->paginationAppointments();

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
