<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activite'])  && isset($_POST['id_activite'])){
    $activite = $_POST['activite'];
    $id = $_POST['id_activite'];
    $sqlmodif = 'UPDATE `service` SET `name` = "'.$activite.'" WHERE `service`.`id` = '.$id.' ;';
    $checkResult = $conn->query($sqlmodif);
}