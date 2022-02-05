<?php if(isset($_POST['register'])) {Users::test($_POST['rank'], $_SESSION['user']['email']);}?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="active nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuClickableInside" data-bs-auto-close="outside">Rango</a>
                    <ul class="dropdown-menu">
                        <form method="post">
                            <li class="dropdown-item">
                                <input id="director" type="radio" name="rank" value="1">
                                <label for="director">Director</label><br>
                            </li>
                            <li class="dropdown-item">
                                <input id="profesor" type="radio" name="rank" value="2">
                                <label for="profesor">Profesor</label><br>
                            </li>
                            <li class="dropdown-item">
                                <input id="alumno" type="radio" name="rank" value="3">
                                <label for="alumno">Alumno</label>
                            </li>
                        <input type="submit" value="Cambiar rango" class="dropdown-item" name="register"></input>
                        </form>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="assets/pages/logout.php">Desconectar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>