<?php

function getRevendeurs(){
    return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user ORDER BY `id` ASC')->fetchAll();
}

?>
