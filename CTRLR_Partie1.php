<?php
require_once 'DBModelColyseum.php';
require_once 'colyseumModel.php';
// Instanciation de l'objet Colyseum contenant les méthodes utilisées
$colyseumOBJ = new Colyseum();
$arrayClients = $colyseumOBJ->displayClients();
$arrayShows = $colyseumOBJ->displayShowTypes();
$arrayTwentyClients = $colyseumOBJ->displayTwentyClients();
$arrayFidCard = $colyseumOBJ->displayFidCard();
$arrayClientsM = $colyseumOBJ->displayClientsM();
$arrayShowsSchedule = $colyseumOBJ->displayShowsSchedule();
$arrayClientsInfo = $colyseumOBJ->displayClientsInfo();

?>
