<?php
require_once 'database.php';
require_once 'appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
$arrayRDV = $appointmentsOBJ->displayAppointments();
?>
