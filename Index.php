<?php include ('assets/includes/header.php'); 
$log_error = "";
if(isset($_GET['message'])&&($_GET['message']=='errorEmailFormat')){$log_error = "<br><br>El formato del email es erroneo.";}
if(isset($_GET['message'])&&($_GET['message']=='errorDateFormat')){$log_error = "<br><br>El formato de fecha es erroneo.";}
if(isset($_GET['message'])&&($_GET['message']=='error_enUso')){$log_error = "<br><br>Su usuario ya está en uso.";}
if(isset($_GET['message'])&&($_GET['message']=='error_datosMal')){$log_error = "<br><br>Su usuario o contraseña son incorrectos";}
if(isset($_GET['message'])&&($_GET['message']=='error_identificar')){$log_error = "<br><br>Debes identificate antes de acceder a esta página.";}


$page = filter_input(INPUT_GET, 'page');

if (is_null($page)) {
    header('Location: index.php?page=login');
}

$page = strtr(
    $page,
    [
        'login' => 'login',
        'alumno' => 'Alumno',
        'profesor' => 'Profesor',
        'director' => 'Director',
    ]
);

$file_name = 'assets/includes/pages/' . $page . '.php';

if (isset($page)) {
    // logout
    if ($page == 'logout') {
        header('Location: assets/pages/logout.php');
    }

    // other pages
    if (file_exists($file_name)) {
        include $file_name;
    }
}
include ('assets/includes/footer.php'); ?>