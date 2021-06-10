<?php include ('assets/includes/header.php');
$log_error = "";
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_formatoEmail')){$log_error = "<br><br>El formato del email es erroneo.";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_enUso')){$log_error = "<br><br>Su usuario ya está en uso.";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_datosMal')){$log_error = "<br><br>Su usuario o contraseña son incorrectos";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='error_identificar')){$log_error = "<br><br>Debes identificate antes de acceder a esta página.";}
if(isset($_POST['identificar'])) {Usuario::identificar($_POST['user'], $_POST['password']);}
?>
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
        <a href="registro.php" class="btn btn-primary">Registrarse</a>
        <input type="submit" value="Identificar" name="identificar" class="btn btn-primary">
        </div>
    </form>
</div>
<main class="container" style="text-align: center;"><p><?php echo $log_error; ?></p></main>
<?php include ('assets/includes/footer.php'); ?>