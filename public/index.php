<?php

/* LOADING OBJECT */
require '../vendor/autoload.php';

/* STARTING USER SESSION AND REFRESH USER CONNECTION*/
session_start();


/* ROOTING MAP */

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/conseils', 'conseils', 'conseils');
$router->map('GET', '/annuaire', 'annuaire', 'annuaire');
$router->map('GET', '/avis', 'avis', 'avis');
$router->map('GET', '/faq', 'faq', 'faq');
$match = $router->match();

/*
$match ['param'] -> request _GET or _POST
*/

if (is_array($match)) {
    // CONTROLLER
    $params = $match['params'];
    require "../Allobject/views/{$match['target']}.php";

} else {
    // PAGE 404
    require "../Allobject/views/404.php";
}
