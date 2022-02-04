<?php include ('assets/includes/header.php'); 

$page = filter_input(INPUT_GET, 'page');

if(is_null($page)) {
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

$file_name = 'assets/pages/' . $page . '.php';

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