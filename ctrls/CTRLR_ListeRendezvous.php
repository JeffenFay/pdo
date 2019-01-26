<?php
require_once '../models/database.php';
require_once '../models/appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
$deleteSuccess = false;
$link = '../view/liste-rendezvous.php';
$successPage = 'Rendez-vous supprimé';
$linkText = 'des rendez-vous';
if(isset($_GET['id'])){
    $deleteSuccess = true;
    $appointmentsOBJ->id = $_GET['id'];
    $appointmentsOBJ->deleteRDV();
} else {
    $deleteSuccess = false;
}
$arrayRDV = $appointmentsOBJ->displayAppointments();
?>
