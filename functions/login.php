<?php

if (isset($_POST['login'])) {

    $email = $_POST['mail_login'];
    $password = $_POST['password_login'];

    if ($email != "" && $password != "") {
        $query = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user === false){
            $_SESSION['error'] = 'email';
        } else{
            $validPassword = verify_passwords($password, $user['password']);
            if($validPassword){
                $_SESSION['utilisateur'] = $email;
                header('Location: /');
            } else {
                $_SESSION['error'] = 'password';
            }
        }
    }
}

// Vérifie que le mot de passe entré est bien le même que le mot de passe stocké dans la bdd
function verify_passwords($given_password, $result_password) {
    if(hash("sha256", $given_password) == $result_password){
        return true;
    } else {
        return false;
    }
}