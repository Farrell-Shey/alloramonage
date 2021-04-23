<?php

$metatitle = "Espace Pro Allo Ramonage";

$menu = require($_SERVER['DOCUMENT_ROOT'] . "/src/menu.php");
session_start();

require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";

if (isset($_SESSION['uname'])){
    echo $_SESSION['uname'];
} else {
    echo "pas set";
}

echo '<div class="container">
    <form method="post" action="/login"">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
    <form method="post" action="/logout">
            <input type="submit" value="Logout" name="but_logout">
    </form>
</div>';
?>