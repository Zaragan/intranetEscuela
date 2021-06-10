<?php 
if(!isset($_SESSION['level'])) {
    header('Location: index.php?mensaje=error_identificar');
} else if ($_SESSION['level'] == 0) {
    include ('assets/pages/Alumno.php');
} else if ($_SESSION['level'] == 1) {
    include ('assets/pages/Profesor.php');
} else if ($_SESSION['level'] == 2) {
    include ('assets/pages/Director.php');
}
include ('assets/includes/Footer.php');  ?>