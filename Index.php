<?php include ('assets/includes/header.php'); 

$page = filter_input(INPUT_GET, 'page');

/*if(is_null($page) XOR !isset($_SESSION['accesslevel'])){
    header('Location: index.php?page=login');
} else {
    switch ($_SESSION['accesslevel']) {
    case 3:
        header('Location: index.php?page=director');
        break;
    case 2:
        header('Location: index.php?page=profesor');
        break;
    case 1:
        header('Location: index.php?page=alumno');
        break;
    }
}*/

if (is_null($page XOR !isset($_SESSION))) {
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