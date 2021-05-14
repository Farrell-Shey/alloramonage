<?php

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: /conseils');
}