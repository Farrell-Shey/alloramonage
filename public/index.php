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

/* PAGES PUBLIQUES */
$router->map('GET', '/', '/pages/home');
$router->map('GET', '/conseils', '/pages/conseils', 'conseils');
$router->map('GET', '/annuaire', '/pages/annuaire', 'annuaire');
$router->map('GET', '/prestations', '/pages/prestations', 'prestations');

/* FONCTIONS */
$router->map('POST', '/login', '/functions/login', 'login');
$router->map('POST', '/logout', '/functions/logout', 'logout');
$router->map('POST', '/inscription', '/functions/inscription', 'inscription');
$router->map('POST', '/verification_email', '/functions/verification_email', 'verification_email');

/* PARTIE ADMINISTRATION */
$router->map('GET', '/administration', '/pages/admin', 'administration');
$router->map('GET', '/administration/revendeurs', '/pages/administration/revendeurs', 'administration_revendeurs');
$router->map('GET', '/administration/activites', '/pages/administration/activites', 'administration_activites');
$router->map('GET', '/administration/commentaires_a_valider', '/pages/administration/commentaires_a_valider', 'administration_commentaires_a_valider');
$router->map('GET', '/administration/commentaires_valides', '/pages/administration/commentaires_valides', 'administration_commentaires_valides');
$router->map('POST', '/getColumns', '/functions/admin', 'getColumns');

$match = $router->match();

$_SESSION['match'] = $match = $router->match();


//$match ['param'] -> request _GET or _POST
if (is_array($match)) {
    $params = $match['params'];
    require "../".$match['target'].".php";
} else {
    require  "../pages/404.php";
}
