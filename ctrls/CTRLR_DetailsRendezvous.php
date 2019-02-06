<?php
require_once 'models/database.php';
require_once 'models/appointmentsModel.php';
// Instanciation de l'objet patients contenant les méthodes utilisées
$appointmentsOBJ = new appointments();
// variable test sur l'existence de l'id
$idExist = false;
// SESSION initialise la session si elle n'est pas remplie
$_SESSION['rdv_id']=isset($_SESSION['rdv_id']) ? $_SESSION['rdv_id'] : array();
// vérifie si l'id est présent dans la session
if(isset($_SESSION['rdv_id'])){
    $appointmentsOBJ->id = $_SESSION['rdv_id']; // affecte l'id de l'URL à l'attribut $id
    $arrayDetailRDV = $appointmentsOBJ->displayDetailsAppointments(); // exécute la requête 
    if ($arrayDetailRDV === false) { // si il y a une erreur dans l'exécution de la requête
        $idExist = false; // passe la variable à false et cache le profil
    } else {
        $idExist = true; // sinon, l'affiche
    }
}
?>
