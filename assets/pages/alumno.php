<?php 
include('assets/includes/nav.php');
if ($_SESSION['user']['accesslevel'] != 3) {session_start();session_unset();session_destroy();session_write_close();setcookie(session_name(),'',0,'/');header('Location: index.php?page=login&message=errorPermissions');}
?>
<h1 style="text-align: center; margin-top: 45px;">Detalles del alumno</h1><br />
<div class="container border border-dark border-2 rounded-2 d-flex">
    <div class="container">
        <table class="table table-sm caption-top">
        <caption>Datos personales</caption>
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>test</td>
            </tr>
            <tr>
                <th>Primer apellido</th>
                <td>Jacob</td>
            </tr>
            <tr>
                <th>Segundo apellido</th>
                <td>Larry the Bird</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>test</td>
            </tr>
            <tr>
                <th>Nacido en</th>
                <td>Jacob</td>
            </tr>
            <tr>
                <th>D.N.I.</th>
                <td>Larry the Bird</td>
            </tr>
            <tr>
                <th>Curso</th>
                <td>Larry the Bird</td>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="container">
        <table class="table table-sm caption-top">
        <caption>Notas</caption>
            <tbody>
                <tr>
                    <th>Inglés</th>
                    <td>test</td>
                </tr>
                <tr>
                    <th>Tecnología</th>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <th>Naturaleza</th>
                    <td>Larry the Bird</td>
                </tr>
                <tr>
                    <th>Sociales/Geografía/Historia</th>
                    <td>test</td>
                </tr>
                <tr>
                    <th>Música</th>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <th>Educación Física</th>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <th>Matemáticas</th>
                    <td>Larry the Bird</td>
                </tr>
                <tr>
                    <th>Lenguaje</th>
                    <td>Larry the Bird</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>