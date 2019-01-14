<?php
require_once 'CTRLRIndex.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 1 - Zbraaaah !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <!-- Custom templates -->
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <!-- TITLE -->
        <h1>Exercices p1 :<span id="flavTxt">"J’suis trop vieux pour ces conneries !" -<p id="movieName">L'arme fatale</p>-</span></h1>
        <!-- CONTENT PAGE -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Exercice 1</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 1</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher tous les clients.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Nom </th>
                                                <th scope="col"> Prénom </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayClients as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->lastName ?> </th>
                                                    <td> <?= $row->firstName ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Exercice 2</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 2</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher tous les types de spectacles possibles.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Type </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayShows as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->type ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Exercice 3</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 3</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher les 20 premiers clients.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> ID </th>
                                                <th scope="col"> Nom </th>
                                                <th scope="col"> Prénom </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayTwentyClients as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->id ?> </th>
                                                    <th> <?= $row->lastName ?> </th>
                                                    <th> <?= $row->firstName ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">Exercice 4</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 4</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">N'afficher que les clients possédant une carte de fidélité.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> N° de carte </th>
                                                <th scope="col"> Nom </th>
                                                <th scope="col"> Prénom </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayFidCard as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->cardNumb ?> </th>
                                                    <th> <?= $row->lastName ?> </th>
                                                    <th> <?= $row->firstName ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">Exercice 5</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 5</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Les afficher comme ceci :</div>
                    <div class="exercise">Nom : Nom du client</div>
                    <div class="exercise">Prénom : Prénom du client</div>
                    <div class="exercise">Trier les noms par ordre alphabétique.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Nom </th>
                                                <th scope="col"> Prénom </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayClientsM as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->lastName ?> </th>
                                                    <td> <?= $row->firstName ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal6">Exercice 6</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 6</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Spectacle </th>
                                                <th scope="col"> Artiste </th>
                                                <th scope="col"> Date </th>
                                                <th scope="col"> Heure </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayShowsSchedule as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->title ?> </th>
                                                    <th> <?= $row->performer ?> </th>
                                                    <th> <?= $row->date ?> </th>
                                                    <th> <?= $row->startTime ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal7">Exercice 7</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice 7</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="exercise">Afficher tous les clients comme ceci :</div>
                    <div class="exercise">Nom : Nom de famille du client</div>
                    <div class="exercise">Prénom : Prénom du client</div>
                    <div class="exercise">Date de naissance : Date de naissance du client</div>
                    <div class="exercise">Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)</div>
                    <div class="exercise">Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Nom </th>
                                                <th scope="col"> Prénom </th>
                                                <th scope="col"> DDN </th>
                                                <th scope="col"> Carte de fidélité </th>
                                                <th scope="col"> N° de carte </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arrayClientsInfo as $row) { ?>
                                                <tr>
                                                    <th scope="row"> <?= $row->lastName ?> </th>
                                                    <th> <?= $row->firstName ?> </th>
                                                    <th> <?= $row->birthDate ?> </th>
                                                    <th> <?= $row->card ?> </th>
                                                    <th> <?= $row->cardNumber ?> </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- NAV -->
        <a href="ajout-patient.php"><button type="button" class="btn btn-primary" >Ajout de patient</button></a>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
