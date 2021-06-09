<?php
include_once("assets/php/pdo.php");
class Usuario  {
    static private $notas = array('matematicas' => 0, 'ingles' => 0, 'lenguaje' => 0, 'sociales' => 0, 'ciencias' => 0);

    static public function registrar($nombre, $apellido, $correo, $dni, $fechaNacimiento, $password) {
        $hashpass = password_hash($password, PASSWORD_ARGON2ID);
        $anyo = DateTime::createFromFormat("d/m/Y", $fechaNacimiento);
        $anyo = $anyo->format('d/m/Y');
        $isRegistered = false;
        if(Funciones::validarEmail($correo) != true) {
            header('Location: registro.php?mensaje=error_formatoEmail');
            $isRegistered = true;
        } else if (!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $fechaNacimiento)) {
            header('Location: registro.php?mensaje=error_formatoFecha');
            $isRegistered = true;
        } else if ($anyo < date('d/m/Y')) {
            header('Location: registro.php?mensaje=error_fechaMayor');
            $isRegistered = true;
        } else {
            $user = Database::addQuery("SELECT correo FROM usuarios", null);
            foreach($user as $row) {
                if ($row['correo']==$correo) {
                    $isRegistered = true;
                    header('Location: registro.php?mensaje=error_enUso');
                    break;
                } 
            }
            if($isRegistered == false) {
                Database::addQuery("INSERT INTO `usuarios`(`nombre`, `apellido`, `dni`, `correo`, `fechanacimiento`, `password`)
                                    VALUES ('$nombre','$apellido','$dni','$correo','$fechaNacimiento','$hashpass')", null);
                Usuario::identificar($username, $hashpass);
                header('Location: principal.php');
            }
        }
    }

    static public function identificar($correo, $password) {
        if(Funciones::validarEmail($correo) == true)  {
            $user = Database::addQuery("SELECT * FROM `usuarios` WHERE correo=?", $correo);
            foreach($user as $row) {
                if($row['correo'] == $correo && password_verify($password, $row['password']) == true) {
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['nivel'] = $row['nivel'];
                    header('Location: principal.php');
                } else {
                    header('Location: index.php?mensaje=error_datosMal');
                }
            }
        } else {
            header('Location: index.php?mensaje=error_formatoEmail');
        }
    }
}
?>