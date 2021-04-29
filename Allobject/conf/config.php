<?php
 
// Database
define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_DB', 'alloramonage' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
mysqli_set_charset($conn,'utf8');

?>