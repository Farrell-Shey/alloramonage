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

// route vers les pages HTML du site - target = 'pages/'
// renvoie vers les fichiers qui se trouvent dans 'pages/'
$router->map('GET', '/', 'pages/', 'home');
$router->map('GET', '/conseils', 'pages/', 'conseils');
$router->map('GET', '/[*:departement]/[*:service]', 'pages/annuaire');
$router->map('GET', '/annuaire', 'pages/', 'annuaire');
$router->map('GET', '/prestations', 'pages/', 'prestations');

//route vers l'api rest du site - target = 'functions/'
// renvoie vers les fichiers qui se trouvent dans 'functions/'
$router->map('POST', '/login', 'functions/', 'login');
$router->map('POST', '/logout', 'functions/', 'logout');
$router->map('POST', '/inscription', 'functions/', 'inscription');
$router->map('POST', '/verification_email', 'functions/', 'verification_email');

$router->map('GET', '/search', 'functions/', 'search');
$match = $router->match();

// $match est une variable créée grâce au routing de AltoRouter
// regroupe toutes les information sur la route actuelle
$_SESSION['match'] = $match = $router->match();

// si $match n'est pas un tableau alors l'url ne correspond à aucune route existante donc direction la page 404
if (is_array($match)) {

    require "../" . $match['target'] . ( isset($match['name']) ? $match['name'] : null ) . ".php";

} else {

    require  "../pages/404.php";

}
