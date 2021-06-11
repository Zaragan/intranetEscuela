<?php include ('assets/includes/Header.php'); include ('assets/includes/Navigation.php');

//  testeando el mapeado
$page = filter_input(INPUT_GET, 'page');

if (is_null($page)) {
    header('Location: index.php?mensaje=error_identificar');
}

$page = strtr(
    $page,
    [
        'alumno' => 'Alumno',
        'profesor' => 'Profesor',
        'director' => 'Director',
    ]
);

$file_name = 'assets/pages/' . $page . '.php';

if (isset($page)) {
    // logout
    if ($page == 'logout') {
        header('Location: assets/php/Desconectar.php');
    }

    // other pages
    if (file_exists($file_name)) {
        include $file_name;
    }
}

include ('assets/includes/Footer.php');  
?>