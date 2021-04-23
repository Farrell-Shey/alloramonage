<?php

require $_SERVER['DOCUMENT_ROOT'].'/functions/AltoRouter.php';

$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/conseils', 'conseils', 'conseils');
$router->map('GET', '/annuaire', 'annuaire', 'annuaire');
$router->map('GET', '/prestations', 'prestations', 'prestations');
$router->map('GET', '/espace_pro', 'espace_pro', 'espace_pro');
$router->map('POST', '/login', 'login', 'login');
$router->map('POST', '/logout', 'logout', 'logout');
$match = $router->match();

if (is_array($match)) {
    $params = $match['params'];
    require $_SERVER['DOCUMENT_ROOT']."/pages/{$match['target']}.php";
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
    </head>
</html>