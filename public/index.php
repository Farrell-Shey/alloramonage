<?php

/* LOADING OBJECT */
require '../vendor/autoload.php';

/* REQUIRE MODELS AND CONFIG */
$models = glob('../Allobject/models/*.php');
foreach ($models as $file) {
    require($file);   
}
require_once '../Allobject/conf/config.php';

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
$router->map('GET', '/connexion', 'connexion', 'connexion');
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

?>

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda at culpa, dolor est excepturi fugiat iste quae quo? Animi, dolore fuga in modi natus praesentium quisquam rem, reprehenderit saepe sint sunt tempore ut, veritatis? Ea impedit neque quaerat quo. Asperiores aut cupiditate eos, fuga impedit nemo quae recusandae sapiente.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda at culpa, dolor est excepturi fugiat iste quae quo? Animi, dolore fuga in modi natus praesentium quisquam rem, reprehenderit saepe sint sunt tempore ut, veritatis? Ea impedit neque quaerat quo. Asperiores aut cupiditate eos, fuga impedit nemo quae recusandae sapiente.
