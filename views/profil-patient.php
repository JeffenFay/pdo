<?php
require_once 'ctrls/CTRLR_ProfilPatient.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 3 - Partie 2</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <!-- Custom templates -->
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <!-- NAV -->
        <?php include('navbar.php'); ?>
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 text-center">
                        <?php if (!$idExist) { ?>
                        <h1>Erreur, le patient n'existe pas !</h1>
                        <div><a href="liste-patients.php" class="btn btn-primary">Retour à la liste des patients</a></div>
                        <?php } else {
                        ?>
                        <!-- Card -->
                        <div class="card">
                            <!-- Card content -->
                            <div class="card-body">
                                <!-- Title -->
                                <div class="card-title"><strong>PATIENT : </strong><u><?= $arrayPatient->lastname ?> <?= $arrayPatient->firstname ?></u></div>
                                <!-- Text -->
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="fas fa-user-circle mr-2"></i>Nom : <?= $arrayPatient->lastname ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="far fa-user-circle mr-2"></i>Prénom : <?= $arrayPatient->firstname ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="fas fa-at mr-2"></i>Adresse de messagerie : <?= $arrayPatient->mail ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="fas fa-birthday-cake mr-2"></i>Date de naissance : <?= date('d/m/Y', strtotime($arrayPatient->birthdate)) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="fas fa-phone mr-2"></i>Numéro de téléphone : <?= $arrayPatient->phone ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><p class="card-text"><i class="far fa-calendar-alt mr-2"></i>Rendez-vous le : </p>
                                        <?php if (!$rdvExist) { ?>
                                            <div class="card-text"><i class="far fa-calendar-times"><em> Ce patient n'a pas de rendez-vous.</em></i></div>
                                        <?php } else {
                                            foreach ($arrayRDV as $row) { ?>
                                            <div class="card-text"><i class="far fa-calendar-check"> <?= $row->dateHourRequest ?></i></div>
                                        <?php }} ?>
                                    </li>
                                </ul>
                                <!-- Button -->
                                <div><a href="liste-patients.php" class="btn btn-primary">Liste des patients</a><a href="modifier-patient.php"><button type="button" class="btn btn-secondary" >Modifier</button></a></div>
                            </div>
                        </div>
                        <!-- Card -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php include('footer.php'); ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>
        <!-- Custom script -->
    </body>
</html>
