<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Je moet eerst inloggen";
    header('location: Admin.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: Admin.php");
}

//Require DB settings with connection variable
require_once "database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM gebruikers";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$afspraken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $afspraken[] = $row;
}

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Afspraken</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="content">
        <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <!-- logged in user information -->
    </div>
    <table class="ttt">
        <thead>
        <tr>
            <th colspan="2"></th>
            <th colspan="2">Naam</th>
            <th colspan="2">Telefoon Nummer</th>
            <th colspan="2">E-mail</th>
            <th colspan="2">Datum Bezichtiging</th>
            <th colspan="2">Datum Feest</th>
            <th colspan="2">Aantal personen</th>
            <th colspan="2">Fotografie</th>
            <th colspan="2">Catering</th>
            <th colspan="2">Decoratie</th>
            <th colspan="2">Muziek</th>
            <th colspan="2"></th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($afspraken as $afspraak) { ?>
            <tr>
                <td colspan="2"><?= $afspraak['id'] ?></td>
                <td colspan="2"><?= $afspraak['Naam'] ?></td>
                <td colspan="2"><?= $afspraak['Telefoon Nummer'] ?></td>
                <td colspan="2"><?= $afspraak['E-mail'] ?></td>
                <td colspan="2"><?= $afspraak['Datum Bezichtiging'] ?></td>
                <td colspan="2"><?= $afspraak['Datum Feest'] ?></td>
                <td colspan="2"><?= $afspraak['Aantal Personen'] ?></td>
                <td colspan="2"><?= $afspraak['Fotografie'] ?></td>
                <td colspan="2"><?= $afspraak['Catering'] ?></td>
                <td colspan="2"><?= $afspraak['Decoratie'] ?></td>
                <td colspan="2"><?= $afspraak['Muziek'] ?></td>
                <td colspan="2"><a href="edit.php?id=<?= $afspraak['id'] ?>">Edit</a></td>
                <td colspan="2"><a href="delete.php?id=<?= $afspraak['id'] ?>">Delete</a></td>
                <?php } ?>
            </tr>
            <tr>
                <td colspan="26" class="mer">
                    <?php if (isset($_SESSION['username'])) : ?>
                    <div<p> <a href="overzicht.php?logout='1'" style="color": red;">logout</a></p></div>
                        <div class="faker">
                            <p><a href="faker.php?faker='2'" style="color": red;">Create Fake Records</a></p>
                        </div>
                    <?php endif ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
