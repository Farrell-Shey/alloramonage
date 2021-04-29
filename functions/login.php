<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";

if (isset($_POST['but_submit'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if ($email != "" && $password != "") {
        $sql_query = "select count(*) as nbUser from user where email='" . $email . "' and mdp='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['nbUser'];
        if ($count > 0) {
            $_SESSION['utilisateur'] = $email;
            header('Location: /espace_pro');
        } else {
            echo "Invalid username and password";
        }
    }
}