<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activite'])){
    $activite = $_POST['activite'];
    $sqlajout = 'INSERT INTO `service` (`id`, `name`) VALUES (NULL, "'.$activite.'")';
    $checkResult = $conn->query($sqlajout);
}