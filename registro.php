<?php include ('assets/includes/header.php'); 
if(isset($_POST['crear_usuario'])) {Usuario::registrar($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['dni'],$_POST['fechaNacimiento'],$_POST['password']);}
$log_error = "";
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_formatoEmail')){$log_error = "<br><br>El formato del email es erroneo.";}
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
            <label for="apellido" class="col-sm-4 col-form-label">Apellido: </label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>
        <div class="fila">
            <label for="correo" class="col-sm-4 col-form-label">Correo: </label>
            <input type="text" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="fila">
            <label for="dni" class="col-sm-4 col-form-label">DNI: </label>
            <input type="number" name="dni" id="dni" placeholder="00000000X" class="form-control" required>
        </div>
        <div class="fila">
            <label for="fechaNacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento: </label>
            <input type="datetime" name="fechaNacimiento" id="fechaNacimiento" placeholder="DD/MM/YYYY" class="form-control" required>
        </div>
        <div class="fila">
            <label for="password" class="col-sm-4 col-form-label">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div style="text-align: center;">
        <input type="submit" value="Registrar" name="crear_usuario" class="btn btn-primary">
        </div>
    </form>
</div>
<main class="container" style="text-align: center;"><p><?php echo $log_error; ?></p></main>
<?php include ('assets/includes/footer.php'); ?>