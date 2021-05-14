<?php

$metatitle = "Conseils Allo Ramonage";

require ("../elements/header.php");

if (isset($_SESSION['utilisateur'])){
    echo "<br><br><br><br>".$_SESSION['utilisateur'];
} else {
    echo "<br><br><br><br>pas set";
}

if (isset($_SESSION['utilisateur'])) {
    echo '
        <form method="post" action="/logout">
            <input type="submit" value="Déconnexion" name="but_logout">
        </form>
    ';
}

?>