<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); 
//define('DB_PASSWORD', ''); 
define('DB_NAME', 'palaisdesgateaux');

/* Tentative de connexion à la base de données MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME,"", DB_NAME);

// Vérifier la connexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
