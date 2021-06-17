<?php

define('DB_SERVER', 'mysql:host=mysql-killianbchr.alwaysdata.net;dbname=killianbchr_alloramonage');
define('DB_USERNAME', '214692_killian');
define('DB_PASSWORD', "wfdH84;'(");

// define('DB_SERVER', 'mysql:host=127.0.0.1:3314;dbname=archramponer');
// define('DB_USERNAME', 'allrard825');
// define('DB_PASSWORD', "Ck9&Nx^y0i7u");

$conn = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}