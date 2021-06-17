<?php

// Vérifie qu'un email n'est pas déjà existant dans la bdd et permet d'éviter les doublons
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {
    $email = $_POST['email'];
    $sqlcheck = "SELECT email FROM user WHERE email = '$email' ";
    $checkResult = $conn->query($sqlcheck);
    if($checkResult->rowCount() > 0) {
        echo "Cet email est déjà associée à un compte. Veuillez vous connectez avec ou en utiliser une autre.";
    }
}