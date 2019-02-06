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
$navPage = $appointmentsOBJ->rowStart + 1;
$allcount = $appointmentsOBJ->countAppointments(); // nombre de patients en tout
$countPages = ceil($allcount / $appointmentsOBJ->rowPerPage); // nombre de pages arrondi au chiffre supérieur
// SESSION initialise la session si elle n'est pas remplie
$_SESSION['rdv_id'] = isset($_SESSION['rdv_id']) ? $_SESSION['rdv_id'] : array();
$_SESSION['text'] = isset($_SESSION['text']) ? $_SESSION['text'] : array();
$_SESSION['pageNum_rdv'] = isset($_SESSION['pageNum_rdv']) ? $_SESSION['pageNum_rdv'] : array();
// Alerte suppression
$warning = false;
//Bouton afficher profil
if (isset($_POST['btn_details']) && isset($_POST['id'])) {
    // Ajout de l'id du patient en variable session
    $_SESSION['rdv_id'] = test_input($_POST['id']);
    header('Location: rendezvous.php');
}
// Bouton tryDelete
if (isset($_POST['btn_tryDelete']) && isset($_POST['id']) && isset($_POST['date'])) {
    $_SESSION['rdv_id'] = test_input($_POST['id']);
    $_SESSION['text'] = 'le rendez-vous du ' . test_input($_POST['date']);
    $warning = true;
}
// Bouton delete
if (isset($_POST['btn_delete']) && isset($_SESSION['rdv_id'])) {
    $appointmentsOBJ->id = $_SESSION['rdv_id'];
    $appointmentsOBJ->deleteRDV();
    $deleteSuccess = true;
}
// Bouton annuler suppression
if (isset($_POST['btn_abort'])) {
    $warning = false;
}
// Retour page cliquée de la pagination
if (isset($_SESSION['pageNum_rdv']) && $_SESSION['pageNum_rdv'] == 1) {
    $appointmentsOBJ->rowStart = 0;
} else if($_SESSION['pageNum_rdv'] != NULL) {
    if($_SESSION['pageNum_rdv'] > $countPages){
        $_SESSION['pageNum_rdv'] = $countPages;
    }
    $navPage = $_SESSION['pageNum_rdv'];
    $appointmentsOBJ->rowStart = ($navPage - 1) * $appointmentsOBJ->rowPerPage;
}
// Bouton précédent
if (isset($_POST['btn_prev'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $appointmentsOBJ->rowStart -= $appointmentsOBJ->rowPerPage;
    $navPage = $_SESSION['pageNum_rdv'] = $appointmentsOBJ->rowStart / $appointmentsOBJ->rowPerPage + 1;
    if ($appointmentsOBJ->rowStart < 0) {
        $appointmentsOBJ->rowStart = 0;
        $navPage = $_SESSION['pageNum_rdv'] = 1;
    }
}
// Boutons page
if (isset($_POST['btn_page'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $navPage = $_SESSION['pageNum_rdv'] = $_POST['btn_page'];
    if ($navPage == 1) {
        $appointmentsOBJ->rowStart = 0;
    } else {
        $appointmentsOBJ->rowStart = ($navPage - 1) * $appointmentsOBJ->rowPerPage;
    }
}
// Bouton suivant
if (isset($_POST['btn_next']) && isset($_POST['allcount'])) {
    $appointmentsOBJ->rowStart = $_POST['row'];
    $allcount = $_POST['allcount'];
    $val = $appointmentsOBJ->rowStart + $appointmentsOBJ->rowPerPage;
    if ($val < $allcount) {
        $appointmentsOBJ->rowStart = $val;
        $navPage = $_SESSION['pageNum_rdv'] = ($val / $appointmentsOBJ->rowPerPage) + 1;
    } else {
        $navPage = $_SESSION['pageNum_rdv'] = ($val / $appointmentsOBJ->rowPerPage);
    }
}
// Affichage page paginée
$arrayRDV = $appointmentsOBJ->paginationAppointments();

// fonction de sécurisation de la saisie, injection de code, espaces et antislashs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
