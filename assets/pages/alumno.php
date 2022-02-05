<?php 
include('assets/includes/nav.php');
if ($_SESSION['user']['access'] != 3) {session_start();session_unset();session_destroy();session_write_close();setcookie(session_name(),'',0,'/');header('Location: index.php?page=login&message=errorPermissions');}
$profileData = Database::getUser($_SESSION['user']['email']);
$profileGrades = Database::getGrades($_SESSION['user']['id']);
?>
<h1 style="text-align: center; margin-top: 45px;">Detalles del alumno</h1><br />
<div class="container border border-dark border-2 rounded-2 cter">

        <table class="table table-sm caption-top">
        <caption>Datos personales</caption>
        <tbody>
            <tr>
                <td>Nombre</td>
                <td><?php echo $profileData['name'] ?></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><?php echo $profileData['surname'] .' '. $profileData['surname2'] ?></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><?php echo $profileData['email'] ?></td>
            </tr>
            <tr>
                <td>Nacido en</td>
                <td><?php echo $profileData['dob'] ?></td>
            </tr>
            <tr>
                <td>D.N.I.</td>
                <td><?php echo $profileData['dni'] ?></td>
            </tr>
            <tr>
                <td>Curso</td>
                <td><?php echo $profileData['course'] ?></td>
            </tr>
        </tbody>
    </table>
        <table class="table table-sm caption-top">
        <caption>Notas</caption>
            <tbody>
                <tr>
                    <td>Inglés</td>
                    <td><?php echo $profileGrades['english'] ?></td>
                </tr>
                <tr>
                    <td>Tecnología</td>
                    <td><?php echo $profileGrades['tech'] ?></td>
                </tr>
                <tr>
                    <td>Naturaleza</td>
                    <td><?php echo $profileGrades['nature'] ?></td>
                </tr>
                <tr>
                    <td>Sociales/Geografía/Historia</td>
                    <td><?php echo $profileGrades['sogehi'] ?></td>
                </tr>
                <tr>
                    <td>Música</td>
                    <td><?php echo $profileGrades['music'] ?></td>
                </tr>
                <tr>
                    <td>Educación Física</td>
                    <td><?php echo $profileGrades['physical'] ?></td>
                </tr>
                <tr>
                    <td>Matemáticas</td>
                    <td><?php echo $profileGrades['math'] ?></td>
                </tr>
                <tr>
                    <td>Lenguaje</td>
                    <td><?php echo $profileGrades['language'] ?></td>
                </tr>
            </tbody>
        </table>
</div>