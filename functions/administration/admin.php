<?php

function getTables(){
    return $GLOBALS['conn']->query('SHOW TABLES');
}

function getColumns($table){
    return $GLOBALS['conn']->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "'.$table.'" ORDER BY ORDINAL_POSITION');
}

if (isset($_POST['callGetColumns'])) {
    $columns = getColumns($_POST['callGetColumns']);
    $result = '<select>';
    foreach($columns as $column){
        $result .= '<option value="'.$column[0].'">'.$column[0].'</option>';
    }
    $result .= '</select>';
    echo $result;
}