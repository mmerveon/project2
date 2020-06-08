<?php
require_once "database.php";
session_start();

//initializing variables
$Naam = "";
$Telefoon = "";
$Email = "";
$Datumb = "";
$Datumf = "";
$Aantal = "";
$Fotografie = "";
$Catering ="";
$Decoratie = "";
$Muziek = "";
$errors = [];

// connect to the database
try {
    $db = mysqli_connect('localhost', 'root', '', 'registration');
}
catch(Exception $e){
    print_r($e);
}

// if the Zend Formulier button is clicked
if (isset($_POST['submit'])) {

    //receive all input values from the form
    $Naam = mysqli_real_escape_string($db, $_POST['Naam']);
    $Telefoon = mysqli_real_escape_string($db, $_POST['Telefoon_Nummer']);
    $Email = mysqli_real_escape_string($db, $_POST['E-mail']);
    $Datumb = mysqli_real_escape_string($db, $_POST['Datum_Bezichtiging']);
    $Datumf = mysqli_real_escape_string($db, $_POST['Datum_Feest']);
    $Aantal = mysqli_real_escape_string($db, $_POST['Aantal_Personen']);
    $Fotografie = mysqli_real_escape_string($db, $_POST['Fotografie']);
    $Catering = mysqli_real_escape_string($db, $_POST['Catering']);
    $Decoratie = mysqli_real_escape_string($db, $_POST['Decoratie']);
    $Muziek = mysqli_real_escape_string($db, $_POST['Muziek']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($Naam)) {
        array_push($errors, "Naam is required"); //add error to errors array
    }
    if (empty($Telefoon)) {
        array_push($errors, "Telefoon Nummer is required"); //add error to errors array
    }
    if (empty($Email)) {
        array_push($errors, "E-mail is required"); //add error to errors array
    }
    if (empty($Datumb)) {
        array_push($errors, "Datum Bezichtiging is required"); //add error to errors array
    }
    if (empty($Datumf)) {
        array_push($errors, "Datum Feestdag is required"); //add error to errors array
    }
    if (empty($Aantal)) {
        array_push($errors, "Aantal Personen is required"); //add error to errors array
    }
    if (empty($Fotografie)) {
        array_push($errors, "Fotografie is required"); //add error to errors array
    }
    if (empty($Catering)) {
        array_push($errors, "Catering is required"); //add error to errors array
    }
    if (empty($Decoratie)) {
        array_push($errors, "Decoratie is required"); //add error to errors array
    }
    if (empty($Muziek)) {
        array_push($errors, "Muziek is required"); //add error to errors array
    }


    if (count($errors) == 0) {
        $query = "INSERT INTO gebruikers (Naam, `Telefoon Nummer`, `E-mail`, `Datum Bezichtiging`, `Datum Feest`, `Aantal Personen`, Fotografie, Catering, Decoratie, Muziek) 
                    VALUES ('$Naam', '$Telefoon', '$Email', '$Datumb', '$Datumf', '$Aantal', '$Fotografie', '$Catering', '$Decoratie', '$Muziek')";
        mysqli_query($db, $query)
            or die('Error: '.mysqli_error($db). ' query: '.$query);
        header('location: Contact.php');
    }
}
?>
