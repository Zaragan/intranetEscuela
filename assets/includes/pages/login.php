<?php if(isset($_POST['identificar'])) {Usuario::identificar($_POST['user'], $_POST['password']);} ?>
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
    </form>
</div>
