<?php
if(isset($_POST['crear_usuario'])) {Usuario::registrar($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['dni'],$_POST['fechaNacimiento'],$_POST['password']);}
$log_error = "";
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_formatoFecha')){$log_error = "<br><br>El formato de fecha es erroneo.";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_fechaMayor')){$log_error = "<br><br>¿Has nacido mañana?";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_enUso')){$log_error = "<br><br>Su usuario ya está en uso.";}
?>
<h1 style="text-align: center; margin-top: 45px;">Registro</h1><br />
<div class="login">
    <form method="post">
        <div class="fila">
            <label for="nombre" class="col-sm-4 col-form-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="fila">
            <label for="primerApellido" class="col-sm-4 col-form-label">Primer apellido: </label>
            <input type="text" name="primerApellido" id="primerApellido" class="form-control" required>
        </div>
        <div class="fila">
            <label for="segundoApellido" class="col-sm-4 col-form-label">Segundo apellido: </label>
            <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" required>
        </div>
        <div class="fila">
            <label for="correo" class="col-sm-4 col-form-label">Correo: </label>
            <input type="text" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="fila">
            <label for="dni" class="col-sm-4 col-form-label">DNI: </label>
            <input type="number" name="dni" id="dni" placeholder="00000000" class="form-control" required>
        </div>
        <div class="fila">
            <label for="fechaNacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento: </label>
            <input type="datetime" name="fechaNacimiento" id="fechaNacimiento" placeholder="DD/MM/YYYY" class="form-control" required>
        </div>
        <div class="fila">
            <label for="password" class="col-sm-4 col-form-label">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="fila">
            <label for="password2" class="col-sm-4 col-form-label">Confirmar contraseña: </label>
            <input type="password2" name="password2" id="password2" class="form-control" required>
        </div>
        <div class="fila d-flex justify-content-center">
            <input type="submit" value="Registrarse" name="crear_usuario" class="btn btn-primary ">
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
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">El correo ya está en uso.</div>';
                        break;
                    case 'errorPasswordMatch':
                        echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">Las contraseñas no coinciden.</div>';
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

<main class="container" style="text-align: center;"><p><?php echo $log_error; ?></p></main>
<?php include ('assets/includes/footer.php');?>