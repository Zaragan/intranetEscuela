<?php
include_once("assets/includes/cfg/pdo.php");
class User {
    static public function registro($nombre, $primerApellido, $segundoApellido, $correo, $dni, $nacimiento, $password, $password2) {
        if($password != $password2) {header('Location: index.php?page=register&message=errorPasswordMatch');}
        $hasspass = password_hash($password, PASSWORD_ARGON2ID);
        $dni = strtoupper($dni);
        $registrado = false;
        $creado = time();
        $nacimientoUnix = strtotime($nacimiento);
        if(Funciones::validarEmail($correo) != true) {
            header('Location: index.php=?page=register&message=errorEmailFormat');
            $registrado = true;
        } else if (!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $nacimiento)) {
            header('Location: index.php?page=register&message=errorDateFormat');
            $registrado = true;
        } else if ($nacimientoUnix > $creado) {
            header('Location: index.php?page=register&message=errorBirthDate');
            $registrado = true;
        } else {
            $user = Database::addQuery("SELECT correo FROM usuarios", null);
            foreach($user[0] as $row) {
                if($row['correo']==$correo) {
                    $registrado = true;
                    header('Location: index.php?page=register&message=errorUsed');
                    break;
                }
            }
            if($registrado == false) {
                $test = Database::addquery("INSERT INTO `usuarios`(`nombre`,`primerapellido`,`segundoapellido`,`correo`,`nacimiento`,`dni`,`clave`,`creado`)
                                    VALUES ('$nombre','$primerApellido','$segundoApellido','$correo','$nacimiento','$dni','$hasspass','$creado')", null);
                Database::addQuery("INSERT INTO `materias`(`userid`,`ingles`,`tecnologia`,`naturales`,`sogehi`,`musica`,`efisica`,`matematicas`,`lenguaje`)
                                    VALUES ('$test[1]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)", null);
                header('Location: index.php?page=login&message=registrado');
            }
        }
    }

    static public function identificar($correo, $password) {
        if(Funciones::validarEmail($correo) == true) {
            $usuario = Database::addQuery("SELECT * from `usuarios` WHERE correo=?", $correo);
            if (password_verify($password, $usuario[0][0]['clave']) == true) {
                $_SESSION['usuario'] = $usuario[0][0];
                print_r($_SESSION[0]['correo']);
            }
            /*foreach ($usuario as $row) {
                    $_SESSION['usuario'] = array($usuario);
                    print_r($_SESSION['usuario']);
                    /*$_SESSION['id'] = $row['id'];
                    $_SESSION['accesslevel'] = $row['accesslevel'];
                    $_SESSION['nombre'] = ucfirst($row['nombre']);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['id'] = $row['id'];
                }
            }*/
        }
    }
}

?>

