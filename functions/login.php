<?php

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        $query = $conn->prepare("SELECT count(*) as nbUser FROM user WHERE email = :email AND password = :password");
        $query->execute([
            'email' => $email,
            'password' => $password
        ]);
        if($query->rowCount() > 0) {
            $_SESSION['utilisateur'] = $email;
            header('Location: /espace_pro');
        } else {
            echo "Invalid username and password";
        }
    }
}
