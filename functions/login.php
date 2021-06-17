<?php

// si la personne arrive sur ce fichier avec le portail de connexion
if (isset($_POST['login'])) {

    // on réatribut les variables qu'on va utiliser
    $email = $_POST['mail_login'];
    $password = $_POST['password_login'];

    // si les les variables ne sont pas vide
    if ($email != "" && $password != "") {
        $query = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // si l'utilisateur est faux alors c'est que le mail rentré n'est pas en base de donnée
        if ($user === false) {
            $_SESSION['connect']['error'] = 'email';
            $_SESSION['connect']['email'] = $email;
        }

        // Si le mail est bon, on va donc vérifier le mot de passe
        else {
            $validPassword = verify_passwords($password, $user['password']);

            // si c'est bon on connect l'utilisateur
            if ($validPassword) {
                $_SESSION['utilisateur'] = $email;
            }

            // sinon c'est que le mot de passe n'est pas bon
            else {
                $_SESSION['connect']['error'] = 'password';
                $_SESSION['connect']['email'] = $email;
            }
        }
    }
}

header('Location: '. $_SESSION['REDIRECT_URI']);

function verify_passwords($given_password, $result_password)
{
    if (hash("sha256", $given_password) == $result_password) {
        return true;
    } else {
        return false;
    }
}