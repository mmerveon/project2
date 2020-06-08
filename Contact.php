<?php include('appointment.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User registration system using PHP and MySql</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="navigation-container">
    <ul id="nav">
        <div class="myWrapper">
            <nav>
                <a href="index.php"><img src="animal.png" height="50" width="50"/></a>
            </nav>
        </div>
        <li><a href="Zaal.php"> De Zaal</a></li>
        <li><a href="Mogelijkheden.php">Mogelijkheden</a></li>
        <li><a href="Contact.php">Contact</a></li>
        <li><a href="Admin.php">Admin</a></li>
    </ul>
</div>
<div class="header">
    <h2>Afspraak maken</h2>
</div>
<form method="post" action="">
    <?php include('errors.php'); ?>
    <div class="input-group1">
        <label>Naam</label>
        <input type="text" name="Naam" value="<?php echo $Naam; ?>">
        <span><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="input-group1">
        <label>Telefoon Nummer</label>
        <input type="text" name="Telefoon_Nummer">
    </div>
    <div class="input-group1">
        <label>E-mail</label>
        <input type="text" name="E-mail">
    </div>
    <div class="input-group1">
        <label>Datum Bezichtiging</label>
        <input type="datetime-local" name="Datum_Bezichtiging">
    </div>
    <div class="input-group1">
        <label>Datum Feest</label>
        <input type="datetime-local" name="Datum_Feest">
    </div>
    <div class="input-group1">
        <label>Aantal personen</label>
        <input type="text" name="Aantal_Personen">
    </div>
    <div class="input-group1">
        <label>Fotografie</label>
        <select name="Fotografie" id="Fotografie" >
            <option value="" selected=""
                    hidden="">Selecteer...</option>
            <option value="ja">Ja, van de zaal</option>
            <option value="nee">Nee, ik regel het zelf</option>
        </select>
    </div>
    <div class="input-group1">
        <label>Catering</label>
        <select name="Catering" id="Catering" >
            <option value="" selected=""
                    hidden="">Selecteer...</option>
            <option value="ja">Ja, van de zaal</option>
            <option value="nee">Nee, ik regel het zelf</option>
        </select>
    </div>
    <div class="input-group1">
        <label>Decoratie</label>
        <select name="Decoratie" id="Decoratie" >
            <option value="" selected=""
                    hidden="">Selecteer...</option>
            <option value="ja">Ja, van de zaal</option>
            <option value="nee">Nee, ik regel het zelf</option>
        </select>
    </div>
    <div class="input-group1">
        <label>Muziek</label>
        <select name="Muziek" id="Muziek" >
            <option value="" selected=""
                    hidden="">Selecteer...</option>
            <option value="ja">Ja, van de zaal</option>
            <option value="nee">Nee, ik regel het zelf</option>
        </select>
    </div>
    <div class="input_group1">
        <button type="submit" class="btn" name="submit">Zend Formulier</button>
    </div>
</form>
</body>
</html>
