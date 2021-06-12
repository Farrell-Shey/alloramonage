<?php

/* LOADING OBJECT */
require '../functions/AltoRouter.php';

/* REQUIRE MODELS AND CONFIG */
require '../functions/config.php';

/* STARTING USER SESSION AND REFRESH USER CONNECTION*/
session_start();

/* ROOTING MAP */

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

// route vers les pages HTML du site - target = 'pages/....'
// renvoie vers les fichiers qui se trouvent dans 'pages/'
$router->map('GET', '/', 'pages/home' );
$router->map('GET', '/conseils', 'pages/conseils' );
$router->map('GET', '/annuaire/departement-[i:departement]/[*:service]', 'pages/annuaire');
$router->map('GET', '/annuaire/departement-[i:departement]', 'pages/annuaire');
$router->map('GET', '/annuaire', 'pages/annuaire' );
$router->map('GET', '/prestations', 'pages/prestations' );

//route vers l'api rest du site - target = 'functions/....'
// renvoie vers les fichiers qui se trouvent dans 'functions/'
$router->map('POST', '/login', 'functions/login');
$router->map('POST', '/logout', 'functions/logout');
$router->map('POST', '/inscription', 'functions/inscription');
$router->map('POST', '/verification_email', 'functions/verification_email');

$router->map('GET', '/search', 'functions/search');
/* PARTIE ADMINISTRATION */
$router->map('GET', '/administration', '/pages/administration/revendeurs', 'administration_revendeurs');
$router->map('GET', '/administration/activites', '/pages/administration/activites', 'administration_activites');
$router->map('GET', '/administration/commentaires_a_valider', '/pages/administration/commentaires_a_valider', 'administration_commentaires_a_valider');
$router->map('GET', '/administration/commentaires_valides', '/pages/administration/commentaires_valides', 'administration_commentaires_valides');
$router->map('POST', '/getColumns', '/functions/administration/admin', 'getColumns');
$router->map('POST', '/ajout_activite', 'functions/administration/activites/ajout_activite', 'ajout_activite');
$router->map('POST', '/modification_activite', 'functions/administration/activites/modification_activite', 'modification_activite');
$router->map('POST', '/suppression_activite', 'functions/administration/activites/suppression_activite', 'suppression_activite');
$router->map('POST', '/revendeurs', 'functions/administration/revendeurs/revendeurs', 'revendeurs');

$match = $router->match();

// $match est une variable créée grâce au routing de AltoRouter
// regroupe toutes les information sur la route actuelle
$_SESSION['match'] = $match = $router->match();

// si $match n'est pas un tableau alors l'url ne correspond à aucune route existante donc direction la page 404
if (is_array($match)) {

    require "../" . $match['target'] . ".php";

} else {

    require  "../pages/404.php";

}
