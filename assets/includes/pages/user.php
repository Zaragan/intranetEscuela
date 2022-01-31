<?php
include_once("assets/includes/cfg/pdo.php");
include_once("assets/includes/funciones.php");

class User {
    static public function registro($nombre, $email, $primerApellido, $segundoApellido, $nacimiento, $dni, $password) {
        $hasspass = password_hash($password, PASSWORD_ARGON2ID);
        $dni = strtoupper($dni);
        $anyo = DateTime::createFromFormat("d/m/Y", $fechaNacimiento);
        $anyo = $anyo->format('d/m/Y');
        $registrado = false;
        if(Funciones::validarEmail($correo) != true) {
            header('Location: index.php=?message=errorEmailFormat');
            $registrado = true;
        } else if(!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $fechaNacimiento)) {
            header('Location: registro.php?mensaje=errorDateFormat');
            $isRegistered = true;
        } else if ($anyo < date('d/m/Y')) {
            header('Location: registro.php?mensaje=error_fechaMayor');
            $isRegistered = true;
        } else {

        }

    }




}

?>

