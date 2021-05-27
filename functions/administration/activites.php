<?php

function getActivites(){
    return $GLOBALS['conn']->query('SELECT * FROM service ORDER BY `id` ASC')->fetchAll();
}

?>
