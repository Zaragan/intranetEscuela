<?php
include_once("assets/includes/cfg/pdo.php");
class User {
    static public function registro($nombre, $primerApellido, $segundoApellido, $correo, $nacimiento, $dni, $password, $password2) {
        if($password != $password2) {header('Location: index.php?page=register&message=errorPasswordMatch');}
        $hasspass = password_hash($password, PASSWORD_ARGON2ID);
        $dni = strtoupper($dni);
        $anyo = DateTime::createFromFormat("d/m/Y", $fechaNacimiento);
        $anyo = $anyo->format('d/m/Y');
        $registrado = false;
        if(Funciones::validarEmail($correo) != true) {
            header('Location: index.php=?page=register&message=errorEmailFormat');
            $registrado = true;
        } else if(!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $fechaNacimiento)) {
            header('Location: registro.php?page=register&mensaje=errorDateFormat');
            $isRegistered = true;
        } else if ($anyo < date('d/m/Y')) {
            header('Location: registro.php?page=register&mensaje=errorBirthDate');
            $isRegistered = true;
        } else {
            $user = Database::addQuery("SELECT correo FROM usuarios", null);
            foreach($user as $row) {
                if($row['correo']==$correo) {
                    $isRegistered = true;
                    header('Location: registro.php?page=register&mensaje=errorUsed');
                    break;
                }
            }
            if($isRegistered == false) {
                //Añadir usuario.
            }
        }

    }




}

?>

