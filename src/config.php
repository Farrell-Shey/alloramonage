<?php

define('DB_SERVER', 'mysql:host=mysql-killianbchr.alwaysdata.net;dbname=killianbchr_alloramonage');
define('DB_USERNAME', '214692_killian');
define('DB_PASSWORD', "wfdH84;'(");

$conn = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}