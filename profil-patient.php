<?php
require_once 'CTRLRIndex.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 2 - Partie 2</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <!-- Custom templates -->
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>PATIENTS</h1>
        <!-- NAV -->
        <a href="liste-patients.php"><button type="button" class="btn btn-primary" >Retour liste patients</button></a>
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

                        <!-- Card content -->
                        <div class="card-body">

                            <?php foreach ($arraySinglePatient as $row) { ?>
                                <!-- Title -->
                                <h4 class="card-title"><a><?= $row->lastname ?> <?= $row->firstname ?></a></h4>
                                <!-- Text -->
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-laptop mr-4 pr-3"></i><p class="card-text">Nom : <?= $row->lastname ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-bomb mr-5"></i><p class="card-text">Prénom : <?= $row->firstname ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-code mr-5"></i><p class="card-text">Adresse de messagerie : <?= $row->mail ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="far fa-gem mr-5"></i><p class="card-text">Date de naissance : <?= $row->birthdate ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-cogs mr-5"></i><p class="card-text">Numéro de téléphone : <?= $row->phone ?></p>
                                    </li>
                                </ul>
                                <!-- Button -->
                                <a href="liste-patients.php" class="btn btn-primary">Retour à la liste des patients</a>

                            <?php } ?>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            </div>
        </div>
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
