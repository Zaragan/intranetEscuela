<?php
if (isset($_POST['register'])) {
    Users::register($_POST['name'], $_POST['surname'], $_POST['surname2'], $_POST['email'], $_POST['dob'], $_POST['dni'], $_POST['password'], $_POST['password2'], $_POST['access']);
}
?>
<h1 style="text-align: center; margin-top: 45px;">Registro</h1><br />
<div class="login">
    <form method="post">
        <div class="crow">
            <label for="name" class="col-sm-4 col-form-label">Nombre: </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="crow">
            <label for="surname" class="col-sm-4 col-form-label">Primer apellido: </label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="crow">
            <label for="surname2" class="col-sm-4 col-form-label">Segundo apellido: </label>
            <input type="text" name="surname2" class="form-control" required>
        </div>
        <div class="crow">
            <label for="email" class="col-sm-4 col-form-label">Correo: </label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="crow">
            <label for="dni" class="col-sm-4 col-form-label">DNI: </label>
            <input type="number" name="dni" placeholder="00000000" class="form-control" required>
        </div>
        <div class="crow">
            <label for="dob" class="col-sm-4 col-form-label">Fecha de nacimiento: </label>
            <input type="datetime" name="dob" placeholder="DD/MM/YYYY" class="form-control" required>
        </div>
        <div class="crow">
            <label for="password" class="col-sm-4 col-form-label">Contraseña: </label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="crow">
            <label for="password2" class="col-sm-4 col-form-label">Confirmar contraseña: </label>
            <input type="password" name="password2" class="form-control" required>
        </div>
        <!-- OBVIAMENTE ESTA OPCION NO DEBE ESTAR DISPONIBLE EN PRODUCCION -->
        <div class="crow">
            <label for="access" class="col-sm-4 col-form-label">Selecciona un rango:</label>
            <select name="access" class="form-control">
                <option value="1">Director</option>
                <option value="2">Profesor</option>
                <option value="3" selected>Alumno</option>
            </select>
        </div>
        <!-- POR DIOS NO OLVIDES DE BORRAR ESTA OPCION -->
        <div class="crow d-flex justify-content-center">
            <input type="submit" value="Registrarse" name="register" class="btn btn-primary ">
        </div>
        <?php
        if (isset($_GET['message'])) {
            switch ($_GET['message']) {
                case 'errorEmailFormat':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El formato del email es erroneo.</div>';
                    break;
                case 'errorDateFormat':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El formato de fecha es erroneo.</div>';
                    break;
                case 'errorBirthDate':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">¿Has nacido en el futuro?.</div>';
                    break;
                case 'errorUsed':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El email ya está en uso.</div>';
                    break;
                case 'errorPasswordMatch':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">Las contraseñas no coinciden.</div>';
                    break;
                case 'errorNewUser':
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">Ha ocurrido un error, inténtalo de nuevo.</div>';
                    break;
                default:
                    echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">¿Que tramas, moreno?</div>';
                    break;
            }
        }
        ?>
    </form>
</div>
<p style="text-align:center">¿Ya estas registrado?<br><br><a href="index.php?page=login" class="btn btn-primary">Identifícate</a></p>
<?php include('assets/includes/footer.php'); ?>