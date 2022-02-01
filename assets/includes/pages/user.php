<?php
include_once("assets/includes/cfg/pdo.php");
class User {
    static public function registro($nombre, $primerApellido, $segundoApellido, $correo, $dni, $nacimiento, $password, $password2) {
        if($password != $password2) {header('Location: index.php?page=register&message=errorPasswordMatch');}
        $hasspass = password_hash($password, PASSWORD_ARGON2ID);
        $dni = strtoupper($dni);
        $anyo = DateTime::createFromFormat('d/m/Y', $nacimiento)->format('d/m/Y');
        $registrado = false;
        $creado = time();
        if(Funciones::validarEmail($correo) != true) {
            header('Location: index.php=?page=register&message=errorEmailFormat');
            $registrado = true;
        } else if(!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $nacimiento)) {
            header('Location: index.php?page=register&message=errorDateFormat');
            $registrado = true;
        } else if ($anyo > date('d/m/Y')) {
            header('Location: index.php?page=register&message=errorBirthDate');
            $registrado = true;
        } else {
            $user = Database::addQuery("SELECT correo FROM usuarios", null);
            foreach($user as $row) {
                if($row['correo']==$correo) {
                    $registrado = true;
                    header('Location: index.php?page=register&message=errorUsed');
                    break;
                }
            }
            if($registrado == false) {
                Database::addquery("INSERT INTO `usuarios`(`nombre`,`primerapellido`,`segundoapellido`,`correo`,`nacimiento`,`dni`,`clave`,`creado`)
                                    VALUES ('$nombre','$primerApellido','$segundoApellido','$correo','$anyo','$dni','$hasspass','$creado')", null);
                header('Location: index.php?page=login&message=registrado');
            }
        }

    }




}

?>

