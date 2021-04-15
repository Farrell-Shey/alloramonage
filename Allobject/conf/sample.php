<?php
 
// Database
define ( 'DB_HOST', '' );
define ( 'DB_USER', '' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_DB', '' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
mysqli_set_charset($conn,'utf8');
 
?>