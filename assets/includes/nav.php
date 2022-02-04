<!--
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if(isset($_SESSION['user']['accesslevel'])) { ?>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="principal.php">Principal</a></li>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                <?php } ?>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sandbox</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="assets/pages/logout.php">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown"><a class="active nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menú de pruebas</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Cambiar a Director</a></li>
                        <li><a class="dropdown-item" href="">Cambiar a Profesor</a></li>
                        <li><a class="dropdown-item" href="">Cambiar a Alumno</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="assets/pages/logout.php">Desconectar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>