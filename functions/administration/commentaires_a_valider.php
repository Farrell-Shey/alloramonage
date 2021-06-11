<?php

function getCommentairesAValider(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = false')->fetchAll();
}

?>
