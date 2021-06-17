<?php

/* --- UTILISÉ SUR LA PAGE activites.php --- */

// Récupérer toutes les activités
function getActivites(){
    return $GLOBALS['conn']->query('SELECT * FROM service ORDER BY `id` ASC')->fetchAll();
}

/* --- AJOUT --- */
// Si seulement l'activité est donnée, faire une insertion
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activite'])){
    $GLOBALS['conn']->query('INSERT INTO `service` (`id`, `name`) VALUES (NULL, "'.$_POST['activite'].'")');
}

/* --- MODIFICATION --- */
// Si l'activité et l'id sont donnés, faire une modification
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activite'])  && isset($_POST['id_activite'])){
    $GLOBALS['conn']->query('UPDATE `service` SET `name` = "'.$_POST['activite'].'" WHERE `service`.`id` = '.$_POST['id_activite'].' ;');
}

/* --- SUPPRESSION --- */
// Si seulement l'id est donné, faire une suppression
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_activite'])){
    $GLOBALS['conn']->query('DELETE FROM `service` WHERE `service`.`id` = '.$_POST['id_activite'].'');
}
?>
