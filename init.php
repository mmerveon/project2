<?php

require "vendor/autoload.php";

$connection = mysqli_connect('localhost', 'root', '', 'registration');

if (!$connection){
    die("Error in establishing connection.");
}

?>