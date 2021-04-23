<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/config.php";
session_start();

if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);

    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from user where name='" . $uname . "' and pwd='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            header('Location: /espace_pro');
        } else {
            echo "Invalid username and password";
        }
    }
}

echo" test";