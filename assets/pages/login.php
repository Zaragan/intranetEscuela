<?php if(isset($_POST['identificar'])) {User::identificar($_POST['user'], $_POST['password']);} ?>
<h1 style="text-align: center; margin-top: 45px;">Identifícate</h1><br />
<div class="login">
    <form method="post">
        <div class="fila">
            <label for="user" class="col-sm-4 col-form-label">Correo: </label>
            <input type="text" name="user" id="user" class="form-control" required>
        </div>
        <div class="fila">
            <label for="password" class="col-sm-4 col-form-label">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="fila">
        <a href="index.php?page=register" class="btn btn-primary">Registrarse</a>
        <input type="submit" value="Identificar" name="identificar" class="btn btn-primary">
        </div>
        <?php
            if (isset($_GET['message'])) {
                switch ($_GET['message']) {
                    case 'registrado':
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">Identifícate ahora.</div>';
                        break;
                    case 'errorUnknownUser':
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El usuario no existe.</div>';
                        break;
                    case 'errorAutentication':
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El correo o la contraseña no son correctas.</div>';
                        break;
                    default:
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">¿Que tramas, moreno?</div>';
                        break;
                }
            }
        ?>
    </form>
</div>
