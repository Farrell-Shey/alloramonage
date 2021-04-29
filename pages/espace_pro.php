<?php

$metatitle = "Espace Pro Allo Ramonage";

$menu = require($_SERVER['DOCUMENT_ROOT'] . "/src/menu.php");

require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";

if (isset($_SESSION['utilisateur'])){
    echo '
    <form method="post" action="/logout">
            <input type="submit" value="Déconnexion" name="but_logout">
    </form>
    ';
} else {
    echo '
    <div class="container">
    <form method="post" action="/login"">
        <div id="div_login">
            <div>
                <input type="text" class="textbox" id="email" name="email" placeholder="E-mail" />
            </div>
            <div>
                <input type="password" class="textbox" id="password" name="password" placeholder="Mot de passe"/>
            </div>
            <div>
                <input type="submit" value="Se connecter" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
    </div>
    ';
}
?>