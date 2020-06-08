<?php include('registerUser.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>User registration system using PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <h2>Register</h2>
    </div>
    <form method="post" action="">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input_group">
            <button type="submit" class="btn" name="reg_user">Register</button><a href="Admin.php">Sign In</a>
        </div>
    </form>
</body>
</html>