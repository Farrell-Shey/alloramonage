<?php

$metatitle = "Accueil Allo Ramonage";

if (isset($_SESSION['utilisateur'])){
    echo $_SESSION['utilisateur'];
} else {
    
}

require ("../elements/header.php");