<?php

function getCommentairesAValider(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = false')->fetchAll();
}

function getCommentairesValides(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = true')->fetchAll();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    if($_POST['methode'] == "valider") {
        $GLOBALS['conn']->query('UPDATE `commentaire` SET `valide` = 1 WHERE `commentaire`.`id` = '.$_POST['id']);
    } else if ($_POST['methode'] == "supprimer") {
        $GLOBALS['conn']->query('DELETE FROM `commentaire` WHERE `commentaire`.`id` = '.$_POST['id']);
    }
}

?>
