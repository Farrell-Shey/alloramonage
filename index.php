<?php

require $_SERVER['DOCUMENT_ROOT'].'/functions/AltoRouter.php';
require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";

session_start();

$router = new AltoRouter();

$router->map('GET', '/', '/pages/home');
$router->map('GET', '/conseils', '/pages/conseils', 'conseils');
$router->map('GET', '/annuaire', '/pages/annuaire', 'annuaire');
$router->map('GET', '/prestations', '/pages/prestations', 'prestations');
$router->map('GET', '/espace_pro', '/pages/espace_pro', 'espace_pro');
$router->map('POST', '/login', '/functions/login', 'login');
$router->map('POST', '/logout', '/functions/logout', 'logout');
$router->map('POST', '/inscription', '/functions/inscription', 'inscription');
$match = $router->match();

if (is_array($match)) {
    $params = $match['params'];
    require $_SERVER['DOCUMENT_ROOT']."{$match['target']}.php";
} else {
    require  $_SERVER['DOCUMENT_ROOT']."/pages/404.php";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>
            <?php
                echo $metatitle;        
            ?>
        </title>
		<meta name="title" content="<?php echo $metatitle; ?>" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="/src/app.sass">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="/src/scripts/espace_pro.js"></script>
    </head>
</html>