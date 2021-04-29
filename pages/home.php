<?php

$metatitle = "Accueil Allo Ramonage";

$menu = require ($_SERVER['DOCUMENT_ROOT']."/src/menu.php");

if (isset($_SESSION['utilisateur'])){
    echo $_SESSION['utilisateur'];
} else {
    echo "pas set";
}