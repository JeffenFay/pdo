<?php
require_once 'ctrls/CTRLR_ListePatients.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 2, 11, 12 & 13 - Partie 2</title>
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
            <?php
            if ($deleteSuccess) {
                include('success.php');
            }
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 text-center">
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> Nom </th>
                                    <th scope="col"> Prénom </th>
                                    <th scope="col"> Informations </th>
                                    <th scope="col">
                                        <span class="red-text"><?= isset($arrayError['searchErr']) ? $arrayError['searchErr'] : ''; ?> </span>
                                        <form class="form-inline my-3 my-lg-0" method="post" >
                                            <div class="input-group" role="group" aria-label="searchBar">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Recherche..." aria-label="Recherche" name="search" value="<?= $patientsOBJ->search ?>" data-toggle="tooltip" data-placement="bottom" title="Recherche" />
                                                <div  class="input-group-append">
                                                    <button class="btn-floating btn-blue btn-sm input-group-text" id="searchBtn" type="submit" name="searchBtn" data-toggle="tooltip" data-placement="bottom" title="Rechercher"><i class="fas fa-search"></i></button>
                                                    <button class="btn-floating btn-blue-grey btn-sm input-group-text" type="submit" name="cancel" data-toggle="tooltip" data-placement="bottom" title="Annuler"><i class="fas far fa-times"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$searchExist) { ?>
                                    <?php foreach ($arrayPatients as $row) { ?>
                                        <tr>
                                            <th scope="row"> <?= $row->lastname ?> </th>
                                            <td><?= $row->firstname ?></td>
                                            <td><form name="form_id" method="post">
                                                    <input type="hidden" name="id" value="<?= $row->id ?>" />
                                                    <input type="submit" name="btn_display" class="btn btn-info" value="Afficher" />
                                                </form>
                                            </td>
                                            <td>
                                                <?php if (!$warning) { ?>
                                                    <form name="form_id" method="post">
                                                        <input type="hidden" name="id" value="<?= $row->id ?>" />
                                                        <input type="submit" name="btn_tryDelete" class="btn btn-danger" value="Supprimer" />
                                                    </form>
                                                    <?php
                                                } else {
                                                    include('warning.php');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <th scope="row" colspan="4" class="red-text"><strong>Désolé, aucun résultat pour cette recherche...</strong></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="row" colspan="4"><div class="pageNum">Page n° : <span class="numberCircle"><?= $navPage ?></span></div></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- PAGINATION -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 text-center">
                        <form name="form_pagin" method="post">
                            <div id="div_pagination">
                                <input type="hidden" name="row" value="<?= $patientsOBJ->rowStart ?>" />
                                <input type="hidden" name="allcount" value="<?= $allcount ?>" />
                                <button class="btn btn-flat btn-grey btn-sm btnPagin" type="submit" name="btn_prev" data-toggle="tooltip" data-placement="bottom" title="Précédent"><i class="fas fa-chevron-circle-left fa-2x"></i></button>
                                <?php for ($i = 1; $i <= $countPages; $i++) { ?>
                                    <input type="submit" class="btn btn-floating btn-grey btn-sm btnPagin" name="btn_page" value="<?= $i ?>" />
                                <?php } ?>
                                <button class="btn btn-flat btn-grey btn-sm btnPagin" type="submit" name="btn_next" data-toggle="tooltip" data-placement="bottom" title="Suivant"><i class="fas fa-chevron-circle-right fa-2x"></i></button>
                            </div>
                        </form>
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
