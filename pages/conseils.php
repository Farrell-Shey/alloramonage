<?php

$metatitle = "Conseils Allo Ramonage";

require ("../elements/header.php");


/* --- Sert de page de déconnexion pour le moment --- */
if (isset($_SESSION['utilisateur'])){
    echo $_SESSION['utilisateur'];
} else {
    echo "pas set";
}

if (isset($_SESSION['utilisateur'])) {
    echo '
        <form method="post" action="/logout">
            <input type="submit" value="Déconnexion" name="but_logout">
        </form>
    ';
}

?>