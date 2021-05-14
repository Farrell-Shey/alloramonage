<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $sqlcheck = "SELECT email FROM user WHERE email = '$email' ";
    $checkResult = $conn->query($sqlcheck);
    if($checkResult->num_rows > 0) {
        echo "Cet email est déjà associée à un compte. Veuillez vous connectez avec ou en utiliser une autre.";
    }
}