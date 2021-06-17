<?php

/* --- UTILISÉ SUR LA PAGE revendeurs.php --- */

// Récupérer tout les revendeurs
function getRevendeurs(){
    return $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user ORDER BY `id` ASC')->fetchAll();
}

// Permet de filtrer les revendeurs selon le statut choisi
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['statut'])){
    // Le statut payant n'existe pas en tant que tel, j'utilise donc le nombre 10 qui n'est utilisé par aucun statut et qui permet de faire une requête différente
    if($_POST['statut'] == 10) {
        $revendeurs = $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE payant = 1 ORDER BY `id` ASC')->fetchAll();
    // Récupérer les revendeurs selon le statut donné en paramètre
    } else {
        $revendeurs = $GLOBALS['conn']->query('SELECT id, societe, code_postal FROM user WHERE statut = '.$_POST['statut'].' ORDER BY `id` ASC')->fetchAll();
    }
    $tableau = null;
    // Création du tableau contenant tout les revendeurs si un filtre a été sélectionné
    foreach ($revendeurs as $revendeur) {
        $tableau .= '<tr>';
        $tableau .= '<th scope="row">' . $revendeur['id'] . '</th>';
        $tableau .= '<th>' . $revendeur['societe'] . '</th>';
        $tableau .= '<th>' . $revendeur['code_postal'] . '</th>';
        $tableau .= '<th><button type="button" class="btn btn-primary modification_revendeurs" id="' . $revendeur['id'] . '" onclick="document.getElementById(\'registration\').classList.toggle(\'d-none\');">Modifier</button></th>';
        $tableau .= '</tr>';
    }
    // On echo le tableau qui sera récupéré par la variable « response » du fichier revendeurs.js
    echo $tableau;
}

// Si un id est donné en paramètre, on récupère uniquement les informations du revendeur spéficique
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_revendeur'])) {
    $revendeur = $GLOBALS['conn']->query('SELECT * FROM user WHERE id = "'.$_POST['id_revendeur'].'"')->fetchAll();
    // On encode ses informations en tant que JSON
    echo json_encode($revendeur);
}

// Si l'on souhaite modifier un revendeur et qu'un id est donné en paramètre, on effectue la modification
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modification']) && isset($_POST['id'])) {
    $GLOBALS['conn']->query('UPDATE user SET statut = "'.$_POST['statut'].'", date_payant = "'.$_POST['date_boost'].'", payant = '.$_POST['a_paye'].', commentaire_admin = "'.$_POST['refus'].'", societe = "'.$_POST['societe'].'", siren = "'.$_POST['siren'].'", gerant = "'.$_POST['contact'].'", ville = "'.$_POST['ville'].'", code_postal = "'.$_POST['code_postal'].'", adresse = "'.$_POST['adresse'].'", pays = "'.$_POST['pays'].'", tel = "'.$_POST['telephone'].'", email = "'.$_POST['email'].'", site_web = "'.$_POST['url'].'", certif = '.$_POST['certificat'].', costic = '.$_POST['costic'].', description = "'.$_POST['description'].'" where user.id = "'.$_POST['id'].'"');
}