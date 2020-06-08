<?php
include ('database.php');

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM gebruikers WHERE id = " . mysqli_escape_string($db, $_GET['id']);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query );
    $afspraak = mysqli_fetch_assoc($result);

    // DELETE DATA
    // Remove the data from the database
    $id= mysqli_escape_string ($db, $_GET["id"]);
    $query = "DELETE FROM gebruikers WHERE id = $id" ;

    mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

    //Close connection
    mysqli_close($db);

    //Redirect to homepage after deletion & exit script
    header("Location: overzicht.php");
    exit;
}

else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $afspraak = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM gebruikers WHERE id = " . mysqli_escape_string($db, $afspraak);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query );

    if(mysqli_num_rows($result) == 1)
    {
        $afspraak = mysqli_fetch_assoc($result);
    }
    else {
        // redirect when db returns no result
        header('Location: overzicht.php');
        exit;
    }
}

else {
    // redirect to db_connection.php
    header('Location: overzicht.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete </title>
</head>
<body>
<h2>Delete</h2>
<form action="" method="post">
    <p>
        Weet u zeker dat u deze afspraak wilt verwijderen?
    </p>
    <input type="hidden" name="id"/>
    <input type="submit" name="submit" value="Verwijderen"/>
    <a href="overzicht.php" style="color: red;">Terug</a>
</form>
</body>
</html>


