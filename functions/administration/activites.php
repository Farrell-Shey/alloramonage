<?php

function getActivites(){
    return $GLOBALS['conn']->query('SELECT * FROM service')->fetchAll();
}

?>
