<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_activite'])){
    $id = $_POST['id_activite'];
    $sqldelete = 'DELETE FROM `service` WHERE `service`.`id` = '.$id.'';
    $checkResult = $conn->query($sqldelete);
}