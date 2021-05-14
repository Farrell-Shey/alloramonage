<?php

/* LOADING OBJECT */
require '../functions/AltoRouter.php';

/* REQUIRE MODELS AND CONFIG */
require "../functions/config.php";

/* STARTING USER SESSION AND REFRESH USER CONNECTION*/
session_start();

/* ROOTING MAP */

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', '/pages/home');
$router->map('GET', '/conseils', '/pages/conseils', 'conseils');
$router->map('GET', '/annuaire', '/pages/annuaire', 'annuaire');
$router->map('GET', '/prestations', '/pages/prestations', 'prestations');
$router->map('POST', '/login', '/functions/login', 'login');
$router->map('POST', '/logout', '/functions/logout', 'logout');
$router->map('POST', '/inscription', '/functions/inscription', 'inscription');
$router->map('POST', '/verification_email', '/functions/verification_email', 'verification_email');
$match = $router->match();

//$match ['param'] -> request _GET or _POST
if (is_array($match)) {
    $params = $match['params'];
    require "../{$match['target']}.php";
} else {
    require  "../pages/404.php";
}
