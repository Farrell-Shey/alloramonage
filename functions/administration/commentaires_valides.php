<?php

function getCommentairesValides(){
    return $GLOBALS['conn']->query('SELECT * FROM `commentaire` WHERE `valide` = true')->fetchAll();
}

?>
