<?php

/* LOADING OBJECT */
require '../vendor/autoload.php';

/* STARTING USER SESSION AND REFRESH USER CONNECTION*/
session_start();


/* ROOTING MAP */

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');
$router->map('GET', '/user/[i:id]', 'user', 'user');
$router->map('GET', '/user/update/[i:id]', 'userUpdate', 'userUpdate');
$router->map('GET', '/collection/[i:id]', 'collection', 'collection');
$router->map('GET', '/managemypools', 'managemypools', 'managemypools');
$router->map('GET', '/create', 'create', 'create');
$router->map('POST', '/create', 'created', 'created');
$router->map('GET', '/connexion', 'connexion', 'connexion');
$router->map('GET', '/edit/[i:id]', 'edit', 'edit');
$router->map('POST', '/edit/[i:id]', 'edited', 'edited');
$router->map('GET', '/search', 'search', 'search');
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

