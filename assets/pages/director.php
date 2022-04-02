<?php
include('assets/includes/nav.php');
if ($_SESSION['user']['access'] != 1) {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');
    header('Location: index.php?page=login&message=errorPermissions');
}

?>

<h1 style="text-align: center; margin-top: 45px;">Asignación de profesores</h1><br />

<?php
$data = Database::getAllUsers();
echo "<div class='container border border-dark border-2 rounded-2 cter mt-4'>
<table class='table table-sm caption-top'>
    <caption>Lista de alumnos</caption>
        <tbody>
            <tr>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>email</td>
                <td>Materia</td>
                <td>Modificar</td>
            </tr>";
foreach ($data as $key => $value) {
    echo "<tr><td>" . $data[$key]['name'] . "</td>
    <td>" . $data[$key]['surname'] . " " . $data[$key]['surname2'] . "</td>
    <td>" . $data[$key]['email'] . "</td>
    <form method='post' class='container'>
    <input type='hidden' name='id' value='" . $data[$key]['id'] . "' readonly></input>
    <td><select name='materia' class='form-select' style='width: 300px'>
        <option default>Selecciona una materia.</option>
        <option value='english'>Inglés</option>
        <option value='tech'>Tecnología</option>
        <option value='nature'>Naturaleza</option>
        <option value='sogehi'>Sociales/Geo/Historia</option>
        <option value='music'>Música</option>
        <option value='physical'>Ed. Física</option>
        <option value='math'>Matemáticas</option>
        <option value='language'>Lenguaje</option></select></td>
    <td><input type='submit' value='Modificar' name='sendClase' class='btn btn-secondary btn-sm'></input></form></td></tr>";
}
echo "</tbody></table></div>";


if(isset($_POST['sendClase'])) {
    Database::modifyClase($_POST['materia'], $_POST['id']);
}
?>