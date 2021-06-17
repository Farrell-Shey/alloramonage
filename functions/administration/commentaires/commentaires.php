<?php

/* --- UTILISÉ SUR LES PAGES commentaires_a_valider.php et commentaires_valides.php --- */

// Récupérer tout les commentaires en attente de validation - Page commentaires_a_valider.php
function getCommentairesAValider(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = false')->fetchAll();
}

// Récupérer tout les commentaires validés - Page commentaires_valides.php
function getCommentairesValides(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = true')->fetchAll();
}

// Si l'id est la méthode sont donnés en paramètres, effectuer la requête selon la méthode
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['methode'])){
    // Valider un commentaire - utilisé uniquement sur commentaires_a_valider.php
    if($_POST['methode'] == "valider") {
        $GLOBALS['conn']->query('UPDATE `commentaire` SET `valide` = 1 WHERE `commentaire`.`id` = '.$_POST['id']);
    // Supprimer un commentaire - utilisé sur les deux pages
    } else if ($_POST['methode'] == "supprimer") {
        $GLOBALS['conn']->query('DELETE FROM `commentaire` WHERE `commentaire`.`id` = '.$_POST['id']);
    }
}

?>
