<?php

define('DB_SERVER', 'mysql-lepalaisdesgateaux.alwaysdata.net');
define('DB_USERNAME', '359669'); 
define('DB_PASSWORD', 'Franconville95'); 
define('DB_NAME', 'lepalaisdesgateaux_1');

/* Tentative de connexion à la base de données MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME,DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
