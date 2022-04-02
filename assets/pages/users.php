<?php
include_once("assets/cfg/pdo.php");
class Users {

    static public function test($rank, $id) {
        Database::addQuery("UPDATE users SET access='$rank' WHERE email='$id'", null);
        header('Location: index.php?page?logout');
    }

    static public function register($name, $surname, $surname2, $email, $dob, $dni, $password, $password2, $access) {
        if($password != $password2) {header('Location: index.php?page=register&message=errorPasswordMatch');}
        $hasspass = password_hash($password, PASSWORD_ARGON2ID);
        $dni = strtoupper($dni);
        $registered = false;
        $created = time();
        $dobUnix = strtotime($dob);
        $name = Functions::formatName($name);
        $surname = Functions::formatName($surname);
        $surname2 = Functions::formatName($surname2);
        $uuid = Functions::uuid();

        if(Functions::validateEmail($email) != true) {
            header('Location: index.php?page=register&message=errorEmailFormat');
            $registered = true;
        } else if (Functions::validateDate($dob) === 0) {
            header('Location: index.php?page=register&message=errorDateFormat');
            $registered = true;
        } else if ($dobUnix > $created) {
            header('Location: index.php?page=register&message=errorBirthDate');
            $registered = true;
        } else {
            $users = Database::getEmailUsers();
            foreach($users as $row) {
                if($row['email'] == $email) {
                    $registered = true;
                    header('Location: index.php?page=register&message=errorUsed');
                    break;
                }
            }
            if($registered == false) {
                Database::addUser("$uuid","$name","$surname","$surname2","$email","$dob","$dni","$hasspass","$created", "$access");
                header('Location: index.php?page=login&message=registered');
            }
        }
    }

    static public function logIn($email, $password) {
        if(Functions::validateEmail($email) == true) {
            $user = Database::getUserByEmail($email);
            if ($user['email'] == $email && password_verify($password, $user['password']) == true) {
                $_SESSION['user'] = $user;
                switch ($_SESSION['user']['access']) {
                    case 1:
                        header('Location: index.php?page=director');
                        break;
                    case 2:
                        header('Location: index.php?page=profesor');
                        break;
                    case 3:
                        header('Location: index.php?page=alumno');
                        break;
                }
            } else {
                header('Location: index.php?page=login&message=errorAutentication');
            }
        } else {
            header('Location: index.php?page=login&message=errorEmailFormat');
        }
    }
}
