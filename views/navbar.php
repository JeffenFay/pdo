<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/index.php">Hopital E2N <i class="fas fa-plus-square"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/accueil.php' || $_SERVER['REQUEST_URI'] == '/index.php')? 'active' : '' ?>">
                <a class="nav-link" href="/accueil.php">Accueil</a>
            </li>
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/ajout-patient.php')? 'active' : '' ?>">
                <a class="nav-link" href="/ajout-patient.php">Ajout de patient</a>
            </li>
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/liste-patients.php')? 'active' : '' ?>">
                <a class="nav-link" href="/liste-patients.php">Liste des patients</a>
            </li>
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/ajout-rendezvous.php')? 'active' : '' ?>">
                <a class="nav-link" href="/ajout-rendezvous.php">Rendez-vous</a>
            </li>
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/liste-rendezvous.php')? 'active' : '' ?>">
                <a class="nav-link" href="/liste-rendezvous.php">Liste des rendez-vous</a>
            </li>
        </ul>
    </div>
</nav>
