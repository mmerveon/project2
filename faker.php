<?php
require_once "database.php";
require_once "vendor/autoload.php";

$faker = Faker\Factory::create();

for ($i=0; $i<4; $i++ ){ // Execute 9 times
    $query="INSERT INTO gebruikers (Naam, `Telefoon Nummer`, `E-mail`, `Datum Bezichtiging`, `Datum Feest`, `Aantal Personen`, Fotografie, Catering, Decoratie, Muziek) 
            VALUES ('".$faker -> name."',
                    '".$faker -> phoneNumber."',
                    '".$faker -> safeEmail."',
                    '".$faker -> date('d-m-Y')."',
                    '".$faker -> date('d-m-Y')."',
                    '".$faker -> randomDigit."',
                    '".$faker -> word."',
                    '".$faker -> word."',
                    '".$faker -> word."',
                    '".$faker -> word."') ";
    mysqli_query($db, $query);
};

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Fake data toegevoegd aan de database</p>
    <a href="overzicht.php" style="color: red;">Terug</a>
</body>
</html>