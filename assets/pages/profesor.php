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
    <select id="curso" name="curso" class="form-select ">
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
        <td><form method='post' class='container'><input type='hidden' name='id' value='" . $data[$key]['id'] . "' readonly></input><input type='submit' value='Modificar' name='student' class='btn btn-secondary btn-sm'></input></form></td></tr>";
    }
    echo "</tbody></table></div>";
}

if (isset($_POST['student'])) {
    $data = Database::getUserGrades($_POST['id']);
    echo "<div class='container border border-dark border-2 rounded-2 cter mt-4'><table class='table table-sm caption-top tdata'><caption>Lista de notas</caption><tbody><tr><td>Inglés</td><td>Tecnología</td><td>Naturaleza</td><td>Sociales/Geografía/Historia</td><td>Música</td><td>Educación Física</td><td>Matemáticas</td><td>Lenguaje</td></tr>";
    echo "<tr><td>" . $data['english'] . "</td><td>" . $data['tech'] . "</td><td>" . $data['nature'] . "</td><td>" . $data['sogehi'] . "</td><td>" . $data['music'] . "</td><td>" . $data['physical'] . "</td><td>" . $data['math'] . "</td><td>" . $data['language'] . "</td></tr>";
    echo "</tbody></table></div>";
}

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 'errorSelectCourse':
            echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">Selecciona un curso.</div>';
            break;

        default:
            echo '<div class="alert alert-warning d-flex justify-content-center" role="alert">¿Que tramas, moreno?</div>';
            break;
    }
}


?>