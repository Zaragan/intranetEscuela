<?php
include('assets/includes/nav.php');
if ($_SESSION['user']['access'] != 2) {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');
    header('Location: index.php?page=login&message=errorPermissions');
}

?>
<h1 style="text-align: center; margin-top: 45px;">Asignación de notas</h1><br />
<form method="post" class="container " style="width: 30%; text-align: center;">
    <label class="col-form-label">Selecciona un curso: </label>
    <select name="curso" class="form-select ">
        <option value="1">Primero</option>
        <option value="2">Segundo</option>
        <option value="3">Tercero</option>
        <option value="4">Cuarto</option>
    </select>
    <input type="hidden" name="clase" value="<?php echo $_SESSION['user']['clase'] ?>" readonly></input>
    <input type="submit" name="send" value="Cambiar curso"class="mt-2 btn btn-primary"></input>
    <a href="index.php?page=profesor" class="btn btn-primary mt-2">Borrar resultados</a>
</form>

<?php
if (isset($_POST['send'])) {
    $data = Database::getDataForLevel2($_POST['curso']);
    $info = Database::getGrades($_POST['curso']);
    $getClase = array();
    foreach ($info as $key => $value) {
        $getClase[] = $value[$_POST['clase']];
    }
    echo "<div class='container border border-dark border-2 rounded-2 cter mt-4'>
    <table class='table table-sm caption-top'>
        <caption>Lista de alumnos</caption>
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>email</td>
                    <td>Nota en ".$_SESSION['user']['clase']."</td>
                    <td>Modificar</td>
                </tr>";
    foreach ($data as $key => $value) {
        echo "<tr><td>" . $data[$key]['name'] . "</td>
        <td>" . $data[$key]['surname'] . " " . $data[$key]['surname2'] . "</td>
        <td>" . $data[$key]['email'] . "</td>
        <form method='post' class='container'>
        <!-- I WANT TO GET RID OF THIS METHOOOOOOOOD -->
        <input type='hidden' name='id' value='" . $data[$key]['id'] . "' readonly></input>
        <!-- I WANT TO GET RID OF THIS METHOOOOOOOOD -->
        <td><input type='number' name='note' value='" . $getClase[$key] . "'></input></td>
        <td><input type='submit' value='Modificar' name='sendNote' class='btn btn-secondary btn-sm'></input></form></td></tr>";
    }
    echo "</tbody></table></div>";
}

if(isset($_POST['sendNote'])) { 
    Database::modifyNote($_SESSION['user']['clase'], $_POST['note'], $_POST['id']);
}

?>