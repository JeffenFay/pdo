<?php
require_once '../ctrls/CTRLR_ModifierRendezVous.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 8 - Partie 2</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet" />
        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <!-- NAV -->
        <?php include('navbar.php'); ?>
        <!-- CONTENT PAGE -->
        <div class="content-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php if ($updateSuccess) { ?>
                            <?php include('../views/success.php'); ?>
                        <?php } else {
                            ?>
                            <form class="grey lighten-1" name="form" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header elegant-color-dark" role="tab" id="heading1">
                                        <h2 class="mb-0 mt-3 grey-text">Ajouter rendez-vous</h2>
                                    </div>
                                    <div class="card-body pt-0 grey lighten-1">
                                        <div class="form-row">
                                            <div class="md-form col-md-5">
                                                <h6>Patient concerné :<span class="red-text">* <?= isset($arrayError['patientErr']) ? $arrayError['patientErr'] : ''; ?></span></h6>
                                                <input  class="form-control" type="text" disabled /><?= $arrayPatientRDV->firstname ?> <?= $arrayPatientRDV->lastname ?>
                                            </div>
                                            <div class="md-form col-md-7">
                                                <h6>Modification du rendez-vous <?= $arrayPatientRDV->dateHour; ?> :</h6>
                                                <div>Jour<span class="red-text">* <?= isset($arrayError['dayErr']) ? $arrayError['dayErr'] : ''; ?></span></div>
                                                <input class="form-control" type="date" name="inputDate" id="inputDate" min="<?= $today ?>" max="<?= $oneDateLater ?>" value="<?= isset($_POST['inputDate']) ? $_POST['inputDate'] : '' ?>" />
                                                <div>Heure<span class="red-text">* <?= isset($arrayError['hourErr']) ? $arrayError['hourErr'] : ''; ?></span></div>
                                                <select id="selectTime" name="selectTime" class="form-control" >
                                                    <option value="" disabled selected>--Choisissez un horaire--</option>
                                                    <?php
                                                    for ($i = 0; $i < $endHour; $i++) {
                                                        if ($startHour != 11) { // on enlève le créneau de midi
                                                            ?>
                                                            <option value="<?= $startHour += 1 ?>:00" <?= isset($_POST['selectTime'])==$startHour ? 'selected' : '' ?> ><?= $startHour ?>:00</option>
                                                            <?php
                                                        } else {
                                                            $startHour += 1; // incrémente pour passer l'heure de midi
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row elegant-color-dark">
                                        <div class="md-form col-md-12">
                                            <div id="requiredField">
                                                <button type="submit" name="submit" class="btn grey validate">Envoyer</button>
                                                <a href="index.php" class="btn btn-danger">Annuler</a>
                                                <span class="red-text">* champs requis</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if ($rendezvousFailure) { ?>
                <?php include('../views/failure.php'); ?>
            <?php } ?>
        </div>
        <!-- FOOTER -->
        <?php include('footer.php'); ?>
        <!-- JQuery CDN -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDBootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>
    </body>
</html>
