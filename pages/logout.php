<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";
session_start();

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: /espace_pro');
}