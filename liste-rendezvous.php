<?php
require_once 'CTRLR_ListeRendezvous.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 6 - Partie 2</title>
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
        <!-- NAV -->
        <?php include('navbar.php'); ?>
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col align-self-center">
                            <a href="ajout-rendezvous.php"><button type="button" class="btn btn-success" >Ajouter rendez-vous</button></a>
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> DATE ET HEURE </th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($arrayRDV as $row) { ?>
                                    <tr>
                                        <th scope="row"><i class="far fa-calendar-check"></i> <?= $row->dateHour ?></th>
                                        <td><a href="rendezvous.php?id=<?= $row->idPatients ?>"><button type="button" class="btn btn-info delete" >Détails</button></a></td>
                                        <td><a href=""><button type="button" class="btn btn-danger delete" >Supprimer</button></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
