<?php
require_once "database.php";

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $id         = mysqli_escape_string($db, $_POST['id']);
    $Naam       = mysqli_escape_string($db, $_POST['Naam']);
    $Telefoon   = mysqli_escape_string($db, $_POST['TelefoonNummer']);
    $Email      = mysqli_escape_string($db, $_POST['E-mail']);
    $Datumb     = mysqli_escape_string($db, $_POST['DatumBezichtiging']);
    $Datumf     = mysqli_escape_string($db, $_POST['DatumFeest']);
    $Aantal     = mysqli_escape_string($db, $_POST['AantalPersonen']);
    $Fotografie = mysqli_escape_string($db, $_POST['Fotografie']);
    $Catering   = mysqli_escape_string($db, $_POST['Catering']);
    $Decoratie  = mysqli_escape_string($db, $_POST['Decoratie']);
    $Muziek     = mysqli_escape_string($db, $_POST['Muziek']);

        //Update the record in the database
        $query = "UPDATE gebruikers
                  SET 
                  Naam = '$Naam',
                  `Telefoon Nummer` = '$Telefoon',
                  `E-mail` = '$Email',
                  `Datum Bezichtiging` = '$Datumb',
                  `Datum Feest` = '$Datumf',
                  `Aantal Personen` = '$Aantal',
                  Fotografie = '$Fotografie',
                  Catering = '$Fotografie',
                  Decoratie = '$Decoratie',
                  Muziek = '$Muziek'
                  WHERE id = '$id'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: overzicht.php');
            exit;
        } else {
            echo 'Something went wrong in your database query: ' . mysqli_error($db);
            exit;
        }

} else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $id = $_GET['id'];
} else {
    header('Location: overzicht.php');
    exit;
}

//Get the record from the database result
$query = "SELECT * FROM gebruikers WHERE id = " . mysqli_escape_string($db, $id);
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1)
{
    $afspraak = mysqli_fetch_assoc($result);
}
else {
    // redirect when db returns no result
    header('Location: overzicht.php');
    exit;
}

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="Naam">Naam</label>
        <input id="Naam" type="text" name="Naam" value="<?= $afspraak['Naam'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Telefoon Nummer">Telefoon Nummer</label>
        <input id="Telefoon Nummer" type="text" name="TelefoonNummer" value="<?= $afspraak['Telefoon Nummer'] ?>"/>
    </div>
    <div class="data-field">
        <label for="E-mail">E-mail</label>
        <input id="E-mail" type="text" name="E-mail" value="<?= $afspraak['E-mail'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Datum Bezichtiging">Datum Bezichtiging</label>
        <input id="Datum Bezichtiging" type="text" name="DatumBezichtiging" value="<?= $afspraak['Datum Bezichtiging'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Datum Feest">Datum Feest</label>
        <input id="Datum Feest" type="text" name="DatumFeest" value="<?= $afspraak['Datum Feest'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Aantal Personen">Aantal Personen</label>
        <input id="Aantal Personen" type="text" name="AantalPersonen" value="<?= $afspraak['Aantal Personen'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Fotografie">Fotografie</label>
        <input id="Fotografie" type="text" name="Fotografie" value="<?= $afspraak['Fotografie'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Catering">Catering</label>
        <input id="Catering" type="text" name="Catering" value="<?= $afspraak['Catering'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Decoratie">Decoratie</label>
        <input id="Decoratie" type="text" name="Decoratie" value="<?= $afspraak['Decoratie'] ?>"/>
    </div>
    <div class="data-field">
        <label for="Muziek">Muziek</label>
        <input id="Muziek" type="text" name="Muziek" value="<?= $afspraak['Muziek'] ?>"/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="overzicht.php">Go back to the list</a>
</div>
</body>
</html>
