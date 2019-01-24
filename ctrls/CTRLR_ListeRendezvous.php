<?php
require_once '../models/database.php';
require_once '../models/appointmentsModel.php';
// Instanciation de l'objet Hospital contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
$arrayRDV = $appointmentsOBJ->displayAppointments();
?>
