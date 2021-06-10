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
        $tableau .= '<th><button type="button" class="btn btn-primary modification" id="' . $revendeur['id'] . '" onclick="document.getElementById(\'registration\').classList.toggle(\'d-none\');">Modifier</button></th>';
        $tableau .= '</tr>';
    }
    echo $tableau;
}


// function getRevendeursPayants(){
//     return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE payant = 1 ORDER BY `id` ASC')->fetchAll();
// }

// function getRevendeursValides(){
//     return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = 1 ORDER BY `id` ASC')->fetchAll();
// }

// function getRevendeursAValider(){
//     return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = 0 ORDER BY `id` ASC')->fetchAll();
// }

// function getRevendeursEnAttente(){
//     return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = 2 ORDER BY `id` ASC')->fetchAll();
// }

// function getRevendeursSupprimes(){
//     return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = 9 ORDER BY `id` ASC')->fetchAll();
// }
