<?php
require_once 'CTRLR_ModifierPatient.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Custom templates -->
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <!-- TITLE -->
        <h1>Exercices p2 :<span id="flavTxt">"J’suis trop vieux pour ces conneries !" -<p id="movieName">L'arme fatale</p>-</span></h1>
        <!-- NAV -->
        <a href="index.php"><button type="button" class="btn btn-primary" >Accueil</button></a>
        <!-- CONTENT PAGE -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <?php if ($updateSuccess) { ?>
                        <h1>Patient modifié !</h1>
                    <?php } else {
                        ?>
                        <form class="grey lighten-1" name="form" id="profileForm" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header elegant-color-dark" role="tab" id="heading1">
                                    <h2 class="mb-0 mt-3 grey-text">Modifier patient</h2>
                                </div>
                                <div class="card-body pt-0 grey lighten-1">
                                    <div class="form-row">
                                        <div class="md-form col-md-6">
                                            <label for="inputLastname">Nom<span class="red-text">* <?= isset($arrayError['lastnameErr']) ? $arrayError['lastnameErr'] : ''; ?></span></label>
                                            <input class="form-control" id="inputLastname" type="text" name="inputLastname" value="<?= count($arrayError) != 0 || isset($_GET['id']) ? $arrayProfilPatient->lastname : ''; ?>" />
                                        </div>
                                        <div class="md-form col-md-6">
                                            <label for="inputFirstname">Prénom<span class="red-text">* <?= isset($arrayError['firstnameErr']) ? $arrayError['firstnameErr'] : ''; ?></span></label>
                                            <input  class="form-control" id="inputFirstname" type="text" name="inputFirstname" value="<?= count($arrayError) != 0 || isset($_GET['id']) ? $arrayProfilPatient->firstname : ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="md-form col-md-6">
                                            <label for="inputEmail">Email<span class="red-text">* <?= isset($arrayError['emailErr']) ? $arrayError['emailErr'] : ''; ?></span></label>
                                            <input class="form-control" id="inputEmail" type="email" name="inputEmail" value="<?= count($arrayError) != 0 || isset($_GET['id']) ? $arrayProfilPatient->mail : ''; ?>" />
                                        </div>
                                        <div class="md-form col-md-6">
                                            <label class="active" for="inputBirthdate">Date de naissance<span class="red-text">* <?= isset($arrayError['birthdateErr']) ? $arrayError['birthdateErr'] : ''; ?></span></label>
                                            <input class="form-control" id="inputBirthdate" type="date"  name="inputBirthdate" value="<?= count($arrayError) != 0 || isset($_GET['id']) ? $arrayProfilPatient->birthdate : ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="md-form col-md-12">
                                            <label for="inputPhone">Téléphone<span class="red-text">* <?= isset($arrayError['phoneErr']) ? $arrayError['phoneErr'] : ''; ?></span></label>
                                            <input class="form-control" id="inputPhone" type="text"  name="inputPhone" value="<?= count($arrayError) != 0 || isset($_GET['id']) ? $arrayProfilPatient->phone : ''; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row elegant-color-dark">
                                <div class="md-form col-md-12">
                                    <button type="submit" name="submit" class="btn grey validate">Envoyer</button>
                                    <div id="requiredField"><span class="red-text">* champs requis</span></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- JQuery CDN -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>
        <!-- Custom script -->
    </body>
</html>
