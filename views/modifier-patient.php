<?php
require_once 'ctrls/CTRLR_ModifierPatient.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
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
        <!-- CONTENT PAGE -->
        <div class="content-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <?php if ($updateSuccess) { ?>
                        <?php include('success.php'); ?>
                    <?php } else {
                        ?>
                        <div class="col-sm-10 offset-sm-1 text-center">
                            <form class="grey lighten-1" name="form" id="profileForm" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header elegant-color-dark" role="tab" id="heading1">
                                        <h2 class="mb-0 mt-3 grey-text">Modifier patient</h2>
                                    </div>
                                    <div class="card-body pt-0 grey lighten-1">
                                        <div class="form-row">
                                            <div class="md-form col-md-6">
                                                <label for="inputLastname">Nom<span class="red-text">* <?= isset($arrayError['lastnameErr']) ? $arrayError['lastnameErr'] : '' ?></span></label>
                                                <input class="form-control" id="inputLastname" type="text" name="inputLastname" value="<?= isset($_POST['inputLastname']) ? $_POST['inputLastname'] : $arrayProfilPatient->lastname ?>" />
                                            </div>
                                            <div class="md-form col-md-6">
                                                <label for="inputFirstname">Prénom<span class="red-text">* <?= isset($arrayError['firstnameErr']) ? $arrayError['firstnameErr'] : '' ?></span></label>
                                                <input  class="form-control" id="inputFirstname" type="text" name="inputFirstname" value="<?= isset($_POST['inputFirstname']) ? $_POST['inputFirstname'] : $arrayProfilPatient->firstname ?>" />
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="md-form col-md-6">
                                                <label for="inputEmail">Email<span class="red-text">* <?= isset($arrayError['emailErr']) ? $arrayError['emailErr'] : '' ?></span></label>
                                                <input class="form-control" id="inputEmail" type="email" name="inputEmail" value="<?= isset($_POST['inputEmail']) ? $_POST['inputEmail'] : $arrayProfilPatient->mail ?>" />
                                            </div>
                                            <div class="md-form col-md-6">
                                                <label class="active" for="inputBirthdate">Date de naissance<span class="red-text">* <?= isset($arrayError['birthdateErr']) ? $arrayError['birthdateErr'] : '' ?></span></label>
                                                <input class="form-control" id="inputBirthdate" type="date"  name="inputBirthdate" value="<?= isset($_POST['inputBirthdate']) ? $_POST['inputBirthdate'] : $arrayProfilPatient->birthdate ?>" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="md-form col-md-12">
                                                <label for="inputPhone">Téléphone<span class="red-text">* <?= isset($arrayError['phoneErr']) ? $arrayError['phoneErr'] : '' ?></span></label>
                                                <input class="form-control" id="inputPhone" type="text" maxlength = "14" name="inputPhone" value="<?= isset($_POST['inputPhone']) ? $_POST['inputPhone'] : $arrayProfilPatient->phone ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row elegant-color-dark">
                                        <div class="md-form col-md-12">
                                            <div id="requiredField">
                                                <button type="submit" name="submit" class="btn grey validate">Envoyer</button>
                                                <a href="profil-patient.php" class="btn btn-danger">Annuler</a>
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
        </div>
        <!-- FOOTER -->
        <?php include('footer.php'); ?>
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
