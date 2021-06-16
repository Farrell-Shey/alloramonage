<?php

function getRevendeurs(){
    return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user ORDER BY `id` ASC')->fetchAll();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['statut'])){
    if($_POST['statut'] == 10) {
        $revendeurs = $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE payant = 1 ORDER BY `id` ASC')->fetchAll();
    } else {
        $revendeurs = $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = '.$_POST['statut'].' ORDER BY `id` ASC')->fetchAll();
    }
    $tableau = null;
    foreach ($revendeurs as $revendeur) {
        $tableau .= '<tr>';
        $tableau .= '<th scope="row">' . $revendeur['id'] . '</th>';
        $tableau .= '<th>' . $revendeur['societe'] . '</th>';
        $tableau .= '<th>' . $revendeur['code_postal'] . '</th>';
        $tableau .= '<th><button type="button" class="btn btn-primary modification_revendeurs" id="' . $revendeur['id'] . '" onclick="document.getElementById(\'registration\').classList.toggle(\'d-none\');">Modifier</button></th>';
        $tableau .= '</tr>';
    }
    echo $tableau;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_revendeur'])) {
    $revendeur = $GLOBALS['conn']->query('SELECT * FROM user WHERE id = "'.$_POST['id_revendeur'].'"')->fetchAll();
    echo json_encode($revendeur);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modification'])) {
    /*$revendeur = $GLOBALS['conn']->query('SELECT * FROM user WHERE id = "'.$_POST['id_revendeur'].'"')->fetchAll();
    echo json_encode($revendeur);*/
    echo "lol";
}