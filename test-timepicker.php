
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4 - Partie 2</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet" />
        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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

                    <form class="grey lighten-1" name="form" id="profileForm" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header elegant-color-dark" role="tab" id="heading1">
                                <h2 class="mb-0 mt-3 grey-text">Ajouter rendez-vous</h2>
                            </div>
                            <div class="card-body pt-0 grey lighten-1">
                                <div class="form-row ">
                                    <div class="input-append date form_datetime">
                                        <input size="16" type="text" value="" readonly>
                                        <span class="add-on"><i class="icon-th"></i></span>
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
                </div>
            </div>
        </div>
        <!-- JQuery CDN -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDBootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>
        <!-- Custom script -->
        <script type="text/javascript" src="timePicker.js"></script>
    </body>
</html>
