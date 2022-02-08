<?php
session_start();
class Functions
{

    static public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static public function validateDate($date)
    {
        return preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $date);
    }

    static public function formatName($name)
    {
        return ucfirst(strtolower($name));
    }

    static function randomDate($start_date, $end_date)
    {
        $min = strtotime($start_date);
        $max = strtotime($end_date);
        $val = rand($min, $max);
        return date('d/m/Y', $val);
    }

    static function randomDni()
    {
        $val = rand('12345678', '50000000');
        return $val;
    }

    static public function createNewRandomUser($number)
    {
        $names = array(
            'Geraldo', 'Adelita', 'Nydia', 'Aaron', 'Serafina', 'Amada', 'Amilcar', 'Galo', 'Lorenza', 'Clemente', 'Águeda', 'Estefania', 'Tadeo', 'Zaira', 'Gabriel',
            'Valentina', 'Paquita', 'Telesforo', 'Delia', 'Abril', 'Iris', 'Angelino', 'Isidro', 'Agustina', 'Romualdo', 'Vasco', 'Zaida', 'David', 'Brigida', 'Renata', 'Dionisia',
            'Zacarias', 'Perlita', 'Iban', 'Dalila', 'Graciana', 'Florentino', 'Margarita', 'Amaya', 'Eladio', 'Bibiana', 'Laura', 'Walter', 'Geraldo', 'Alberto', 'Walter', 'Gloria',
            'Octavia', 'Anabel', 'Horacio', 'Ariel', 'Quirino', 'Macarena', 'Reyna', 'Heliodoro', 'Paloma', 'Felicia', 'Yenny', 'Claudia', 'Diego', 'Demetrio', 'Cruz', 'Xavier',
            'Lara', 'Narcisa', 'Perlita', 'Agustin', 'Jenaro', 'Laura', 'Macario', 'Margarita', 'Carlos', 'Tiburcio', 'Xavier', 'Amilcar', 'Adan', 'Ovidio', 'Josefina', 'Che',
            'Sandra', 'Felipe', 'Francisca', 'Andrea', 'Nacho', 'Xiomara', 'Orlando', 'Jeronimo', 'Vera', 'Jenaro', 'Caridad', 'Carmen', 'Adolfo', 'Marcelina', 'Graciana', 'Eric',
            'Vasco', 'Rene', 'Esther', 'Lisandro', 'Malena'
        );
        $surname = array(
            'Ochoa', 'Espino', 'Alamilla', 'Asturias', 'Figueroa', 'Guerra', 'Bosque', 'Antunez', 'Aquino', 'Vicente', 'Ortega', 'Fierro', 'Estevez', 'Olguin',
            'Garrido', 'Magro', 'Bautista', 'Franco', 'Machado', 'Carrasco', 'Cardozo', 'Huerta', 'Marquez', 'Busto', 'Rendon', 'Guzman', 'Borja', 'Álvarez', 'Araujo', 'Villanueva',
            'Dominguez', 'Contreras', 'Bermudez', 'Quixada', 'Franco', 'Villa', 'Trujillo', 'Ybarra', 'Espino', 'Franco', 'Terrazas', 'Rio', 'Vicario', 'Colon', 'Cardozo', 'Vicario',
            'Arreola', 'Viteri', 'Rivera', 'Rodriguez', 'Valiente', 'Antonio', 'Aritza', 'Chaves', 'Arriola', 'Medina', 'Maldonado', 'Travieso', 'Banderas', 'Bustillo', 'Rio',
            'Bermudez', 'Sanchez', 'Rey', 'Amador', 'Figueroa', 'Cano', 'Redondo', 'Andres', 'Martin', 'Leon', 'Nuñez', 'Pavia', 'Puerta', 'Viteri', 'Calvo', 'Olmos', 'Travieso',
            'Belmonte', 'Colon', 'Bautista', 'Leon', 'Bosque', 'Belmonte', 'Rios', 'Araya', 'Lorenzo', 'Medina', 'Rosales', 'Sanchez', 'Alvarado', 'Simon', 'Alonso', 'Soto', 'Valencia',
            'Machado', 'Navarro', 'Sanz', 'Cuesta', 'Vicario'
        );
        $surname2 = array(
            'Morales', 'Cicone', 'Fontana', 'Gurse', 'Mcmeeking', 'Kademan', 'Macleod', 'Callahan', 'Gogan', 'Chiang', 'Keynes', 'Jander', 'Newell', 'Mcintire',
            'Torok', 'Ferrandino', 'Nisbet', 'Kertis', 'Brenig', 'Sviokla', 'Thielst', 'Sharples', 'Liman', 'Bayers', 'Chandra', 'Binford', 'Belliveau', 'Shieber', 'Ozols',
            'Harriman', 'Degeorge', 'Humenek', 'Day', 'Brick', 'Gomez', 'Southmayd', 'Silverman', 'Flegal', 'Sutradhar', 'Wilbur', 'Gautier', 'Opper', 'Kosinski', 'Rasekh',
            'Charters', 'Poehler', 'Golya', 'Students', 'Burkett', 'Slonina', 'Baldisserotto', 'Loster', 'Avila', 'Flachsenhar', 'Carmel', 'Reinerman', 'Campo', 'Wyler',
            'Luyendyk', 'Seymour', 'Buzard', 'Ali', 'Venturini', 'Hupp', 'Capewell', 'Rainey', 'Singh', 'Eisen', 'Homer', 'Row', 'Kuze', 'Nisenson', 'Hudner', 'Sheehan',
            'Magnuson', 'Kriegel', 'Pharr', 'Mackay', 'Nyhan', 'Hopkins', 'Beaton', 'Kearney', 'Middleton', 'Berkey', 'Mckinley', 'Valverde', 'Ware', 'Kissinger', 'Lafrance',
            'Carrier', 'Uzuner', 'Vladinov', 'Fagan', 'Scholl', 'Kitchin', 'Schreiner', 'Bottiroli', 'Fumerton', 'Pestana', 'Reinhold'
        );
        $email = array();
        $dob = array();
        $dni = array();
        $created = time();
        $haspass = password_hash("12", PASSWORD_ARGON2ID);

        for ($i = 0; $i < $number; $i++) {
            $arrayName = array_rand($names);
            $arraySurname = array_rand($surname);
            $arraySurname2 = array_rand($surname2);
            array_push($email, $names[$arrayName] . $surname[$arraySurname] . '@gmail.com');
            array_push($dob, Functions::randomDate('01/01/1990', '01/01/2000'));
            array_push($dni, Functions::randomDni());
            return Database::addUser($names[$arrayName],$surname[$arraySurname],$surname2[$arraySurname2],$email[$i],$dob[$i],$dni[$i],$haspass,$created,'3');
        }
    }
}
?>