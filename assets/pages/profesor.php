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
    <select id="curso" name="curso" class="form-select ">
        <option selected>Selecciona un curso</option>
        <option value="1">Primero</option>
        <option value="2">Segundo</option>
        <option value="3">Tercero</option>
        <option value="4">Cuarto</option>
    </select>
    <input type="submit" value="Cambiar curso" name="send" class="mt-2 btn btn-primary"></input>
    <a href="index.php?page=profesor" class="btn btn-primary mt-2">Borrar resultados</a>
</form>

<?php
if (isset($_POST['send'])) {
    $data = Database::getDataForLevel2($_POST['curso']);
    echo "<div class='container border border-dark border-2 rounded-2 cter mt-4'><table class='table table-sm caption-top'><caption>Lista de alumnos</caption><tbody><tr><td>Nombre</td><td>Apellidos</td><td>email</td><td>Modificar</td></tr>";
    foreach ($data as $key => $value) {
        echo "<tr><td>" . $data[$key]['name'] . "</td>
        <td>" . $data[$key]['surname'] . " " . $data[$key]['surname2'] . "</td>
        <td>" . $data[$key]['email'] . "</td>
        <td>" . $data[$key]['id'] . "</td></tr>";
    }
    echo "</tbody></table></div>";
}


?>